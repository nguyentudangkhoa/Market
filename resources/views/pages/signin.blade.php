@extends('master')
@section('content')
<div class="modal-body modal-body-sub_agile" >
    <div class="main-mailposi">
        <span class="fa fa-envelope-o" aria-hidden="true"></span>
    </div>
    <div class="modal_body_left modal_body_left1">
        <h3 class="agileinfo_sign">Sign In </h3>
        <p>
            Sign In now, Let's start your Grocery Shopping. Don't have an account?
            <a href="{{route('signup')}}" style="color:orange">
                Sign Up Now</a>
        </p>
    <form action="{{route('signin')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        @if(Session::has('ThongBao'))
        <div class="alert alert-danger">{{Session::get('ThongBao')}}</div>
        @endif
            <div class="styled-input agile-styled-input-top">
                <input type="text" placeholder="Email" name="email" id="email" required="">
            </div>
            <div class="styled-input">
                <input type="password" placeholder="Password" name="password" id="password" required="">
            </div>
            <input type="submit" value="Sign In">
        </form>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>
@endsection
