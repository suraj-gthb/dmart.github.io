@extends('landing/header')
@php $page_title = "My Cart"; @endphp
@php $cart_prods = App\Models\tbl_cart::where('customer_id',session('customer_id'))->select('*')->get(); @endphp
@section('content')
<!--Shopping Cart Area Strat-->
<div class="Shopping-cart-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            @if((session('customer_id')) && (count($cart_prods)))
            <div class="col-12">
                <a href="clear-cart" class="btn btn-warning mb-2">Clear Cart</a>
                <form action="#">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">remove</th>
                                    <th class="li-product-thumbnail">images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="li-product-price">Price</th>
                                    <th class="li-product-quantity">Quantity</th>
                                    <th class="li-product-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total_amt = 0;
                                $carts = App\Models\tbl_cart::where('customer_id', session('customer_id'))->get();
                                @endphp

                                @foreach ($carts as $prod)
                                <tr>
                                    <td class="li-product-remove"><a href="{{url('delete',$prod->product_id)}}"><i class="fa fa-times"></i></a></td>
                                    <td class="li-product-thumbnail"><a href="#"><img src="product-img/{{$prod->product_image}}" alt="Li's Product Image" style="width:auto; height:80px;"></a></td>
                                    <td class="li-product-name"><a href="#">{{$prod->product_name}}</a></td>
                                    <td class="li-product-price"><span class="amount">{{number_format($prod->product_price, 2)}}</span></td>
                                    <td class="quantity"><span>{{$prod->product_quantity}}</span>
                                        <!-- <label>Quantity</label>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" value="{{$prod['quantity']}}" type="text">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div> -->
                                    </td>
                                    <td class="product-subtotal"><span class="amount">{{number_format($prod->product_price*$prod->product_quantity, 2)}}</span></td>
                                </tr>
                                @php $total_amt += $prod->product_price*$prod->product_quantity @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <!-- <div class="coupon">
                                    <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                    <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                </div> -->
                                <div class="coupon2">
                                    <!-- <input class="button" name="update_cart" value="Update cart" type="submit"> -->
                                    <a href="/" class="btn btn-outline-dark">Continue Shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
                                    <li>Subtotal <span>{{number_format($total_amt,2)}}</span></li>
                                    <li>Total <span>{{number_format($total_amt,2)}}</span></li>
                                </ul>
                                <a href="{{asset('checkout')}}">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @elseif(session('sess__cart'))
            <div class="col-12">
                <a href="clear-cart" class="btn btn-warning mb-2">Clear Cart</a>
                <form action="#">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">remove</th>
                                    <th class="li-product-thumbnail">images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="li-product-price">Price</th>
                                    <th class="li-product-quantity">Quantity</th>
                                    <th class="li-product-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total_amt = 0; @endphp
                                @foreach (session('sess__cart') as $id => $prod)
                                <tr>
                                    <td class="li-product-remove"><a href="{{url('delete',$id)}}"><i class="fa fa-times"></i></a></td>
                                    <td class="li-product-thumbnail"><a href="#"><img src="product-img/{{$prod['image']}}" alt="Li's Product Image" style="width:auto; height:80px;"></a></td>
                                    <td class="li-product-name"><a href="#">{{$prod['name']}}</a></td>
                                    <td class="li-product-price"><span class="amount">{{number_format($prod['price'], 2)}}</span></td>
                                    <td class="quantity"><span>{{$prod['quantity']}}</span>
                                        <!-- <label>Quantity</label>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" value="{{$prod['quantity']}}" type="text">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div> -->
                                    </td>
                                    <td class="product-subtotal"><span class="amount">{{number_format($prod['price']*$prod['quantity'], 2)}}</span></td>
                                </tr>
                                @php $total_amt += $prod['price']*$prod['quantity'] @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <!-- <div class="coupon">
                                    <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                    <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                </div> -->
                                <div class="coupon2">
                                    <!-- <input class="button" name="update_cart" value="Update cart" type="submit"> -->
                                    <a href="/" class="btn btn-outline-dark">Continue Shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
                                    <li>Subtotal <span>{{number_format($total_amt,2)}}</span></li>
                                    <li>Total <span>{{number_format($total_amt,2)}}</span></li>
                                </ul>
                                <a href="{{asset('checkout')}}">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @else
            <div class="col-12 text-center">
                <img src="https://www.lytmeals.in/assets/web/img/emptycart.png" alt="" width="300px"> <br>
                <a href="{{asset('/')}}" class="btn btn-success">Continue Shopping</a>
            </div>
            @endif
        </div>
    </div>
</div>
<!--Shopping Cart Area End-->
@endsection