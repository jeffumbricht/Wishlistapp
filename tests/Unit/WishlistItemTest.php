<?php

namespace Tests\Unit;

use App\WishlistItem;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WishlistItemTest extends TestCase
{
    // refresh db after each test
    use RefreshDatabase;

    /**
     * Test WishlistItem class
     *
     * @return void
     */
    public function testWishlistItem()
    {
        // create a users for foreign key
        $user = factory(User::class)->create();
        $user2 = factory(User::class)->create();
        // props
        // $this->assertEquals('John', $user->name);
        $item = new WishlistItem([
            'title' => 'Great Item',
            'description' => 'Dummy description',
            'link' => 'http://link.com',
            'user_id' => $user->id
        ]);

        $item->save();

        // should be saved
        $this->assertDatabaseHas('wishlist_items', [
            'title' => 'Great Item',
        ]);

        // props
        $this->assertEquals('Great Item', $item->title);
        $this->assertEquals('Dummy description', $item->description);
        $this->assertEquals('http://link.com', $item->link);
        $this->assertEquals(2, $item->user_id);
        // buyer null when instantiated
        $this->assertNull($item->buyer_id);
        // save buyer
        $item->buyer_id = $user2->id;
        $item->save();
        // check buyer relatonships
        $this->assertNotNull($item->buyer_id);
        $this->assertEquals($user2->name, $item->buyerName());
    }
}
