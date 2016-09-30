<?php

namespace majikang\ActionLog\Facades;

use Illuminate\Support\Facades\Facade;

class ActionLogFacade extends Facade
{


    protected static function getFacadeAccessor()
    {
        return 'ActionLog';
    }
}