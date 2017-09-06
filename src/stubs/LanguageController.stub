<?php

namespace App\Http\Controllers;

class LanguageController extends Controller
{
	public function switchLang($lang)
	{
		if (isset(config('languages')[$lang])) {
			session()->put('locale', $lang);
			$user = auth()->user();
			if($user) {
				$user->default_language = $lang;
				$user->save();
			}
		}
		return redirect()->back();
	}
}