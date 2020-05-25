@extends('master')
@section('content')
@if(Auth::check())
@if(Auth::user()->authority == 1)
<div class="checkout-right" style="text-align:center; margin-top:50px">
    <h4>Wellcome Admin to
        <span>Member Manager Page</span>
    </h4>
    <div class="table-responsive" style="margin-left:0%;margin-bottom:50px">
        <table class="timetable_sub">
            <thead>
                <tr>
                    <th>Member ID</th>
                    <th>Menber name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Buy total</th>
                    <th>Function Button</th>
                </tr>
            </thead>
            <tbody>
                @if(Session::has('Report'))
                        <div class="alert alert-success">{{Session::get('Report')}}</div>
                @endif
                <input type="hidden" value="{{$i=1}}">
                @foreach ($members as $item)
                <form class="has-confirm" data-message="Do you want to delete this member?" action="{{route('DeleteUser',$item->id)}}" method="get">
                    <input type="hidden" name='_token' value="{{csrf_token()}}">

                <tr class="rem1">
                    <td class="invert">{{$item->id}}</td>
                    <td class="invert">{{$item->full_name}}</td>
                    <td class="invert">{{$item->email}}</td>
                    <td class="invert">{{$item->address}}</td>
                    <td class="invert">{{$item->phone}}</td>
                    <td class="invert">{{$item->total}}</td>
                    <td class="invert">
                        <div class="rem">
                                <input type="submit" value="Delete" class="btn btn-danger"/>
                </form>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript" >
    $("form.has-confirm").submit(function (e) {
        var $message = $(this).data('message');
        if(!confirm($message)){
            e.preventDefault();
        }
    });
</script>
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
