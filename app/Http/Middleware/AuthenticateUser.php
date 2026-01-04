<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     $auth_token = $request->header('auth-token');
    //     $user_id = $request->header('user-id');
        
    //     if ($this->secureTokenCheck($auth_token, $user_id) && ctype_digit($user_id)) {
    //         return $next($request);
    //     }

    //     return response()->json([
    //         'status' => false,
    //         'status_code' => 'EC_0000',
    //         'message' => 'Unauthorized'
    //     ], 401);

    // }




    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $auth_token = $request->header('auth-token');
        $user_id = $request->header('user-id');
        
        // 1. Use your dedicated function to check token validity
        if (!$this->secureTokenCheck($auth_token, $user_id) || !ctype_digit($user_id)) {
            return response()->json([
                'status' => false,
                'status_code' => 'EC_0000',
                'message' => 'Unauthorized'
            ], 401);
        }

        // 2. Fetch user to check their role (Now we know token is valid)
        $user = User::find($user_id);

        // 3. Role-Based Access Control
        // If the route has specific roles defined (e.g., auth.user:1)
        if (!empty($roles) && !in_array((string)$user->role_id, $roles)) {
            return response()->json([
                'status' => false,
                'status_code' => 'EC_0003',
                'message' => 'Forbidden: Access Denied'
            ], 403);
        }

        return $next($request);
    }



    private function secureTokenCheck($auth_token, $user_id): bool
    {
        try {
            $dbToken = User::where('id', $user_id)
                           ->where('is_active', 1)
                           ->value('auth_token');

            return $dbToken && $auth_token === $dbToken;
        } catch (Exception $e) {
            return false;
        }
    }
}
