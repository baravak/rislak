<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\Paginator;
use App\View\Components\Link\Show;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(getenv('HTTP_X_FORWARDED_PROTO') == 'https' || getenv('HTTPS_CONNECTION') == '1')
        {
            $this->app['request']->server->set('HTTPS','on');
            \URL::forceScheme('https');
        }
        Paginator::defaultView('layouts.pagination');

        \Carbon\Carbon::setWeekEndsAt(\Carbon\Carbon::FRIDAY);
        \Carbon\Carbon::setWeekStartsAt(\Carbon\Carbon::SATURDAY);

        Blade::directive('billingItemAction', function ($billingItemAction) {
            return "<?php echo $billingItemAction->actionRoute ?>";
        });

        Blade::directive('amount', function ($amount) {
            return "<?php echo $amount >= 0 ? number_format($amount) : '(' . number_format(str_replace('-', '', $amount)) . ')' ?>";
        });

        Blade::directive('room', function ($room) {
            return "<?php echo \$__env->make('components._room', ['room' => $room])->render(); ?>";
        });
        Blade::directive('center', function ($center) {
            return "<?php echo {$center}->type == 'personal_clinic' ? __('Personal clinic') : {$center}->detail->title; ?>";
        });

        Blade::directive('tdRoomDetail', function ($args = null) {
            if($args){
                $var = explode(',', $args);
                $args = [];
                if(isset($var[0])){
                    $args['room'] = $var[0];
                }
                if(isset($var[1])){
                    $args['center'] = $var[1];
                }
                $args = '[' . implode(', ', array_map(function ($v, $k) {
                    return "'$k'=> $v";
                },$args , array_keys($args)
                )) . ']';
            }else{
                $args = '[]';
            }
            return "<?php
            \$vars = array_merge(get_defined_vars(), $args);
            if(!isset(\$vars['center']) && isset(\$vars['room'])) \$vars['center'] = \$vars['room']->center;
            echo \$__env->make('components._tdRoomDetail', \$vars)->render();
            ?>";
        });
        Blade::component('link-show', Show::class);
    }
}
