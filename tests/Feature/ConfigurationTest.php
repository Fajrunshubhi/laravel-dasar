<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigurationTest extends TestCase
{
    public function testConfiguration()
    {
        $fname = config('contoh.author.first');
        $lname = config('contoh.author.last');
        $email = config('contoh.email');
        $phone = config('contoh.phone');

        self::assertEquals('Fajruns', $fname);
        self::assertEquals('Shubhi', $lname);
        self::assertEquals('fajrunss7@gmail.com', $email);
        // self::assertEquals('081787878131', $phone);
    }
}
