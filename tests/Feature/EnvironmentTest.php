<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Env;
use Tests\TestCase;

class EnvironmentTest extends TestCase
{
    public function testGetEnv()
    {
        $youtube = env('test');
        self::assertEquals('Fajrun Shubhi', $youtube);
    }

    public function testDefaultEnv()
    {
        // $author = env('AUTHOR', 'Fajruns');
        $author = Env::get('AUTHOR', 'Fajruns');
        self::assertEquals('Fajruns', $author);
    }
}
