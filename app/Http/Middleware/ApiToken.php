<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class ApiToken
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
        /* recupero del token */
        $apiToken = $request->header('authorization');

        if (empty($api_token)) {
            return response()->json([
                'success' => false,
                'error'=> 'non sei autenticato'
            ]);
        }

        /* eliminare parte di stringa 'Bearer ' */
        $apiToken = substr($apiToken, 7);
        /* dd($apiToken); */

        /* selezionare l'utente con il token corrispondente */
        $user = User::where('api_token', $apiToken)->first();
        /* dd($user); */
        if (!$user) {
            return response()->json([
                'success' => false,
                'error' => 'accesso negato'
            ]);               
        }

        return $next($request);
    }
}
