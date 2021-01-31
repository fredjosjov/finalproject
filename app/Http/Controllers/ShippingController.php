<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipping;
use App\Models\ShippingDetails;
use App\Models\Review;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ShippingController extends Controller
{
	public function index()
	{
		return view('shipping.index', ['shipping' => ShippingDetails::get()]);
	}

	public function changeStatus($id, $product_id, $orders_id)
	{
		$shipping = DB::table('shipping_details')->where('shipping_details.shipping_id', '=', $id)
			->where('shipping_details.product_id', '=', $product_id)
			->where('shipping_details.orders_id', '=', $orders_id)
			->update(['status' => 'Delivered']);

		return redirect('/shipping');
	}

	public function saveFeedback(Request $request)
	{
		try {
			Review::create([
				'product_id' => $request->product_id,
				'customer_id' => session('custId'),
				'description' => $request->description,
				'rate' => $request->rate,
				'date' => Carbon::now()->format('Y-m-d')
			]);

			$notification = array(
				'message' => 'Feedback Received successfully!',
				'alert-type' => 'success'
			);
		} catch (\Exception $exception) {
			$notification = array(
				'message' => 'Failed to add feedback!',
				'alert-type' => 'error'
			);
			return response()->json(['message' => $exception->getMessage(), 'status' => 'error']);
		}
		return response()->json(['message' => 'ok', 'status' => 'success']);
	}
}
