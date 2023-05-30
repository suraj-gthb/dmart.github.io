<?php

namespace App\Http\Controllers;

use App\Models\tbl_category;
use App\Models\tbl_product;
use App\Models\tbl_product_inward;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = tbl_category::get();
        return view('add-product', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = DB::table('tbl_products')
            ->join('tbl_categories', 'tbl_products.product_category', '=', 'tbl_categories.id')
            ->select('*', 'tbl_products.id as prod_id')
            ->get();
        return view('view-product', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_category = $request->get('category-name_optn');
        $product_name = $request->get('product-name_txt');
        $product_mrp = $request->get('product-mrp_txt');
        $product_price = $request->get('product-price_txt');
        $product_description = $request->get('product-description_txtara');
        $product_image = $request->file('image_flupld');
        $product_image_name = $product_image->getClientOriginalName();
        $product_path = "product-img/";

        $products = new tbl_product([
            'product_category' => $product_category,
            'product_name' => $product_name,
            'product_mrp' => $product_mrp,
            'product_price' => $product_price,
            'product_description' => $product_description,
            'product_image' => $product_image_name
        ]);
        $product_image->move($product_path, $product_image_name);
        $products->save();

        $last_id = $products->id;

        $product_inward = new tbl_product_inward([
            'in_product_id' => $last_id,
            'in_total_quantity' => 12
        ]);
        $product_inward->save();

        return redirect('add-product')->with('status', 'Product Added Successfully!');
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
        $categories = tbl_category::get();
        $product = tbl_product::find($id);
        return view('update-product', compact('product', 'categories'));
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
        $product_category = $request->get('category-name_optn');
        $product_name = $request->get('product-name_txt');
        $product_mrp = $request->get('product-mrp_txt');
        $product_price = $request->get('product-price_txt');
        $product_description = $request->get('product-description_txtara');

        $product = tbl_product::find($id);
        if ($request->file('image_flupld') != '') {
            $destination_path = "product-img/";
            $product_image = $request->file('image_flupld');
            $product_image_name = $product_image->getClientOriginalName();

            $product->product_image = $product_image_name;
            $product_image->move($destination_path, $product_image_name);
        }

        $product->product_category = $product_category;
        $product->product_name = $product_name;
        $product->product_mrp = $product_mrp;
        $product->product_price = $product_price;
        $product->product_description = $product_description;

        $product->update();
        return redirect()->back()->with('status', 'Product Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = tbl_product::find($id);
        $product->delete();
        return redirect('view-product');
    }

    public function productIn()
    {
        $products = tbl_product::get();
        return view('product-inward', compact('products'));
    }

    public function productInward(Request $request)
    {
        $pid = $request->get('product-name_optn');
        $qty = $request->get('product-quantity_txt');

        $updateQty = tbl_product_inward::where('in_product_id', $pid)->first();

        $updateQty->in_total_quantity += $qty;
        $updateQty->update();

        return redirect()->back();
    }
}
