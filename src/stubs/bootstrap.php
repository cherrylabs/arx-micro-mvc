<?php

require_once '{vendor_path}/laravel/framework/src/Illuminate/Support/helpers.php';

$basePath = str_finish(dirname(__FILE__), '/');

$controllersDirectory = $basePath . 'controllers';
$modelsDirectory = $basePath . 'models';

Illuminate\Support\ClassLoader::register();

Illuminate\Support\ClassLoader::addDirectories(array($controllersDirectory, $modelsDirectory));

$app = new Arx();

Illuminate\Support\Facades\Facade::setFacadeApplication($app);

$app['app'] = $app;

# Define your env logic here

$app['env'] = 'production';

# Register your service provider here

with(new Illuminate\Events\EventServiceProvider($app))->register();
with(new Illuminate\Routing\RoutingServiceProvider($app))->register();
with(new \Arx\ViewServiceProvider($app))->register();
with(new \Illuminate\Filesystem\FilesystemServiceProvider($app))->register();

$app->bindInstallPaths(require __DIR__.'/config/paths.php');

# Register your Facade here

class Config extends \Arx\classes\Config
{

}

class Controller extends \Arx\classes\Controller
{

}

class Db extends \Arx\classes\Db
{

}

class Route extends Arx\facades\Route{

}

class View extends \Arx\facades\View{

}

Config::load(__DIR__ . '/config/');

# Config the DATABASE

Db::config(Config::get('database.connections.'.Config::get('database.default')));
