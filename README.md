
# RockHopSoft/BuckyStats

[![Laravel](https://img.shields.io/badge/Laravel-8.5-orange.svg?style=flat-square)](http://laravel.com)
[![Survloop](https://img.shields.io/badge/Survloop-0.3-orange.svg?style=flat-square)](https://github.com/rockhopsoft/survloop)
[![License: GPL v3](https://img.shields.io/badge/License-GPL%20v3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)

This site is a completely free research tool used to collect and organize as much important documentation as possible,
largely mainstream sources referenced by alternative media. The BuckyStats database has been rebuilt using
<a href="https://github.com/rockhopsoft/survloop" target="_blank">Survloop</a>, a
<a href="https://laravel.com/" target="_blank">Laravel</a>-based engine
for designing a database and creating a mobile-friendly user interface to fill it.

# Table of Contents
* [Stats People](#stats)
* [Requirements](#requirements)
* [Getting Started](#getting-started)
* [Documentation](#documentation)
* [Roadmap](#roadmap)
* [Change Logs](#change-logs)
* [Contribution Guidelines](#contribution-guidelines)


# <a name="stats"></a>Stats People

If your interest in the code base is to check the calculation algorithms, they can all be found in the <a href="https://github.com/rockhopsoft/buckystats/tree/main/src/Controllers" target="_blank">/src/Controllers directory</a>. Specifically, the php files which start with "DatasetsComiple" are where most of those calculation scripts currently live.


# <a name="requirements"></a>Requirements

* php: >=7.4
* <a href="https://packagist.org/packages/laravel/framework" target="_blank">laravel/framework</a>: 8.5.*
* <a href="https://packagist.org/packages/rockhopsoft/survloop" target="_blank">rockhopsoft/survloop</a>: 0.*
* <a href="https://packagist.org/packages/rockhopsoft/buckystats-website" target="_blank">rockhopsoft/buckystats-website</a>: 0.*

# <a name="getting-started"></a>Getting Started

## Installing BuckyStats

<a href="https://BuckyStats.org/how-to-install-local-BuckyStats" target="_blank">Full install instructions</a> also describe how to set up a development environment using VirutalBox, Vargrant, and <a href="https://laravel.com/docs/8.x/homestead" target="_blank">Laravel's Homestead</a>. For these instructions, the new project directory is 'mybuckystats'.

### Install Laravel, Survloop, & BuckyStats on Homestead
```
% composer create-project laravel/laravel mybuckystats "8.5.*"
% cd mybuckystats

```

Edit these lines of the environment file to connect the default MYSQL database:
```
% nano .env
```
```
APP_NAME="My Bucky Stats"
APP_URL=http://mybuckystats.local

DB_HOST=localhost
DB_PORT=33060
DB_CONNECTION=mysql
DB_DATABASE=mybuckystats
DB_USERNAME=homestead
DB_PASSWORD=secret
```

Next, install Laravel's out-of-the-box user authentication tools, Survloop, and the BuckyStats.org software:
```
% php artisan key:generate
% php artisan cache:clear
% COMPOSER_MEMORY_LIMIT=-1 composer require rockhopsoft/buckystats
% nano composer.json
```

From your Laravel installation's root directory, update `composer.json` to require and easily reference BuckyStats:
```
$ nano composer.json
```
```
...
"autoload": {
    ...
    "psr-4": {
        ...
        "RockHopSoft\\BuckyStats\\": "vendor/RockHopSoft/BuckyStats/src/",
        "RockHopSoft\\Survloop\\": "vendor/rockhopsoft/survloop/src/",
    }
    ...
}, ...
```

Hopefully, editing `config/app.php` is no longer needed, but this can be tried if later steps break.
```
$ nano config/app.php
```
```
...
'providers' => [
    ...
    App\Providers\FortifyServiceProvider::class,
    RockHopSoft\BuckyStats\BuckyStatsServiceProvider::class,
    RockHopSoft\Survloop\SurvloopServiceProvider::class,
    ...
],
...
'aliases' => [
    ...
    'BuckyStats' => 'RockHopSoft\BuckyStats\BuckyStatsFacade',
    'Survloop' => 'RockHopSoft\Survloop\SurvloopFacade',
    ...
], ...
```

If installing on a server, you might also need to fix some permissions before the following steps...
```
% chown -R www-data:33 storage database app/Models
```

Clear caches and publish the package migrations...
```
% php artisan config:clear
% php artisan route:clear
% php artisan view:clear
% echo "0" | php artisan vendor:publish --force
% composer dump-autoload
% curl http://mybuckystats.local/css-reload
```

With certain databases (like some managed by DigitalOcean), you may need to tweak the Laravel migration:
```
$ nano database/migrations/2014_10_12_100000_create_password_resets_table.php
$ nano database/migrations/2019_08_19_000000_create_failed_jobs_table.php
```
Add this line before the "Schema::create" line in each file:
```
\Illuminate\Support\Facades\DB::statement('SET SESSION sql_require_primary_key=0');
```

Then initialize the database:
```
$ php artisan migrate
$ php artisan db:seed --class=BuckyStatsSeeder (coming soon)
```

### Initialize BuckyStats Installation

Then browsing to the home page should prompt you to create the first admin user account:<br />
http://mybuckystats.local

If everything looks janky, then manually load the style sheets, etc:<br />
http://mybuckystats.local/css-reload

After logging in as an admin, this link rebuilds many supporting files:<br />
http://mybuckystats.local/dashboard/settings?refresh=2


# <a name="documentation"></a>Documentation

Once installed, documentation of this system's database design can be found at /dashboard/db/all . This system's user experience design for data entry can be found at /dashboard/tree/map?all=1&alt=1 or publicly visible links like those above.

The Survloop level is also starting here: <br />
<a href="https://survloop.org/package-files-folders-classes" target="_blank">survloop.org/package-files-folders-classes</a>.

# <a name="roadmap"></a>Roadmap

Here's the TODO list for the next release (**1.0**). It's my first time building on Laravel, or GitHub. So sorry.

* [ ] Add more data lines

# <a name="change-logs"></a>Change Logs


# <a name="contribution-guidelines"></a>Contribution Guidelines

Please help educate me on best practices for sharing code in this community.
Please report any issue you find in the issues page.

# <a name="security-help"></a>Reporting a Security Vulnerability

We want to ensure that Survloop is a secure HTTP open data platform for everyone.
If you've discovered a security vulnerability in BuckyStats.org,
we appreciate your help in disclosing it to us in a responsible manner.

Publicly disclosing a vulnerability can put the entire community at risk.
If you've discovered a security concern, please email us at rockhoppers *at* runbox.com.
We'll work with you to make sure that we understand the scope of the issue, and that we fully address your concern.
We consider correspondence sent to rockhoppers *at* runbox.com our highest priority,
and work to address any issues that arise as quickly as possible.

After a security vulnerability has been corrected, a release will be deployed as soon as possible.
