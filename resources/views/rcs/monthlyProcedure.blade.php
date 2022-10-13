@extends('layouts.master')
@section('title')
      
@endsection 
@section('main-content')

  <div class="login-form-bg h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100" style="margin-top:10%">
            <div class="col-xl-6">
                <div class="form-input-content">
                    <div class="card login-form mb-0">
                        <div class="card-body pt-5">
                            
                                 <a class="text-center" href="{{ route('monthly-procedure') }}"> <h4>RCS Info</h4></a>
    
                                <div class="form-group">
                                     <a><h4 class="card-title">RCSMonth</h4></a>
                                    @php
                                        $date = date('M');
                                    @endphp
                                    <input type="text" class="form-control w-50"  placeholder="{{ $date }}" name="RCSMonth" value= '{{ $date }}' readonly>
                                </div>
                            
                                
                                {{-- <button  type="submit" name="RCS_Action">RCS_Action</button> --}}
                                <a class="btn login-form__btn submit w-30" style="margin-left:40%" href="{{ route('monthly-procedure-calculation') }}">RCS Action</a>
                                <!-- <p class="mt-5 login-form__footer">Have account <a href="page-login.html" class="text-primary"> Member login </a>  now</p>  -->
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection