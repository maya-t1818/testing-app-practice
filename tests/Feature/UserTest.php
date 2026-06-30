<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_user_can_created(): void
    {
        $user =  User::factory()->create([
            'name' => 'テストユーザー',
            'email' => 'test@example.com',
        ]);

        $this->assertDatabaseHas('users',[
            'name' => 'テストユーザー',
            'email' => 'test@example.com',
        ]);
    }

    public function test_email_unique(): void
    {
        User::factory()->create([
            'email' => 'test@example.com',
        ]);             

        $this->expectException(\Illuminate\Database\QueryException::class);
    
        User::factory()->create([
            'email' => 'test@example.com',
        ]); 
    }
}
