<?php 

class TestController extends \Arx\BaseController {

    public function anyIndex()
    {
        return Example::getExampleData();
    }

    public function anyTestView()
    {
        return View::make('hello');
    }

} 