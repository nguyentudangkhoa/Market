@extends('master')
@section('content')
<!-- //page -->
	<!-- top Products -->
	<div class="ads-grid">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Household Products
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<!-- product left -->
			<div class="side-bar col-md-3">
				<div class="search-hotel">
					<h3 class="agileits-sear-head">Search Here..</h3>
					<form action="{{route('search')}}" method="get">
						<input type="search" placeholder="Product name..." name="search" required="">
						<input type="submit" value=" ">
					</form>
				</div>
				<!-- price range -->
				<div class="range">
					<h3 class="agileits-sear-head">Price range</h3>
					<ul class="dropdown-menu6">
						<li>
							<div id="slider-range"></div>
							<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
						</li>
					</ul>
				</div>
				<!-- //price range -->
				<!-- food preference -->
				<div class="left-side">
					<h3 class="agileits-sear-head">Food Preference</h3>
					<ul>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Vegetarian</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Non-Vegetarian</span>
						</li>
					</ul>
				</div>
				<!-- //food preference -->
				<!-- discounts -->
				<div class="left-side">
					<h3 class="agileits-sear-head">Discount</h3>
					<ul>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">5% or More</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">10% or More</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">20% or More</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">30% or More</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">50% or More</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">60% or More</span>
						</li>
					</ul>
				</div>
				<!-- //discounts -->
				<!-- reviews -->
				<div class="customer-rev left-side">
					<h3 class="agileits-sear-head">Customer Review</h3>
					<ul>
						<li>
							<a href="#">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<span>5.0</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<span>4.0</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-half-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<span>3.5</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<span>3.0</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-half-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								<span>2.5</span>
							</a>
						</li>
					</ul>
				</div>
				<!-- //reviews -->
				<!-- cuisine -->
				<div class="left-side">
					<h3 class="agileits-sear-head">Cuisine</h3>
					<ul>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">South American</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">French</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Greek</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Chinese</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Japanese</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Italian</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Mexican</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Thai</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span">Indian</span>
						</li>
						<li>
							<input type="checkbox" class="checked">
							<span class="span"> Spanish </span>
						</li>
					</ul>
				</div>
				<!-- //cuisine -->
				<!-- deals -->
				<div class="deal-leftmk left-side">

				</div>
				<!-- //deals -->
			</div>
			<!-- //product left -->
			<!-- product right -->
			<div class="agileinfo-ads-display col-md-9 w3l-rightpro">
				<div class="wrapper">
					<!-- first section -->
					<div class="product-sec1">
                            @foreach ($data as $datac)
                            <div class="col-xs-4 product-men" style="padding-bottom: 25px">
                                <div class="men-pro-item simpleCart_shelfItem">
                                    <div class="men-thumb-item">
                                        <img src="source/images/{{$datac->image}}" alt="">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href={{route('single',$datac->id)}} class="link-product-add-cart">Quick View</a>
                                            </div>
                                        </div>
                                        @if($datac->promotion_price  >   0)
                                        <span class="product-new-top">-{{round(100 - (($datac->promotion_price/$datac->unit_price)*100),1)}}%</span>
                                        @endif
                                    </div>

                                    <div class="item-info-product ">
                                        <h4>
                                            <a href={{route('single',$datac->id)}}>{{$datac->name}}</a>
                                        </h4>
                                        <div class="info-product-price">
                                            @if($datac->promotion_price > 0)
                                            <span class="item_price">{{$datac->promotion_price}}đ</span>
                                            <del>{{$datac->unit_price}}đ</del>
                                            @else
                                            <span class="item_price">{{$datac->unit_price}}đ</span>
                                            @endif
                                        </div>
                                        <div class="snipcart-details top_brand_home_details" >
                                            <form action="{{route('add-to-cart',$datac->id)}}" method="get">
												<input type="submit" name="submit" value="Add to cart" class="button" />
										    </form>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            @endforeach
                            <div class="clearfix"></div>
                            {{--Khi muốn phân trang thì trong vòng lặp foreach biến item phải khác biến data--}}
                        </div>
                        <div class="row">{{$data->links()}}</div>


				</div>
			</div>
			<!-- //product right -->
		</div>
	</div>
	<!-- //top products -->
	<!-- special offers -->
	<div class="featured-section" id="projects">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Special Offers
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="content-bottom-in">
				<ul id="flexiselDemo1">
                        @foreach ($data3 as $item)
                        @if ($item->promotion_price > 0)
                        <li>
                                <div class="w3l-specilamk" style="height:389px">
                                    <div class="speioffer-agile">
                                        <a href={{route('single',$item->id)}}>
                                            <img src="source/images/{{$item->image}}" alt="">
                                        </a>
                                    </div>
                                    <div class="product-name-w3l" style="text-align:center">
                                        <h4>
                                            <a href={{route('single',$item->id)}}>{{$item->name}}</a>
                                        </h4>
                                        <div class="w3l-pricehkj" style="text-align:center">
                                            <h6>{{$item->promotion_price}}đ</h6>
                                            <p><del>{{$item->unit_price}}đ</del>  -{{round(100 - (($item->promotion_price/$item->unit_price)*100),2)}}%</p>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details" >
                                            <form action="{{route('add-to-cart',$item->id)}}" method="get">
												<input type="submit" name="submit" value="Add to cart" class="button" />
										    </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endif
                        @endforeach
				</ul>
			</div>
		</div>
	</div>
	<!-- //special offers -->
@endsection
