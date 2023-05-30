@extends('landing/header')

@section('content')
<!--Wishlist Area Strat-->
<div class="wishlist-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if(count($view_wishlist)==0)
                <div class="alert alert-info">Wishlist is Empty!</div>
                @else
                <form action="#">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">remove</th>
                                    <th class="li-product-thumbnail">images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="li-product-price">Unit Price</th>
                                    <th class="li-product-stock-status">Stock Status</th>
                                    <th class="li-product-add-cart">add to cart</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($view_wishlist as $wishlist)
                                <tr>
                                    <td class="li-product-remove"><a href="remove-wishlist/{{$wishlist->product_id}}"><i class="fa fa-times"></i></a></td>
                                    <td class="li-product-thumbnail"><a href="#"><img width="70" src="product-img/{{$wishlist->product_image}}" alt=""></a></td>
                                    <td class="li-product-name"><a href="#">{{$wishlist->product_name}}</a></td>
                                    <td class="li-product-price"><span class="amount">{{$wishlist->product_price}}</span></td>
                                    <td class="li-product-stock-status"><span class="in-stock">In stock</span></td>
                                    <td class="li-product-add-cart"><a href="add-to-cart/{{$wishlist->product_id}}">Add to Cart</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
<!--Wishlist Area End-->
@endsection