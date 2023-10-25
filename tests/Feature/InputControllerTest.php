<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
    public function testHelloNested()
    {
        $this->post('/input/hello/first', [
            'name' =>
            ['first' => 'shubhi']
        ])->assertSeeText('Helloo shubhi');
    }

    public function testInputAll()
    {
        $this->post('/input/hello/input', [
            'name' =>
            ['first' => 'shubhi', 'last' => "fajrun"]
        ])->assertSeeText('name')->assertSeeText('first')->assertSeeText('last')->assertSeeText('shubhi')->assertSeeText('fajrun');
    }

    public function testInputType()
    {
        $this->post('/input/type', [
            'name' => 'Joko',
            'married' => 'true',
            'birth_date' => '1990-10-10'
        ])->assertSeeText('Joko')->assertSeeText('true')->assertSeeText('1990-10-10');
    }

    public function testInputFilterOnly()
    {
        $this->post('/input/filter/only', [
            "name" => [
                "first" => "fajrun",
                "mid" => "budi",
                "last" => "shubhi"
            ]
        ])->assertSeeText('fajrun')->assertSeeText('shubhi');
    }
}
