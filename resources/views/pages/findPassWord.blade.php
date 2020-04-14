@extends('master')
@section('content')
<div class="modal-body modal-body-sub_agile" style="marmargin-left:15%;margin-right:15%;text-align:center">
    <div class="main-mailposi">
        <span class="fa fa-envelope-o" aria-hidden="true"></span>
    </div>
    <div class="modal_body_left modal_body_left1">
        <h3 class="agileinfo_sign">Find your password </h3>
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
                <div id="validate_email" style="color:red"></div>
            </div>
            <div class="styled-input">
                <input type="password" placeholder="Enter your new password" name="newPassword" id="newPassword" required="">
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
                $('#email').keyup(function(){
                    var checkEmail = $(this).val();
                    if(checkEmail != '')
                    {
                     var _token = $('input[name="_token"]').val();
                     $.ajax({
                      url:"{{ route('validateSignUp') }}",
                      method:"POST",
                      data:{checkEmail:checkEmail, _token:_token},
                      success:function(data){
                        $('#validate_email').fadeIn();
                        $('#validate_email').html(data);
                      }
                     });
                    }else{
                        $('#validate_email').html("");
                    }
                });
            });
        </script>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>
@endsection
