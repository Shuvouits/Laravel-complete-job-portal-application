<?php

if(!function_exists('hasError')){
    function hasError($errors, string $name) : ?string
    {
        return $errors->has($name) ? 'is-invalid' : '';
    }
}

/** Set sidebar active **/

if(!function_exists('setSidebarActive')){
    function setSidebarActive(array $routes) : ?String
    {
        foreach($routes as $route){
            if(request()->routeIs($route)){
                return 'active';
            }
        }
        return null;
    }
}