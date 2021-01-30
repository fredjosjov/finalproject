<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use App\Models\Cart;
use App\Models\Payment;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Shipping;
use App\Models\ShippingDetails;
use App\Models\Invoice;

class CheckoutController extends Controller
{
	public function index()
	{
		$cart = DB::table('carts')
			->join('products', 'products.id', '=', 'carts.product_id')
			->where('carts.customer_id', '=', session('custId'))
			->where('carts.isOrder', '=', 0)
			->select('carts.*', 'products.image', 'products.name')
			->get();

		return view('checkout.index', ['cart' => $cart]);
	}

	public function tambah()
	{
		$customer = Customer::pluck('customerName', 'customerNumber');
		$product = Product::pluck('productName', 'productCode');
		return view('order.tambah', [
			'customer' => $customer,
			'product' => $product
		]);
	}

	public function payment(Request $request)
	{
		$cart = DB::table('carts')
			->join('products', 'products.id', '=', 'carts.product_id')
			->where('carts.customer_id', '=', session('custId'))
			->select('carts.*')
			->get();
		try {
			//order
			$order = Order::create([
				'customer_id' => session('custId'),
				'seller_id' => 19,
				'status' => "Paid",
				'totalAmount' => $cart->sum('price')
			]);

			foreach ($cart as $index => $item) {
				OrderDetails::create([
					'order_id' => $order->id,
					'product_id' => $item->product_id,
					'quantity' => $item->quantity,
					'price' => $item->price
				]);
				$updatedCart =  Cart::find($item->id);
				$updatedCart->isOrder = 1;
				$updatedCart->save();
			};

			//shipping
			$shipping = Shipping::create([
				'method' => "Regular",
				'vendor' => $request->vendor,
				'expectedDuration' => Carbon::now()->addDays(2)->format('Y-m-d h:i:s'),
			]);

			foreach ($cart as $index => $item) {
				ShippingDetails::create([
					'shipping_id' => $shipping->id,
					'orders_id' => $order->id,
					'product_id' => $item->product_id,
					'status' => "Shipped",
					'ship_address' => $request->ship_address,
				]);
			};


			//invoice
			$invoice = Invoice::create([
				'total_amount' => $cart->sum('price'),
				'subtotal' => $cart->sum('quantity'),
				'status' => "Shipped"
			]);

			//payment
			Payment::create([
				'orders_id' => $order->id,
				'invoice_id' => $invoice->id,
				'card_number' => $request->card_number,
				'date' => Carbon::now()->format('Y-m-d'),
				'charge_amount' => $request->charge_amount,
			]);

			$notification = array(
				'message' => 'Checkout successfully!',
				'alert-type' => 'success'
			);
		} catch (\Exception $exception) {
			$notification = array(
				'message' => 'Failed to checkout! ' . $exception->getMessage(),
				'alert-type' => 'error'
			);
			return back()->with($notification);
		}
		return redirect('/checkout')->with($notification);
	}
}
