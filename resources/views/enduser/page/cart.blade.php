@extends("enduser.layout")

@section('content')

    @include("enduser.partials.breadcrumb",[ 'mainpage' => 'Trang chủ','name' => 'Giỏ hàng' ])
   <style>
       span {cursor:pointer; }
       .number{
           /* margin:100px; */
       }
       .minus, .plus{
           width: 40px;
           height: 31px;
           background:#f2f2f2;
           border-radius:4px;
           line-height: 40px;
           border:1px solid #ddd;
           display: inline-block;
           vertical-align: middle;
           text-align: center;
       }
       input{
           height:34px;
           width: 100px;
           text-align: center;
           font-size: 26px;
           border:1px solid #ddd;
           border-radius:4px;
           display: inline-block;
           vertical-align: middle;

   </style>
   <div class="cart-layout">
       <div class="container">
           <div class="cart-layout-wrapper">
               <h3>Giỏ hàng của bạn</h3>
               @if(Session::has('cartRemove'))
                   <div class="alert alert-success alert-dismissible w-100 mt-2">
                       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                       {{ Session::get('cartRemove') }}

                   </div>
               @endif
               @if(Session::has('cartUpdate'))
                   <div class="alert alert-success alert-dismissible w-100 mt-2">
                       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                       {{ Session::get('cartUpdate') }}

                   </div>
               @endif
               @if($cart->count() > 0)

               <div class="cart-wrapper cart_component">
                   <div class="table-wrapper">
                       <table class="cart-table">
                           <thead>
                           <tr>
                               <td class="item-image">Hình ảnh</td>
                               <td class="item-name">Tên sản phẩm </td>
                               <td class="item-category">Thể loại</td>
                               <td class="item-price">Giá</td>
                               <td class="item-amount">Số lượng</td>
                               <td class="item-price">Tổng tiền</td>
                           </tr>
                           </thead>
                           <tbody>
                           @php
                           $total = 0;
                           @endphp
                           @foreach($cart as $v)
                               @php
                                    $type = $v->attributes->type;
                                    if($type == "course"){
                                        $linkImage = $v['attributes']['picture'];
                                    }else{
                                        $linkImage = $v['attributes']['picture'];
                                    }
                                    $type_name = \App\Helper\Common::showTypeProductName($type);

                                    $compo = null;

                                    if($v->attributes->compo_id){
                                        $compo = \App\Compo::find($v->attributes->compo_id);
                                    }

                               @endphp

                                   <tr>
                                       <td class="item-image"> <img  class="lazyload" data-src="{{ $linkImage }}" alt=""></td>
                                       <td class="item-name">
                                           <a href="#">{{$v->name}}</small> </a>
                                           @if($compo)
                                               <span>{{ $compo->name }}</span>
                                           @endif
                                       </td>
                                       <td>
                                           {!! $type_name !!}
                                       </td>
                                       <td class="item-price">

                                           @if($compo)
                                               @php
                                                     $sub_total =  $compo->price;
                                                       $total += $compo->price;
                                               @endphp
                                               <span>{{ number_format($compo->price)  }}đ</span>
                                           @else
                                               @php
                                                  $sub_total =  $v->price * $v->quantity;
                                                   $total += $sub_total;
                                               @endphp
                                               <strong>{{ number_format($v->price)  }}đ</strong>
                                           @endif
                                       </td>
                                       <td class="item-amount">
                                           @if($type == "product")
                                               <form action="{{route('order.updateCart',['id'=>$v->id])}}" method="POST">
                                                   <div class="amount-action d-flex align-items-center">
                                                       <button type="button" id="amountMinus">-</button>
                                                       <span id="amountValue">{{ $v->quantity }}</span>
                                                       <button type="button" id="amountPlus">+</button>
                                                       <input name="quantity" type="hidden" value="{{ $v->quantity }}">
                                                   </div>
                                                   @csrf
                                               </form>
                                           @else
                                               <form action="{{route('order.updateCart',['id'=>$v->id])}}" method="POST">
                                                   <div class="amount-action d-flex align-items-center">
                                                       <button type="button" id="amountMinus">-</button>
                                                       <span id="amountValue">{{ $v->quantity }}</span>
                                                       <button class="disabled" type="button" id="amountPlus">+</button>
                                                       <input name="quantity" type="hidden" value="{{ $v->quantity }}">
                                                   </div>
                                                   @csrf
                                               </form>
                                           @endif
                                       </td>
                                       <td class="item-price">
                                           <strong>{{ number_format($sub_total) }}đ</strong>
                                       </td>
{{--                                       <td class="item-action">--}}
{{--                                           <button type="button" class="action-delete"><a href="{{route('order.deleteCart',['id'=>$v->id])}}"><img class="lazyload" data-src="{{asset('enduser/assets/icons/icon-trash.svg')}}" alt=""></a></button>--}}
{{--                                       </td>--}}
                                   </tr>
                         @endforeach
{{--                           <tr>--}}
{{--                               <td class="item-image" style="padding: 20px 5px;">--}}
{{--                                   <p>Tổng phụ</p>--}}
{{--                               </td>--}}
{{--                               <td class="item-name"></td>--}}
{{--                               <td class="item-price"></td>--}}
{{--                               <td class="item-amount"></td>--}}
{{--                               <td class="item-amount"></td>--}}
{{--                               <td class="item-action">--}}
{{--                                   <p>{{ number_format($total) }} đ</p>--}}
{{--                               </td>--}}
{{--                           </tr>--}}

                           <tr>
                               <td class="item-image" style="padding: 20px 5px;">
                                   <h6>TỔNG</h6>
{{--                                   <small>(Không bao gồm phí vận chuyển)</small>--}}
                               </td>
                               <td class="item-name"></td>
                               <td class="item-price"></td>
                               <td class="item-amount"></td>
                               <td class="item-amount"></td>
                               <td class="item-action">
                                   <p>{{ number_format($total) }} đ</p>
                               </td>
                           </tr>
                           </tbody>
                       </table>
                   </div>
                   <div class="cart-action d-flex justify-content-between">
                       <div class="item d-flex flex-wrap">
                           <button class="btn primary-outline"><a style="color: black" href="{{route('course.courseList')}}">Tiếp tục mua sắm</a> </button>
                       </div>
                       <div class="item d-flex flex-wrap">
{{--                           <button class="btn primary-outline">Cập nhật giỏ hàng</button>--}}
                           <button class="btn primary"><a style="color: white" href="{{route('order.checkout')}}">Thanh toán</a> </button>
                       </div>
                   </div>
               </div>

               @else
               {{'Không có sản phẩm nào trong giỏ hàng'}}
                   @endif
           </div>
       </div>
   </div>


@section('script')
    <script >
{{--        @foreach($cart as $pro)--}}
{{--        $("#updatecart").on('change keyup', function(){--}}
{{--            var newQty = $(this).val();--}}
{{--            var rowID = $("#rowID{{$pro->id}}").val();--}}
{{--            $.ajax({--}}
{{--                url:'{{url('/cart/update')}}',--}}
{{--                data:'rowID=' + rowID + '&newQty=' + newQty,--}}
{{--                type:'get',--}}
{{--                dataType:'json',--}}
{{--                success:function(data){--}}
{{--                    console.log(data)--}}
{{--                  --}}{{--if(data.code == 200){--}}
{{--                  --}}{{--      $('.cart_component').html(data.cart_component);--}}
{{--                  --}}{{--      @php--}}
{{--                  --}}{{--          Session::flash('cartUpdate', 'Cập nhật sản phẩm vào giỏ hàng thành công !!');--}}
{{--                  --}}{{--      @endphp--}}
{{--                  --}}{{--}--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--        @endforeach--}}
    </script>
    @endsection
@endsection
