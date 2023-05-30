@extends('header')

@section('content')
@php $page_title = "Add Product" @endphp
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>{{$page_title}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('add-product.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if(session('status'))
                            <div class="alert alert-info">{{session('status')}}</div>
                            @endif
                            <div class="form-group">
                                <label>Category Name</label>
                                <select name="category-name_optn" class="form-control">
                                    <option value=""> --- Select Category --- </option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}"> {{$category->category_name}} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Product Name</label>
                                <input type="text" name="product-name_txt" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Product MRP</label>
                                <input type="text" name="product-mrp_txt" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Product Price</label>
                                <input type="text" name="product-price_txt" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="product-description_txtara" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                                <input type="file" name="image_flupld" class="form-control">
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