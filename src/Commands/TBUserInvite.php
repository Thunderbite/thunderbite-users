<?php

namespace Thunderbite\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class TBUserInvite extends Command
{
    public $signature = 'thunderbite:user-invite
    {--name= : Enter name of the user to invite}
    {--email= : Enter email of the user to invite}
    {--level=admin : Enter role of the user}';

    public $description = 'CLI to invite thunderbite user';

    public function handle(): int
    {
        $name = $this->option('name');
        $email = $this->option('email');
        $level = $this->option('level');

        if (!$name || !$email) {
            $this->error('Please enter all the required fields');
            return self::INVALID;
        }

        if (!str_ends_with($email, '@thunderbite.com')) {
            $this->error("Only users with thunderbite.com email are authorised to be added");
            return self::INVALID;
        }

        $userModel = config('thunderbite-users.user_model');

        $user = $userModel::where('email', $email)->first();

        if ($user) {
            $this->warn("User with email $email already exists");

            return self::SUCCESS;
        }

        $user = $userModel::create([
            'name'     => $name,
            'email'    => $email,
            'password' => Hash::make(Str::random(8)),
            'level'    => strtolower($level),
        ]);
        $ott = encrypt($user->id);

        $user->update(['ott' => $ott]);

        $welcomeMail = config('thunderbite-users.welcome_mail');

        Mail::to($user)->queue(new $welcomeMail($user));

        $this->info("Invited successfully user $name <$email>");

        return self::SUCCESS;
    }
}
