@extends("enduser.layout")

@section('css')
    <style>
        .authen-page label {
            display: block;
        }

        .authen-page input[type='text'], .authen-page input[type='password'] {
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

        #typeCodeInput {
            display: none;
        }

    </style>
@stop

@section('content')

    {{--    <div class="hero-1" style="height: initial">--}}
    {{--        <div class="authen-page">--}}
    {{--            @if(Session::has('user') && Session::get('user') != null)--}}
    {{--                <li class="nav-item"><a href="/postLogout" class="nav-link">Đăng xuất</a></li>--}}
    {{--            @endif--}}
    {{--            <div class="container">--}}
    {{--                <div class="authen-page-wrapper">--}}
    {{--                    <h3>Thông tin chủ thẻ</h3>--}}
    {{--                    <table class="table">--}}
    {{--                        <tbody>--}}
    {{--                        <tr>--}}
    {{--                            <td>PeopleCode</td>--}}
    {{--                            <td>{{ $user['PeopleCode'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>FirstName</td>--}}
    {{--                            <td>{{ $user['FirstName'] }}</td>--}}

    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>LastName</td>--}}
    {{--                            <td>{{ $user['LastName'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>FullName</td>--}}
    {{--                            <td>{{ $user['FullName'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>NickName</td>--}}
    {{--                            <td>{{ $user['NickName'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>Dob</td>--}}
    {{--                            <td>{{ $user['Dob'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>IsHasNotDayDob</td>--}}
    {{--                            <td>{{ $user['IsHasNotDayDob'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>GenderId</td>--}}
    {{--                            <td>{{ $user['GenderId'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>GenderCode</td>--}}
    {{--                            <td>{{ $user['GenderCode'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>GenderName</td>--}}
    {{--                            <td>{{ $user['GenderName'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>Phone</td>--}}
    {{--                            <td>{{ $user['Phone'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>Email</td>--}}
    {{--                            <td>{{ $user['Email'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>CmndNumber</td>--}}
    {{--                            <td>{{ $user['CmndNumber'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>CmndDate</td>--}}
    {{--                            <td>{{ $user['CmndDate'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>CmndPlace</td>--}}
    {{--                            <td>{{ $user['CmndPlace'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>WorkPlace</td>--}}
    {{--                            <td>{{ $user['WorkPlace'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>NationalName</td>--}}
    {{--                            <td>{{ $user['NationalName'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>EthnicName</td>--}}
    {{--                            <td>{{ $user['EthnicName'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>ReligionName</td>--}}
    {{--                            <td>{{ $user['ReligionName'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>ProvinceName</td>--}}
    {{--                            <td>{{ $user['ProvinceName'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>DistrictName</td>--}}
    {{--                            <td>{{ $user['DistrictName'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>CommuneName</td>--}}
    {{--                            <td>{{ $user['CommuneName'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>FullAddress</td>--}}
    {{--                            <td>{{ $user['FullAddress'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>RegisterCode</td>--}}
    {{--                            <td>{{ $user['RegisterCode'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>LastCardCode</td>--}}
    {{--                            <td>{{ $user['LastCardCode'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>AvatarUrl</td>--}}
    {{--                            <td>{{ $user['AvatarUrl'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>CmndBeforeUrl</td>--}}
    {{--                            <td>{{ $user['CmndBeforeUrl'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>CmndAfterUrl</td>--}}
    {{--                            <td>{{ $user['CmndAfterUrl'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>ProvinceCode</td>--}}
    {{--                            <td>{{ $user['ProvinceCode'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>DistrictCode</td>--}}
    {{--                            <td>{{ $user['DistrictCode'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>CommuneCode</td>--}}
    {{--                            <td>{{ $user['CommuneCode'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>NationalCode</td>--}}
    {{--                            <td>{{ $user['NationalCode'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>PassportNo</td>--}}
    {{--                            <td>{{ $user['PassportNo'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>Address</td>--}}
    {{--                            <td>{{ $user['Address'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>IsLoginByPhone</td>--}}
    {{--                            <td>{{ $user['IsLoginByPhone'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>HtDistrictName</td>--}}
    {{--                            <td>{{ $user['HtDistrictName'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>HtCommuneName</td>--}}
    {{--                            <td>{{ $user['HtCommuneName'] }}</td>--}}
    {{--                        </tr>--}}

    {{--                        <tr>--}}
    {{--                            <td>HtProvinceCode</td>--}}
    {{--                            <td>{{ $user['HtProvinceCode'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>HtDistrictCode</td>--}}
    {{--                            <td>{{ $user['HtDistrictCode'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>HtCommuneCode</td>--}}
    {{--                            <td>{{ $user['HtCommuneCode'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>HtAddress</td>--}}
    {{--                            <td>{{ $user['HtAddress'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>HtFullAddress</td>--}}
    {{--                            <td>{{ $user['HtFullAddress'] }}</td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>AppAvatarUrl</td>--}}
    {{--                            <td>{{ $user['AppAvatarUrl'] }}</td>--}}
    {{--                        </tr>--}}

    {{--                        <tr>--}}
    {{--                            <td>Bhyts</td>--}}
    {{--                            <td>--}}
    {{--                                <ul>--}}

    {{--                                    @if(isset( $user['Bhyts'][0]))--}}
    {{--                                        @php--}}
    {{--                                            $Bhyts = $user['Bhyts'][0];--}}
    {{--                                        @endphp--}}
    {{--                                        <li><b>PeopleCode</b>: {{ $Bhyts['PeopleCode'] }}</li>--}}
    {{--                                        <li><b>BhytNumber</b>: {{ $Bhyts['BhytNumber'] }}</li>--}}
    {{--                                        <li><b>FromTime</b>: {{ $Bhyts['FromTime'] }}</li>--}}
    {{--                                        <li><b>ToTime</b>: {{ $Bhyts['ToTime'] }}</li>--}}
    {{--                                        <li><b>Address</b>: {{ $Bhyts['Address'] }}</li>--}}
    {{--                                        <li><b>MediOrgCode</b>: {{ $Bhyts['MediOrgCode'] }}</li>--}}
    {{--                                        <li><b>MediOrgName</b>: {{ $Bhyts['MediOrgName'] }}</li>--}}
    {{--                                        <li><b>LiveCode</b>: {{ $Bhyts['LiveCode'] }}</li>--}}
    {{--                                    @endif--}}

    {{--                                </ul>--}}
    {{--                            </td>--}}
    {{--                        </tr>--}}
    {{--                        <tr>--}}
    {{--                            <td>Cards</td>--}}
    {{--                            <td>--}}
    {{--                                <ul>--}}

    {{--                                    @if(isset( $user['Cards'][0]))--}}
    {{--                                        @php--}}
    {{--                                            $card = $user['Cards'][0];--}}
    {{--                                        @endphp--}}
    {{--                                        <li><b>Id</b>: {{ $card['Id'] }}</li>--}}
    {{--                                        <li><b>CardCode</b>: {{ $card['CardCode'] }}</li>--}}
    {{--                                        <li><b>ServiceCode</b>: {{ $card['ServiceCode'] }}</li>--}}
    {{--                                        <li><b>BankCardCode</b>: {{ $card['BankCardCode'] }}</li>--}}
    {{--                                        <li><b>LinkCode</b>: {{ $card['LinkCode'] }}</li>--}}
    {{--                                        <li><b>IsActive</b>: {{ $card['IsActive'] }}</li>--}}
    {{--                                    @endif--}}

    {{--                                </ul>--}}
    {{--                            </td>--}}
    {{--                        </tr>--}}



    {{--                        </tbody>--}}
    {{--                    </table>--}}


    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div class="user-layout mb-50" style="    padding-top: 155px;">
        <div class="container">
            <div class="user-layout-wrapper">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="user-sidebar-component">
                            <div class="user-avatar"><img
                                    src="https://lh3.googleusercontent.com/a-/AOh14GhqGR8nUXsFCXC1iGyfkSgTbPEamgjd7_MhQMzEBw=s96-c"
                                    alt=""></div>
                            <div class="user-name">{{ $user['NickName']??"Nick Name" }}</div>
                            <div class="user-sidebar-list">
                                <a class="list-item d-flex align-items-center justify-content-between"
                                   href="#"> <span>Thông tin</span></a>
{{--                                <a class="list-item d-flex align-items-center justify-content-between"--}}
{{--                                   href="#"> <span>Quên mật khẩu</span></a>--}}
                                {{--                            <a class="list-item d-flex align-items-center justify-content-between" href="https://anyclass.vn/ma-giam-gia"> <span>Mã</span><img class="lazyload" data-src="https://anyclass.vn/enduser/assets/icons/icon-tickets.svg" alt=""></a>--}}

                                {{--                            <a class="list-item d-flex align-items-center justify-content-between" href="https://anyclass.vn/don-hang-cua-toi"> <span>Đơn hàng của tôi</span><img class="lazyload" data-src="https://anyclass.vn/enduser/assets/icons/icon-order.svg" alt=""></a>--}}
                                {{--                            <a class="list-item d-flex align-items-center justify-content-between" href="https://anyclass.vn/dia-chi"> <span>Địa chỉ</span><img class="lazyload" data-src="https://anyclass.vn/enduser/assets/icons/icon-order.svg" alt=""></a>--}}
                                {{--                            <a class="list-item d-flex align-items-center justify-content-between" href="https://anyclass.vn/khoa-hoc-cua-toi"> <span>Khoá học của tôi</span><img class="lazyload" data-src="https://anyclass.vn/enduser/assets/icons/icon-book.svg" alt=""></a>--}}


                                {{--                            <a class="list-item d-flex align-items-center justify-content-between" href="https://anyclass.vn/my-questions"> <span>Câu hỏi</span><img class="lazyload" data-src="https://anyclass.vn/enduser/assets/icons/icon-question.svg" alt=""></a>--}}
                                @if(Session::has('user') && Session::get('user') != null)
                                    <a class="list-item d-flex align-items-center justify-content-between"
                                       href="/postLogout"> <span>Đăng xuất</span></a>
                                            @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="user-layout-main">
                            <h3 class="layout-title">Thông tin cá nhân</h3>
                            <form lang="vn" method="POST" class="authen-form">
                                <div class="form-group half">
                                    <div class="form-item">
                                        <label>Họ && Tên </label>
                                        <input name="first_name" disabled value="{{ $user['FullName'] }}" type="text" placeholder="Họ">
                                    </div>
                                    <div class="form-item">
                                        <label>Ngày sinh</label>
                                        <input name="last_name"  value="{{ date("D/M/Y", $user['Dob'])  }}" type="text" placeholder="Tên">
                                    </div>
                                </div>
                                <div class="form-group half">
                                    <div class="form-item">
                                        <label>Số điện thoại :  </label>
                                        <input name="first_name" disabled value="{{ $user['Phone'] }}" type="text" placeholder="Họ">
                                    </div>
                                    <div class="form-item">
                                        <label>Email :  </label>
                                        <input name="first_name" disabled value="{{ $user['Email'] }}" type="text" placeholder="Email...">
                                    </div>

                                </div>
                                <div class="form-group half">

                                    <div class="form-item">
                                        <label>Giới tính : </label>
                                        <input name="last_name" disabled value="{{ $user['GenderName'] }}" type="text" placeholder="Tên">
                                    </div>
                                    <div class="form-item">
                                        <label>Địa chỉ : </label>
                                        <input name="last_name" disabled value="{{ $user['FullAddress'] }}" type="text" placeholder="Tên">
                                    </div>
                                </div>
                                <div class="form-group half">

                                    <div class="form-item">
                                        <label>Số CMND ( Chứng minh nhân dân ) : </label>
                                        <input name="last_name" disabled value="{{ $user['CmndNumber'] }}" type="text" placeholder="Tên">
                                    </div>
                                    <div class="form-item">
                                        <label>Nơi cấp : </label>
                                        <input name="last_name" disabled value="{{ $user['CmndPlace'] }}" type="text" placeholder="Tên">
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>

        .user-sidebar-component {
            box-shadow: 0 0 4px 0 rgba(0, 0, 0, .25);
            border-radius: 5px;
            padding: 10px;
            background: #fff;
            height: 100%
        }

        .user-sidebar-component .user-avatar {
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            max-width: 120px;
            margin: 15px auto 10px;
            border: 1px solid #ddd;
            position: relative
        }

        .user-sidebar-component .user-avatar img {
            width: 100%;
            height: 100%;
            -o-object-fit: cover;
            object-fit: cover;
            -o-object-position: center;
            object-position: center
        }

        .user-sidebar-component .user-avatar .avatar-upload {
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, .5);
            transition: .3s ease;
            opacity: 0
        }

        .user-sidebar-component .user-avatar .avatar-upload:hover {
            opacity: 1
        }

        .user-sidebar-component .user-avatar .avatar-upload input {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 3;
            opacity: 0
        }

        .user-sidebar-component .user-avatar .avatar-upload img {
            width: 30px;
            height: 30px
        }

        .user-sidebar-component .user-name {
            text-align: center;
            color: #31489d;
            font-weight: 700;
            font-size: 18px;
            margin-bottom: 15px
        }

        .user-sidebar-component .user-sidebar-list .list-item {
            display: block;
            color: #000;
            padding: 10px 5px;
            font-size: 14px;
            cursor: pointer
        }

        .user-sidebar-component .user-sidebar-list .list-item:hover {
            color: #6a3073
        }

        .user-sidebar-component .user-sidebar-list .list-item img {
            width: 18px;
            margin-left: 5px
        }

        .user-sidebar-component .user-sidebar-list .list-item:not(:last-of-type) {
            border-bottom: 1px solid #ddd
        }

        .user-layout .layout-title {
            font-size: 18px;
            font-weight: 600;
            margin: 10px 0 30px
        }

        .user-layout .user-layout-main {
            box-shadow: 0 0 4px 0 rgba(0, 0, 0, .25);
            border-radius: 5px;
            padding: 15px;
            background: #fff;
            height: 100%
        }

        @media (max-width: 991px) {
            .user-layout .user-layout-main {
                margin-top: 15px
            }
        }

        .user-layout .stepper.stepper-vertical.order-step {
            margin: 0;
            margin-top: -20px;
            padding: 0
        }

        .user-layout .stepper.stepper-vertical.order-step li .step-item {
            padding: 15px 0
        }

        .user-layout .stepper.stepper-vertical.order-step li.completed .circle {
            background: #31489d !important
        }

        .user-layout .stepper.stepper-vertical.order-step li.completed .label {
            color: #31489d !important
        }

        .user-layout .stepper.stepper-vertical.order-step li.active .circle {
            position: relative;
            background: 0 0 !important
        }

        .user-layout .stepper.stepper-vertical.order-step li.active .circle::after, .user-layout .stepper.stepper-vertical.order-step li.active .circle::before {
            border-radius: 50%;
            pointer-events: none;
            position: absolute;
            content: '';
            z-index: 1
        }

        .user-layout .stepper.stepper-vertical.order-step li.active .circle::before {
            top: -.5px;
            left: -.5px;
            background: linear-gradient(to right, #e2717c, #31489d);
            width: calc(100% + 1px);
            height: calc(100% + 1px)
        }

        .user-layout .stepper.stepper-vertical.order-step li.active .circle::after {
            top: .5px;
            left: .5px;
            background: #fff;
            width: calc(100% - 1px);
            height: calc(100% - 1px)
        }

        .user-layout .stepper.stepper-vertical.order-step li.active .circle .value-step {
            position: relative;
            z-index: 2;
            color: #6a3073
        }

        .user-layout .stepper.stepper-vertical.order-step li.active .label {
            color: #6a3073 !important
        }

        .user-layout .stepper.stepper-vertical.order-step li.warning .circle {
            background: #e2717c !important
        }

        .user-layout .stepper.stepper-vertical.order-step li.warning .label {
            color: #e2717c !important
        }

        .user-layout .stepper.stepper-vertical.order-step li:after {
            top: 50px;
            left: 13px
        }

        .user-layout .stepper.stepper-vertical.order-step li .label {
            font-size: 14px;
            font-weight: 500
        }

        .user-layout .order-detail-wrapper {
            border: 1px solid #ddd;
            border-top: 0;
            border-radius: 4px;
            overflow: hidden
        }

        .user-layout .order-detail-wrapper .order-detail-header {
            border-top: 1px solid #ddd;
            background: #f8f8f9;
            padding: 10px;
            font-weight: 600;
            font-size: 16px
        }

        .user-layout .order-detail-wrapper .order-detail-contents {
            background: #fff
        }

        .user-layout .order-detail-wrapper .order-detail-contents .order-content-item {
            padding: 10px;
            border-top: 1px solid #ddd
        }

        .user-layout .order-detail-wrapper .order-detail-contents .order-content-item .order-time {
            font-size: 14px;
            flex: 0 0 50px;
            max-width: 50px;
            margin-right: 10px;
            font-weight: 600
        }

        .user-layout .order-detail-wrapper .order-detail-contents .order-content-item .order-title {
            font-size: 14px;
            font-weight: 400
        }

        .authen-form label {
            text-align: left;
            color: #858a8d;
            margin-bottom: 0;
            font-size: 14px
        }

        .authen-form label span {
            color: #f33340
        }

        .authen-form .form-error {
            margin-top: 5px;
            color: #f33340 !important;
            text-align: left !important;
            font-size: 14px
        }

        .authen-form input {
            height: 45px;
            padding: 0 15px;
            border: 1px solid #ddd;
            width: 100%;
            margin: 5px 0;
            border-radius: 10px;
        }

        .authen-form input[type=checkbox] {
            width: 20px;
            height: 20px;
            margin-right: 10px
        }

        .authen-form input:disabled {
            background: #f8f8f9;
            cursor: not-allowed
        }

        .authen-form select {
            height: 45px;
            border: 1px solid #ddd;
            border-radius: 30px
        }

        .authen-form .form-group .form-title {
            font-weight: 700
        }

        .authen-form .form-group.payment-method .form-item:not(:last-of-type) {
            border-bottom: 1px solid #ddd
        }

        .authen-form .form-group.payment-method .form-item label {
            font-size: 14px;
            padding: 10px 0;
            color: #000
        }

        .authen-form .form-group.payment-method .form-item label img {
            width: 25px;
            margin-right: 10px
        }

        .authen-form .form-group.payment-method .form-item .method-group {
            padding: 10px 0
        }

        .authen-form .form-group.payment-method .form-item .method-group .method-item {
            max-width: 150px;
            margin: 0 5px 5px 0;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: .3s ease;
            border: 1px solid #ddd;
            cursor: pointer;
            position: relative
        }

        .authen-form .form-group.payment-method .form-item .method-group .method-item img {
            width: 100%;
            height: 100%;
            -o-object-fit: cover;
            object-fit: cover;
            -o-object-position: center;
            object-position: center
        }

        @media (max-width: 575px) {
            .authen-form .form-group.payment-method .form-item .method-group .method-item {
                width: 100px;
                height: 55px
            }
        }

        .authen-form .form-group.payment-method .form-item .method-group .method-item:before {
            position: absolute;
            content: '';
            width: 15px;
            height: 15px;
            border-radius: 50%;
            top: 5px;
            right: 5px;
            background: url(../icons/icon-checkmark-green.svg);
            background-size: cover;
            background-position: center;
            opacity: 0
        }

        .authen-form .form-group.payment-method .form-item .method-group .method-item.active, .authen-form .form-group.payment-method .form-item .method-group .method-item:hover {
            border-color: #6a3073
        }

        .authen-form .form-group.payment-method .form-item .method-group .method-item.active::before {
            opacity: 1
        }

        .authen-form .form-group.half {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap
        }

        .authen-form .form-group.half .form-item {
            flex: 0 0 49%;
            max-width: 49%
        }

        @media (max-width: 575px) {
            .authen-form .form-group.half .form-item {
                flex: 0 0 100%;
                max-width: 100%
            }

            .authen-form .form-group.half .form-item:not(:last-of-type) {
                margin-bottom: 10px
            }
        }

        .authen-form .form-item.checkbox {
            display: flex;
            align-items: center
        }

        .authen-form .form-item.checkbox label {
            font-size: 14px;
            color: #000
        }

        .authen-form .form-item.radio {
            display: flex;
            align-items: center
        }

        .authen-form .form-item.radio input {
            width: 20px;
            height: 20px;
            margin-right: 10px
        }

        .authen-form .form-item.upload {
            position: relative;
            cursor: pointer
        }

        .authen-form .form-item.upload input {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            z-index: 2;
            margin: 0;
            padding: 0;
            outline: 0
        }

        .authen-form .form-item.upload.icon {
            width: 25px;
            height: 25px
        }

        .authen-form .form-item.upload.icon img {
            width: 100%
        }

        .authen-form .form-item.button-checkout {
            display: flex
        }

        .authen-form .form-item.button-checkout .btn {
            width: auto;
            margin: 0 0 0 auto
        }

        @media (max-width: 575px) {
            .authen-form .form-item.button-checkout .btn {
                width: 100%
            }
        }

        .authen-form .form-item.list-uploads .upload-item {
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            margin: 0 10px 10px 0
        }

        .authen-form .form-item.list-uploads .upload-item .item-image {
            width: 100%;
            height: 100%;
            -o-object-fit: cover;
            object-fit: cover;
            -o-object-position: center;
            object-position: center
        }

        .authen-form .form-item.list-uploads .upload-item .item-delete {
            position: absolute;
            top: 5px;
            right: 5px;
            z-index: 3;
            width: 15px;
            height: 15px;
            background: #fff;
            border-radius: 50%;
            cursor: pointer;
            display: flex
        }

        .authen-form .form-item.list-uploads .upload-item .item-delete img {
            width: 50%;
            margin: auto
        }

        .authen-form .form-item a {
            color: #31489d
        }

        .authen-form .line {
            margin-bottom: 15px
        }

        .authen-form button {
            margin-bottom: 10px;
            height: 40px;
            border-radius: 30px;
            padding: 0 15px;
            width: 100%
        }

        .authen-form button img {
            width: 15px;
            margin-right: 10px
        }

        .authen-form button.btn {
            background: linear-gradient(to right, #e2717c, #31489d);
            color: #fff;
            width: 100%;
            border: none
        }

        .authen-form button.facebook {
            background: #3b5998;
            color: #fff
        }

        .authen-form button.google {
            background: #d7342d;
            color: #fff
        }

        .authen-form button.zalo {
            background: #2792f0;
            color: #fff
        }
    </style>
@stop

@section('script')

@stop
