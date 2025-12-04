<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ShareUserData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Get authenticated user
        $user = Auth::user(); // No need to manually query

        // Fetch all notifications (modify if you only want user's notifications)
        // $notifications = DB::table('notifications')->orderBy('created_at', 'desc')->get();
        $notifications = DB::table('notifications')
            ->join('users', 'users.id', '=', 'notifications.notifiable_id')
            ->select('users.fullname', 'users.email', 'notifications.id', 'notifications.data', 'notifications.created_at')
            ->where('notifications.read_at', '=', null)
            ->orderBy('notifications.created_at', 'desc')
            ->get();
        // Share data with all views
        
        View::share([
            'user' => $user, // Use 'user' instead of 'users' to be more clear
            'notifications' => $notifications
        ]);

        return $next($request);
    }
}
