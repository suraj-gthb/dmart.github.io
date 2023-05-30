<?php

namespace App\Http\Controllers;

use App\Models\tbl_cart;
use App\Models\tbl_order;
use App\Models\tbl_order_products;
use App\Models\tbl_product_inward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class orderplaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart_prods = tbl_cart::where('customer_id', session('customer_id'))->select('*')->get();
        // $orderHistory = DB::table('tbl_orders')
        //     ->join('tbl_order_products', 'tbl_orders.order_id', '=', 'tbl_order_products.order_id')
        //     ->where('customer_id', session('customer_id'))
        //     ->select('*')
        //     ->get();

        $orders = DB::table('tbl_orders')
            ->where('o_customer_id', session('customer_id'))
            ->select('*')
            ->get();

        // $order_products = DB::table('tbl_order_products')
        //     ->where('customer_id', session('customer_id'))
        //     ->select('*')
        //     ->get();

        // foreach ($orders as $order){
        //     $order_products = DB::table('tbl_order_products')
        // ->where('customer_id', session('customer_id'))
        // ->where('order_id', $order->order_id)
        // ->select('*')
        // ->get();

        // echo "<pre>";
        // print_r($order_products);

        // }

        return view('landing/my-orders', compact('cart_prods', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order_id = 'ORD' . date('ymdhi') . mt_rand(1000, 9999);
        $customer_id = $request->get('customer-id_txt');
        $first_name = $request->get('first-name_txt');
        $last_name = $request->get('last-name_txt');
        $address = $request->get('address_txt');
        $apt = $request->get('apt_txt');
        $town_city = $request->get('town-city_txt');
        $state = $request->get('state_txt');
        $zipcode = $request->get('zipcode_txt');
        $email = $request->get('email_txt');
        $mobile = $request->get('mobile_txt');

        $cust_data = [
            'order_id' => $order_id,
            'o_first_name' => $first_name,
            'o_last_name' => $last_name,
            'o_address' => $apt . ' ' . $address . '  ' . $town_city . ' ' . $state . ' ' . $zipcode,
            'o_email' => $email,
            'o_mobile' => $mobile,
        ];

        $order = new tbl_order([
            'order_id' => $order_id,
            'o_customer_id' => $customer_id,
            'o_first_name' => $first_name,
            'o_last_name' => $last_name,
            'o_address' => $apt . ' ' . $address . '  ' . $town_city . ' ' . $state . ' ' . $zipcode,
            'o_email' => $email,
            'o_mobile' => $mobile,
            'o_status' => '0'
        ]);
        $order->save();

        $cart_data = tbl_cart::where('customer_id', session('customer_id'))->get();
        foreach ($cart_data as $cdt) {
            $order_product = new tbl_order_products([
                'order_id' => $order_id,
                'customer_id' => $customer_id,
                'product_id' => $cdt->product_id,
                'product_name' => $cdt->product_name,
                'product_price' => $cdt->product_price,
                'product_quantity' => $cdt->product_quantity,
                'total' => $cdt->product_price * $cdt->product_quantity
            ]);
            $order_product->save();

            $product_inward = tbl_product_inward::where('in_product_id', $cdt->product_id)->first();
            $product_inward->in_total_quantity -= $cdt->product_quantity;
            $product_inward->update();

            $cart_products = tbl_cart::where('customer_id', $customer_id);
            $cart_products->delete();
        }

        $order_placed = DB::table('tbl_orders')

            ->select("product_id", "product_name", "product_price", "product_quantity", "total")
            ->join('tbl_order_products', 'tbl_order_products.order_id', '=', 'tbl_orders.order_id')
            ->where('customer_id', '=', $customer_id)
            ->where('tbl_orders.order_id', '=', $order_id)
            ->get();

        $data = ['order_details' => $order_placed, 'customer_data' => $cust_data];
        $user['to'] = $email;
        Mail::send('landing/receipt', $data, function ($message) use ($user) {
            $message->to($user['to']);
            $message->subject("Your Order has been placed successfully!");
        });

        return redirect()->back();

        // echo "<script>alert('Order Placed Successfully!');window.location.href='/';</script>";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function orderHistory()
    {
    }
}
