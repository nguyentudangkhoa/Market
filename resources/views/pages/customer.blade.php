@extends('master')
@section('content')
@if(Auth::check())
@if(Auth::user()->authority == 1)
<div class="checkout-right" style="text-align:center; margin-top:50px">
    <h4>Wellcome Admin to
        <span>Customer Manager Page</span>
    </h4>
    <div class="table-responsive" style="margin-left:0%;margin-bottom:50px">
        <table class="timetable_sub">
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Customer name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Member</th>
                    <th>Buy total</th>
                    <th>Function Button</th>
                </tr>
            </thead>
            <tbody>
                @if(Session::has('Report'))
                        <div class="alert alert-success">{{Session::get('Report')}}</div>
                @endif
                <input type="hidden" value="{{$i=1}}">
                @foreach ($customer as $item)
                <form class="has-confirm" data-message="Do you want to delete this Customer?" action="{{route('DeleteCustomer',$item->id)}}" method="get">
                    <input type="hidden" name='_token' value="{{csrf_token()}}">

                <tr class="rem1">
                    <td class="invert">{{$item->id}}</td>
                    <td class="invert">{{$item->name}}</td>
                    <td class="invert">{{$item->gender}}</td>
                    <td class="invert">{{$item->email}}</td>
                    <td class="invert">{{$item->address}}</td>
                    <td class="invert">{{$item->phone_number}}</td>
                    @if ($item->member == 1)
                    <td class="invert">Yes</td>
                    @else
                    <td class="invert">No</td>
                    @endif
                    <td class="invert">{{$item->quantity}}</td>
                    <td class="invert">
                        <div class="rem">
                                <input type="submit" value="Delete" class="btn btn-danger"/>
                </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            <div align="center" class="row">{{$customer->links()}}</div>

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
