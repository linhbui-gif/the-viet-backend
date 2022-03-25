@extends("admin.layout")


@section('content-header')
    <section class="content-header">
        <h1>
            Trang quản trị hệ thống
        </h1>
    </section>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            @php
                $contact = \App\Contact::all();
                $count = count($contact);
            @endphp
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$count}}</h3>
                    <p>Khách hàng </p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="/admin/contact" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            @php
                $orders = \App\blog_posts::all();
                $count = count($orders);
            @endphp
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$count}}</h3>

                    <p>Bài viết</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/admin/blog_posts" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
{{--            @php--}}
{{--                $orders = \App\User::where('role_id', 12)->get();--}}
{{--                $count = count($orders);--}}
{{--            @endphp--}}
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>6</h3>
                    <p>Tài Khoản người dùng</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            @php
                $orders = \App\Course_course::where('status','active')->get();
                $count = count($orders);
            @endphp
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $count }}</h3>

                    <p>Khóa học</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="/admin/course_courses" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-body">
                    <h3>Chào mừng bạn đến trang quản trị của Anyclass</h3>
                </div>

            </div>
        </div>
    </div>
@stop



