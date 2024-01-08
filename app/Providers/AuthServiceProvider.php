<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
      Gate::define('create', function(){
        return Auth::user()->email == 'admin@edu.com' && Auth::user()->user_role_id=='1';
      });

      Gate::define('update', function(){
        return Auth::user()->email=='admin@edu.com' && Auth::user()->user_role_id == '1';
      });

      Gate::define('delete', function(){
        return Auth::user()->email=='admin@edu.com' && Auth::user()->user_role_id =='1';
      });

      Gate::define('view', function(){
        return Auth::user()->user_role_id == '1';
      });
    }
}
