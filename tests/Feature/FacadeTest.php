<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class FacadeTest extends TestCase
{
    public function testConfig()
    {
        $firstName = config('contoh.author.first');

        // Menggunakan Facade
        $firstName2 = Config::get('contoh.author.first');

        self::assertEquals($firstName, $firstName2);

        // var_dump(Config::all());
    }

    public function testFacadesMock()
    {
        Config::shouldReceive('get')->with('contoh.author.first')->andReturn('Fajruns Shubhi');

        $firstName = Config::get('contoh.author.first');
        self::assertSame("Fajruns Shubhi", $firstName);
    }
}
