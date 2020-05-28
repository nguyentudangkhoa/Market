@extends('master')
@section('content')
    <!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
                        <a href="{{route('trangchu')}}">Home</a>
						<i>|</i>
					</li>
					<li>Single Page</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Single Page
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
            <!-- //tittle heading -->
			<div class="col-md-5 single-right-left ">
				<div class="grid source/images_3_of_2">
					<div class="flexslider">
                            <div sanpham-thumb="source/images/{{$sanpham->image}}">
								<div class="thumb-image">
									<img src="source/images/{{$sanpham->image}}" sanpham-imagezoom="true" class="img-responsive" alt=""> </div>
							</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="col-md-7 single-right-left simpleCart_shelfItem">

                <h3>{{$sanpham->name}}</h3>
                <input type="hidden" id="id_product" name="" value="{{$sanpham->id}}">
                    <div class="rating1" aria-disabled="true">
                        <span class="starRating">
                            {{ csrf_field() }}
                            @if($average==5)
                            <input id="rating5" type="radio" name="rating" value="5" checked="">
                            <label for="rating5">5</label>
                            <input id="rating4" type="radio" name="rating" value="4">
                            <label for="rating4">4</label>
                            <input id="rating3" type="radio" name="rating" value="3">
                            <label for="rating3">3</label>
                            <input id="rating2" type="radio" name="rating" value="2">
                            <label for="rating2">2</label>
                            <input id="rating1" type="radio" name="rating" value="1">
                            <label for="rating1">1</label>
                            @elseif($average==4)
                            <input id="rating5" type="radio" name="rating" value="5">
                            <label for="rating5">5</label>
                            <input id="rating4" type="radio" name="rating" value="4" checked="">
                            <label for="rating4">4</label>
                            <input id="rating3" type="radio" name="rating" value="3">
                            <label for="rating3">3</label>
                            <input id="rating2" type="radio" name="rating" value="2">
                            <label for="rating2">2</label>
                            <input id="rating1" type="radio" name="rating" value="1">
                            <label for="rating1">1</label>
                            @elseif($average==3)
                            <input id="rating5" type="radio" name="rating" value="5">
                            <label for="rating5">5</label>
                            <input id="rating4" type="radio" name="rating" value="4">
                            <label for="rating4">4</label>
                            <input id="rating3" type="radio" name="rating" value="3" checked="">
                            <label for="rating3">3</label>
                            <input id="rating2" type="radio" name="rating" value="2">
                            <label for="rating2">2</label>
                            <input id="rating1" type="radio" name="rating" value="1">
                            <label for="rating1">1</label>
                            @elseif($average==2)
                            <input id="rating5" type="radio" name="rating" value="5">
                            <label for="rating5">5</label>
                            <input id="rating4" type="radio" name="rating" value="4">
                            <label for="rating4">4</label>
                            <input id="rating3" type="radio" name="rating" value="3">
                            <label for="rating3">3</label>
                            <input id="rating2" type="radio" name="rating" value="2" checked="">
                            <label for="rating2">2</label>
                            <input id="rating1" type="radio" name="rating" value="1">
                            <label for="rating1">1</label>
                            @elseif($average==1)
                            <input id="rating5" type="radio" name="rating" value="5">
                            <label for="rating5">5</label>
                            <input id="rating4" type="radio" name="rating" value="4">
                            <label for="rating4">4</label>
                            <input id="rating3" type="radio" name="rating" value="3">
                            <label for="rating3">3</label>
                            <input id="rating2" type="radio" name="rating" value="2">
                            <label for="rating2">2</label>
                            <input id="rating1" type="radio" name="rating" value="1" checked="">
                            <label for="rating1">1</label>
                            @else
                            <input id="rating5" type="radio" name="rating" value="5">
                            <label for="rating5">5</label>
                            <input id="rating4" type="radio" name="rating" value="4">
                            <label for="rating4">4</label>
                            <input id="rating3" type="radio" name="rating" value="3">
                            <label for="rating3">3</label>
                            <input id="rating2" type="radio" name="rating" value="2">
                            <label for="rating2">2</label>
                            <input id="rating1" type="radio" name="rating" value="1">
                            <label for="rating1">1</label>
                            @endif

                        </span>
                    </div>

                <script type="text/javascript">
                $(document).ready(function(){
                    $('#rating5').on('click',function(){
                        var rating = $(this).val();
                        var id_product = $('#id_product').val();
                        if(rating!=""){
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url:"{{ route('rating-product') }}",
                                method:"POST",
                                data:{rating:rating, id_product:id_product, _token:_token},
                                success:function(data){
                                    alert('Thanks for rating')
                                }
                            });
                        }
                    });
                    $('#rating4').on('click',function(){
                        var rating = $(this).val();
                        var id_product = $('#id_product').val();
                        if(rating!=""){
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url:"{{ route('rating-product') }}",
                                method:"POST",
                                data:{rating:rating, id_product:id_product, _token:_token},
                                success:function(data){
                                    alert('Thanks for rating')
                                }
                            });
                        }
                    });
                    $('#rating3').on('click',function(){
                        var rating = $(this).val();
                        var id_product = $('#id_product').val();
                        if(rating!=""){
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url:"{{ route('rating-product') }}",
                                method:"POST",
                                data:{rating:rating, id_product:id_product, _token:_token},
                                success:function(data){
                                    alert('Thanks for rating')
                                }
                            });
                        }
                    });
                    $('#rating2').on('click',function(){
                        var rating = $(this).val();
                        var id_product = $('#id_product').val();
                        if(rating!=""){
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url:"{{ route('rating-product') }}",
                                method:"POST",
                                data:{rating:rating, id_product:id_product, _token:_token},
                                success:function(data){
                                    alert('Thanks for rating')
                                }
                            });
                        }
                    });
                    $('#rating1').on('click',function(){
                        var rating = $(this).val();
                        var id_product = $('#id_product').val();
                        if(rating!=""){
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url:"{{ route('rating-product') }}",
                                method:"POST",
                                data:{rating:rating, id_product:id_product, _token:_token},
                                success:function(data){
                                    alert('Thanks for rating')
                                }
                            });
                        }
                    });

                });
                </script>
				<p>
                    @if ($sanpham->promotion_price > 0)
                    <span class="item_price">{{number_format($sanpham->promotion_price)}}đ</span>
					<del>{{number_format($sanpham->unit_price)}}đ</del>(-{{round(100 - (($sanpham->promotion_price/$sanpham->unit_price)*100),1)}}%)
                    @else
                    <span class="item_price">{{number_format($sanpham->unit_price)}}đ</span>
                    @endif

					<label>Free delivery</label>
				<div class="single-infoagile">
					<ul>
						<li>
							Cash on Delivery Eligible.
						</li>
						<li>
							Shipping Speed to Delivery.
						</li>
						<li>
							Sold and fulfilled by Supple Tek (3.6 out of 5 | 8 ratings).
						</li>
						<li>
                            1 offer from
                            @if($sanpham->promotion_price > 0)
                                <span class="item_price">{{number_format($sanpham->promotion_price)}}đ</del></span>
                            @else
                                <span class="item_price">{{number_format($sanpham->unit_price)}}đ</span>
                            @endif
						</li>
					</ul>
				</div>
				<div class="product-single-w3l">
					<p>
						<i class="fa fa-hand-o-right" aria-hidden="true"></i>This is a
						<label>Vegetarian</label> product.</p>
					<ul>
						<li>
							Best for Biryani and Pulao.
						</li>
						<li>
							After cooking, Zeeba Basmati rice grains attain an extra ordinary length of upto 2.4 cm/~1 inch.
						</li>
						<li>
							Zeeba Basmati rice adheres to the highest food afety standards as your health is paramount to us.
						</li>
						<li>
							Contains only the best and purest grade of basmati rice grain of Export quality.
						</li>
					</ul>
					<p>
						<i class="fa fa-refresh" aria-hidden="true"></i>All food products are
						<label>non-returnable.</label>
					</p>
				</div>
				<div class="occasion-cart">
					<div class="snipcart-details top_brand_home_details" >
						<form action="{{route('add-to-cart',$sanpham->id)}}" method="get">
							<input type="submit" name="submit" value="Add to cart" class="button" />
						</form>
					</div>

				</div>

            </div>
            <div class="clearfix"> </div>
		</div>
	</div>
	<!-- //Single Page -->
	<!-- special offers -->
	<div class="featured-section" id="projects">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">SAME TYPE PRODUCT
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="content-bottom-in">
				<ul id="flexiselDemo1">
                    @foreach ($data2 as $item)
					<li>
						<div class="w3l-specilamk" style="height:389px">
							<div class="speioffer-agile"  style="height:160px">
								<a href="{{route('single',$item->id)}}">
									<img src="source/images/{{$item->image}}" alt="">
								</a>
							</div>
							<div class="product-name-w3l"style="text-align:center">
								<h4>
                                <a href="{{route('single',$item->id)}}">{{$item->name}}</a>
								</h4>
								<div class="w3l-pricehkj" >
									@if($item->promotion_price > 0)
                                        <h6>{{number_format($item->promotion_price)}}đ</h6>
                                        <p><del>{{number_format($item->unit_price)}}đ</del>  -{{round(100 - (($item->promotion_price/$item->unit_price)*100),1)}}%</p>
                                    @else
                                        <h6>{{number_format($item->unit_price)}}đ</h6>
                                        <p>-0%</p>
                                    @endif
								</div>
								<div class="snipcart-details top_brand_home_details" >
									<form action="{{route('add-to-cart',$item->id)}}" method="get">
										<input type="submit" name="submit" value="Add to cart" class="button" />
									</form>
								</div>
							</div>
						</div>
                    </li>
                    @endforeach

				</ul>
			</div>
		</div>
	</div>
	<!-- //special offers -->
@endsection
