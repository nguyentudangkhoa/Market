@extends('master')
@section('content')
<div class="modal-body modal-body-sub_agile">
<div class="modal_body_left modal_body_left1">
        <h3 class="agileinfo_sign">Sign Up</h3>
        <p>
            Come join the Grocery Shoppy! Let's set up your Account.
        </p>
<form action="{{route('signup')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">

            @if (count($errors)>0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $err)
                    {{$err}}
                @endforeach
            </div>
            @endif
            @if (Session::has('ThanhCong'))
                <div class="alert alert-success">{{Session::get('ThanhCong')}}</div>
            @else

            @endif
            <div class="styled-input agile-styled-input-top">
                <input type="text" placeholder="Name" name="full_name" id="full_name" required="">
            </div>
            <div class="styled-input">
                <input type="email" placeholder="E-mail" name="email" id="email" required="">
            </div>
            <div class="styled-input">
                <input type="password" placeholder="Password" name="password1" id="password1" required="">
            </div>
            <div class="styled-input">
                <input type="password" placeholder="Confirm Password" name="re_password" id="re_password" required="">
            </div>
            <input type="submit" value="Sign Up">
        </form>
        <p>
            <a href="#">By clicking register, I agree to your terms</a>
        </p>
</div>
</div>
@endsection

