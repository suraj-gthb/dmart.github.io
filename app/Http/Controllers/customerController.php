<?php

namespace App\Http\Controllers;

use App\Models\tbl_cart;
use App\Models\tbl_customer;
use App\Models\tbl_product;
use App\Models\tbl_wishlist;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class customerController extends Controller
{
    public function whishlist($id)
    {
        $product = tbl_product::find($id);
        $productExists = tbl_wishlist::where('product_id', $id)->where('customer_id',session('customer_id'))->first();
        if($productExists!=null){
            return redirect()->back();
        }
        if (session('customer_id')) {
            $cart = new tbl_wishlist([
                'customer_id' => session('customer_id'),
                'product_id' => $product->id,
                'product_name' => $product->product_name,
                'product_mrp' => $product->product_mrp,
                'product_price' => $product->product_price,
                'product_image' => $product->product_image,
            ]);
            $cart->save();
            return redirect()->back()->with('status', 'Product added successfully!');
        } else {
            return redirect('sign-in');
        }
    }

    public function viewWishlist()
    {
        $cart_prods = tbl_cart::where('customer_id', session('customer_id'))->select('*')->get();
        $view_wishlist = tbl_wishlist::where('customer_id', session('customer_id'))->get();
        return view('landing/view-wishlist', compact('view_wishlist','cart_prods'));
    }

    public function checkout()
    {
        $check_product = tbl_cart::where('customer_id', session('customer_id'))->count();
        if ($check_product > 0) {
            //================================================================================
            // $product = tbl_product::find($id);
            // $cart_prod = tbl_cart::where('customer_id', session('customer_id'))->where('product_id', $id)->first();
            // if (isset($cart_prod['product_id'])) {
            //     $cart_prod->product_quantity +=1;
            //     $cart_prod->update();
            // } else {
            //     $cart = new tbl_cart([
            //         'customer_id' => session('customer_id'),
            //         'product_id' => $product->id,
            //         'product_name' => $product->product_name,
            //         'product_price' => $product->product_price,
            //         'product_image' => $product->product_image,
            //         'product_quantity' => 1
            //     ]);
            //     $cart->save();
            // }
            //================================================================================
            $cart_data = tbl_cart::where('customer_id', session('customer_id'))->get();
            $customer_data = tbl_customer::where('id', session('customer_id'))->first();
            $cart_prods = tbl_cart::where('customer_id',session('customer_id'))->select('*')->get();
            return view('landing/checkout', compact('cart_data', 'customer_data', 'cart_prods'));
        } else {
            return redirect('my-cart');
        }
    }

    public function removeWishlist($id){
        $wishlists = tbl_wishlist::where('product_id',$id)->where('customer_id',session('customer_id'))->first();
        $wishlists->delete();
        return redirect()->back();
    }

}
