@extends('admin.layouts.app')

@section('content')
<!-- breadcrumb -->

<div class="row  m-1 pb-4 mb-3 ">
    <div class="col-xs-12  col-sm-12  col-md-12  col-lg-12 p-2">
        <div class="page-header breadcrumb-header ">
            <div class="row align-items-end ">
                <div class="col-lg-8">
                    <div class="page-header-title text-left-rtl">
                        <div class="d-inline">
                            <h3 class="lite-text ">الدراجات النارية </h3>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item active">الدراجات النارية </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row m-1">

    <div class="col-xs-1 col-sm-1 col-md-12 col-lg-12 p-2">
        <div class="card shade h-100">
            <div class="card-body">
                <h5 class="card-title">الدراجات النارية </h5>

                <hr>
                <table id="users-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"># </th>
                            <th scope="col">اسم المصنع </th>
                            <th scope="col">الموديل </th>
                            <th scope="col">الكمية </th>
                            <th scope="col">تاريخ التسجيل</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($motorcycles as $key=>$motorcycle)

                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$motorcycle->manufacturer}}</td>
                            <td>{{$motorcycle->model}}</td>
                            <td>{{$motorcycle->amount}}</td>
                            <td>{{$motorcycle->created_at}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <div align="right" id="paglink">{{$motorcycles->appends(request()->input())->links('pagination::bootstrap-4')}}</div>

            </div>

        </div>
    </div>

</div>
@endsection