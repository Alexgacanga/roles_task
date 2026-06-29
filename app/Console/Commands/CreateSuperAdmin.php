<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('make:superAdmin {name} {email} {password}')]
#[Description('Command description')]
class CreateSuperAdmin extends Command
{

    /**
     * Execute the console command.
     */
    public function handle()
    {


        $user = User::create([
            'name' => $this->argument('name'),
            'email' => $this->argument('email'),
            'password' => bcrypt($this->argument('password')),
        ]);
        $superAdminRole = Role::where('slug', 'super-admin')->firstOrFail();
        $user->roles()->attach($superAdminRole->id);
        $this->info("{$user->email} created successfully!");
    }
}
