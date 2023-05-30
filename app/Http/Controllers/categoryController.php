<?php

namespace App\Http\Controllers;

use App\Models\tbl_category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('add-category');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = tbl_category::get();
        return view('view-category', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category-name_txt' => 'required'
        ]);

        $category_name = $request->get('category-name_txt');

        $category = new tbl_category([
            'category_name' => $category_name
        ]);
        $category->save();
        return redirect('add-category')->with('status','Category Added Successfully!');
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
        $category=tbl_category::find($id);
        return view('update-category', compact('category'));
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
        $category_name = $request->get('category-name_txt');

        $category = tbl_category::find($id);
        $category->category_name=$category_name;
        $category->update();
        return redirect('view-category/create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category =tbl_category::find($id);
        $category->delete();
        echo "<script>alert('Category Deleted Success!');</script>";
    }
}
