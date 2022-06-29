<?php

namespace Thunderbite\Commands;

use Illuminate\Console\Command;

class TBUserRemove extends Command
{
    public $signature = 'thunderbite:user-remove
    {--email= : Enter email of the user to invite}';

    public $description = 'CLI to remove thunderbite user';

    public function handle(): int
    {
        $email = $this->option('email');

        if (!str_ends_with($email, '@thunderbite.com')) {
            $this->error("Only users with thunderbite.com email are authorised to be removed");

            return self::INVALID;
        }

        $userModel = config('thunderbite-users.user_model');

        $user = $userModel::where('email', $email)->first();

        if (! $user) {
            $this->warn("User with email $email not exists");

            return self::SUCCESS;
        }

        $user->delete();

        $this->info("User removed successfully {$user->name} <$email>");

        return self::SUCCESS;
    }
}
