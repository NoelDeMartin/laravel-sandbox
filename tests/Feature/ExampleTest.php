<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function testWithDefaultArrayDriver() {
        $collection1 = $this->getFromCache(4, 'array');

        $this->getFromCache(5, 'array');

        $this->assertEquals(4, $collection1->last());
    }

    public function testWithCustomArrayDriver() {
        $collection1 = $this->getFromCache(4, 'custom_array');

        $this->getFromCache(5, 'custom_array');

        $this->assertEquals(4, $collection1->last());
    }

    public function getFromCache($appendToCache, $driver) {
        $cachedCollection = Cache::driver($driver)->remember('testkey', 30, function () {
            return collect([1,2,3]);
        });

        return $cachedCollection->push($appendToCache);
    }

}
