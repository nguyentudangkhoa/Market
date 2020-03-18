@extends('master')
@section('content')
<div class="checkout-left" style="text-align:center;">
    <div class="address_form_agile">
        <h4>Update Your Profile</h4>
        <form action="{{Route("makeUpdate",$userDetails->id)}}" method="post" class="creditly-card-form agileinfo_form" enctype="multipart/form-data">
            <input type="hidden" name="_token" value={{ csrf_token() }} >
            @if (count($errors)>0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $err)
                    {{$err}}
                @endforeach
            </div>
            @endif
            @if(Session::has('reportUpdate'))
                <div class="alert alert-success">{{Session::get('reportUpdate')}}</div>
            @endif
            <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                <div class="information-wrapper">
                    <div class="first-row">
                        <div class="controls">
                        <input class="billing-address-name" id="full_name" type="text" name="full_name" value="{{$userDetails->full_name}}" placeholder="Full Name" required="">
                        </div>
                        <label for="Manufacturer"> Image: </label>
                        <div>
                            <input type="file" id="image" name="image">
                        </div>
                        <div class="w3_agileits_card_number_grids">
                            <div class="w3_agileits_card_number_grid_left">
                                <div class="controls">
                                    <input type="text" placeholder="Mobile Number" id="phone_number" value="{{$userDetails->phone}}" name="phone_number" required="">
                                </div>
                            </div>
                            <div class="w3_agileits_card_number_grid_right">
                                <div class="controls">
                                    <input type="text" placeholder="Your Address" value="{{$userDetails->address}}" id="address" name="address" required="">
                                </div>
                            </div>
                            <div class="clear"> </div>
                        </div>
                    </div>
                    <input type="submit" value="Update" class="btn btn-danger" style="width:10%"/>
                </div>
            </div>
        </form>
    </div>
    {{$userDetails->images_prof}}
    <div class="clearfix"> </div>
</div>
</div>
@endsection
