<?php

namespace Database\Seeders;

// Increase the server resources
$iniConfigFile = __DIR__ . '/../../app/Helpers/Functions/ini.php';
if (file_exists($iniConfigFile)) {
	include_once $iniConfigFile;
}

use App\Helpers\DBTool;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		
		// Get App's URL
		$appUrl = env('APP_URL');
		
		// Truncate all tables
		$tables = DBTool::getDatabaseTables(DB::getTablePrefix());
		if (is_array($tables) && count($tables) > 0) {
			foreach ($tables as $table) {
				DB::statement('ALTER TABLE ' . $table . ' AUTO_INCREMENT=1;');
				
				// Don't truncate some tables (eg. migrations, ...)
				if (
					Str::contains($table, 'migrations')
					|| Str::contains($table, 'users')
				) {
					continue;
				}
				
				if (Str::contains($table, 'blacklist')) {
					if (!Str::endsWith($appUrl, '.local')) {
						continue;
					}
				}
				
				DB::statement('TRUNCATE TABLE ' . $table . ';');
			}
		}
		
		// Run Default Seeders
		$this->call(LanguageSeeder::class);
		$this->call(AdvertisingSeeder::class);
		$this->call(CategorySeeder::class);
		$this->call(ContinentSeeder::class);
		$this->call(CurrencySeeder::class);
		$this->call(FieldSeeder::class);
		$this->call(GenderSeeder::class);
		$this->call(HomeSectionSeeder::class);
		$this->call(PackageSeeder::class);
		$this->call(PageSeeder::class);
		$this->call(PaymentMethodSeeder::class);
		$this->call(PostTypeSeeder::class);
		$this->call(ReportTypeSeeder::class);
		$this->call(SettingSeeder::class);
		$this->call(UserTypeSeeder::class);
		$this->call(CategoryFieldSeeder::class);
		$this->call(CountrySeeder::class);
		
		$isDemoDomain = (isDemoDomain($appUrl) || Str::contains($appUrl, 'bedigit.local') || Str::contains($appUrl, 'laraclassifier.local'));
		if ($isDemoDomain) {
			$factoriesSeeders = [
				'\Database\Seeders\Factories\ClearFilesSeeder',
				'\Database\Seeders\Factories\UserSeeder',
				'\Database\Seeders\Factories\PermissionDataSeeder',
				'\Database\Seeders\Factories\SettingDataSeeder',
				'\Database\Seeders\Factories\HomeDataSeeder',
				'\Database\Seeders\Factories\CountryDataSeeder',
				'\Database\Seeders\Factories\LanguageDataSeeder',
				'\Database\Seeders\Factories\MetaTagSeeder',
				'\Database\Seeders\Factories\PostSeeder',
				'\Database\Seeders\Factories\FakerSeeder',
				'\Database\Seeders\Factories\MessengerSeeder',
				'\Database\Seeders\Factories\BlacklistSeeder',
			];
			
			foreach ($factoriesSeeders as $seeder) {
				if (Str::contains($seeder, 'BlacklistSeeder')) {
					if (Str::endsWith($appUrl, '.local')) {
						continue;
					}
				}
				
				if (class_exists($seeder)) {
					$this->call($seeder);
				}
			}
		}
		
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}
}
