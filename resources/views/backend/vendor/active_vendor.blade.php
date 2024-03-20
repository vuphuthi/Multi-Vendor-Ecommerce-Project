@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Quản lý nhà cung cấp</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Tất cả inactive</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">Danh sách nhà cung cấp không hoạt động</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên shop</th>
                            <th>Tên tài khoản</th>
                            <th>Email</th>
                            <th>Ngày gia nhập</th>
                            <th>Số điện thoại</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ActiveVendor as $key => $item )
                        <tr>
                            <td>{{$key+1}}</td>
                            <td> {{ $item->name }}</td>
                            <td> {{ $item->username}}</td>
                            <td> {{ $item->email}}</td>
                            <td> {{ $item->vendor_join}}</td>
                            <td> {{ $item->phone}}</td>
                            <td> <span class="btn btn-success">{{ $item->status}}</span></td>
                            <td>
                                <a href="{{route('active.vendor.details',$item->id)}}" class="btn btn-info">Chi tiết</a>
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