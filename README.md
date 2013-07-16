# Yii Development Web Server

## Requires

* PHP >= 5.4
* Yii Framework

## Installation

### Using composer

Add packages to composer.json

```
{
	"require": {
		"likai/yii-webserver": "dev-master"
	}
}
```

Update composer from terminal

```
composer update
```

### Config
Set path alias to your `your-project/protected/config/console.php` file to the first line

```
Yii::setPathOfAlias('Likai', __DIR__ . '/../../vendor/likai/yii-webserver/src/Likai');
```

Add command to your `your-project/protected/config/console.php` file

```
return array(
    'commandMap' => array(
        'serve' => array(
            'class' => '\\Likai\\YiiWebserver\\ServerCommand',
            'host' => '127.0.0.1',
            'port' => '8888',
        ),
    ),
);
```

### Manual

* Download [yii-webserver.zip](https://github.com/tlikai/yii-webserver/archive/master.zip)
* Unzip this file
* Move directory `likai/yii-webserver/src/Likai/YiiWebserver` to `your-project/protected/extensions/YiiWebserver`

### Config

Add commandMap to your `your-project/protected/config/console.php` file

```
return array(
    'commandMap' => array(
        'serve' => array(
            'class' => 'ext.YiiWebserver.ServerCommand',
            'host' => '127.0.0.1',
            'port' => '8888',
        ),
    ),
);
```

## Usage

    yiic serve index [--host=] [--port=] [--root=] [--router=]

    DESCRIPTION
        This command provider development web server

    PARAMETERS
        --host host address
        --port host port
        --root document root
        --router router script file
