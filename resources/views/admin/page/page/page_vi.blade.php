<div id="thongtin" class="page_manager tab-pane fade in active">
    @php
        $content = unserialize($item->content);
    @endphp
    @if($item->id == 19)
        <div class="row">
            <div class="col-12">
                <h3>Khối thống kê số người sử dụng</h3>
            </div>

            @for($stt = 1; $stt < 5; $stt++)
                <div class="col-md-4">
                   <h4>Khối thứ {{$stt}}</h4>
                    <div class="form-group">
                        <label for="">Icon</label>
                        <input value="{{ @$content['thong_ke_khoi_' . $stt ]['icon'] }}" name="content[thong_ke_khoi_{{ $stt }}][icon]"  type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tiêu đề</label>
                        <input value="{{ @$content['thong_ke_khoi_' . $stt ]['name'] }}" name="content[thong_ke_khoi_{{ $stt }}][name]"  type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Số lượng</label>
                        <input value="{{ @$content['thong_ke_khoi_' . $stt ]['number'] }}" name="content[thong_ke_khoi_{{ $stt }}][number]"  type="text" class="form-control">
                    </div>

                </div>
            @endfor
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Khối liên kết dịch vụ đa lĩnh vực</h3>
                <div class="form-group">
                    <label for="">Tiêu đề</label>
                    <input value="{{ @$content['lienket' ]['name'] }}" name="content[lienket][name]"  type="text" class="form-control">

                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <input value="{{ @$content['lienket' ]['description'] }}" name="content[lienket][description]"  type="text" class="form-control">

                </div>
            </div>
            <div class="col-md-12">
                <h3>Khối các đơn vị đang sử dụng dịch vụ</h3>
                <div class="form-group">
                    <label for="">Tiêu đề</label>
                    <input value="{{ @$content['donvi' ]['name'] }}" name="content[donvi][name]"  type="text" class="form-control">

                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <input value="{{ @$content['donvi' ]['description'] }}" name="content[donvi][description]"  type="text" class="form-control">

                </div>
            </div>
            <div class="col-md-12">
                <h3>Khối các chương trình mới nhất</h3>
                <div class="form-group">
                    <label for="">Tiêu đề</label>
                    <input value="{{ @$content['chuongtrinh' ]['name'] }}" name="content[chuongtrinh][name]"  type="text" class="form-control">

                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <input value="{{ @$content['chuongtrinh' ]['description'] }}" name="content[chuongtrinh][description]"  type="text" class="form-control">

                </div>
            </div>
            <div class="col-md-12">
                <h3>Khối khách hàng đánh giá</h3>
                <div class="form-group">
                    <label for="">Tiêu đề</label>
                    <input value="{{ @$content['client' ]['name'] }}" name="content[client][name]"  type="text" class="form-control">

                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <input value="{{ @$content['client' ]['description'] }}" name="content[client][description]"  type="text" class="form-control">

                </div>
            </div>
        </div>

    @elseif($item->id == 21)
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Name</label>
                    <input value="{{ @$item->name }}" type="text" class="form-control">
                </div>
                <div class="form-group ">
                    <label for="">Nội dung:</label>
                    <textarea  id="content_finder" name="content[finder][text]" class="form-control" name="" id="" cols="30" rows="10">{{ @$content['finder']['text'] }}</textarea>
                    <script>
                        CKEDITOR.replace( 'content_finder' );
                    </script>
                </div>
            </div>
        </div>
    @elseif($item->id == 22)
        <div class="row">
            <div class="col-12">
                <h3>Banner trang hướng dẫn</h3>
            </div>
            <div class="col-md-12">
                <div class="form-group file_picture">
                    <label for="">Hình:</label>
                    <input name="content[banner_intro][picture]" type="file" class="form-control" id="">
                    <p class="image-upload"><img src="{{  \App\Helper\Common::showThumb('page', @$content['banner_intro']['picture'] ) }}" alt=""></p>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Name</label>
                    <input value="{{ @$content['duthuyeen']['name'] }}" name="content[duthuyeen][name]" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input value="{{ @$content['duthuyeen']['description'] }}" name="content[duthuyeen][description]" type="text" class="form-control">
                </div>
            </div>
        </div>
    @elseif($item->id == 29)
        <div class="row">
            <div class="col-12">
                <h3>Banner</h3>
            </div>
            <div class="col-md-12">
                <div class="form-group file_picture">
                    <label for="">Hình:</label>
                    <input name="content[banner_ctv][picture]" type="file" class="form-control" id="">
                    <p class="image-upload"><img src="{{  \App\Helper\Common::showThumb('page', @$content['banner_ctv']['picture'] ) }}" alt=""></p>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Name</label>
                    <input value="{{ @$content['ctv']['name'] }}" name="content[ctv][name]" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input value="{{ @$content['ctv']['description'] }}" name="content[ctv][description]" type="text" class="form-control">
                </div>
            </div>
        </div>
    @elseif($item->id == 23)
        <div class="row">
            <div class="col-12">
                <h3>Banner trang liên hệ</h3>
            </div>
            <div class="col-md-12">
                <div class="form-group file_picture">
                    <label for="">Hình:</label>
                    <input name="content[banner_contact][picture]" type="file" class="form-control" id="">
                    <p class="image-upload"><img src="{{  \App\Helper\Common::showThumb('page', @$content['banner_contact']['picture'] ) }}" alt=""></p>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Name</label>
                    <input value="{{ @$content['lienhe']['name'] }}" name="content[lienhe][name]" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input value="{{ @$content['lienhe']['description'] }}" name="content[lienhe][description]" type="text" class="form-control">
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <h3>Khối thông tin liên hệ</h3>
            </div>

            @for($stt = 1; $stt < 4; $stt++)
                <div class="col-md-4">
                    <h4>Khối thứ {{$stt}}</h4>
                    <div class="form-group">
                        <label for="">Icon</label>
                        <input value="{{ @$content['lien_he_khoi_' . $stt ]['icon'] }}" name="content[lien_he_khoi_{{ $stt }}][icon]"  type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tiêu đề</label>
                        <input value="{{ @$content['lien_he_khoi_' . $stt ]['name'] }}" name="content[lien_he_khoi_{{ $stt }}][name]"  type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Thông tin</label>
                        <input value="{{ @$content['lien_he_khoi_' . $stt ]['description'] }}" name="content[lien_he_khoi_{{ $stt }}][description]"  type="textarea" class="form-control">
                    </div>

                </div>
            @endfor
        </div>
        <div class="row">
            <div class="col-12">
                <h3>Google map</h3>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Iframe</label>
                    <textarea value="{{ @$content['lienhe']['googlemap'] }}" name="content[lienhe][googlemap]" type="text" class="form-control"></textarea>
                </div>
            </div>


        </div>
    @elseif($item->id == 24)
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Name</label>
                    <input value="{{ @$item->name }}" type="text" class="form-control">
                </div>
            </div>
        </div>

    @elseif($item->id == 26)
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Name</label>
                    <input value="{{ @$item->name }}" type="text" class="form-control">
                </div>
            </div>
        </div>
    @elseif($item->id == 27)
        <div class="row">
            <div class="col-12">
                <h3>Hình banner</h3>
            </div>
            <div class="col-md-6">
                <div class="form-group file_picture">
                    <label for="">Hình:</label>
                    <input name="content[banner_services][picture]" type="file" class="form-control" id="">
                    <p class="image-upload"><img src="{{  \App\Helper\Common::showThumb('page', @$content['banner_services']['picture'] ) }}" alt=""></p>
                </div>
            </div>

            <div class="col-md-12">
                <h3>Nội dung banner</h3>
                <div class="form-group">
                    <label for="">Tiêu đề</label>
                    <input value="{{ @$content['service_page' ]['name'] }}" name="content[service_page][name]"  type="text" class="form-control">

                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <input value="{{ @$content['service_page' ]['description'] }}" name="content[service_page][description]"  type="text" class="form-control">

                </div>
            </div>
            <div class="col-md-12">
                <h3>Khối ứng dụng thông minh đa tính năng</h3>
                <div class="form-group">
                    <label for="">Tiêu đề</label>
                    <input value="{{ @$content['app' ]['name'] }}" name="content[app][name]"  type="text" class="form-control">

                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <input value="{{ @$content['app' ]['description'] }}" name="content[app][description]"  type="text" class="form-control">

                </div>
            </div>
            <div class="col-md-12">
                <h3>Khối câu hỏi thường gặp</h3>
                <div class="form-group">
                    <label for="">Tiêu đề</label>
                    <input value="{{ @$content['question' ]['name'] }}" name="content[question][name]"  type="text" class="form-control">

                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <input value="{{ @$content['question' ]['description'] }}" name="content[question][description]"  type="text" class="form-control">

                </div>
            </div>

        </div>
    @elseif($item->id == 28)
        <div class="row">
            <div class="col-12">
                <h3>Hình ảnh banner</h3>
                <div class="form-group file_picture">
                    <label for="">Hình:</label>
                    <input name="content[banner_about][picture]" type="file" class="form-control" id="">
                    <p class="image-upload"><img src="{{  \App\Helper\Common::showThumb('page', @$content['banner_about']['picture'] ) }}" alt=""></p>
                </div>
            </div>
            <div class="col-md-12">
                <h3>Nội dung banner</h3>
                <div class="form-group">
                    <label for="">Tiêu đề</label>
                    <input value="{{ @$content['about_page' ]['name'] }}" name="content[about_page][name]"  type="text" class="form-control">

                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <input value="{{ @$content['about_page' ]['description'] }}" name="content[about_page][description]"  type="text" class="form-control">

                </div>
            </div>
            <div class="col-md-12">
                <h3>Khối hành trình của chúng tôi</h3>
                <div class="form-group">
                    <label for="">Tiêu đề</label>
                    <input value="{{ @$content['hanhtrinh' ]['name'] }}" name="content[hanhtrinh][name]"  type="text" class="form-control">

                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <input value="{{ @$content['hanhtrinh' ]['description'] }}" name="content[hanhtrinh][description]"  type="text" class="form-control">

                </div>
            </div>
            <div class="col-md-12">
                <h3>Khối thành tựu nổi bật</h3>
                <div class="form-group">
                    <label for="">Tiêu đề</label>
                    <input value="{{ @$content['thanhtuu' ]['name'] }}" name="content[thanhtuu][name]"  type="text" class="form-control">

                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <input value="{{ @$content['thanhtuu' ]['description'] }}" name="content[thanhtuu][description]"  type="text" class="form-control">

                </div>
            </div>

        </div>
    @elseif($item->id == 31)
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Name</label>
                    <input value="{{ @$content['tintuc']['name'] }}" name="content[tintuc][name]" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input value="{{ @$content['tintuc']['description'] }}" name="content[tintuc][description]" type="text" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h3>Banner</h3>
            </div>
            <div class="col-md-6">
                <div class="form-group file_picture">
                    <label for="">Hình:</label>
                    <input name="content[banner_tintuc][picture]" type="file" class="form-control" id="">
                    <p class="image-upload"><img src="{{  \App\Helper\Common::showThumb('page', @$content['banner_tintuc']['picture'] ) }}" alt=""></p>
                </div>
            </div>

        </div>
    @endif
</div>
