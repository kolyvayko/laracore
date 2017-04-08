<?php
declare(strict_types = 1);

namespace App\Console\Commands\Database;

use Illuminate\Console\Command;
use App\Console\Commands\HasForceOptionTrait;

/**
 * Class Refresh
 * @package App\Console\Commands\Database
 */
class Refresh extends Command
{
    use HasForceOptionTrait;

    /**
     * @var string
     */
    protected $signature = 'db:refresh
                            {--force : Enforce an action}';

    /**
     * @var string
     */
    protected $description = 'Drop all tables and run migrations with seeding';

    /**
     * Handle the command.
     */
    public function handle()
    {
        $this->shouldRun();

        $this->call('db:drop-tables');
        $this->info('Successfully dropped all tables');
        $this->call('migrate', ['--seed' => true]);
        $this->info('Successfully migrated and seeded');
    }
}
