@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Danh sách phường xã </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Danh sách phường xã</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.state') }}" class="btn btn-primary">Thêm phường xã</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tỉnh/Thành Phố </th>
                                <th>Quận/Huyện </th>
                                <th>Phường/Xã </th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($state as $key => $item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td> {{ $item['division']['division_name'] }}</td>
                                    <td> {{ $item['district']['district_name'] }}</td>
                                    <td> {{ $item->state_name }}</td>
                                    <td>
                                        <a href="{{ route('edit.state',$item->id) }}" class="btn btn-info">Sửa</a>
                                        <a href="{{ route('delete.state',$item->id) }}" class="btn btn-danger"
                                            id="delete">Xóa</a>

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
