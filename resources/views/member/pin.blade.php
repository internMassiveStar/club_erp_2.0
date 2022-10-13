@extends('layouts.master') 
@section('main-content')
@section('title') {{'Member Entry'}} @endsection


<form class="mt-5 mb-5 login-input" method="post" action="{{ route('member-entry-employee') }}">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <h6><b>Pin</b></h6>
            <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="member entry" name="pin" id="pin" value='' required>
        </div>
        
        <input type="hidden" value="member-entry" name="page_name">

                                                
    </div>    
   <button type="submit" class="btn mb-1 btn-success" name="AdoptEntry"> Submit Pin</button>
</form>

@endsection