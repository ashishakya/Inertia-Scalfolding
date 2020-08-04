<?php

use Illuminate\Auth\Authenticatable;

/**
 * @return string
 */
function getAppName()
{
    return config('app.name');
}

/**
 * @return Authenticatable|null
 */
function currentUser()
{
    return auth()->user();
}


