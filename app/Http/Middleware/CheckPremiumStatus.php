<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPremiumStatus
{
  public function handle(Request $request, Closure $next)
  {
    $user = auth()->user();

    if ($user->is_premium && now()->greaterThan($user->premium_expires_at)) {
      $user->update([
        'is_premium' => false,
        'premium_expires_at' => null,
      ]);
    }

    return $next($request);
  }
}
