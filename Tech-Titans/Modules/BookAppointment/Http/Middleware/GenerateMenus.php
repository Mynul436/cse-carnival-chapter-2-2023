<?php

namespace Modules\BookAppointment\Http\Middleware;

use Closure;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*
         *
         * Module Menu for Admin Backend
         *
         * *********************************************************************
         */
        \Menu::make('admin_sidebar', function ($menu) {

            // // BookAppointments
            // $menu->add('<i class="nav-icon fa-regular fa-sun"></i> '.__('BookAppointments'), [
            //     'route' => 'backend.bookappointments.index',
            //     'class' => 'nav-item',
            // ])
            // ->data([
            //     'order'         => 77,
            //     'activematches' => ['admin/bookappointments*'],
            //     'permission'    => ['view_bookappointments'],
            // ])
            // ->link->attr([
            //     'class' => 'nav-link',
            // ]);
        })->sortBy('order');

        return $next($request);
    }
}
