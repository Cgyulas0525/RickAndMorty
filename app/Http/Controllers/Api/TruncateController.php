<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use DB;

class TruncateController extends Controller
{

    /**
     * truncate series tables
     *
     * @throws \Exception
     */
    public function truncateTables()
    {

        DB::beginTransaction();

        try {

            $envName = env('DB_DATABASE');
            $dbName = "Tables_in_". $envName;
            $tables = Schema::getAllTables();
            foreach ($tables as $table) {

                if ($table->$dbName == 'characters' || $table->$dbName == 'episodes' || $table->$dbName == 'series' || $table->$dbName == 'episodecharacters' ) {
                    Schema::disableForeignKeyConstraints();
                    DB::table($table->$dbName)->truncate();
                    Schema::enableForeignKeyConstraints();
                }
            }

            DB::commit();

        } catch (\Exception $e) {

            DB::rollBack();

            throw new \Exception($e->getMessage);
        }

    }
}
