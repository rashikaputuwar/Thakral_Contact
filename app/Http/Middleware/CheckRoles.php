<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,...$roles): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login.index');
        }

      
        $user = Auth::user();

        if ($user->employee) {
            // Fetch roles for the employee
            $userRoles = $user->employee->roles->pluck('role_name')->toArray(); // Adjust according to the actual attribute in Role model

            // Fetch menus based on roles
            $roleMenus = $user->employee->roles->flatMap(function ($role) {
                return $role->menus->map(function ($menu) use ($role) {
                    return (object) [
                        'role_id' => $role->id,
                        'menu_id' => $menu->id,
                        'permission_id' => $menu->pivot->permission_id,
                    ];
                });
            });

            // Store data in session
            Session::put([
                'employee_id' => $user->employee->id,
                'employee_fname' => $user->employee->fname,
                'employee_lname' => $user->employee->lname,
                'role_ids' => $user->employee->roles->pluck('id'),
                'role_menus' => $roleMenus,
            ]);

            // Check if user has at least one of the required roles
            if (array_intersect($roles, $userRoles)) {
                return $next($request);
            }
        }

        return redirect()->route('login.index')->withErrors('You do not have the necessary permissions.');
    }
    
    }

