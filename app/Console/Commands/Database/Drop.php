<?php
declare(strict_types = 1);

namespace App\Console\Commands\Database;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Connection;
use Illuminate\Console\Command;
use App\Console\Commands\HasForceOptionTrait;

/**
 * Class Drop
 * @package App\Console\Commands\Database
 */
class Drop extends Command
{
    use HasForceOptionTrait;

    /** @var string The name and signature of the console command. */
    protected $signature = 'db:drop
                            {--force : Enforce an action}';

    /** @var string The console command description. */
    protected $description = 'Drops the database defined in config';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Check if command should be executed
        $this->shouldRun();

        /** @var Connection $connection */
        $conn = DB::connection();

        $dfconn = config('database.default');
        $driver = config("database.connections.{$dfconn}.driver");
        if ('mysql' !== $driver) {
            $this->error("Sorry, but only MySQL driver supported. Your driver is '{$driver}'");
        }
        $dbname = config("database.connections.{$dfconn}.database");

        $success = $conn->statement("DROP DATABASE IF EXISTS `{$dbname}`");
        if ($success) {
            $this->info("Database '{$dbname}' has been droped");
        } else {
            $this->error("Couldn't drop the database '{$dbname}'");
        }
    }
}
