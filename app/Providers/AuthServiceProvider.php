<?php

namespace App\Providers;

use App\Modules\Admin\Lead\Models\Lead;
use App\Modules\Admin\Lead\Policies\LeadPolicy;
use App\Modules\Admin\LeadComment\Models\LeadComment;
use App\Modules\Admin\LeadComment\Policies\LeadCommentsPolicy;
use App\Modules\Admin\User\Models\User;
use App\Modules\Admin\User\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Modules\Admin\Role\Models\Role;
use App\Modules\Admin\Role\Policies\RolePolicy;
use App\Modules\Admin\Sources\Policies\SourcePolicy;
use App\Modules\Admin\Sources\Models\Source;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Role::class => RolePolicy::class,
        User::class => UserPolicy::class,
        Source::class => SourcePolicy::class,
        Lead::class => LeadPolicy::class,
        LeadComment::class => LeadCommentsPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
