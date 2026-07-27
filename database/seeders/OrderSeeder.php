<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $americano = Product::where('slug', 'americano')->first();
        $butterscotch = Product::where('slug', 'butterscotch')->first();
        $chocolatemilky = Product::where('slug', 'chocolate-milky')->first();

        // Order 1: Americano x2 + Butterscotch x3
        $order1_item1_subtotal = $americano->price * 2;
        $order1_item2_subtotal = $butterscotch->price * 3;
        $order1_total = $order1_item1_subtotal + $order1_item2_subtotal;

        // Order 2: Butterscotch x3 + Chocolate Milky x1
        $order2_item1_subtotal = $butterscotch->price * 3;
        $order2_item2_subtotal = $chocolatemilky->price * 1;
        $order2_total = $order2_item1_subtotal + $order2_item2_subtotal;

        // Order 3: Americano x2 + Chocolate Milky x1
        $order3_item1_subtotal = $americano->price * 2;
        $order3_item2_subtotal = $chocolatemilky->price * 1;
        $order3_total = $order3_item1_subtotal + $order3_item2_subtotal;

        $order1 = Order::create(['user_id' => 2, 'total' => $order1_total, 'status' => 'done', 'payment_method' => 'cash']);

        OrderDetail::create(['order_id' => $order1->id, 'product_id' => $americano->id, 'product_name' => $americano->name, 'price' => $americano->price, 'quantity' => 2, 'subtotal' => $order1_item1_subtotal]);
        OrderDetail::create(['order_id' => $order1->id, 'product_id' => $butterscotch->id, 'product_name' => $butterscotch->name, 'price' => $butterscotch->price, 'quantity' => 3, 'subtotal' => $order1_item2_subtotal]);

        $order2 = Order::create(['user_id' => 3, 'total' => $order2_total, 'status' => 'done', 'payment_method' => 'qris']);

        OrderDetail::create(['order_id' => $order2->id, 'product_id' => $butterscotch->id, 'product_name' => $butterscotch->name, 'price' => $butterscotch->price, 'quantity' => 3, 'subtotal' => $order2_item1_subtotal]);
        OrderDetail::create(['order_id' => $order2->id, 'product_id' => $chocolatemilky->id, 'product_name' => $chocolatemilky->name, 'price' => $chocolatemilky->price, 'quantity' => 1, 'subtotal' => $order2_item2_subtotal]);

        $order3 = Order::create(['user_id' => 2, 'total' => $order3_total, 'status' => 'done', 'payment_method' => 'transfer']);

        OrderDetail::create(['order_id' => $order3->id, 'product_id' => $americano->id, 'product_name' => $americano->name, 'price' => $americano->price, 'quantity' => 2, 'subtotal' => $order3_item1_subtotal]);
        OrderDetail::create(['order_id' => $order3->id, 'product_id' => $chocolatemilky->id, 'product_name' => $chocolatemilky->name, 'price' => $chocolatemilky->price, 'quantity' => 1, 'subtotal' => $order3_item2_subtotal]);
    }
}
