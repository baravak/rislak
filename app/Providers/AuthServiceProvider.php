<?php

namespace App\Providers;

use Illuminate\Auth\RequestGuard;
use Illuminate\Auth\SessionGuard;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \App\Relationship::class => \App\Policies\RelationshipPolicy::class,
        \App\Center::class => \App\Policies\CenterPolicy::class,
        \App\CenterUser::class => \App\Policies\CenterUserPolicy::class,
        \App\RelationshipUser::class => \App\Policies\RelationshipUserPolicy::class,
        \App\Assessment::class => \App\Policies\AssessmentPolicy::class,
        \App\User::class => \App\Policies\UserPolicy::class,

        \App\Room::class => \App\Policies\RoomPolicy::class,
        \App\RoomUser::class => \App\Policies\RoomUserPolicy::class,

        \App\TherapyCase::class => \App\Policies\CasePolicy::class,
        \App\Session::class => \App\Policies\SessionPolicy::class,
        \App\Sample::class => \App\Policies\SamplePolicy::class,
        \App\Practice::class => \App\Policies\PracticePolicy::class,

        \App\Schedule::class => \App\Policies\SchedulePolicy::class,
        \App\PublicTransaction::class => \App\Policies\PublicTransaction::class,

        \App\Billing::class => \App\Policies\BillingPolicy::class

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::resource('dashboard.relationships', 'App\Policies\RelationshipPolicy');
        Gate::resource('dashboard.assessments', 'App\Policies\AssessmentPolicy');
        Gate::resource('dashboard.relationship.users', 'App\Policies\RelationshipUserPolicy');
        Gate::resource('dashboard.rooms', 'App\Policies\RoomPolicy');
        Gate::define('dashboard.rooms.admin', 'App\Policies\RoomPolicy@admin');
        Gate::resource('dashboard.samples', 'App\Policies\SamplePolicy');
        Gate::define('dashboard.samples.management', 'App\Policies\SamplePolicy@management');

        Gate::resource('dashboard.centers', 'App\Policies\CenterPolicy');
        Gate::define('dashboard.centers.acceptation', 'App\Policies\CenterPolicy@acceptation');
        Gate::resource('dashboard.center.users', 'App\Policies\CenterUserPolicy');

        Gate::resource('dashboard.cases', 'App\Policies\CasePolicy');
        Gate::define('dashboard.cases.isClient', 'App\Policies\CasePolicy@isClient');
        Gate::define('dashboard.cases.manager', 'App\Policies\CasePolicy@manager');
        Gate::resource('dashboard.sessions', 'App\Policies\SessionPolicy');
        Gate::resource('dashboard.sessions.practices', 'App\Policies\PracticePolicy');

        RequestGuard::macro('centers', function($withoutMyClinic = false){
            if(!auth()->user()->centers){
                return new Collection([]);
            }
            if($withoutMyClinic){
                $my = auth()->myClinic();
                if($my){
                    return auth()->user()->centers->where('id', '<>', auth()->myClinic()->id);
                }
            }
            return auth()->user()->centers;
        });

        RequestGuard::macro('center', function($center, $checkPosition = null){
            if(!auth()->user()->centers){
                return null;
            }
            return auth()->user()->centers->where('id', $center)->first();
        });

        RequestGuard::macro('myClinic', function(){
            if(auth()->user()->centers){
                return auth()->user()->centers->where('type', 'personal_clinic')->where('manager.id', auth()->id())->first();
            }
            return null;
        });
    }
}
