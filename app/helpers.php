<?php

function setActive($routeName)
{
    if ($routeName == 'admin') {
        if (request()->routeIs('admin.*') || request()->routeIs('insurers.*')) {
            return 'active';
        }
    }
    return request()->routeIs($routeName) ? 'active' : '';
}
