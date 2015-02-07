<?php 

class User extends \Arx\EloquentModel {

    public static function getExampleData(){

        $user = self::where('email', 'dummy@email.com')->first();

        if (!$user) {
            $user = self::createDummyUserExample();
        }

        return 'Hello my name is : '. $user->first_name . '. This is really a dummy name...';
    }

    public static function createDummyUserExample(){
        $user = new self;

        // Generate a random email for demo
        $user->email = 'dummy@email.com';

        $user->first_name = 'Dorki';

        $user->save();

        return $user;
    }
} 