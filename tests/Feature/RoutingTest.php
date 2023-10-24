<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    public function testGetRouting()
    {
        $this->get('/fajrun')
            ->assertStatus(200)
            ->assertSeeText("Hallooo Fajrun Shubhi");
    }

    public function testRedirectRouting()
    {
        $this->get('/youtube')
            ->assertRedirect('/fajrun');
    }

    public function testFallbackRouting()
    {
        $this->get('/error')
            ->assertSeeText("404 by Fajrun Shubhi");
    }

    public function testViewRouting()
    {
        $this->get('/hello')
            ->assertSeeText('Fajrunssssssss');
    }

    public function testTemplate()
    {
        $this->view('hello', ['name' => 'Fajrun'])
            ->assertSeeText('Heloooo Fajrun');
    }
}
