FAuth for Laravel 5.*

Installation

Add the following to your composer.json

"repositories": [
{
    "url": "https://github.com/trandinhvi39/fauth",
    "type": "git"
    }
],

"require": {
	"trandinhvi39/fauth" : "dev-develop"
}

Run the following command:

composer require trandinhvi39/fauth

Add the following to your config\app.php Service Providers

Trandinhvi39\Fauth\FAuthServiceProvider::class,

Add the following to your config\app.php Facades

'FAuth' => Trandinhvi39\Fauth\Facades\Fauth::class,

Add the following to your composer.json (autoload-dev -> psr-4)

"Trandinhvi39\\Fauth\\": "vendor/trandinhvi39/fauth/"

Run below command:
composer dump-autoload

How to Use

Use like login social with facebook, google, twitter...

Pull requests are welcome.