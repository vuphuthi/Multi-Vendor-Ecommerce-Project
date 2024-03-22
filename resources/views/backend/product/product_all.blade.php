@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Quản lý sản phẩm</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách sản phẩm</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a class="btn btn-primary" href="{{route('add.product')}}">Thêm sản phẩm</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">Danh sách sản phẩm</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Giảm giá</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $key => $item )
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item->product_name}}</td>
                            <td><img src="{{asset($item->product_thambnail)}}" style="width:70px;height:40px" alt=""></td>
                            <td>{{$item->selling_price}}</td>
                            <td>{{$item->product_qty}}</td>
                            {{-- <td>{{$item->discount_price}}</td>
                            <td>{{$item->status}}</td> --}}
                            <td>
                                @if($item->discount_price == NULL)
                                    <span class="badge rounded-pill bg-info">Không giảm giá</span>
                                @else
                                @php
			                        $amount = $item->selling_price - $item->discount_price;
			                        $discount = ($amount/$item->selling_price) * 100;
			                    @endphp
		                        <span class="badge rounded-pill bg-danger"> {{ round($discount) }}%</span>
                            @endif
                            </td>
                            <td> @if($item->status == 1)
                                <span class="badge rounded-pill bg-success">Hoạt động</span>
                                @else
                                <span class="badge rounded-pill bg-danger">Không hoạt động</span>
                                @endif
                               </td>
                               <td>
                                <a href="{{ route('edit.category',$item->id) }}" class="btn btn-info" title="Edit Data"> <i class="fa fa-pencil"></i> </a>
                                <a href="{{ route('delete.category',$item->id) }}" class="btn btn-danger" id="delete" title="Delete Data" ><i class="fa fa-trash"></i></a>
                                
                                <a href="{{ route('edit.category',$item->id) }}" class="btn btn-warning" title="Details Page"> <i class="fa fa-eye"></i> </a>
                                
                                @if($item->status == 1)
                                <a href="{{ route('edit.category',$item->id) }}" class="btn btn-primary" title="Inactive"> <i class="fa-solid fa-thumbs-up"></i> </a>
                                @else
                                <a href="{{ route('edit.category',$item->id) }}" class="btn btn-primary" title="Active"> <i class="fa-solid fa-thumbs-down"></i> </a>
                                @endif
                                
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