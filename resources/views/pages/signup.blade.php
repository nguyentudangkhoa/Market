@extends('master')
@section('content')
<div class="modal-body modal-body-sub_agile" style="margin-left:400px;margin-right:400px;text-align:center">
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
                <div id="validate_email" style="color:red"></div>
            </div>

            </div>
            <div class="styled-input">
                <input type="password" placeholder="Password" name="password1" id="password1" required="">
            </div>
            <div class="styled-input">
                <input type="password" placeholder="Confirm Password" name="re_password" id="re_password" required="">
                <div id="validate_password" style="color:red"></div>
            </div>
            {{ csrf_field() }}
            <input type="submit" value="Sign Up">
        </form>
        <p>
            <a href="#">By clicking register, I agree to your terms</a>
        </p>
        <script>
            $(document).ready(function(){
             $('#email').keyup(function(){
                    var email = $(this).val();
                    if(email != '')
                    {
                     var _token = $('input[name="_token"]').val();
                     $.ajax({
                      url:"{{ route('validateSignUp') }}",
                      method:"POST",
                      data:{email:email, _token:_token},
                      success:function(data){
                        $('#validate_email').fadeIn();
                        $('#validate_email').html(data);
                      }
                     });
                    }else{
                        $('#validate_email').html("");
                    }
                });
                $('#re_password').keyup(function(){
                    var re_password = $(this).val();
                    var password = $('#password1').val();
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
</div>
</div>
@endsection

