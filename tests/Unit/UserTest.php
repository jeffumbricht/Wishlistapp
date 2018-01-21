<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    // refresh db after each test
    use RefreshDatabase;

    /**
     * Test User class
     *
     * @return void
     */
    public function testUser()
    {
        $user = new User([
            'name' => 'John',
            'email' => 'john@email.com',
            'password' => 'secret'
        ]);

        $user->save();

        // should be saved
        $this->assertDatabaseHas('users', [
            'email' => 'john@email.com',
        ]);

        $user = User::find(1);
        // props
        $this->assertEquals('John', $user->name);
        $this->assertEquals('john@email.com', $user->email);
        $this->assertEquals('secret', $user->password);
        // Custom methods on top of defaults
        // assume wishlistItems returns array from hasMany
        $this->assertEmpty($user->wishlistItems);
        // lookup if user owns wishlistItem
        $this->assertFalse($user->ownsItemId(0));
        // roles returns array from hasMany
        $this->assertFalse($user->hasRole('generic'));
        // convert to array to test private
        $uarray = $user->toArray();
        $this->assertArrayNotHasKey('password', $uarray);
        $this->assertArrayNotHasKey('remember_token', $uarray);
    }
}
