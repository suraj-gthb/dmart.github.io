@extends('landing/header')
@section('content')
<div class="container">
    <div class="row">
        @if(count($orders)>0)
        @foreach ($orders as $order)
        <div class="col-md-12 border rounded my-3 p-3">
            <div class="row">
                <div class="col-md-5">
                    <table class="table table-sm">
                        <tr>
                            <th>Order Id</th>
                            <td>{{$order->order_id}}</td>
                        </tr>
                        <tr>
                            <th>Order Date</th>
                            <td>{{$order->created_at}}</td>
                        </tr>
                        <tr>
                            <th>Customer Name : </th>
                            <td> {{$order->o_first_name}} {{$order->o_last_name}}</td>
                        </tr>
                        <tr>
                            <th>Shipping Address : </th>
                            <td> {{$order->o_address}} </td>
                        </tr>
                        <tr>
                            <th>Customer Email : </th>
                            <td> {{$order->o_email}} </td>
                        </tr>
                        <tr>
                            <th>Customer Mobile : </th>
                            <td> {{$order->o_mobile}} </td>
                        </tr>
                        <tr>
                            <th>Delivery Status : </th>
                            <td> @if($order->o_status==0) <span class="text-warning">Pending</span> @else <span class="text-success">Delivered</span> @endif </td>
                        </tr>
                    </table>
                </div>
                <!-- products -->
                <div class="col-md-7">
                    @php $total_amount = 0; @endphp
                    <table class="table text-nowrap table-bordered">
                        <tr>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                        @php $orderproducts=App\Models\tbl_order_products::where('order_id', $order->order_id)->get(); @endphp
                        @foreach ($orderproducts as $his)
                        <tr>
                            <td>{{$his->product_name}}</td>
                            <td>{{$his->product_price}}</td>
                            <td>{{$his->product_quantity}}</td>
                            <td>{{$his->total}}</td>
                        </tr>
                        @php $total_amount += $his->total; @endphp
                        @endforeach
                        <tr>
                            <td colspan="4" align="right">
                                <h4>{{$total_amount}}</h4>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="alert alert-info">You do not have an order yet!</div>
        @endif
    </div>
</div>
@endsection