<?php

namespace App\Http\Middleware;

use Closure;

class Language
{
	public function handle($request, Closure $next)
	{
		if (session()->has('locale') && isset(config('languages')[session('locale')])) {
			app()->setLocale(session('locale'));
			return $next($request);
		}

		app()->setLocale(config('app.fallback_locale'));

		return $next($request);
	}
}