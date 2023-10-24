<?php

namespace Tests\Feature;

use App\Data\Foo;
use App\Data\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceContainerTest extends TestCase
{
    public function testDepInject()
    {
        //menggunakan new
        // $foo1 = new Foo();

        // service container laravel
        $foo2 = $this->app->make(Foo::class); // new Foo()
        $foo3 = $this->app->make(Foo::class); // new Foo()

        var_dump($foo2->foo());
        var_dump($foo3->foo());

        self::assertEquals('FOO', $foo2->foo());
        self::assertEquals('FOO', $foo3->foo());
        // self::assertNotSame($foo2, $foo3);
    }

    public function testBind()
    {
        // $person = $this->app->make(Person::class);
        $this->app->bind(Person::class, function ($app) {
            return new Person("Fajrun", "Shubhi");
        });

        $person = $this->app->make(Person::class);

        self::assertNotNull($person);
        self::assertEquals("Fajrun", $person->firstName);
        self::assertEquals("Shubhi", $person->lastName);
    }
}
