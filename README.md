# Laravel API Bundle

This package is meant to provide you, with a set of tools to help you easily and quickly build your own Laravel API. While the goal of this package is to remain as flexible as possible it still won't cover all situations and solve all problems.

[![Donate via PayPal](https://img.shields.io/badge/donate-paypal-blue.svg?style=flat-square&logo=paypal)](https://www.paypal.com/paypalme/mhauri)

## Installation

    composer require mhauri/laravel-api-bundle

If you'd like to make configuration changes in the configuration file you can publish it with the following Artisan command (otherwise, this step is not needed):

    php artisan vendor:publish --provider="MHauri\ApiBundle\Providers\ApiServiceProvider"


### Replace the default RouteServiceProvider

In `config/app.php` replace: 

`App\Providers\RouteServiceProvider::class,` 

with: 

`MHauri\ApiBundle\Providers\ApiRouteServiceProvider::class,`


## Issues

If you have any issues with this project, open an issue on [GitHub](https://github.com/mhauri/laravel-api-bundle/issues).

## Contribution

Any contribution is highly appreciated. The best way to contribute is to open a [pull request on GitHub](https://help.github.com/articles/using-pull-requests).

## Developer

[Marcel Hauri](https://github.com/mhauri), and all other [contributors](https://github.com/mhauri/laravel-api-bundle/contributors)

## License

[MIT](https://mit-license.org/)
