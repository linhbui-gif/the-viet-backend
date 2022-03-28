@extends("enduser.layout")

@section('meta')

    @include("enduser.meta",[
    'title' => $_config->meta_title,
    'description' => $_config->meta_description,
    'link' => route('siteContact'),
    'img' => asset('images/config/' . $_config->picture)
    ])

@stop
@section('head')
    @php
        $page_content = unserialize($page->content);
    @endphp
@stop
@section('content')
    @include('enduser.page.components.brebcrumb',['title' => @$page_content['lienhe']['name'],'description' => @$page_content['lienhe']['description'],'thumb' => asset('images/page/'.@$page_content['banner_contact']['picture'])])
    <div class="contact-info-area pt-100 pb-70">
        <!-- Container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                @for($stt = 1; $stt < 4; $stt++)
                    @if(isset($page_content['lien_he_khoi_' . $stt]))
                        @php
                            $item = $page_content['lien_he_khoi_' . $stt];
                        @endphp

                        <div class="col-lg-4 col-md-6">
                            <div class="contact-info-box">
                                <div class="back-icon">
                                    <i class="ri-{{@$item['icon']}}"></i>
                                </div>
                                <div class="icon">
                                    <i class="ri-{{@$item['icon']}}"></i>
                                </div>
                                <h3>{{@$item['name']}}</h3>
                                <p>{{@$item['description']}}</p>
                            </div>
                        </div>
                @endif
            @endfor

            </div>
            <!-- /row -->
        </div>
        <!-- /Container -->
    </div>
    <div class="contact-section">
        <!-- Container -->
        <div class="container">
            <!-- row -->
            <div class="row clearfix">
                <!-- col -->
                <div class="col-lg-6">
                    <div class="map-site ml-15">

                        {!! @$page_content['lienhe']['googlemap']  !!}
                    </div>
                </div>
                <!-- /col -->
                <!-- col -->
                <div class="col-lg-6 col-md-12 col-sm-12 form-column">
                    <div class="form-inner">
                        <h3>Liên hệ với chúng tôi</h3>
                        <form id="contact-form" class="default-form">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group contact-icon contacts-name">
<<<<<<< HEAD
                                    <input type="text" class="name" name="name" placeholder="Tên của bạn... *" required="">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group contact-icon contacts-email">
                                    <input type="email" class="email" name="email" placeholder="Email của bạn...*" required="">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group contact-icon contacts-phone">
                                    <input type="text" class="phone" name="phone" placeholder="Số điện thoại... *" required="">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group contact-icon contacts-phone">
                                    <input type="text" class="address" name="address" placeholder="Địa chỉ... *" required="">
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group contact-icon contacts-message">
                                    <textarea name="content" class="content" placeholder="Lời nhắn ..."></textarea>
=======
                                    <input type="text" class="name" name="name" placeholder="Your name *" required="">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group contact-icon contacts-email">
                                    <input type="email" class="email" name="email" placeholder="Your mail *" required="">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group contact-icon contacts-phone">
                                    <input type="text" class="phone" name="phone" placeholder="Your Phone *" required="">
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group contact-icon contacts-message">
                                    <textarea name="content" class="content" placeholder="Message..."></textarea>
>>>>>>> a6161ca74c792b711484149921340ca40ec1ec76
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                    <button class="btn theme-btn-1 btn-contact" type="button" name="submit-form">Gửi ngay</button>
                                </div>
                            </div>
                            <div class="success">

                            </div>
                        </form>

                    </div>
                </div>
                <!-- col -->
            </div>
            <!-- /row -->
        </div>
        <!-- Container -->
    </div>
    @endsection

@section('script')
    <script>
        $(document).ready(function () {

            let buttonSubmit = $('.btn-contact');
            let modalShow = $('#contact-form');
            buttonSubmit.on('click', function (e) {
                console.log('e', e);
                e.preventDefault();
                $.ajax({
                    url: "{{route('ajaxContact')}}",
                    method: 'POST',
                    data: {
                        "_token": '{{csrf_token()}}',
                        "name": modalShow.find('.name').val(),
                        "phone": modalShow.find('.phone').val(),
                        "email": modalShow.find('.email').val(),
<<<<<<< HEAD
                        "address": modalShow.find('.address').val(),
                        "content": modalShow.find('.content').val()
=======
                        // "content": modalShow.find('.content').val()
>>>>>>> a6161ca74c792b711484149921340ca40ec1ec76
                    },
                    beforeSend: function () {
                        modalShow.find('.btn-contact').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="sr-only">Loading...</span>`);
                    },
                    success: function (response) {
                        if (response.success == true) {
                            modalShow.find('.btn-contact').html('Send message');
<<<<<<< HEAD
                            modalShow.find('.success').html(`<p class="alert-success p-10 mt-5">Gửi thông tin thành công !!</p>`);
=======
                            modalShow.find('.success').html(`<p class="alert-success p-10 mt-5">Gửi thông tin thành công,Hãy kiểm tra Email của bạn !!</p>`);
>>>>>>> a6161ca74c792b711484149921340ca40ec1ec76
                            resetForm();
                        }
                    }
                });

            });

            function resetForm() {
                modalShow.find('.name').val('');
                modalShow.find('.phone').val('');
                modalShow.find('.email').val('');
<<<<<<< HEAD
                modalShow.find('.address').val('');
=======
>>>>>>> a6161ca74c792b711484149921340ca40ec1ec76
                modalShow.find('.content').val('');
            }

        });
    </script>
@endsection
