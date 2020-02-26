@extends('master')
@section('content')
@if(Auth::check())
@if(Auth::user()->authority == 1)
<div class="checkout-right" style="text-align:center; margin-top:50px">
    <h4>Wellcome Admin to
        <span>Products Page</span>
    </h4>
    <div class="table-responsive" style="margin-left:200px;margin-right:200px;margin-bottom:50px">
        <table class="timetable_sub">
            <thead>
                <tr>
                    <th>SL No.</th>
                    <th>Product</th>
                    <th>Product Name</th>
                    <th>Original price</th>
                    <th>Discout</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                @if(Session::has('Report'))
                        <div class="alert alert-danger">{{Session::get('Report')}}</div>
                @endif
                <input type="hidden" value="{{$i=1}}">
                @foreach ($data as $item)
                <form action="{{route('deleteitem',$item->id)}}" method="post">
                    <input type="hidden" name='_token' value="{{csrf_token()}}">

                <tr class="rem1">
                    <td class="invert">{{$i++}}</td>
                    <td class="invert-image">
                        <a href="single2.html">
                            <img src="source/images/{{$item->image}}" alt=" " class="img-responsive">
                        </a>
                    </td>
                    <td class="invert">{{$item->name}}</td>
                    <td class="invert">{{number_format($item->unit_price)}} VND</td>
                    <td class="invert">{{number_format($item->promotion_price)}} VND</td>
                    <td class="invert">
                        <div class="rem">
                                <input type="submit" value="Delete" class="btn btn-danger"/>
                            </form>
                        <form action="{{route('update',$item->id)}}" method="get" style="margin-top:10px">
                                <input type="submit" value="Update" class="btn btn-danger"/>
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
