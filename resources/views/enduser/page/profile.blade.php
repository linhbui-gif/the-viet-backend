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

    <div class="hero-1" style="height: initial">
        <div class="authen-page">
            @if(Session::has('user') && Session::get('user') != null)
                <li class="nav-item"><a href="/postLogout" class="nav-link">Đăng xuất</a></li>
            @endif
            <div class="container">
                <div class="authen-page-wrapper">
                    <h3>Thông tin chủ thẻ</h3>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>PeopleCode</td>
                            <td>{{ $user['PeopleCode'] }}</td>
                        </tr>
                        <tr>
                            <td>FirstName</td>
                            <td>{{ $user['FirstName'] }}</td>

                        </tr>
                        <tr>
                            <td>LastName</td>
                            <td>{{ $user['LastName'] }}</td>
                        </tr>
                        <tr>
                            <td>FullName</td>
                            <td>{{ $user['FullName'] }}</td>
                        </tr>
                        <tr>
                            <td>NickName</td>
                            <td>{{ $user['NickName'] }}</td>
                        </tr>
                        <tr>
                            <td>Dob</td>
                            <td>{{ $user['Dob'] }}</td>
                        </tr>
                        <tr>
                            <td>IsHasNotDayDob</td>
                            <td>{{ $user['IsHasNotDayDob'] }}</td>
                        </tr>
                        <tr>
                            <td>GenderId</td>
                            <td>{{ $user['GenderId'] }}</td>
                        </tr>
                        <tr>
                            <td>GenderCode</td>
                            <td>{{ $user['GenderCode'] }}</td>
                        </tr>
                        <tr>
                            <td>GenderName</td>
                            <td>{{ $user['GenderName'] }}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ $user['Phone'] }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $user['Email'] }}</td>
                        </tr>
                        <tr>
                            <td>CmndNumber</td>
                            <td>{{ $user['CmndNumber'] }}</td>
                        </tr>
                        <tr>
                            <td>CmndDate</td>
                            <td>{{ $user['CmndDate'] }}</td>
                        </tr>
                        <tr>
                            <td>CmndPlace</td>
                            <td>{{ $user['CmndPlace'] }}</td>
                        </tr>
                        <tr>
                            <td>WorkPlace</td>
                            <td>{{ $user['WorkPlace'] }}</td>
                        </tr>
                        <tr>
                            <td>NationalName</td>
                            <td>{{ $user['NationalName'] }}</td>
                        </tr>
                        <tr>
                            <td>EthnicName</td>
                            <td>{{ $user['EthnicName'] }}</td>
                        </tr>
                        <tr>
                            <td>ReligionName</td>
                            <td>{{ $user['ReligionName'] }}</td>
                        </tr>
                        <tr>
                            <td>ProvinceName</td>
                            <td>{{ $user['ProvinceName'] }}</td>
                        </tr>
                        <tr>
                            <td>DistrictName</td>
                            <td>{{ $user['DistrictName'] }}</td>
                        </tr>
                        <tr>
                            <td>CommuneName</td>
                            <td>{{ $user['CommuneName'] }}</td>
                        </tr>
                        <tr>
                            <td>FullAddress</td>
                            <td>{{ $user['FullAddress'] }}</td>
                        </tr>
                        <tr>
                            <td>RegisterCode</td>
                            <td>{{ $user['RegisterCode'] }}</td>
                        </tr>
                        <tr>
                            <td>LastCardCode</td>
                            <td>{{ $user['LastCardCode'] }}</td>
                        </tr>
                        <tr>
                            <td>AvatarUrl</td>
                            <td>{{ $user['AvatarUrl'] }}</td>
                        </tr>
                        <tr>
                            <td>CmndBeforeUrl</td>
                            <td>{{ $user['CmndBeforeUrl'] }}</td>
                        </tr>
                        <tr>
                            <td>CmndAfterUrl</td>
                            <td>{{ $user['CmndAfterUrl'] }}</td>
                        </tr>
                        <tr>
                            <td>ProvinceCode</td>
                            <td>{{ $user['ProvinceCode'] }}</td>
                        </tr>
                        <tr>
                            <td>DistrictCode</td>
                            <td>{{ $user['DistrictCode'] }}</td>
                        </tr>
                        <tr>
                            <td>CommuneCode</td>
                            <td>{{ $user['CommuneCode'] }}</td>
                        </tr>
                        <tr>
                            <td>NationalCode</td>
                            <td>{{ $user['NationalCode'] }}</td>
                        </tr>
                        <tr>
                            <td>PassportNo</td>
                            <td>{{ $user['PassportNo'] }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $user['Address'] }}</td>
                        </tr>
                        <tr>
                            <td>IsLoginByPhone</td>
                            <td>{{ $user['IsLoginByPhone'] }}</td>
                        </tr>
                        <tr>
                            <td>HtDistrictName</td>
                            <td>{{ $user['HtDistrictName'] }}</td>
                        </tr>
                        <tr>
                            <td>HtCommuneName</td>
                            <td>{{ $user['HtCommuneName'] }}</td>
                        </tr>

                        <tr>
                            <td>HtProvinceCode</td>
                            <td>{{ $user['HtProvinceCode'] }}</td>
                        </tr>
                        <tr>
                            <td>HtDistrictCode</td>
                            <td>{{ $user['HtDistrictCode'] }}</td>
                        </tr>
                        <tr>
                            <td>HtCommuneCode</td>
                            <td>{{ $user['HtCommuneCode'] }}</td>
                        </tr>
                        <tr>
                            <td>HtAddress</td>
                            <td>{{ $user['HtAddress'] }}</td>
                        </tr>
                        <tr>
                            <td>HtFullAddress</td>
                            <td>{{ $user['HtFullAddress'] }}</td>
                        </tr>
                        <tr>
                            <td>AppAvatarUrl</td>
                            <td>{{ $user['AppAvatarUrl'] }}</td>
                        </tr>

                        <tr>
                            <td>Bhyts</td>
                            <td>
                                <ul>

                                    @if(isset( $user['Bhyts'][0]))
                                        @php
                                            $Bhyts = $user['Bhyts'][0];
                                        @endphp
                                        <li><b>PeopleCode</b>: {{ $Bhyts['PeopleCode'] }}</li>
                                        <li><b>BhytNumber</b>: {{ $Bhyts['BhytNumber'] }}</li>
                                        <li><b>FromTime</b>: {{ $Bhyts['FromTime'] }}</li>
                                        <li><b>ToTime</b>: {{ $Bhyts['ToTime'] }}</li>
                                        <li><b>Address</b>: {{ $Bhyts['Address'] }}</li>
                                        <li><b>MediOrgCode</b>: {{ $Bhyts['MediOrgCode'] }}</li>
                                        <li><b>MediOrgName</b>: {{ $Bhyts['MediOrgName'] }}</li>
                                        <li><b>LiveCode</b>: {{ $Bhyts['LiveCode'] }}</li>
                                    @endif

                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Cards</td>
                            <td>
                                <ul>

                                    @if(isset( $user['Cards'][0]))
                                        @php
                                            $card = $user['Cards'][0];
                                        @endphp
                                        <li><b>Id</b>: {{ $card['Id'] }}</li>
                                        <li><b>CardCode</b>: {{ $card['CardCode'] }}</li>
                                        <li><b>ServiceCode</b>: {{ $card['ServiceCode'] }}</li>
                                        <li><b>BankCardCode</b>: {{ $card['BankCardCode'] }}</li>
                                        <li><b>LinkCode</b>: {{ $card['LinkCode'] }}</li>
                                        <li><b>IsActive</b>: {{ $card['IsActive'] }}</li>
                                    @endif

                                </ul>
                            </td>
                        </tr>



                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>

@stop

@section('script')

@stop
