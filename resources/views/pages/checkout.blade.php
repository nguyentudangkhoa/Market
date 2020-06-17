@extends('master')
@section('content')
    <!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.html">Home</a>
						<i>|</i>
					</li>
					<li>Checkout</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- checkout page -->
	<div class="privacy">
        @if(Session::has('thongbao'))
            <div class="alert alert-success">{{Session::get('thongbao')}}</div>
        @endif
        <form action="{{route('checkout')}}" method="post" class="creditly-card-form agileinfo_form">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Checkout
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">
                @if(Session::has('cart'))
				<h4>Your shopping cart contains:
					<span></span>
				</h4>
				<div class="table-responsive">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>SL No.</th>
								<th>Product</th>
								<th>Quality</th>
								<th>Product Name</th>

								<th>Price</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody>
                         <input type="hidden"   value="{{$i=1}}"/>
                        @foreach ($product_cart as $product)
							<tr class="rem1">
                            <td class="invert">{{$i++}}</td>
								<td class="invert-image">
									<a href="single2.html">
										<img src="source/images/{{$product['item']['image']}}" alt=" " class="img-responsive">
									</a>
								</td>
								<td class="invert">
									<div class="quantity">
										<div class="">
											<div class="">
                                            <input id="quantity" name="quantity" disabled style="width:50%; text-align:center" value="{{$product['qty']}}">
                                            {{ csrf_field() }}
											</div>
										</div>
									</div>
								</td>
                                <td class="invert">{{$product['item']['name']}}</td>
                                @if($product['item']['promotion_price']>0)
                                <td class="invert">{{number_format($product['item']['promotion_price'])}}VND</td>
                                @else
                                <td class="invert">{{number_format($product['item']['unit_price'])}}VND</td>
                                @endif
								<td class="invert">
									<div class="rem">
                                        <div class="close1"> </div>
                                    <a href="{{route('delete',$product['item']['id'])}}" class="close1"></a>
									</div>
								</td>
							</tr>
                        @endforeach
                            <thead>
                                <tr >
                                    <td style="background-color:chartreuse; font-style:arial" >Total quantity: </td>
                                    <td>{{Session('cart')->totalQty}}</td>
                                    <td></td>
                                    <td style="background-color:chartreuse; font-style:arial">Total Price: </td>
                                    <td>{{number_format(Session('cart')->totalPrice)}}VND</td>
                                    <td></td>
                                </tr>
                            </thead>
						</tbody>
					</table>
				</div>
            </div>
            <script type="text/javascript" >
                $("form.has-confirm").submit(function (e) {
                    var $message = $(this).data('message');
                    if(!confirm($message)){
                        e.preventDefault();
                    }
                });
            </script>
            <div class="checkout-left">
				<div class="address_form_agile">
					<h4>Add a new Details</h4>
                    <input type="hidden" name="_token" value={{ csrf_token() }} >
                    @if(Session::has('Thongbao'))
                        <div class="alert alert-success">{{Session::get('Thongbao')}}</div>
                    @endif
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">
									<div class="controls">
										<input class="billing-address-name" type="text" name="name" placeholder="Full Name" required="">
									</div>
									<div class="w3_agileits_card_number_grids">
										<div class="w3_agileits_card_number_grid_left">
											<div class="controls">
												<input type="text" placeholder="Mobile Number" name="phone" required="">
											</div>
										</div>
										<div class="w3_agileits_card_number_grid_right">
											<div class="controls">
												<input type="text" placeholder="Address" name="address" required="">
											</div>
										</div>
										<div class="clear"> </div>
                                    </div>

									<div class="controls">
										<input type="text" placeholder="Notes" name="notes" required="">
                                    </div>
                                    <div class="controls">
                                        <input type="text" placeholder="Email" id="email" name="email" required="">

									</div>
                                </div>
                                <div class="first-row">
                                    <label id="validate_email" style="color: red"></label>
                                </div>
                                <div class="first-row">
                                        Gender:
                                        <div class="controls">
                                            Nam:<input type="radio" name="gender" value="Nam" checked>
                                            Nữ: <input type="radio" name="gender" name="Nữ">
                                        </div>
                                    </div>
								<button class="submit check_out">Delivery to this Address</button>
							</div>
						</div>

				</div>
				<div class="clearfix"> </div>
			</div>
        </div>
    </form>
    <script>
        $(document).ready(function(){
             $('#email').keyup(function(){
                    var email_checkout = $(this).val();
                    if(email != '')
                    {
                     var _token = $('input[name="_token"]').val();
                     $.ajax({
                      url:"{{ route('validateSignUp') }}",
                      method:"POST",
                      data:{email_checkout:email_checkout, _token:_token},
                      success:function(data){
                        setTimeout(()=>{
                            $('#validate_email').fadeIn();
                            $('#validate_email').html(data);
                        },1000);

                      }
                     });
                    }else{
                        $('#validate_email').html("");
                    }
                });
                $('#quantity').keyup(function(){
                    var re_password = $(this).val();
                    var password = $('#password1').val();
                    if(re_password != '')
                    {
                     var _token = $('input[name="_token"]').val();
                     $.ajax({
                      url:"{{ route('validateSignUp') }}",
                      method:"POST",
                      data:{re_password:re_password,password:password, _token:_token},
                      success:function(data){
                        $('#validate_password').fadeIn();
                        $('#validate_password').html(data);
                      }
                     });
                    }else{
                        $('#validate_password').html("");
                    }
                });
            });
    </script>
	</div>
    <!-- //checkout page -->
            @else
            <div class="checkout-right">
				<h4>Your shopping cart contains:
					<span>0 Item</span>
				</h4>
            @endif


@endsection
