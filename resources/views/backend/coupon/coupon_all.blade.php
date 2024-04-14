@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Mã giảm giá</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Danh mục mã giảm giá</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a class="btn btn-primary" href="{{route('add.coupon')}}">Thêm Mã giảm giá</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">Danh sách giảm giá</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên mã giảm giá</th>
                            <th>Phiếu giảm giá</th>
                            <th>Hiệu lực</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($coupons as $key => $item )
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item->coupon_name}}</td>
                            <td>{{$item->coupon_discount}}%</td>
                            <td> 
                                {{ Carbon\Carbon::parse($item->coupon_validity)->locale('vi')->isoFormat('dddd, DD [tháng] MM [năm] YYYY') }}
                            </td>

                            

                            <td> 
                                @if($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                <span class="badge rounded-pill bg-success">Có hiệu lực</span>
                                @else
                                <span class="badge rounded-pill bg-danger">Không hợp lệ</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{route('edit.coupon',$item->id)}}" class="btn btn-info">Sửa</a>
                                <a href="{{route('delete.coupon',$item->id)}}" class="btn btn-danger" id="delete">Xóa</a>
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