# language-switcher
Create a language switcher for your Laravel 5.5 app straight from the command line

```javascript
composer require mikehins/language-switcher
```

This command will add / remove a language switcher menu item in the main nav bar.

###Important
Be sure that run ```php artisan make:auth``` and ```php artisan migrate``` before to run the command  

To add the language switcher
```javascript
php artisan languageswitcher:add
```

To revert the changes
```javascript
php artisan languageswitcher:delete
```

This is what the command ```languageswitcher:add``` does :
- Add a ```default_language``` field in your users table
- Add the markup to the ```layouts/app.blade.php``` file
- Add a route in the ```routes/web.php``` file
- Add a Middleware inside ```app\Http\Middleware```
- Add the middleware to the ```app\Http\Kernel.php```
- Add a LanguageController in the ```app\Http\Controllers``` directory
- Add a language file to the config directory ```config/lanbguages.php```

When the user switch the language, it will automatically update the ```default_language``` field from the users table.
The next time the user logs in, the language session will automatically be set by the middleware using the ```auth()->user()->default_language``` variable.