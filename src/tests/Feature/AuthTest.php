<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class AuthTest extends TestCase
{

    /**
     * Test that user get unauthenticated responce with wrong token.
     */
    public function testUserCantAccessTaskWithWrongToken()
    {
        $headers = ['Authorization' => "Bearer wrongtokenstring"];
        $this->json('get', '/api/task/1', [], $headers)->assertStatus(401);
    }
    /**
     * Test that user get 200OK responce with wrong token.
     */
    public function testUserCanAccessTaskWithRightToken()
    {
	    $user = User::find(1);
        $headers = ['Authorization' => "Bearer ".$user->api_token];
        $this->json('get', '/api/task/1', [], $headers)->assertStatus(200);
    }
}
