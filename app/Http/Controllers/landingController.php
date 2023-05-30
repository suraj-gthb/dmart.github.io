<?php

namespace App\Http\Controllers;

use App\Models\tbl_cart;
use App\Models\tbl_category;
use App\Models\tbl_product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class landingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$products = tbl_product::get();
        $products = DB::table('tbl_products')
            ->leftjoin('tbl_product_inwards', 'tbl_products.id', '=', 'tbl_product_inwards.in_product_id')
            ->select('*')
            ->get();

        if (session('customer_id') && session('sess__cart')) {
            foreach (session('sess__cart') as $id => $prod) {

                $cart_prod = tbl_cart::where('customer_id', session('customer_id'))->where('product_id', $id)->first();
                if (isset($cart_prod['product_id'])) {
                    $cart_prod->product_quantity += 1;
                    $cart_prod->update();
                } else {
                    $cart = new tbl_cart([
                        'customer_id' => session('customer_id'),
                        'product_id' => $prod['id'],
                        'product_name' => $prod['name'],
                        'product_price' => $prod['price'],
                        'product_image' => $prod['image'],
                        'product_quantity' => $prod['quantity']
                    ]);
                    $cart->save();
                }
            }
        } else {
            // $cart_prods = tbl_cart::where('customer_id',session('customer_id'))->select('*')->get();
            // return view('landing/index', compact('products', 'cart_prods'));
        }
        $cart_prods = tbl_cart::where('customer_id', session('customer_id'))->select('*')->get();
        return view('landing/index', compact('products', 'cart_prods'));
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
        //
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

    public function viewCategory($id)
    {
        $cart_prods = tbl_cart::where('customer_id', session('customer_id'))->select('*')->get();
        $products = tbl_product::where('product_category', $id)->get();
        return view('landing/index', compact('products', 'cart_prods'));
    }

    public function searchProducts(Request $request)
    {
        $cart_prods = tbl_cart::where('customer_id', session('customer_id'))->select('*')->get();
        $search = $request->get('search_txt');
        $products = tbl_product::where('product_name', 'LIKE', '%'.$search.'%')->get();
        echo $products;
        return view('landing/index', compact('products', 'cart_prods'));
    }
}
