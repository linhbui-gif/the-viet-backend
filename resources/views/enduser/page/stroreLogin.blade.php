@extends("enduser.layout")

@section('css')
    <style>
        .authen-page label {
            display: block;
        }

        .authen-page input[type='text'],.authen-page input[type='password'] {
            display: block;
            border-radius: 4px;
            border: 1px solid #c9c9c9;
            min-width: 50%;
            padding: 2px 10px;
        }

        .authen-page .authen-form {
            overflow: hidden;
        }
        button.btn.btn-main-color {
            background: #f77826;
            color: #fff;
        }
        .authen-page .alert {
            padding: 2px 7px;
            display: inline-block;
            margin: 0px;
        }
        #typeCodeInput{
            display:none;
        }
    </style>
@stop

@section('content')
    <div class="hero-1">
        <div class="authen-page">
            <div class="container">
                <div class="authen-page-wrapper">
                    <h3>ĐĂNG NHẬP</h3>
                    <p>Vui lòng nhập Mã số và mật khẩu của bạn</p>
                    @if(Session::has('login') && !Session::get('login') )
                        <div class="alert alert-danger  mt-2">Tài khoản hoặc mật khẩu không đúng</div>
                    @endif
                    <form class="authen-form" action="{{ route('user.postlogin') }}" method="POST">
                        @csrf
                        @error('type')
                        <div class="alert alert-danger  mt-2">{{ $message }}</div>
                        @enderror
                        <div class="form-check choosetype">
                            <input value="1" class="form-check-input" type="radio" name="type" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Số thẻ
                            </label>
                        </div>
                        <div class="form-check choosetype">
                            <input value="2" class="form-check-input" type="radio" name="type" id="flexRadioDefault2" >
                            <label class="form-check-label" for="flexRadioDefault2">
                                Mã MS
                            </label>
                        </div>
                        <div class="form-check choosetype">
                            <input value="3" class="form-check-input" type="radio" name="type" id="flexRadioDefault3" >
                            <label class="form-check-label" for="flexRadioDefault3">
                                CMND/CCCD
                            </label>
                        </div>
                        <div class="form-check choosetype">
                            <input value="4" class="form-check-input" type="radio" name="type" id="flexRadioDefault4" >
                            <label class="form-check-label" for="flexRadioDefault4">
                                Mã số BHXH
                            </label>
                        </div>
                        <div class="form-group" id="typeCodeInput">
                            <div class="form-item">
                                <input type="text" class="@error('sothe') is-invalid @enderror" name="sothe" placeholder="Hãy nhập mã số của bạn">
                                @error('email')
                                <div class="alert alert-danger  mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-item">
                                <label>Mật khẩu <span>*</span></label>
                                <input type="password" class="@error('password') is-invalid @enderror" name="password" placeholder="Hãy nhập mật khẩu của bạn">
                                @error('password')
                                <div class="alert alert-danger  mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-item">
                                <button class="btn btn-main-color" type="submit">Đăng nhập</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@stop

@section('script')
    <script>
        $(".choosetype input[type='radio']").change(function(){
            var v = $(this).val();
            var checkRadio = $(".choosetype input[type='radio']:checked");
            showInput();

        })
        var checkRadio = $(".choosetype input[type='radio']:checked");
        if(checkRadio.length > 0){
            showInput();
        }
        function showInput(){
            $("#typeCodeInput").show();
        }
    </script>
@stop
