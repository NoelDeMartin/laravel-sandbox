<?php

namespace App\Cache;

use Illuminate\Cache\ArrayStore;

class CustomArrayStore extends ArrayStore
{

    public function get($key)
    {
        $value = parent::get($key);

        return is_string($value) ? unserialize($value) : $value;
    }

    public function put($key, $value, $seconds)
    {
        return parent::put($key, serialize($value), $seconds);
    }

}
