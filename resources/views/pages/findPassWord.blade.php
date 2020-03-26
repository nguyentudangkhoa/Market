@extends('master')
@section('content')
<div class="modal-body modal-body-sub_agile" style="margin-left:500px;margin-right:500px;text-align:center">
    <div class="main-mailposi">
        <span class="fa fa-envelope-o" aria-hidden="true"></span>
    </div>
    <div class="modal_body_left modal_body_left1">
        <h3 class="agileinfo_sign">Change your password </h3>
        <p>
            Sign In now, Let's start your Grocery Shopping. Don't have an account?
            <a href="{{route('signup')}}" style="color:orange">
                Sign Up Now</a>
        </p>
    <form action="{{route('FindPass')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        @if (count($errors)>0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $err)
                {{$err}}
            @endforeach
        </div>
        @endif
        @if(Session::has('Report'))
        <div class="alert alert-danger">{{Session::get('Report')}}</div>
        @endif
            <div class="styled-input agile-styled-input-top" >
            <input type="text" placeholder="Enter your email"  name="email" id="email"  required="">
            </div>
            <div class="styled-input">
                <input type="password" placeholder="Enter your new password" name="newPassword" id="newPassword" required="">
            </div>
            <div class="styled-input">
                <input type="password" placeholder="Enter your new password again" name="rePassword" id="rePassword" required="">
            </div>
            <input type="submit" value="Change password">
        </form>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>
@endsection
