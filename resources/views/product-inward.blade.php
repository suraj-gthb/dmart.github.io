@extends('header')
@php $page_title = "Product Inwards"; @endphp
@section('content');
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>{{$page_title}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="productsin" method="post" enctype="multipart/form-data">
                            @csrf
                            @if(session('status'))
                            <div class="alert alert-info">{{session('status')}}</div>
                            @endif
                            <div class="form-group">
                                <label>Product Name</label>
                                <select name="product-name_optn" class="form-control">
                                    <option value=""> --- Select Product --- </option>
                                    @foreach ($products as $product)
                                    <option value="{{$product->id}}"> {{$product->product_name}} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Product Quantity</label>
                                <input type="number" name="product-quantity_txt" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection