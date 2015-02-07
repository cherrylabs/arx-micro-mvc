<?php

require_once '{vendor_path}/autoload.php';
require_once __DIR__.'/bootstrap.php';

# Example of Db Schema creation

if(!Db::schema()->hasTable('examples')){
    Db::schema()->create('examples', function($table){
        $table->increments('id');
        $table->string('email')->unique();
        $table->string('first_name')->nullable();
        $table->timestamps();
    });
}

Route::get('/', function () {
    return '<form method="post">Are you talking to me ? <input type="text" name="first_name" /><button type="submit">Send</button></form>';
});

Route::post('/', function () {
    return 'Ok then you talk to me : ' . $_POST['first_name'];
});

Route::any('/test-view', 'TestController@anyTestView');

Route::any('/test-controller', 'TestController@anyIndex');

$request = Illuminate\Http\Request::createFromGlobals();

$response = $app['router']->dispatch($request);

$response->send();