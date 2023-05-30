@extends('header')

@section('content')
@php $page_title = "View Product"; @endphp

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Category</h4>
                    </div>
                    <div class="card-body">
                        @php $count = 1; @endphp
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Product Name</th>
                                <th>MRP</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th colspan="2">Action</th>
                            </tr>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$product->category_name}}</td>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->product_mrp}}</td>
                                <td>{{$product->product_price}}</td>
                                <td>{{$product->product_description}}</td>
                                <td><img src="/product-img/{{$product->product_image}}" alt="" width="80"> </td>
                                <td>
                                    <form action="{{route('view-product.edit',$product->prod_id)}}">
                                        @csrf
                                        <input type="submit" value="Edit" class="btn btn-sm btn-warning">
                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('view-product.destroy', $product->prod_id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection