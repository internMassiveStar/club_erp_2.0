@extends('layouts.master') 
@section('main-content')
@section('title') {{'Dashboard'}} @endsection

<div class="container-fluid" >
@isset($data)
    


<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-1">
            <div class="card-body">
                <h3 class="card-title text-white">Total AD</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">
                        {{ $data->sum('total_ad') }}
                    </h2>
                    <!-- <p class="text-white mb-0">August - October 2021</p> -->
                </div>
                 <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span> 
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-2">
            <div class="card-body">
                <h3 class="card-title text-white">Paid AD</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">
                        {{ $data->sum('total_paidad') }}
                    </h2>
                    <!-- <p class="text-white mb-0">August - October 2021</p> -->
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-3">
            <div class="card-body">
                <h3 class="card-title text-white">Due AD</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">
                        {{ $data->sum('total_duead') }}
                    </h2>
                    <!-- <p class="text-white mb-0">August - October 2021</p> -->
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-1">
            <div class="card-body">
                <h3 class="card-title text-white">Total RCS</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">
                        {{ $data->sum('total_rcs') }}
                    </h2>
                    <!-- <p class="text-white mb-0">August - October 2021</p> -->
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-2">
            <div class="card-body">
                <h3 class="card-title text-white">Paid RCS</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">
                        {{ $data->sum('total_paidrcs') }}
                    </h2>
                    <!-- <p class="text-white mb-0">August - October 2021</p> -->
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-3">
            <div class="card-body">
                <h3 class="card-title text-white">Due RCS</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">
                        {{ $data->sum('total_duercs') }}
                    </h2>
                    <!-- <p class="text-white mb-0">August - October 2021</p> -->
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
            </div>
        </div>
    </div>
   
</div>









@endisset
</div>



@endsection
