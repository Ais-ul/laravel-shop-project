<?php

namespace Tests\Feature;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderCheckoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_order_cannot_be_placed_without_address_or_phone(): void
    {
        $user = User::factory()->create();
        $product = Product::factory()->create();

        $cart = Cart::create([
            'user_id' => $user->id,
        ]);

        CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        $response = $this
            ->actingAs($user)
            ->from(route('orders.create'))
            ->post(route('orders.store'), [
                'address' => '',
                'phone' => '',
            ]);

        $response->assertSessionHasErrors(['address', 'phone']);
        $this->assertDatabaseCount('orders', 0);
    }
}
