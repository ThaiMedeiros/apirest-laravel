<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;

class UsersTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDatabase()
    {

        //verifica se este dado ja está cadastrado no BD
        $this->assertDatabaseMissing('users', [
            'email' => 'testeUser@example.com',
            'password' => bcrypt('teste123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
