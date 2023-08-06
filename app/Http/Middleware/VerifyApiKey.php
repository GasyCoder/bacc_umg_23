<?php

namespace App\Http\Middleware;

use Closure;

class VerifyApiKey
{
    public function handle($request, Closure $next)
    {
        $apiKey = 'GvGRRuTiX3CRetBbrqMDbspeuyrEtO2U'; // Replace this with your generated API key

        if ($request->header('X-API-Key') !== $apiKey) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}