# language-switcher
Create a language switcher for your Laravel 5.5 app straight from the command line

```javascript
composer require --dev mikehins/language-switcher
```

This command will add / remove a language switcher menu item in the main nav bar.

####Important
Be sure that run ```php artisan make:auth``` and ```php artisan migrate``` before to run the command  

To add the language switcher
```javascript
php artisan languageswitcher:add
```

To revert the changes
```javascript
php artisan languageswitcher:delete
```

This is what the command ```languageswitcher:add``` does
1. Add a ```default_language``` field in your users table
2. Add the markup to the ```layouts/app.blade.php``` file
3. Add a route in the ```routes/web.php``` file
4. Add a Middleware inside ```app\Http\Middleware```
5. Add the middleware to the ```app\Http\Kernel.php```
6. Add a LanguageController in the ```app\Http\Controllers``` directory
7. Add a language file to the config directory ```config/lanbguages.php```
