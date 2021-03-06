@extends('master')
@section('content')
@if(Auth::check())
@if(Auth::user()->email == $changePass->email)
<div class="modal-body modal-body-sub_agile" style="margin-left:15%;margin-right:15%;text-align:center">
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
    <form action="{{route('changePassword',$changePass->id)}}" method="post">
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
            <div class="styled-input agile-styled-input-top" style="background-color:#cccccc">
            <input type="text" value="{{$changePass->email}}"  name="email" id="email" disabled required="">
            </div>
            <div class="styled-input">
                <input type="password" placeholder="Password" name="password" id="password" required="">
                <div id="password-exist" style="color:red"></div>
            </div>
            <div class="styled-input">
                <input type="password" placeholder="New password" name="newPassword" id="newPassword" required="">
            </div>
            <div class="styled-input">
                <input type="password" placeholder="Enter your new password again" name="rePassword" id="rePassword" required="">
                <div id="validate_password" style="color:red"></div>
            </div>
            {{ csrf_field() }}
            <input type="submit" value="Change password">
        </form>
        <script>
            $(document).ready(function(){
                $('#rePassword').keyup(function(){
                    var re_password = $(this).val();
                    var password = $('#newPassword').val();
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
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>
@else
<h1>Page do not exist</h1>
@endif
@else
    <h1>Page do not exist</h1>
@endif
@endsection
