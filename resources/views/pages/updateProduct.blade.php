@extends('master')
@section('content')
@if(Auth::check())
    @if(Auth::user()->authority == 1)
    <div class="checkout-left" style="margin:80px">
        <div class="address_form_agile">
            <h4>Update Product</h4>
        <form action="{{route('postFile')}}" method="post" enctype="multipart/form-data" class="creditly-card-form agileinfo_form">
            <input type="hidden" name="_token" value={{ csrf_token() }} >
            @if(Session::has('reportUpdate'))
                <div class="alert alert-success">{{Session::get('reportUpdate')}}</div>
            @endif
                <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                    <div class="information-wrapper">
                        <div class="first-row">
                            <div class="controls">
                                <div>ID Product:</div>
                                <input class="billing-address-name" type="text" name="product_id" id="product_id" value="{{$data->id}}" placeholder="" disabled required="">
                            </>
                            <div class="controls">
                                <input class="billing-address-name" type="text" name="product_name" id="product_name" placeholder="Product Name" required="">
                            </div>
                            <div class="w3_agileits_card_number_grids">
                                <div class="w3_agileits_card_number_grid_left">
                                    <div class="controls">
                                        <label for="Manufacturer"> Type: </label>
                                        <select id="product_type" name="product_type" >
                                            @foreach ($type as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="w3_agileits_card_number_grid_right">
                                    <div class="controls">
                                        <input type="text" placeholder="Description" name="description" id="description" >
                                    </div>
                                </div>
                                <div class="clear"> </div>
                            </div>

                            <div class="controls">
                                <input type="text" placeholder="Unit Price" name="unit_price" id="unit_price" required="">
                            </div>
                            <div class="controls">
                                <input type="text" placeholder="Promotion Price" name="promotion_price" id="promotion_price" required="">
                            </div>
                        </div>
                        <div>
                            <div class="w3_agileits_card_number_grid_left">
                                <div class="controls">
                                    <label for="Manufacturer"> Image: </label>
                                    <div>
                                        <input type="file" name="image">
                                     </div>
                                </div>
                            </div>
                        </div>
                        <button class="submit check_out">Add Product</button>
                    </div>
                </div>
            </form>

        </div>
        <div class="clearfix"> </div>
    </div>
</div>
</div>
    @else
    <div class="address_form_agile">
            <h4>Page do not exist</h4>
    </div>
    @endif
@else
<div class="address_form_agile">
    <h4>Page do not exist</h4>
</div>
@endif
@endsection
