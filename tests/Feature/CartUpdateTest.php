<?php

namespace Tests\Feature;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CartUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_cart_quantity_cannot_exceed_available_stock(): void
    {
        $user = User::factory()->create();
        $product = Product::factory()->create([
            'stock' => 2,
        ]);

        $cart = Cart::create([
            'user_id' => $user->id,
        ]);

        $cartItem = CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        $response = $this
            ->actingAs($user)
            ->from(route('cart.index'))
            ->put(route('cart.update', $cartItem->id), [
                'quantity' => 3,
            ]);

        $response->assertRedirect(route('cart.index'));
        $response->assertSessionHasErrors(['quantity']);
        $this->assertSame(1, $cartItem->fresh()->quantity);
    }
}
