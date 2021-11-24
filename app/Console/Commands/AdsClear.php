<?php
/**
 * LaraClassifier - Classified Ads Web Application
 * Copyright (c) BeDigit. All Rights Reserved
 *
 * Website: https://laraclassifier.com
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from CodeCanyon,
 * Please read the full License from here - http://codecanyon.net/licenses/standard
 */

namespace App\Console\Commands;

// Increase the server resources
$iniConfigFile = __DIR__ . '/../../Helpers/Functions/ini.php';
if (file_exists($iniConfigFile)) {
	include_once $iniConfigFile;
}

use App\Models\Package;
use App\Models\Payment;
use App\Models\Permission;
use App\Models\Scopes\VerifiedScope;
use App\Models\User;
use App\Models\Scopes\ActiveScope;
use App\Models\Scopes\ReviewedScope;
use App\Notifications\PostArchived;
use App\Notifications\PostDeleted;
use App\Notifications\PostWilBeDeleted;
use App\Models\Post;
use App\Models\Country;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class AdsClear extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'listings:clear';
	
	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Delete all old Listings.';
	
	/**
	 * Default Listing Expiration Duration
	 *
	 * @var int
	 */
	private $unactivatedPostsExpiration = 30;      // Delete the unactivated Posts after this expiration
	private $activatedPostsExpiration = 30;        // Archive the activated Posts after this expiration
	private $archivedPostsExpiration = 7;          // Delete the archived Posts after this expiration
	private $manuallyArchivedPostsExpiration = 90; // Delete the manually archived Posts after this expiration
	
	/**
	 * ListingsCleaner constructor.
	 */
	public function __construct()
	{
		parent::__construct();
		
		$this->unactivatedPostsExpiration = (int)config('settings.cron.unactivated_listings_expiration', $this->unactivatedPostsExpiration);
		$this->activatedPostsExpiration = (int)config('settings.cron.activated_listings_expiration', $this->activatedPostsExpiration);
		$this->archivedPostsExpiration = (int)config('settings.cron.archived_listings_expiration', $this->archivedPostsExpiration);
		$this->manuallyArchivedPostsExpiration = (int)config('settings.cron.manually_archived_listings_expiration', $this->manuallyArchivedPostsExpiration);
	}
	
	/**
	 * Execute the console command.
	 */
	public function handle()
	{
		if (isDemoDomain(env('APP_URL'))) {
			$msg = t('demo_mode_message');
			(isCli()) ? $this->warn($msg) : $this->printWeb($msg);
			exit();
		}
		
		// Get all countries
		$countries = Country::withoutGlobalScope(ActiveScope::class)->get();
		if ($countries->count() <= 0) {
			$msg = 'No country found.';
			(isCli()) ? $this->warn($msg) : $this->printWeb($msg);
			exit();
		}
		
		// Browse countries
		foreach ($countries as $country) {
			
			// Get country's (non-permanent) listings
			$posts = Post::withoutGlobalScopes([VerifiedScope::class, ReviewedScope::class])
				->countryOf($country->code)
				->where(function ($query) {
					$query->where(function ($q) {
						$q->where('is_permanent', '!=', 1)->orWhereNull('is_permanent');
					})->whereHas('category', function ($q) {
						$q->where(function ($query) {
							$query->where('is_for_permanent', '!=', '1')->orWhereNull('is_for_permanent');
						});
					});
				});
			
			if ($posts->count() <= 0) {
				$msg = 'No listings in "' . $country->name . '" (' . strtoupper($country->code) . ') website.';
				(isCli()) ? $this->info($msg) : $this->printWeb($msg);
				
				continue;
			}
			
			/*
			 * Items Processing (Using Eloquent Cursor Method)
			 * The cursor method allows you to iterate through your database records using a cursor, which will only execute a single query.
			 * When processing large amounts of data, the cursor method may be used to greatly reduce your memory usage
			 */
			foreach ($posts->cursor() as $post) {
				try {
					$this->itemProcessing($post, $country);
				} catch (\Throwable $e) {
					dd($e);
				}
			}
			
		}
		
		$msg = 'END.';
		(isCli()) ? $this->info($msg) : $this->printWeb($msg);
	}
	
	/**
	 * @param \App\Models\Post $post
	 * @param \App\Models\Country $country
	 * @throws \Exception
	 */
	private function itemProcessing(Post $post, Country $country)
	{
		// Debug
		// if ($country->code != 'US') return;
		
		// Get the Country's TimeZone
		$timeZone = (isset($country->time_zone) && !empty($country->time_zone))
			? $country->time_zone
			: config('app.timezone');
		
		// Get the current Datetime
		$today = Carbon::now($timeZone);
		
		// Debug
		// dd($today->diffInDays($post->created_at));
		
		/* Non-activated Listing */
		if (!isVerifiedPost($post)) {
			
			// Delete non-active Listing after '$this->unactivatedPostsExpiration' days
			if ($today->diffInDays($post->created_at) >= $this->unactivatedPostsExpiration) {
				$post->delete();
				
				return;
			}
			
		} else {
			/* Activated Listing */
			
			// Get all Packages (Just count them)
			$packages = Package::query();
			
			/* Is it a website with Premium Listing features enabled? */
			$package = null;
			if ($packages->count() > 0) {
				// Check the Listing's transactions (Get the last transaction (Non pushed))
				$payment = Payment::where('post_id', $post->id)
					->where(function ($query) {
						$query->where('transaction_id', '!=', 'featured')->orWhereNull('transaction_id');
					})
					->orderByDesc('id')
					->first();
				if (!empty($payment)) {
					// Get Package info
					$package = Package::find($payment->package_id);
					if (!empty($package)) {
						if (!empty($package->duration)) {
							$this->activatedPostsExpiration = $package->duration;
						}
					}
				}
			}
			
			/* Check if the Listing is featured (Premium Listings) */
			if ($post->featured == 1) {
				
				if (!empty($package)) {
					// Un-featured the Listing after {$package->promo_duration} days (related to the Payment date)
					if ($today->diffInDays($payment->created_at) >= $package->promo_duration) {
						
						// Un-featured
						$post->featured = 0;
						$post->save();
						
						return;
					}
				}
				
			} else {
				
				// Auto-archive
				if ($post->archived != 1) {
					// Archive all activated Listing after '$this->activatedPostsExpiration' days
					if ($today->diffInDays($post->created_at) >= $this->activatedPostsExpiration) {
						// Archive
						$post->archived = 1;
						$post->archived_at = $today;
						$post->save();
						
						if ($country->active == 1) {
							try {
								// Send Notification Email to the Author
								$post->notify(new PostArchived($post, $this->archivedPostsExpiration));
							} catch (\Throwable $e) {
								$msg = $e->getMessage() . PHP_EOL;
								(isCli()) ? $this->warn($msg) : $this->printWeb($msg);
							}
						}
						
						return;
					}
				}
				
				// Auto-delete
				if ($post->archived == 1) {
					// Debug
					// $today = $today->addDays(4);
					
					// Count days since the Listing has been archived
					$countDaysSinceAdHasBeenArchived = $today->diffInDays($post->archived_at);
					
					// Send one alert email each X day started from Y days before the final deletion until the Listing deletion (using 'archived_at')
					// Start alert email sending from 7 days earlier (for example)
					$daysEarlier = 7;       // In days (Y)
					$intervalOfSending = 2; // In days (X)
					
					if ($post->archived_manually != 1) {
						$archivedPostsExpirationSomeDaysEarlier = $this->archivedPostsExpiration - $daysEarlier;
					} else {
						$archivedPostsExpirationSomeDaysEarlier = $this->manuallyArchivedPostsExpiration - $daysEarlier;
					}
					
					if ($countDaysSinceAdHasBeenArchived >= $archivedPostsExpirationSomeDaysEarlier) {
						// Update the '$daysEarlier' to show in the mail
						$daysEarlier = $daysEarlier - $countDaysSinceAdHasBeenArchived;
						
						if ($daysEarlier > 0) {
							// Using 'deletion_mail_sent_at'
							if (empty($post->deletion_mail_sent_at) || $today->diffInDays($post->deletion_mail_sent_at) >= $intervalOfSending) {
								try {
									$post->notify(new PostWilBeDeleted($post, $daysEarlier));
								} catch (\Throwable $e) {
									$msg = $e->getMessage() . PHP_EOL;
									(isCli()) ? $this->warn($msg) : $this->printWeb($msg);
								}
								
								// Update the field 'deletion_mail_sent_at' with today timestamp
								$post->deletion_mail_sent_at = $today;
								$post->save();
							}
						}
					}
					
					// Delete all archived Listing '$this->archivedPostsExpiration' days later (using 'archived_at')
					if ($countDaysSinceAdHasBeenArchived >= $this->archivedPostsExpiration) {
						if ($country->active == 1) {
							try {
								// Send Notification Email to the Author
								$post->notify(new PostDeleted($post));
							} catch (\Throwable $e) {
								$msg = $e->getMessage() . PHP_EOL;
								(isCli()) ? $this->warn($msg) : $this->printWeb($msg);
							}
						}
						
						// Delete
						$post->delete();
						
						return;
					}
				}
				
			}
		}
	}
	
	/**
	 * @param $var
	 */
	private function printWeb($var)
	{
		// Only for Debug !
		// echo '<pre>'; print_r($var); echo '</pre>';
	}
}
