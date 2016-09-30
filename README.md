# action-log
Laravel 5 操作日志记录


## Installation

```json
{
    "require": {
       
        "majikang/action-log": "~1.0"
    },
   
}
```

or

Require this package with composer:
```
composer require majikang/action-log 
```

Update your packages with ```composer update``` or install with ```composer install```.



## Usage


Find the `providers` key in `config/app.php` and register the ActionLog Service Provider.

for Laravel 5.1+
```php
    'providers' => [
        majikang\ActionLog\ActionLogServiceProvider::class,
    ]
```

Find the `aliases` key in `config/app.php`.

for Laravel 5.1+
```php
    'aliases' => [
        'ActionLog' => luoyangpeng\ActionLog\Facades\ActionLogFacade::class,
    ]
```



## Configuration

To use your own settings, publish config.

```$ php artisan vendor:publish```

`config/actionlog.php`

```php
//填写要记录的日志的模型名称
	return [
		'\App\Models\User',
	];
```
## Last Step
```$ php artisan migrate```

## Demo
自动记录操作日志，数据库操作需按如下:
```php

update

$users = Users::find(1);
$users->name = "admin";
$users->save();

add

$users = new Users();
$users->name = "admin";
$users->save()

delete

Users:destroy(1);

```

主动记录操作日志

```php

use ActionLog;

ActionLog::createActionLog($type,$content);
ActionLog::ApiLog($type,$content,$result);

```



