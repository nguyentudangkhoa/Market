@extends('master')
@section('content')
<div class="modal-body modal-body-sub_agile" style="">
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
        <p>
            If you forgot the password, click the link.
            <a href="{{route('Forgot-password')}}" style="color:orange">
                Forgot password</a>
        </p>
    <form action="{{route('signin')}}" method="post" class="login-form-control">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        @if (count($errors)>0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $err)
                {{$err}}
            @endforeach
        </div>
        @endif
        @if(Session::has('ThongBao'))
        <div class="alert alert-danger">{{Session::get('ThongBao')}}</div>
        @endif
            <div class="styled-input agile-styled-input-top" >
                <input type="text" placeholder="Email" name="email" id="email" required="" >
                <div id="validate_email" style="color:red"></div>
            </div>
            <div class="styled-input">
                <input type="password" placeholder="Password" name="password" id="password" required="" >
            </div>
            {{ csrf_field() }}
            <input type="submit" value="Sign In">
        </form>
        <script>
            $(document).ready(function(){
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
