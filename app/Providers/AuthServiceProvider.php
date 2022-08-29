<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\LabQueue;
use App\Models\LabTask;
use App\Models\UserRole;
use App\Policies\LabQueuePolicy;
use App\Policies\LabTaskPolicy;
use App\Policies\UserRolePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        LabQueue::class => LabQueuePolicy::class,
        UserRole::class => UserRolePolicy::class,
        LabTask::class => LabTaskPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
