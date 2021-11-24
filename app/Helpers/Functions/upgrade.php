<?php

use App\Helpers\DBTool;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Check & Drop Indexes
 *
 * @param $tableName
 * @param $indexName
 */
function checkAndDropIndex($tableName, $indexName)
{
	try {
		$isMariaDb = DBTool::isMariaDB();
		if ($isMariaDb) {
			checkAndDropIndexMariaDb($tableName, $indexName);
		} else {
			checkAndDropIndexMySql($tableName, $indexName);
		}
	} catch (\PDOException $e) {
		dd($e);
	}
	
	checkAndDropIndexLaravel($tableName, $indexName);
}

/**
 * Check & Drop Index using MySQL
 *
 * @param $tableName
 * @param $indexName
 */
function checkAndDropIndexMySql($tableName, $indexName)
{
	$tableNameWithPrefix = DB::getTablePrefix() . $tableName;
	$idxDb = DB::connection()->getDatabaseName();
	
	$sql = [
		'Key_name'   => 'SHOW INDEX FROM `' . $tableNameWithPrefix . '` FROM `' . $idxDb . '`;',
		'INDEX_NAME' => 'SELECT DISTINCT INDEX_NAME
						 FROM `INFORMATION_SCHEMA`.`STATISTICS`
						 WHERE `TABLE_SCHEMA` = \'' . $idxDb . '\'
							AND `TABLE_NAME` = \'' . $tableNameWithPrefix . '\'',
	];
	
	// Exception for MySQL 8
	$isMySql8OrGreater = (!DBTool::isMariaDB() && DBTool::isMySqlMinVersion('8.0'));
	$indexColumn = $isMySql8OrGreater ? 'INDEX_NAME' : 'Key_name';
	
	$results = DB::select(DB::raw($sql[$indexColumn]));
	
	if (is_array($results) && count($results) > 0) {
		$results = collect($results)->mapWithKeys(function ($item) use ($indexColumn) {
			$indexNameLocal = $item->{$indexColumn} ?? null;
			
			return [$indexNameLocal => $indexNameLocal];
		})->toArray();
		
		if (in_array($indexName, $results)) {
			$sql = "ALTER TABLE `" . $tableNameWithPrefix . "` DROP INDEX " . $indexName . ";" . "\n";
			DB::unprepared($sql);
		}
	}
}

/**
 * Check & Drop Index using MariaDB
 *
 * @param $tableName
 * @param $indexName
 */
function checkAndDropIndexMariaDb($tableName, $indexName)
{
	$tableNameWithPrefix = DB::getTablePrefix() . $tableName;
	$idxDb = DB::connection()->getDatabaseName();
	
	$sql = 'show indexes from `' . $tableNameWithPrefix . '` in `' . $idxDb . '`;';
	
	$results = DB::select(DB::raw($sql));
	
	if (is_array($results) && count($results) > 0) {
		$results = collect($results)->mapWithKeys(function ($item) {
			$indexNameLocal = $item->Key_name ?? null;
			
			return [$indexNameLocal => $indexNameLocal];
		})->toArray();
		
		if (in_array($indexName, $results)) {
			$sql = "drop index `" . $indexName . "` on `" . $tableNameWithPrefix . "`;" . "\n";
			DB::unprepared($sql);
		}
	}
}

/**
 * Check & Drop Index using Laravel
 *
 * @param $tableName
 * @param $indexName
 */
function checkAndDropIndexLaravel($tableName, $indexName)
{
	Schema::table($tableName, function ($table) use ($tableName, $indexName) {
		$sm = Schema::getConnection()->getDoctrineSchemaManager();
		$indexesFound = $sm->listTableIndexes(DB::getTablePrefix() . $tableName);
		
		$indexRawName = DB::getTablePrefix() . $tableName . '_' . $indexName . '_index';
		if (array_key_exists($indexRawName, $indexesFound)) {
			$table->dropIndex([$indexName]);
		}
	});
}
