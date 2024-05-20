@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Danh sách quản lý đơn hàng</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách quản lý đơn hàng</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">Danh sách quản lý đơn hàng</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Ngày</th>
                            <th>Hóa đơn</th>
                            <th>Số lượng</th>
                            <th>Phương thức thanh toán</th>
                            <th>Tình trạng</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $key => $item )
                        <tr>
                            <td> {{ $key+1 }} </td>
                            <td>{{ \Carbon\Carbon::parse($item->order_date)->format('d/m/Y') }}</td>
                            <td>{{ $item->invoice_no }}</td>
                            <td>{{ number_format($item->amount,0,',','.') }}&#8363;</td>
                            <td>{{ $item->payment_method }}</td>
                            <td> <span class="badge rounded-pill bg-success"> {{ $item->status }}</span></td> 
                            <td>
                                <a href=" " class="btn btn-info" title="Details"><i class="fa fa-eye"></i> </a>
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