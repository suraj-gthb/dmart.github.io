<html>
    <head>
    <style>
        *{padding: 0;margin: 0;box-sizing: border-box;font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;}
        .container{width: 45%;margin: 20px auto;border: 1px solid #ccc;border-radius: 8px;box-shadow: 0 0 10px 2px;}
        .row{padding: 25px;}
        .logo{text-align: center;margin: 15px auto;}
        .logo img{width: 25%;}
        .date{text-align: center; padding: 15px;}
        table tr{border-top: 1px solid #000;}
        .heading{font-size: 16px;font-weight: 600;}
        .email{text-decoration: none;color:#000;}
        .ad{padding: 25px; background: orange; text-align: center;}
        .footer{padding: 25px; text-align: center;}
        .footer a{text-decoration: none; color: #000; padding: 10px; border-radius:7px; border:1px solid #000;}
        .footer a:hover{background-color: orange; color: #000; border: 1px solid orange;}
        .text-center{text-align: center;}
        .text-end{text-align: right;}
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="logo">
                <img src="https://companieslogo.com/img/orig/DMART.NS_BIG-293fe586.png?t=1599629043" alt="" />
                <h5>Jule Solapur, Solapur</h5>
            </div>
            <div class="date">
            <span><?php echo date('D, M d Y @ h:i A'); ?></span> &emsp;
            <span>Order ID : {{$customer_data['order_id']}}</span>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $qty = 0; $total = 0; @endphp
                    @foreach($order_details as $details)
                    <tr>
                        <td data-th="Product">
                            {{ $details->product_name }}
                        </td>
                        <td class="text-end" data-th="Price">
                            {{ $details->product_price }}
                        </td>
                        <td class="text-center" data-th="Price">
                            {{ $details->product_quantity }}
                        </td>
                        <td class="text-end" data-th="Subtotal" class="text-center">
                            {{ $details->product_price*$details->product_quantity }}
                        </td>
                        @php $qty += $details->product_quantity; $total +=
                        $details->product_price*$details->product_quantity; @endphp
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2"></td>
                        <th class="text-center">{{ $qty }}</th>
                        <th class="text-center">{{$total}}</th>
                    </tr>
                </tfoot>
            </table>
            <div class="heading">Your Details</div>
            <p class="name">{{$customer_data['o_first_name']}} {{$customer_data['o_last_name']}}</p>
            <p class="address">{{$customer_data['o_address']}}</p>
            <p class="email">{{$customer_data['o_email']}}</p>
            <p class="mobile">+91 {{$customer_data['o_mobile']}}</p>
        </div>
        <div class="ad">
            <h4>Tell Your Friends</h4>
            <p>Share URL with your friends</p>
        </div>
        <div class="footer">
            <a href="http://192.168.1.49:8000/sign-in">View My Account</a>
        </div>
    </div>
</body>
</html>