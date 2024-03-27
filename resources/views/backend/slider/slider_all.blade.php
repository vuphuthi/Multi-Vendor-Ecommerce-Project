@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Danh mục</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Tất cả Danh mục</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a class="btn btn-primary" href="{{route('add.slider')}}">Thêm danh mục</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">Danh sách danh mục</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tiêu đề</th>
                            <th>Tiêu đề ngắn</th>
                            <th>Ảnh</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $key => $slider )
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$slider->slider_title}}</td>
                            <td>{{$slider->short_title}}</td>
                            <td><img src="{{asset($slider->slider_image)}}" style="width:70px;height:40px" alt=""></td>
                            <td>
                                <a href="{{route('edit.slider',$slider->id)}}" class="btn btn-info">Sửa</a>
                                <a href="{{route('slider.delete',$slider->id)}}" class="btn btn-danger" id="delete">Xóa</a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection