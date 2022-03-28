@php
use App\Helper\NhanhService;
@endphp

@extends("enduser.layout")

@section('content')
    <style>
        .coupon-item select {
            border: none;
        }

    </style>
    @include("enduser.partials.breadcrumb", [ 'mainpage' => "Trang chủ",'name' =>'Thanh toán'])

    @php

    $fields = ['name', 'email', 'phone', 'address', 'province_id', 'district_id', 'ward_id', 'payment_method'];
    $fieldValue = [];

    foreach ($fields as $key => $value) {
        if (old($value)) {
            $fieldValue[$value] = old($value);
        } else {
            if($value == "name"){
                $fieldValue[$value] = $user->fullName();
            }else{
                $fieldValue[$value] = $user->{$value};
            }

        }
    }

    @endphp
    <div class="cart-layout checkout-layout">
        <div class="container">
            <div class="cart-layout-wrapper">
                <h3>Thanh toán</h3>
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ Session::get('success') }}
                    </div>
                @endif

                <form id="frmCheckout" class="authen-form" action="{{ route('order.postCheckout') }}" method="POST">
                    <div class="row">
                        <div class="col-lg-7">

                            <div class="checkout-info-wrapper">

                                @csrf
                                @php
                                    $addresses = $user
                                        ->addresses()
                                        ->orderBy('address.id', 'desc')
                                        ->get();
                                @endphp
                                @if (count($addresses) > 0)
                                    @error('chooseAddressCurrent')
                                        <div class="alert alert-danger  mt-2">{{ $message }}</div>
                                    @enderror
                                    <div class="address-list-wrapper">
                                        <div class="form-group address-list-wrapper">
                                            @php
                                                $old_address = old("address_id");
                                            @endphp
                                            @foreach ($addresses as $k => $address)
                                                <div class="address-item">
                                                    <div class="address-action d-flex align-items-center">
                                                        <input @if($old_address == $address->id)) checked @endif value="{{ $address->id }}" type="radio" name="address_id">
                                                    </div>
                                                    <h4 class="address-name">Your address {{ $k + 1 }}</h4>
                                                    <div class="address-col d-flex align-items-center bold"><img
                                                            src="{{ asset('enduser/assets/icons/icon-home.svg') }}"
                                                            alt="">{{ $address->address }}</div>
                                                    <div class="address-col d-flex align-items-center"> <img
                                                           src="{{ asset('enduser/assets/icons/icon-phone-outline.svg') }}"
                                                            alt="">{{ $address->phone }}</div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-item">
                                            <button class="btn primary another-address-action">Chọn địa chỉ giao hàng
                                                khác</button>
                                        </div>
                                    </div>
                                @endif
                                <input type="hidden" name="typeAddress" value="{{ old('typeAddress', count($addresses)) }}">
                                @php
                                    $classActiveForm = '';
                                    $classActiveAddress = '';
                                    if ($errors->has('name') || $errors->has('email') || $errors->has('phone') || $errors->has('address') || $errors->has('province_id') || $errors->has('district_id') || $errors->has('ward_id')) {
                                        $classActiveForm = 'active';
                                        $classActiveAddress = 'hide';
                                    } elseif($errors->has('chooseAddressCurrent')){
                                        $classActiveForm = '';
                                    }
                                @endphp
                                <div class="another-address-wrapper @if (count($addresses) <= 0) active @endif {{ $classActiveForm }}">
                                    <div class="form-group">
                                        <div class="form-item">
                                        <label>Họ và tên <span style="color:red">*</span></label>
                                            <input name="name" value="{{ $fieldValue['name'] }}"
                                                class="@error('name') is-invalid @enderror" type="text"
                                                placeholder="Họ và tên">
                                            @error('name')
                                                <div class="alert alert-danger  mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group half">
                                        <div class="form-item">
                                            <label>Địa chỉ email <span style="color:red">*</span></label>
                                            <input name="email" value="{{ $fieldValue['email'] }}"
                                                class="@error('email') is-invalid @enderror" type="text"
                                                placeholder="Email">
                                            @error('email')
                                                <div class="alert alert-danger  mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-item">
                                            <label>Số điện thoại <span style="color:red">*</span></label>
                                            <input name="phone" value="{{ $fieldValue['phone'] }}"
                                                class="@error('phone') is-invalid @enderror" type="text"
                                                placeholder="Điện thoại">
                                            @error('phone')
                                                <div class="alert alert-danger  mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-item">
                                            @php
                                                $provinces = \App\Province::orderBy('_name', 'asc')->get();
                                            @endphp
                                            <label>Chọn tỉnh <span style="color:red">*</span></label>
                                            <select name="province_id" value="{{ $fieldValue['province_id'] }}"
                                                class="@error('province_id') is-invalid @enderror custom-select"
                                                id="select_tinh">
                                                <option value="default">Chọn tỉnh</option>
                                                @foreach ($provinces as $k => $item)
                                                    <option
                                                        {{ $fieldValue['province_id'] == $item->id ? 'selected' : '' }}
                                                        value="{{ $item->id }}">{{ $item->_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('province_id')
                                                <div class="alert alert-danger  mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="hidden" name="CityName">
                                    <input type="hidden" name="DistrictName">
                                    <input type="hidden" name="WardName">

                                    <div class="form-group half">
                                        <div class="form-item">
                                        <label>Chọn Quận/Huyện <span style="color:red">*</span></label>
                                            <select value="{{ $fieldValue['district_id'] }}" name="district_id"
                                                class="@error('district_id') is-invalid @enderror custom-select"
                                                id="select_quan">
                                                <option value="default">Chọn Quận/Huyện</option>
                                            </select>
                                            @error('district_id')
                                                <div class="alert alert-danger  mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-item">
                                        <label>Chọn Phường/Xã <span style="color:red">*</span></label>
                                            <select name="ward_id" value="{{ $fieldValue['ward_id'] }}"
                                                class="@error('ward_id') is-invalid @enderror custom-select"
                                                id="select_phuong">
                                                <option value="default">Chọn Phường/Xã</option>
                                            </select>
                                            @error('ward_id')
                                                <div class="alert alert-danger  mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-item">
                                        <label>Địa chỉ <span style="color:red">*</span></label>
                                            <input name="address" value="{{ $fieldValue['address'] }}"
                                                class="@error('address') is-invalid @enderror" type="text"
                                                placeholder="Địa chỉ">
                                        </div>
                                        @error('address')
                                            <div class="alert alert-danger  mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                     <label><strong>Ghi chú: </strong>(<span style="color:red; margin-bottom: 5px;">*</span>) bắt buộc phải nhập</label>


                                    {{-- <div class="form-group"> --}}
                                    {{-- <div class="form-item"> --}}
                                    {{-- <button type="button" class="btn primary btn-tinh-ship">Tính ship</button> --}}
                                    {{-- </div> --}}
                                    {{-- </div> --}}
                                </div>
                                {{-- <h4 class="form-title">Đơn vị vận chuyển</h4> --}}
                                {{-- <div class="form-group payment-method donvivanchuyen"> --}}
                                {{-- @foreach ($donvivanchuyen as $k => $donvi) --}}
                                {{-- <div class="form-item radio"> --}}
                                {{-- <input value="{{ $donvi->id }}" type="radio" name="inp_donvivanchuyen" id="ship-cod-{{ $k }}"> --}}
                                {{-- <label class="d-flex align-items-center" for="ship-cod-{{ $k }}"><img src="{{ $donvi->logo }}" alt="">{{ $donvi->name }}</label> --}}
                                {{-- </div> --}}
                                {{-- @endforeach --}}
                                {{-- </div> --}}
                                <h4 class="form-title">Phương thức thanh toán</h4>
                                @error('payment_method')
                                    <div class="alert alert-danger  mt-2">{{ $message }}</div>
                                @enderror
                                @error('bank_payment')
                                    <div class="alert alert-danger  mt-2">{{ $message }}</div>
                                @enderror

                                @php
                                    $checkOnlyCourseNoShip = true;
                                    $cart = Cart::getContent();
                                    foreach ($cart as $v) {
                                        if ((isset($v->attributes['compo_id']) && $v->attributes['compo_id'] != 0) || $v->attributes['type'] == 'product') {
                                            $checkOnlyCourseNoShip = false;
                                        }
                                    }
                                    $payment_method = old("payment_method");
                                @endphp
                                <div class="form-group payment-method">
                                    <div class="form-item radio">
                                        <input @if($payment_method == "cod") checked @endif @if ($checkOnlyCourseNoShip) disabled @endif value="cod" type="radio" name="payment_method"
                                            id="ship-cod">
                                        <label class="d-flex align-items-center" for="ship-cod">
                                            <img src="{{ asset('enduser/assets/icons/icon-delivery.svg') }}" alt="">Ship
                                            COD
                                        </label>
                                    </div>
                                    {{-- <div class="form-item radio"> --}}
                                    {{-- <input type="radio" name="payment-method" id="card"> --}}
                                    {{-- <label class="d-flex align-items-center" for="card"><img src="./assets/icons/icon-credit-card.svg" alt="">Thanh toán bằng thẻ quốc tế Visa, Master, JCB</label> --}}
                                    {{-- </div> --}}
                                    @php
                                        $banks = \App\Bank::where('status', 'active')->get();
                                    @endphp
                                    @if (count($banks) > 0)
                                        <div class="form-item radio">
                                            <input  @if($payment_method == "bank") checked @endif value="bank" type="radio" name="payment_method" id="mobile-banking">
                                            <label class="d-flex align-items-center" for="mobile-banking">
                                                <img src="{{ asset('enduser/assets/icons/icon-bank.svg') }}" alt="">Thẻ
                                                ATM nội địa / Internet Banking
                                            </label>

                                        </div>
                                        <div class="list-atm">
                                            @foreach ($banks as $k => $bank)
                                                <div class="form-subitem">
                                                    <input @if($payment_method == "bank")
                                                            @php
                                                                $bank_id_old = old("bank_payment");
                                                            @endphp
                                                            @if($bank_id_old == $bank->id)
                                                            checked
                                                            @endif
                                                           @endif value="{{ $bank->id }}" type="radio" name="bank_payment"
                                                        id="mobile-banking{{ $bank->id }}">
                                                    <label class="d-flex align-items-center"
                                                        for="mobile-banking{{ $bank->id }}">
                                                        <img src="{{ $bank->getImage() }}" alt="">{{ $bank->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    {{-- <div class="form-item radio"> --}}
                                    {{-- <input type="radio" name="payment-method" id="momo"> --}}
                                    {{-- <label class="d-flex align-items-center" for="momo"><img src="./assets/images/payment-momo.png" alt="">Thanh toán bằng ví MoMo</label> --}}
                                    {{-- </div> --}}
                                    {{-- <div class="form-item radio"> --}}
                                    {{-- <input type="radio" name="payment-method" id="zalo-pay"> --}}
                                    {{-- <label class="d-flex align-items-center" for="zalo-pay"><img src="./assets/images/payment-zalopay.png" alt="">Thanh toán bằng ZaloPay</label> --}}
                                    {{-- </div> --}}
                                </div>
                                {{-- <div class="line"> </div> --}}
                                <div class="form-group half">
                                    <div class="form-item"><a href="#">Quay lại giỏ hàng</a></div>
                                </div>

                            </div>

                        </div>
                        <div class="col-lg-5">
                            <div class="checkout-products">
                                <div class="product-list-wrapper">
                                    @php
                                        $cart = Cart::getContent();
                                        $total = 0;

                                    @endphp
                                    @if ($cart->count() > 0)
                                        @foreach ($cart as $v)
                                            @php
                                                $compo = null;
                                                if ($v->attributes->compo_id) {
                                                    $compo = \App\Compo::find($v->attributes->compo_id);
                                                }
                                                $type = $v->attributes->type;
                                                if ($type == 'course') {
                                                    $linkImage = $v['attributes']['picture'];
                                                } else {
                                                    $linkImage = $v['attributes']['picture'];
                                                }

                                            @endphp
                                            <div class="product-checkout-item d-flex">
                                                <div class="product-image"> <img src="{{ $linkImage }}" alt="">
                                                    <div class="product-amount">{{ $v->quantity }}</div>
                                                </div>
                                                <div class="product-info"> <a class="product-title" href="#">
                                                        {{ $v->name }}</a>
                                                    @if ($compo)
                                                        <p>Combo khóa học: {{ $compo->name }}</p>
                                                    @endif
                                                    @if ($type == 'product')
                                                        @php
                                                            $id = explode('-', $v->id)[1];
                                                            $product = \App\Product_products::find($id);
                                                            $warehouse = $product->warehouse;
                                                        @endphp
                                                        @if ($warehouse)
                                                            <p><span><img style="width: 18px;"
                                                                       src="https://anyclass.vn/enduser/assets/icons/icon-home.svg"
                                                                        alt=""></span>
                                                                <span>{{ $warehouse->address }}</span>
                                                            </p>
                                                        @endif
                                                    @endif
                                                </div>
                                                @if ($compo)
                                                    @php
                                                        $total += $compo->price;
                                                    @endphp
                                                    <div class="product-price">{{ number_format($compo->price) }} đ
                                                    </div>
                                                @else
                                                    @php
                                                        $total += $v->price;
                                                    @endphp
                                                    <div class="product-price">{{ number_format($v->price) }} đ </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="line">
                                    </div>
                                    <div class="checkout-code-wrapper">
                                        <p>Bạn có mã giảm giá ?</p>
                                        <div class="form-checkout-code authen-form" action="#">
                                            <div class="form-group d-flex">
                                                <input id="inp_coupon" type="text" style="    flex: 1;
                        width: 100%;
                        height: 40px;
                            padding: 0 15px;
                        border: 1px solid #ddd;
                        margin: 0 8px 0 0;" placeholder="Nhập mã giảm giá">
                                                <input type="hidden" type="text" name="coupon_code">
                                                <button type="button" onclick="checkcoupon()" style="    width: auto;
                        margin: 0;" class="btn primary d-flex align-items-center"> <img
                                                        src="{{ asset('enduser/assets/icons/icon-giftbox-white.svg') }}"
                                                        alt="">Đồng ý</button>
                                            </div>
                                        </div>
                                        @php
                                            $coupons = \App\Coupon::where('status', 'active')->get();
                                        @endphp
                                        <div class="form-group">
                                            <label for="note">Ghi chú</label>
                                            <textarea class="form-control" name="note"></textarea>
                                        </div>
                                    </div>
                                    <div class="line"> </div>
                                    <div class="checkout-line d-flex justify-content-between align-items-center">
                                        <p>Subtotal:</p><strong id="txt_subtotal">{{ number_format($total) }} đ</strong>
                                        <input type="hidden" name="sub_total" value="{{ $total }}">
                                    </div>
                                    <div id="apply_coupon">
                                    </div>
                                    <div class="checkout-line d-flex justify-content-between align-items-center">
                                        @php
                                            $ship = 0;
                                            $total += $ship;
                                        @endphp
                                        <p>Phí vận chuyển:</p><strong id="shipFee">-</strong>
                                        <input id="value_shipfee" type="hidden" value="0">

                                    </div>

                                    <div class="line"> </div>
                                    <div class="checkout-line d-flex justify-content-between align-items-center">
                                        <p>Tổng:</p><strong class="big" id="total_price">{{ number_format($total) }}
                                            đ</strong>
                                    </div>

                                    <button class="btn primary w-100 mt-4" type="button" onclick="submitCheckout()">Tiến
                                        hành thanh toán</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop

@section('script')

    <script>
        var address_id = "0";
        var donvivanchuyen = "0";
        var province_name = "";
        var district_name = "";
        var checkShip = false;
        var classActiveAddress = {!! json_encode($classActiveAddress) !!};

        const addressList = document.querySelector('.address-list-wrapper')

        if (classActiveAddress == 'hide' && addressList) {
            addressList.style.display = 'none';
        }

        function tinh(id_tinh) {
            layHuyenTheoTinh(id_tinh);
            var selectedText = $("#select_tinh option:selected").text();
            province_name = selectedText;
            $("input[name='CityName']").val(selectedText);

            district_name = '';
            $("input[name='DistrictName']").val(district_name);
            $("input[name='WardName']").val('');

            getShippingFeeById(province_name, district_name);
        }

        function huyen(id_huyen) {
            layXaTheoHuyen(id_huyen);
            var selectedText = $("#select_quan option:selected").text();
            district_name = selectedText;
            $("input[name='DistrictName']").val(selectedText);

            $("input[name='WardName']").val('');
            getShippingFeeById(province_name, district_name);
        }

        var province_id = {!! json_encode(old('province_id')) !!};
        var district_id = {!! json_encode(old('district_id')) !!};
        var ward_id = {!! json_encode(old('ward_id')) !!};

        if (province_id && province_id != 'default') {
            tinh(province_id);
        }

        if (district_id && district_id != 'default') {
            console.log('vao huyen');
            huyen(district_id);
        }

        $("#select_tinh").change(function() {
            var id_tinh = $(this).val();
            tinh(id_tinh);
        });

        function layHuyenTheoTinh(id_tinh) {
            $("body").append(
                '<div id="overlay"><img class="img_spin" src="{{ asset('enduser/assets/images/spin.png') }}" alt=""></div>'
            );
            $("#select_quan").html('');
            $.ajax({
                url: '{{ route('ajax.getDistrict') }}?id_tinh=' + id_tinh,
                dataType: "html",
                success: function(data) {

                    String.prototype.splice = function(idx, rem, str) {
                        return this.slice(0, idx) + str + this.slice(idx + Math.abs(rem));
                    };

                    var index = data.indexOf(`value="${district_id}"`);

                    var result = data.splice(index, 0, "selected ");

                    if (district_id) {
                        $("#select_quan").html(result);
                    } else {
                        $("#select_quan").html(data);
                    }

                    $("#select_quan").change(function() {
                        var id_huyen = $(this).val();
                        huyen(id_huyen);
                    });
                    $("#overlay").remove();
                },

            });
        }

        function layXaTheoHuyen(id_huyen) {
            $("body").append(
                '<div id="overlay"><img class="img_spin" src="{{ asset('enduser/assets/images/spin.png') }}" alt=""></div>'
            );
            $("#select_phuong").html('');
            $.ajax({
                url: '{{ route('ajax.getWard') }}?id_huyen=' + id_huyen,
                dataType: "html",
                success: function(data) {

                    String.prototype.splice = function(idx, rem, str) {
                        return this.slice(0, idx) + str + this.slice(idx + Math.abs(rem));
                    };

                    var index = data.indexOf(`value="${ward_id}"`);

                    var result = data.splice(index, 0, "selected ");

                    var selectedText = $("#select_quan option:selected").text();
                    district_name = selectedText;
                    console.log('huyen');
                    console.log(district_name);
                    $("input[name='DistrictName']").val(selectedText);
                    if(district_name != "" && province_name != ""){
                        getShippingFeeById(province_name, district_name);
                    }
                    if (ward_id) {
                        $("#select_phuong").html(result);
                    } else {
                        $("#select_phuong").html(data);
                    }

                    $("#select_phuong").change(function() {
                        var selectedText = $("#select_phuong option:selected").text();
                        $("input[name='WardName']").val(selectedText);
                    });
                    $("#overlay").remove();
                }
            });
        }

        function getShippingFee() {
            checkShip = false;
            var v_address_id = address_id;
            //var v_donvivanchuyen = donvivanchuyen;
            if (v_address_id == 0) {
                return;
            }
            $("body").append(
                '<div id="overlay"><img class="img_spin" src="{{ asset('enduser/assets/images/spin.png') }}" alt=""></div>'
            );
            //var donvivanchuyen = $('input[name="inp_donvivanchuyen"]:checked').val();


            $.ajax({
                url: '{{ route('ajax.getShipping') }}',
                data: {
                    'address_id': address_id
                },
                dataType: 'html',
                success: function(data) {
                    var fee = data;
                    $("#value_shipfee").val(fee);
                    $("#shipFee").text(number_format(fee) + " đ");
                    var sub_total = parseInt($("input[name='sub_total']").val());
                    var feeInt = parseInt(fee);
                    var total = sub_total + feeInt;

                    $("#total_price").text(number_format(total) + " đ");
                    $("#overlay").remove();
                    checkShip = true;
                },
                error: function() {
                    alert('Lỗi tính phí vận chuyển');
                    $("#overlay").remove();
                }
            });
        }

        function getShippingFeeById(province, district) {
            checkShip = false;
            if (province == "" || district == "") {
                $("#shipFee").text("Chưa xác định");
                return;
            }
            $("body").append(
                '<div id="overlay"><img class="img_spin" src="{{ asset('enduser/assets/images/spin.png') }}" alt=""></div>'
            );

            $.ajax({
                url: '{{ route('ajax.getShipping') }}',
                data: {
                    'province_name': province,
                    'district_name': district
                },
                dataType: 'html',
                success: function(data) {
                    var fee = data;
                    $("#shipFee").text(number_format(fee) + " đ");
                    var sub_total = parseInt($("input[name='sub_total']").val());
                    var feeInt = parseInt(fee);
                    var total = sub_total + feeInt;

                    $("#total_price").text(number_format(total) + " đ");
                    $("#overlay").remove();
                    checkShip = true;
                },
                error: function() {
                    alert('Lỗi tính phí vận chuyển');
                    $("#overlay").remove();
                }
            });
        }

        function number_format(number, decimals, dec_point, thousands_point) {

            if (number == null || !isFinite(number)) {
                throw new TypeError("number is not valid");
            }

            if (!decimals) {
                var len = number.toString().split('.').length;
                decimals = len > 1 ? len : 0;
            }

            if (!dec_point) {
                dec_point = '.';
            }

            if (!thousands_point) {
                thousands_point = ',';
            }

            number = parseFloat(number).toFixed(decimals);

            number = number.replace(".", dec_point);

            var splitNum = number.split(dec_point);
            splitNum[0] = splitNum[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_point);
            number = splitNum.join(dec_point);

            return number;
        }
        $("input[name='address_id']").change(function() {
            var id = $(this).val();
            address_id = id;
            getShippingFee();
        });
        $("input[name='inp_donvivanchuyen']").change(function() {
            var id = $(this).val();
            donvivanchuyen = id;
            getShippingFee();
            getShippingFeeById(province_name, district);
        });
        $(".btn-tinh-ship").click(function() {
            var province = $("input[name='CityName']").val();
            var district = $("input[name='DistrictName']").val();

            if (province != "" && district != "") {
                getShippingFeeById(province, district);
            } else {
                alert('Vui lòng chọn địa chỉ hợp lệ')
            }
        });
    </script>
    <script>
        function submitCheckout() {
            if(checkShip){
                $("#frmCheckout").submit();
            }else{
                toastr.error('Vui lòng chọn địa chỉ chính xác', 'Có lỗi');
            }
        }
        $("#select_coupon").change(function() {
            var v = $(this).val();
            if (v != "default") {
                $("#inp_coupon").val(v);
            }
        })

        function checkcoupon() {
            var code = $("#inp_coupon").val();
            $("body").append(
                '<div id="overlay"><img class="img_spin" src="{{ asset('enduser/assets/images/spin.png') }}" alt=""></div>'
            );
            $.ajax({
                url: "{{ route('checkCoupon') }}",
                data: {
                    "code": code
                },
                dataType: "json",
                method: "GET",
                success: function(res) {
                    $("#apply_coupon").html('');
                    if (res.status == "success") {
                        var data = res.data;
                        var code = data.code;
                        var type = data.type;
                        var value = data.value;


                        var sub_total = parseInt($("input[name='sub_total']").val());
                        var subtotal;
                        var strDisplay = "";
                        if (type == 0) {
                            subtotal = sub_total - sub_total * value / 100;
                            strDisplay = value + "%";
                        } else {
                            subtotal = sub_total - value;
                            strDisplay = number_format(value) + " đ";
                        }

                        var ship = parseInt($("#value_shipfee").val());
                        var total = subtotal + ship;


                        $("input[name='sub_total']").val(subtotal);
                        //$("#txt_subtotal").text(number_format(subtotal) + " đ");
                        $("#total_price").text(number_format(total) + " đ");


                        var templateHtml = `<div class="checkout-line d-flex justify-content-between align-items-center">
                                               <p>Mã khuyến mãi: <span class="text-success text-bold">` + code + `</span></p>
                                               <strong class="text-success">-` + strDisplay + `</strong>
                                           </div>`;
                        $("#apply_coupon").html(templateHtml);

                        $("input[name='coupon_code']").val(code);
                        toastr.success('Thêm mã giảm giá thành công', 'Thành công');
                        $("#overlay").remove();

                    } else {
                        toastr.error('Mã không tồn tại hoặc hết hạn', 'Thất bại');
                        $("input[name='coupon_code']").val('');
                        $("#overlay").remove();
                    }
                },
                error: function() {
                    toastr.error('Mã không tồn tại hoặc hết hạn', 'Thất bại');
                    $("#apply_coupon").html('');
                    $("input[name='coupon_code']").val('');
                    $("#overlay").remove();
                }
            })
        }
    </script>
    <script>
        $(document).ready(function() {
            var sub = $(".list-atm");
            if ($("#mobile-banking").is(":checked")) {
                sub.show(100);
            } else {
                resetForm();
                sub.hide();
            }
            // get address
            var address_id_old =$("input[name='address_id']").val();
            if(address_id && address_id != "" && address_id != "0"){
                address_id = address_id_old;
                console.log('dia chi');
                console.log(address_id);
                getShippingFee();
            }
            var id_address = $("input[name='address_id']:checked").val();
            if(id_address && id_address != null && id_address != ""){
                address_id = id_address;
                getShippingFee();
            }


        });
        $("input[name='payment_method']").change(function() {
            var checked = $("#mobile-banking").is(":checked");
            var sub = $(".list-atm");
            if (checked) {
                sub.show(100);
            } else {
                resetForm();
                sub.hide(100);
            }
        });

        function resetForm() {
            $(".list-atm .form-subitem input[type='radio']").prop("checked", false);
        }
    </script>
@stop
