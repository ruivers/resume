<?php
namespace McryptD3;
use Illuminate\Support\Facades\Facade;

class McryptD3Facade extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'Mdes3';
    }
}