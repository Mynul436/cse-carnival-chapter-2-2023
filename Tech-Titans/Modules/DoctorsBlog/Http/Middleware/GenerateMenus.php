<?php

namespace Modules\DoctorsBlog\Http\Middleware;

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

            // // DoctorsBlogs
            // $menu->add('<i class="nav-icon fa-regular fa-sun"></i> '.__('DoctorsBlogs'), [
            //     'route' => 'backend.doctorsblogs.index',
            //     'class' => 'nav-item',
            // ])
            // ->data([
            //     'order'         => 77,
            //     'activematches' => ['admin/doctorsblogs*'],
            //     'permission'    => ['view_doctorsblogs'],
            // ])
            // ->link->attr([
            //     'class' => 'nav-link',
            // ]);
        })->sortBy('order');

        return $next($request);
    }
}
