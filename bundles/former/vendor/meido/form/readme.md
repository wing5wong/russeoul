# Meido Form [![Build Status](https://travis-ci.org/meido/form.png?branch=master)](https://travis-ci.org/meido/form)

A port of Laravel 3's Form class. Made to work with Laravel 4.

- [Usage](https://github.com/meido/form#usage)
- [Changelog](https://github.com/meido/form#usage)
- [Things To Note](https://github.com/meido/form#usage)

## Usage

### Composer Side

add `"meido/form": "1.1.*"` to the `require` section of your `composer.json` so that it should look something the code below (you can, of course, include your own dependencies)

```composer
...
...
...
"require": {
	...
	...
	...
	"meido/form": "1.1.*"
},
...
...
...
```

### Laravel Side

add the following code to the `providers` section of the `app/config/app.php` file

```php
'Meido\Form\FormServiceProvider',
```

so that it'll look something like the following

```php
'providers' => array(

	...
	...
	...
	'Meido\Form\FormServiceProvider',

),
```

and add the following code to the `aliases` section of the `app/config/app.php` file

```php
'Form' => 'Meido\Form\FormFacade',
```

so that it'll look something like the following

```php
'aliases' => array(

	...
	...
	...
	'Form'       => 'Meido\Form\FormFacade',

),
```

after that, run `composer install` and start hacking on that beast.

## Changelog

### 1.1.*
- below are the changes made on 1.1.0
	- updated illuminate component to `dev-master`
	- updated `meido/html` to `1.1.*`
	- moved `Facade` and `ServiceProvider` up one folder following Laravel 4's convention of developing packages.

### 1.0.*
- tagged for stable release. (1.0.0)
- updated illuminate component to stable version. (1.0.1)
- updated Facade namespace. (1.0.2)
- some tweaks are made. (1.0.3)
	- `Form::token` is removed, use `csrf_token` with a `Form::hidden` instead.
	- `Form` class make use of `HTML` class heavily and the `UrlGenerator` inside `HTML` class. Hence, parameters passed to `Form` will just be the `UrlGenerator` class which will be passed to `HTML` instead of depending on `illuminate/foundation` for `Application` class in which is not used at all.
- updated properties access for `$labels` (1.0.4)

## Things to note

- Custom Form macro are not supported.