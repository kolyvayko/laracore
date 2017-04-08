<?php
declare(strict_types = 1);

namespace App\Console\Commands;

/**
 * Class HasForceOptionTrait
 * @package App\Console\Commands
 */
trait HasForceOptionTrait
{
    /**
     * Should the command be executed
     */
    protected function shouldRun()
    {
        if (! $this->isForced() && 'local' !== $this->getLaravel()->environment()) {
            $this->error(
                "This action can't be performed in non-local environment.
                    Please use --force option if you really want to proceed."
            );
        }
    }

    /**
     * Check force mode
     *
     * @return bool
     */
    protected function isForced()
    {
        return null !== $this->option('force');
    }
}
