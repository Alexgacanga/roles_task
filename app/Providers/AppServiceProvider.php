<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\User;
use App\Policies\ArticlePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {


    Gate::before(function (User $user, string $ability) {
    if ($user->hasRole('super-admin')) {
        return true;
    }
    });
         Gate::define('create-users', fn($user)=>$user->hasPermission('create-users'));
         Gate::define('edit-users', fn($user)=>$user->hasPermission('edit-users'));
         Gate::define('delete-users', fn($user)=>$user->hasPermission('delete-users'));
         Gate::define('view-users', fn($user)=>$user->hasPermission('view-users'));
         Gate::define('view-roles', fn($user)=>$user->isSuperAdmin('view-roles'));
    }
}
