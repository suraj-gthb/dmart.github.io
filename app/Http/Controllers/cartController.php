<?php

namespace App\Http\Controllers;

use App\Models\tbl_cart;
use App\Models\tbl_category;
use App\Models\tbl_product;
use App\Models\tbl_product_inward;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class cartController extends Controller
{
    public function addToCart($id)
    {
        $product = DB::table('tbl_products')
            ->join('tbl_product_inwards', 'tbl_products.id', '=', 'tbl_product_inwards.in_product_id')
            ->where('tbl_products.id', $id)
            ->select('*')
            ->first();

        //$product = tbl_product::find($id);

        if (!isset($product->in_total_quantity)) {
            echo "<script>alert('Product is not in inward');window.location.href='/';</script>";
        } else {
            if ($product->in_total_quantity <= 0) {
                echo "<script>alert('Product is out of stock');window.location.href='/';</script>";
            } else {
                if (session('customer_id')) {
                    $cart_prod = tbl_cart::where('customer_id', session('customer_id'))->where('product_id', $id)->first();
                    if (isset($cart_prod['product_id'])) {
                        $cart_prod->product_quantity += 1;
                        $cart_prod->update();
                    } else {
                        $cart = new tbl_cart([
                            'customer_id' => session('customer_id'),
                            'product_id' => $product->id,
                            'product_name' => $product->product_name,
                            'product_price' => $product->product_price,
                            'product_image' => $product->product_image,
                            'product_quantity' => 1
                        ]);
                        $cart->save();
                    }
                    return redirect()->back()->with('status', 'Product added successfully!');
                } else {
                    $cart = session()->get('sess__cart', []);
                    if (isset($cart[$id])) {
                        $cart[$id]['quantity']++;
                    } else {
                        $cart[$id] = [
                            "id" => $id,
                            "name" => $product->product_name,
                            "mrp" => $product->product_mrp,
                            "price" => $product->product_price,
                            "image" => $product->product_image,
                            "quantity" => 1
                        ];
                    }
                    session()->put('sess__cart', $cart);
                    return redirect()->back()->with('status', 'Product added successfully!');
                }
            }
        }
    }

    public function viewProduct($id)
    {
        $view_product = tbl_product::find($id);
        $cart_prods = tbl_cart::where('customer_id', session('customer_id'))->select('*')->get();
        return view('landing/view-product', compact('view_product','cart_prods'));
    }

    public function productAdd(Request $request, $id)
    {
        $product = DB::table('tbl_products')
            ->join('tbl_product_inwards', 'tbl_products.id', '=', 'tbl_product_inwards.in_product_id')
            ->where('tbl_products.id', $id)
            ->select('*')
            ->first();

        // //$product = tbl_product::find($id);
        // if (!isset($product->in_total_quantity)) {
        //     echo "<script>alert('Product is not in inward');window.location.href='/';</script>";
        // } else {
        //     if ($product->in_total_quantity <= 0) {
        //         echo "<script>alert('Product is out of stock');window.location.href='/';</script>";
        //     } else {
        //         $quantity = $request->get('quantity_txt');
        //         $cart = session()->get('sess__cart', []);
        //         if (isset($cart[$id])) {
        //             $cart[$id]['quantity'] += $quantity;
        //         } else {
        //             $cart[$id] = [
        //                 "name" => $product->product_name,
        //                 "mrp" => $product->product_mrp,
        //                 "price" => $product->product_price,
        //                 "image" => $product->product_image,
        //                 "quantity" => $quantity
        //             ];
        //         }
        //         session()->put('sess__cart', $cart);
        //         return back()->with('status', 'Product added successfully!');
        //     }
        // }

        if (!isset($product->in_total_quantity)) {
            echo "<script>alert('Product is not in inward');window.location.href='/';</script>";
        } else {
            if ($product->in_total_quantity <= 0) {
                echo "<script>alert('Product is out of stock');window.location.href='/';</script>";
            } else {
                        $quantity = $request->get('quantity_txt');
                if (session('customer_id')) {
                    $cart_prod = tbl_cart::where('customer_id', session('customer_id'))->where('product_id', $id)->first();
                    if (isset($cart_prod['product_id'])) {
                        $cart_prod->product_quantity += $quantity;
                        $cart_prod->update();
                    } else {
                        $cart = new tbl_cart([
                            'customer_id' => session('customer_id'),
                            'product_id' => $product->id,
                            'product_name' => $product->product_name,
                            'product_price' => $product->product_price,
                            'product_image' => $product->product_image,
                            'product_quantity' => $quantity
                        ]);
                        $cart->save();
                    }
                    return redirect()->back()->with('status', 'Product added successfully!');
                } else {
                    $cart = session()->get('sess__cart', []);
                    if (isset($cart[$id])) {
                        $cart[$id]['quantity']++;
                    } else {
                        $cart[$id] = [
                            "id" => $id,
                            "name" => $product->product_name,
                            "mrp" => $product->product_mrp,
                            "price" => $product->product_price,
                            "image" => $product->product_image,
                            "quantity" => 1
                        ];
                    }
                    session()->put('sess__cart', $cart);
                    return redirect()->back()->with('status', 'Product added successfully!');
                }
            }
        }


    }

    public function deleteCart(Request $request)
    {
        $check_product = tbl_cart::where('customer_id', session('customer_id'))->count();
        if (session('customer_id') && $check_product != 0) {
            $carts = tbl_cart::where('customer_id', session('customer_id'))->where('product_id', $request->id)->first();
            $carts->delete();
        } elseif ($request->id) {
            $cart = session()->get('sess__cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('sess__cart', $cart);
            }
        }
        return redirect()->back()->with('status', 'Product removed successfully!');
    }

    public function clearCart()
    {
        if (session('customer_id')) {
            $clear_cart = tbl_cart::where('customer_id', session('customer_id'));
            $clear_cart->delete();
        } else {
            session()->forget('sess__cart');
        }
        return redirect()->back();
    }
}
