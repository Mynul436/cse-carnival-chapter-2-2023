<?php

namespace App\Http\Middleware;

use Closure;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \Menu::make('admin_sidebar', function ($menu) {
            // Dashboard
            if (auth()->user()) {
                if (auth()->user()->hasRole('super admin')) {



                    $menu->add('<i class="nav-icon fa-solid fa-cubes"></i> ' . __('Dashboard'), [
                        'route' => 'backend.dashboard',
                        'class' => 'nav-item',
                    ])
                        ->data([
                            'order' => 1,
                            'activematches' => 'admin/dashboard*',
                        ])
                        ->link->attr([
                            'class' => 'nav-link',
                        ]);

                    $articles_menu = $menu->add('<i class="nav-icon fas fa-file-alt"></i> ' . __('Article'), [
                        'class' => 'nav-group',
                    ])
                        ->data([
                            'order' => 81,
                            'activematches' => [
                                'admin/posts*',
                                'admin/categories*',
                            ],
                            'permission' => ['view_posts', 'view_categories'],
                        ]);
                    $articles_menu->link->attr([
                        'class' => 'nav-link nav-group-toggle',
                        'href' => '#',
                    ]);

                    // Submenu: Posts
                    $articles_menu->add('<i class="nav-icon fas fa-file-alt"></i> ' . __('Posts'), [
                        'route' => 'backend.posts.index',
                        'class' => 'nav-item',
                    ])
                        ->data([
                            'order' => 82,
                            'activematches' => 'admin/posts*',
                            'permission' => ['edit_posts'],
                        ])
                        ->link->attr([
                            'class' => 'nav-link',
                        ]);
                    // DoctorsBlogs
                    $menu->add('<i class="nav-icon fa-regular fa-sun"></i> ' . __('DoctorsBlogs'), [
                        'route' => 'backend.doctorsblogs.index',
                        'class' => 'nav-item',
                    ])
                        ->data([
                            'order' => 77,
                            'activematches' => ['admin/doctorsblogs*'],
                            'permission' => ['view_doctorsblogs'],
                        ])
                        ->link->attr([
                            'class' => 'nav-link',
                        ]);

                        $menu->add('<i class="nav-icon fas fa-comments"></i> Comments', [
                            'route' => 'backend.comments.index',
                            'class' => 'nav-item',
                        ])
                            ->data([
                                'order' => 85,
                                'activematches' => ['admin/comments*'],
                                'permission' => ['view_comments'],
                            ])
                            ->link->attr([
                                'class' => 'nav-link',
                            ]);
                    // Notifications
                    $menu->add('<i class="nav-icon fas fa-bell"></i> Notifications', [
                        'route' => 'backend.notifications.index',
                        'class' => 'nav-item',
                    ])
                        ->data([
                            'order' => 99,
                            'activematches' => 'admin/notifications*',
                            'permission' => [],
                        ])
                        ->link->attr([
                            'class' => 'nav-link',
                        ]);

                    // // Separator: Access Management
                    $menu->add('Management', [
                        'class' => 'nav-title',
                    ])
                        ->data([
                            'order' => 101,
                            'permission' => ['edit_settings', 'view_backups', 'view_users', 'view_roles', 'view_logs'],
                        ]);

                    // Settings
                    $menu->add('<i class="nav-icon fas fa-cogs"></i> Settings', [
                        'route' => 'backend.settings',
                        'class' => 'nav-item',
                    ])
                        ->data([
                            'order' => 102,
                            'activematches' => 'admin/settings*',
                            'permission' => ['edit_settings'],
                        ])
                        ->link->attr([
                            'class' => 'nav-link',
                        ]);

                    // Backup
                    $menu->add('<i class="nav-icon fas fa-archive"></i> Backups', [
                        'route' => 'backend.backups.index',
                        'class' => 'nav-item',
                    ])
                        ->data([
                            'order' => 103,
                            'activematches' => 'admin/backups*',
                            'permission' => ['view_backups'],
                        ])
                        ->link->attr([
                            'class' => 'nav-link',
                        ]);

                    // Access Control Dropdown
                    $accessControl = $menu->add('<i class="nav-icon fa-solid fa-user-gear"></i> Access Control', [
                        'class' => 'nav-group',
                    ])
                        ->data([
                            'order' => 104,
                            'activematches' => [
                                'admin/users*',
                                'admin/roles*',
                            ],
                            'permission' => ['view_users', 'view_roles'],
                        ]);
                    $accessControl->link->attr([
                        'class' => 'nav-link nav-group-toggle',
                        'href' => '#',
                    ]);

                    // Submenu: Users
                    $accessControl->add('<i class="nav-icon fa-solid fa-user-group"></i> Users', [
                        'route' => 'backend.users.index',
                        'class' => 'nav-item',
                    ])
                        ->data([
                            'order' => 105,
                            'activematches' => 'admin/users*',
                            'permission' => ['view_users'],
                        ])
                        ->link->attr([
                            'class' => 'nav-link',
                        ]);

                    // Submenu: Roles
                    $accessControl->add('<i class="nav-icon fa-solid fa-user-shield"></i> Roles', [
                        'route' => 'backend.roles.index',
                        'class' => 'nav-item',
                    ])
                        ->data([
                            'order' => 106,
                            'activematches' => 'admin/roles*',
                            'permission' => ['view_roles'],
                        ])
                        ->link->attr([
                            'class' => 'nav-link',
                        ]);

                    // Log Viewer
                    // Log Viewer Dropdown
                    $accessControl = $menu->add('<i class="nav-icon fa-solid fa-list-check"></i> Log Viewer', [
                        'class' => 'nav-group',
                    ])
                        ->data([
                            'order' => 107,
                            'activematches' => [
                                'log-viewer*',
                            ],
                            'permission' => ['view_logs'],
                        ]);
                    $accessControl->link->attr([
                        'class' => 'nav-link nav-group-toggle',
                        'href' => '#',
                    ]);

                    // Submenu: Log Viewer Dashboard
                    $accessControl->add('<i class="nav-icon fa-solid fa-list"></i> Dashboard', [
                        'route' => 'log-viewer::dashboard',
                        'class' => 'nav-item',
                    ])
                        ->data([
                            'order' => 108,
                            'activematches' => 'admin/log-viewer',
                        ])
                        ->link->attr([
                            'class' => 'nav-link',
                        ]);

                    // Submenu: Log Viewer Logs by Days
                    $accessControl->add('<i class="nav-icon fa-solid fa-list-ol"></i> Logs by Days', [
                        'route' => 'log-viewer::logs.list',
                        'class' => 'nav-item',
                    ])
                        ->data([
                            'order' => 109,
                            'activematches' => 'admin/log-viewer/logs*',
                        ])
                        ->link->attr([
                            'class' => 'nav-link',
                        ]);
                }
                if (auth()->user()->hasRole('doctor')) {
                    $articles_menu = $menu->add('<i class="nav-icon fas fa-file-alt"></i> ' . __('Article'), [
                        'class' => 'nav-group',
                    ])
                        ->data([
                            'order' => 81,
                            'activematches' => [
                                'admin/posts*',
                                'admin/categories*',
                            ],
                            'permission' => ['view_posts', 'view_categories'],
                        ]);
                    $articles_menu->link->attr([
                        'class' => 'nav-link nav-group-toggle',
                        'href' => '#',
                    ]);

                    // Submenu: Posts
                    $articles_menu->add('<i class="nav-icon fas fa-file-alt"></i> ' . __('Posts'), [
                        'route' => 'backend.posts.index',
                        'class' => 'nav-item',
                    ])
                        ->data([
                            'order' => 82,
                            'activematches' => 'admin/posts*',
                            'permission' => ['edit_posts'],
                        ])
                        ->link->attr([
                            'class' => 'nav-link',
                        ]);

                    // DoctorsBlogs
                    $menu->add('<i class="nav-icon fa-regular fa-sun"></i> ' . __('DoctorsBlogs'), [
                        'route' => 'backend.doctorsblogs.index',
                        'class' => 'nav-item',
                    ])
                        ->data([
                            'order' => 77,
                            'activematches' => ['admin/doctorsblogs*'],
                            'permission' => ['view_doctorsblogs'],
                        ])
                        ->link->attr([
                            'class' => 'nav-link',
                        ]);

                    // BookAppointments
                    $menu->add('<i class="nav-icon fa-regular fa-sun"></i> ' . __('BookAppointments'), [
                        'route' => 'backend.bookappointments.index',
                        'class' => 'nav-item',
                    ])
                        ->data([
                            'order' => 77,
                            'activematches' => ['admin/bookappointments*'],
                            'permission' => ['view_bookappointments'],
                        ])
                        ->link->attr([
                            'class' => 'nav-link',
                        ]);

                }



                if (auth()->user()->hasRole('patient')) {
                    $menu->add('<i class="nav-icon fa-regular fa-sun"></i> ' . __('DoctorsBlogs'), [
                        'route' => 'backend.doctorsblogs.index',
                        'class' => 'nav-item',
                    ])
                        ->data([
                            'order' => 77,
                            'activematches' => ['admin/doctorsblogs*'],
                            'permission' => ['view_doctorsblogs'],
                        ])
                        ->link->attr([
                            'class' => 'nav-link',
                        ]);
                    // BookAppointments
                    $menu->add('<i class="nav-icon fa-regular fa-sun"></i> ' . __('BookAppointments'), [
                        'route' => 'backend.bookappointments.index',
                        'class' => 'nav-item',
                    ])
                        ->data([
                            'order' => 77,
                            'activematches' => ['admin/bookappointments*'],
                            'permission' => ['view_bookappointments'],
                        ])
                        ->link->attr([
                            'class' => 'nav-link',
                        ]);
                }


                // Access Permission Check
                $menu->filter(function ($item) {
                    if ($item->data('permission')) {
                        if (auth()->check()) {
                            if (auth()->user()->hasRole('super admin')) {
                                return true;
                            } elseif (auth()->user()->hasAnyPermission($item->data('permission'))) {
                                return true;
                            }
                        }

                        return false;
                    } else {
                        return true;
                    }
                });

                // Set Active Menu
                $menu->filter(function ($item) {
                    if ($item->activematches) {
                        $activematches = (is_string($item->activematches)) ? [$item->activematches] : $item->activematches;
                        foreach ($activematches as $pattern) {
                            if (request()->is($pattern)) {
                                $item->active();
                                $item->link->active();
                                if ($item->hasParent()) {
                                    $item->parent()->active();
                                }
                            }
                        }
                    }

                    return true;
                });
            }
        })->sortBy('order');

        return $next($request);
    }
}