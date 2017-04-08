<?php
declare(strict_types = 1);

namespace App\Console\Commands\Database;

use Illuminate\Support\Facades\{
    DB, Schema
};
use Illuminate\Console\Command;
use App\Console\Commands\HasForceOptionTrait;

/**
 * Class DropTables
 * @package App\Console\Commands\Database
 */
class DropTables extends Command
{
    use HasForceOptionTrait;

    /**
     * @var string
     */
    protected $signature = 'db:drop-tables
                            {--force : Enforce an action}';

    /**
     * @var string
     */
    protected $description = 'Drops all tables in the default configuration.';

    /**
     * Run command.
     */
    public function handle()
    {
        $this->shouldRun();

        Schema::disableForeignKeyConstraints();
        foreach (DB::select('SHOW TABLES') as $table) {
            Schema::dropIfExists(reset($table));
        }
        Schema::enableForeignKeyConstraints();
    }
}
