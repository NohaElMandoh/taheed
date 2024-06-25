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
<div class="row m-1 mb-2">
    <div class="col-xl-3 col-md-6 col-sm-6 p-2">
        <div class="box-card text-right mini animate__animated animate__flipInY   "><i class="fab far fa-chart-bar b-first" aria-hidden="true"></i>
            <span class="mb-1 c-first mt-4">عدد الدراجات النارية الـمتاحة للشراء  </span>
            @php
            $moto_count=0;
            @endphp
            @foreach($motorcycles as $key=>$motorcycle)
            @php $moto_count +=$motorcycle->amount;       @endphp
           @endforeach
            <span>{{$moto_count}}</span>

        </div>
    </div>
    <div class="col-xl-3 col-md-6 col-sm-6 p-2">
        <div class="box-card text-right mini animate__animated animate__flipInY    "><i class="fab far fa-clock b-second" aria-hidden="true"></i>
            <span class="mb-1 c-second mt-4">اجمالي  الدراجات الناريةالمباعه  الشهرية   </span>
            
            <span>{{$totalCount}}</span>

        </div>
    </div>

    <div class="col-xl-3 col-md-6 col-sm-6 p-2">
        <div class="box-card text-right mini animate__animated animate__flipInY    "><i class="fab far fa-clock b-second" aria-hidden="true"></i>
            <span class="mb-1 c-second mt-4">اجمالي ايجارات الدراجات النارية الشهرية        </span>
            
            <span>{{$totalAmount}}</span>

        </div>
    </div>

  
</div>
@endsection