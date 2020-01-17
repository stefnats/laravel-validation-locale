# Laravel Validation Locale

This package delivers a validator to validate locale strings like `de_DE` or `en_US` (everything that is included in `ResourceBundle::getLocales('')`)

## Installation

Just install using composer with:

`composer require stefnats/laravel-validation-locale`

## Usage

In your requests you can use:

```php
return [
    'my_locale_input' => 'locale',
];
```

### License
This project is licensed under a GPL license which you can find
[in this LICENSE](https://github.com/stefnats/laravel-validation-locale/blob/master/LICENSE).

And also: Have fun :)
