<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContohMiddlewareTest extends TestCase
{
    public function testContohMiddlewareInvalid()
    {
        $this->get('/middleware/api')
            ->assertStatus(401)
            ->assertSeeText('Access Denied');
    }

    public function testMiddlewareValid()
    {
        $this->withHeader('X-API-KEY', 'JRUN')
            ->get('/middleware/api')
            ->assertStatus(200)
            ->assertSeeText('OK MIDDLEWARE API');
    }

    public function testContohMiddlewareInvalidGroup()
    {
        $this->get('/middleware/group')
            ->assertStatus(401)
            ->assertSeeText('Access Denied');
    }
    public function testMiddlewareValidGroup()
    {
        $this->withHeader('X-API-KEY', 'JRUN')
            ->get('/middleware/group')
            ->assertStatus(200)
            ->assertSeeText('OK MIDDLEWARE API GROUP');
    }
}
