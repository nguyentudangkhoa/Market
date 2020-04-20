@extends('master')
@section('content')
@if(Auth::check())
@if(Auth::user()->authority == 1)
<div class="checkout-right" style="text-align:center; margin-top:50px">
    <h4>Wellcome Admin to
        <span>Bill detail Page</span>
    </h4>
    <div class="table-responsive" style="margin-left:0%;margin-bottom:50px">
        <table class="timetable_sub">
            <thead>
                <tr>
                    <th>Bill ID</th>
                    <th>Date</th>
                    <th>Payment</th>
                    <th>Total Price</th>
                    <th>Note</th>
                    <th>Status</th>
                    <th>Function button</th>
                </tr>
            </thead>
            <tbody>
                @if(Session::has('Report'))
                        <div class="alert alert-success">{{Session::get('Report')}}</div>
                @endif
                <input type="hidden" value="{{$i=1}}">
                @foreach ($data as $item)
                <form action="{{route('Bill_Details',$item->id)}}" method="get">
                    <input type="hidden" name='_token' value="{{csrf_token()}}">

                <tr class="rem1">
                    <td class="invert">{{$item->id}}</td>
                    <td class="invert">{{$item->created_at}}</td>
                    <td class="invert">{{$item->payment}}</td>
                    <td class="invert">{{$item->total}}</td>
                    <td class="invert">{{$item->note}}</td>
                    @if ($item->status_bill == 1)
                        <td class="invert">Aldeary paid</td>
                    @else
                        <td class="invert">Unpaid</td>
                    @endif
                    <td class="invert">
                        <div class="rem">
                                <input type="submit" value="Details" class="btn btn-danger"/>
                </form>
                            <form action="{{route('DeleteBill',$item->id)}}" method="get" style="margin-top:10px">
                                <input type="submit" value="Delete Bill" class="btn btn-danger"/>
                            </form>
                        </div>
                    </td>
                </tr>
            </>
                @endforeach
            <div align="center" class="row">{{$data->links()}}</div>

            </tbody>
        </table>
    </div>
</div>
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
