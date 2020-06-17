@extends('master')
@section('content')
<div class="checkout-right" style="text-align:center; margin-top:50px">
    <h4>Wellcome {{ Auth::user()->full_name }} to your
        <span>Buy History Page</span>
    </h4>
    <div class="table-responsive" style="margin-left:0%;margin-bottom:50px">
        <table class="timetable_sub">
            <thead>
                <tr>
                    <th>SL No.</th>
                    <th>Bill ID</th>
                    <th>Date Order</th>
                    <th>Payment</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <input type="hidden" value="{{$i=1}}">
                @foreach ($array as $item)
                <tr class="rem1">
                    <td class="invert">{{$i++}}</td>
                    <td class="invert">{{$item->bill_id}}</td>
                    <td class="invert">{{$item->date_order}}</td>
                    <td class="invert">{{$item->payment}}</td>
                    <td class="invert">{{$item->total}}</td>
                    @if($item->status_bill == 1)
                        <td>Paid</td>
                    @else
                        <td>Unpaid</td>
                    @endif
                    <td class="invert"><input type="submit" data-bill="{{ $item->bill_id }}" data-status="{{ $item->status }}" data-id="{{ $item->id_product }}" data-rate="{{ $item->average }}" data-promotion="{{ $item->promotion_price }}" data-img="{{ $item->img }}" data-unit="{{ $item->unit_price }}" data-name="{{ $item->name }}" value="Show details" data-toggle="modal" data-target="#myModal" class="btnShow btn btn-danger"></td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>



 <!-- Modal -->
 <div class="modal fade " id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Details</h4>
        </div>
        <div class="modal-body table-responsive">
            <table class="timetable_sub">
                <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Unit Price</th>
                        <th>Promotion Price</th>
                        <th>Rating</th>
                    </tr>
                </thead>
                <tbody>
                    <input type="hidden" value="{{$i=1}}">
                    <input type="hidden" id="id_product">
                    <input type="hidden" id="id_bill">
                    <tr class="rem1">
                        <td class="invert">{{$i++}}</td>
                        <td class="invert"><p id="txtName"></p></td>
                        <td class="invert"><img src="" style="width: 100px;height:100px" alt="" id="img-product"></td>
                        <td class="invert"><p id="txtUnitPrice"></p></td>
                        <td class="invert"><p id="txtPromotionPrice"></p></td>
                        <td class="invert">
                            <p class="txtRate" style="display: none">You must pay for rating</p>
                            <div class="rating" aria-disabled="true">
                                <span class="starRating">
                                    {{ csrf_field() }}
                                    <input id="rating5" class="rating5" type="radio" name="rating" value="5">
                                    <label for="rating5">5</label>
                                    <input id="rating4" class="rating4" type="radio" name="rating" value="4">
                                    <label for="rating4">4</label>
                                    <input id="rating3" class="rating3" type="radio" name="rating" value="3">
                                    <label for="rating3">3</label>
                                    <input id="rating2" class="rating2" type="radio" name="rating" value="2">
                                    <label for="rating2">2</label>
                                    <input id="rating1" class="rating1" type="radio" name="rating" value="1">
                                    <label for="rating1">1</label>
                                </span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" id="" class="btnClose btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
</div>
<script>
    $(document).ready(function(){
        $('.btnShow').click(function(){
            $('#id_product').attr('value',$(this).data('id'));
            $('#id_bill').attr('value',$(this).data('bill'));
            $('#txtName').text($(this).data('name'));
            $('#img-product').attr('src','source/images/'+$(this).data('img'))
            $('#txtUnitPrice').text($(this).data('unit')+' VND');
            $('#txtPromotionPrice').text($(this).data('promotion')+' VND');
            var status = parseInt($(this).data('status'));
            if(status != 1){
                $('.rating').hide();
            }else{
                $('.rating').show();
                var rating  = parseInt($(this).data('rate'));
                console.log(rating);
                if(rating == 5){
                    $('#rating5').attr( 'checked', true );
                }else if(rating == 4){
                    $('#rating4').attr( 'checked', true );
                }else if(rating == 3){
                    $('#rating3').attr( 'checked', true );
                }else if(rating == 2){
                    $('#rating2').attr( 'checked', true );
                }else if(rating == 1){
                    $('#rating1').attr( 'checked', true );
            }
            }

        });
        $('#rating5').on('click',function(){
            var rating = $(this).val();
            var id_product = $('#id_product').val();
            var id_bill = $('#id_bill').val();
            if(rating!=""){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('rating-product') }}",
                    method:"POST",
                    data:{rating:rating, bill_id:id_bill,id_product:id_product, _token:_token},
                    success:function(data){
                        alert(data)
                    }
                });
            }
        });
        $('#rating4').on('click',function(){
            var rating = $(this).val();
            var id_product = $('#id_product').val();
            var id_bill = $('#id_bill').val();
            if(rating!=""){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('rating-product') }}",
                    method:"POST",
                    data:{rating:rating, bill_id:id_bill, id_product:id_product, _token:_token},
                    success:function(data){
                        alert(data)
                    }
                });
            }
        });
        $('#rating3').on('click',function(){
            var rating = $(this).val();
            var id_product = $('#id_product').val();
            var id_bill = $('#id_bill').val();
            if(rating!=""){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('rating-product') }}",
                    method:"POST",
                    data:{rating:rating, bill_id:id_bill, id_product:id_product, _token:_token},
                    success:function(data){
                        alert(data)
                    }
                });
            }
        });
        $('#rating2').on('click',function(){
            var rating = $(this).val();
            var id_product = $('#id_product').val();
            var id_bill = $('#id_bill').val();
            if(rating!=""){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('rating-product') }}",
                    method:"POST",
                    data:{rating:rating, bill_id:id_bill, id_product:id_product, _token:_token},
                    success:function(data){
                        alert(data)
                    }
                });
            }
        });
        $('#rating1').on('click',function(){
            var rating = $(this).val();
            var id_product = $('#id_product').val();
            var id_bill = $('#id_bill').val();
            if(rating!=""){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('rating-product') }}",
                    method:"POST",
                    data:{rating:rating, bill_id:id_bill, id_product:id_product, _token:_token},
                    success:function(data){
                        alert(data)
                    }
                });
            }
        });
    });
</script>
@endsection
