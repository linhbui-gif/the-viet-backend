<?php
namespace App\Helper;
use Illuminate\Support\Facades\Cache;

function getFromCache($key)
{

    Cache::get($key);
    return true;
}

function putToCache($key, $value, $time = 120)
{
    Cache::put($key, $value, $time);
    return true;
}

function removedFromCache($key)
{
    Cache::forget($key);
    return true;
}