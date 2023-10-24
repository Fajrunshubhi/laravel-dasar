<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Data\Foo;
use App\Data\Bar;

class DependencyInjectionTest extends TestCase
{
    public function testDependency()
    {
        $foo = new Foo();
        var_dump($foo->foo());
        $bar = new Bar($foo);
        var_dump($bar->bar());

        self::assertEquals('FOO and Bar', $bar->bar());
    }
}
