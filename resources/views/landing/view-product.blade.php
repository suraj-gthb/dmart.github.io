@extends('landing/header')

@php $page_title = "View Product"; @endphp
@section('content')
<!-- content-wraper start -->
<div class="content-wraper">
    <div class="container">
        <div class="row single-product-area">
            <div class="col-lg-5 col-md-6">
                <!-- Product Details Left -->
                <div class="product-details-left">
                    <div class="product-details-images slider-navigation-1">
                        <div class="lg-imag text-center">
                            <a class="popup-img venobox vbox-item" href="images/product/large-size/1.jpg" data-gall="myGallery">
                                <img src="../product-img/{{$view_product->product_image}}" alt="product image" style="height:350px; width: auto;">
                            </a>
                        </div>
                        <!-- <div class="lg-image">
                            <a class="popup-img venobox vbox-item" href="images/product/large-size/2.jpg" data-gall="myGallery">
                                <img src="images/product/large-size/2.jpg" alt="product image">
                            </a>
                        </div>
                        <div class="lg-image">
                            <a class="popup-img venobox vbox-item" href="images/product/large-size/3.jpg" data-gall="myGallery">
                                <img src="images/product/large-size/3.jpg" alt="product image">
                            </a>
                        </div>
                        <div class="lg-image">
                            <a class="popup-img venobox vbox-item" href="images/product/large-size/4.jpg" data-gall="myGallery">
                                <img src="images/product/large-size/4.jpg" alt="product image">
                            </a>
                        </div>
                        <div class="lg-image">
                            <a class="popup-img venobox vbox-item" href="images/product/large-size/5.jpg" data-gall="myGallery">
                                <img src="images/product/large-size/5.jpg" alt="product image">
                            </a>
                        </div>
                        <div class="lg-image">
                            <a class="popup-img venobox vbox-item" href="images/product/large-size/6.jpg" data-gall="myGallery">
                                <img src="images/product/large-size/6.jpg" alt="product image">
                            </a>
                        </div> -->
                    </div>
                    <!-- <div class="product-details-thumbs slider-thumbs-1">
                        <div class="sm-image"><img src="images/product/small-size/1.jpg" alt="product image thumb"></div>
                        <div class="sm-image"><img src="images/product/small-size/2.jpg" alt="product image thumb"></div>
                        <div class="sm-image"><img src="images/product/small-size/3.jpg" alt="product image thumb"></div>
                        <div class="sm-image"><img src="images/product/small-size/4.jpg" alt="product image thumb"></div>
                        <div class="sm-image"><img src="images/product/small-size/5.jpg" alt="product image thumb"></div>
                        <div class="sm-image"><img src="images/product/small-size/6.jpg" alt="product image thumb"></div>
                    </div> -->
                </div>
                <!--// Product Details Left -->
            </div>

            <div class="col-lg-7 col-md-6">
                <div class="product-details-view-content pt-60">
                    <div class="product-info">
                        <h2>{{$view_product->product_name}}</h2>
                        <!-- <span class="product-details-ref">Reference: demo_15</span> -->
                        <!-- <div class="rating-box pt-20">
                            <ul class="rating rating-with-review-item">
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                <li class="review-item"><a href="#">Read Review</a></li>
                                <li class="review-item"><a href="#">Write Review</a></li>
                            </ul>
                        </div> -->
                        <div class="price-box pt-20">
                            <span class="new-price new-price-2">₹ {{number_format($view_product->product_price, 2)}}</span>
                        </div>
                        <div class="product-desc">
                            <p>
                                <span>
                                    {{$view_product->product_description}}
                                </span>
                            </p>
                        </div>
                        <div class="single-add-to-cart">
                            <form action="/addtocart/{{$view_product->id}}" method="post" class="cart-quantity">
                                @csrf
                                <div class="quantity">
                                    <label>Quantity</label>
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" value="1" type="text" name="quantity_txt">
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>
                                </div>
                                <button class="add-to-cart" type="submit">Add to cart</button>
                            </form>
                        </div>
                        <!-- <div class="product-additional-info pt-25">
                            <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Add to wishlist</a>
                            <div class="product-social-sharing pt-25">
                                <ul>
                                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                    <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                                    <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="block-reassurance">
                            <ul>
                                <li>
                                    <div class="reassurance-item">
                                        <div class="reassurance-icon">
                                            <i class="fa fa-check-square-o"></i>
                                        </div>
                                        <p>Security policy (edit with Customer reassurance module)</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="reassurance-item">
                                        <div class="reassurance-icon">
                                            <i class="fa fa-truck"></i>
                                        </div>
                                        <p>Delivery policy (edit with Customer reassurance module)</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="reassurance-item">
                                        <div class="reassurance-icon">
                                            <i class="fa fa-exchange"></i>
                                        </div>
                                        <p> Return policy (edit with Customer reassurance module)</p>
                                    </div>
                                </li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wraper end -->

@endsection