<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CheckPremiumStatus
{
  public function handle(Request $request, Closure $next)
  {
    $user = auth()->user();

    if ($user->is_premium && $user->premium_expires_at < Carbon::now()) {
      $user->update([
        'is_premium' => false,
        'premium_expires_at' => null,
      ]);
    }

    return $next($request);
  }
}
