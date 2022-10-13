

@extends('layouts.master')
@section('title') {{'Reports.'}} @endsection


    
@section('main-content')

@php
    $success = Session::get('success');
    $error = Session::get('error');

@endphp
@if ($success)
    <div class="alert alert-success">{{ $success }}</div>
@elseif ($error)
    <div class="alert alert-danger">{{ $error }}</div>
@endif

@isset($flag)

<form class="mt-5 mb-5 login-input" method="post" action="{{ route('generate-reports') }}">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-3">
            <h6><b>Member Id</b></h6>
            <input style="border: .01px solid #969393;" type="text" class="form-control" placeholder="Member Id" name="member_id" required>
        </div>
       

                                                
    </div>    
   <button type="submit" class="btn mb-1 btn-success" name="AdoptEntry">Generate Report</button>
</form>
@endisset



@isset($memberwith)  




<div class="toolbar hidden-print">
    <div class="text-right">
        <button id="printInvoice" onclick="printDiv('invoice')" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
       
    </div>
    <hr>
</div>

<div id="invoice">
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <img style="width: 150;height:100px; border-radius: 50%; float: left;"
                        src="{{asset('images/mcllogo.jpg') }}"
                        alt="">
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                          <a  href="#">
                          {{ $memberwith->member_name}}
                            </a>
                        </h2>
                        <div>Member id: {{ $memberwith->member_id}}</div>
                        {{-- <div>{{ $member->mobile }}</div>
                        <div>{{ $member->address }}</div> --}}
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">Report from:</div>
                        <h2 class="to">Mirpur Club Ltd.</h2>
                       
                       
                    </div>
                    <div class="col invoice-details">
                        <h5 class="invoice-id">Report#msp</h5>
                        <div class="date">Date of Report:{{ date('Y-m-d') }} </div>
                       
                    </div>
                </div>
                <div style="overflow:auto;">
                    <table>
                        <tbody>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2" class="highest">Highest Msp: {{ $max->member_name }}</td>
                              
                                <td style="color:darkblue;font-size:27px; font-weight:bold">{{ number_format((float)$max->msp, 2, '.', '')}}</td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2" class="highest">Your Msp</td>
                                <td style="color: #FF5733;font-size:25px; font-weight:bold">{{ number_format((float)$memberwith->msp, 2, '.', '')}}</td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2" class="highest">Your Position</td>
                                @if($position==1)
                                <td class="position">1<sup>st</sup></td>
                                @elseif($position==2)
                                <td class="position">2<sup>nd</sup></td>
                                @elseif($position==3)
                                <td class="position">3<sup>rd</sup></td>
                                @else
                                <td class="position">{{ $position }}<sup>th</sup></td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                    <h4 style="color:#FF5733">Msp Report With Weight</h4>
                      <table border="0" cellspacing="0" cellpadding="0">
                        <thead>
                            
                            <tr>
                            <th class="thStyle1">Member Reference</th>
                            <th class="thStyle">Member Reference highest</th>
                            <th class="thStyle1">Member Club Fund</th>
                            <th class="thStyle">Member Club Fund Highest</th>
                           
                            
                          
                          
                            </tr>
                        </thead>
                        <tbody> 
                       
                            <tr>
                                <td class="unit">{{ $memberwith->member_reference }}</td>
                                <td class="qty">{{ $highest->max('member_reference') }}</td>
                                <td class="unit">{{ $memberwith->member_clubfund }}</td>
                                <td class="qty">{{ $highest->max('member_clubfund') }}</td>

                               
                           

                             
                            </tr>
                        </tbody>
                        <th class="thStyle1">Member Referral club fund</th>
                        <th class="thStyle">Member Referral club fund Highest</th>
                        <th class="thStyle1">Formation Meeting</th>
                        <th class="thStyle">Formation Meeting Highest</th>
                       
                   
                     
                        <tr>
                            <td class="unit">{{ $memberwith->member_referral_clubfund }}</td>
                            <td class="qty">{{ $highest->max('member_referral_clubfund') }}</td>
                            <td class="unit">{{ $memberwith->member_attend_formationmeeting }}</td>
                            <td class="qty">{{ $highest->max('member_attend_formationmeeting') }}</td>

                           

                           

                            
                          
                        </tr>
                        <th class="thStyle1">Club Programm</th>
                        <th class="thStyle">Club Programm Highest</th>
                      
                        <th class="thStyle1">Community Program</th>
                        <th class="thStyle">Community Program Highest</th>
                       
                        
                     
                        <tr>
                        <td class="unit">{{ $memberwith->member_attend_clubprogram }}</td>
                        <td class="qty">{{ $highest->max('member_attend_clubprogram') }}</td>
                        <td class="unit">{{ $memberwith->member_attend_communityprogram }}</td>
                        <td class="qty">{{ $highest->max('member_attend_communityprogram') }}</td>
                       
                      

                       
                        </tr>
                        <th class="thStyle1">Responsibility</th>
                        <th class="thStyle">Responsibility Highest</th>
                        <th class="thStyle1">Responsibility Gap</th>
                        <th class="thStyle">Responsibility Gap Highest</th>
                      
                        <tr>
                            <td class="unit">{{ $memberwith->member_responsibility }}</td>
                            <td class="qty">{{ $highest->max('member_responsibility') }}</td>
    
                            <td class="unit">{{ $memberwith->member_responsibility_gap }}</td>
                            <td class="qty">{{ $highest->max('member_responsibility_gap') }}</td>
                          

                        </tr>
                        <th class="thStyle1">Consume</th>
                        <th class="thStyle">Consume Highest</th>
                        <th class="thStyle1">Time Donation</th>
                        <th class="thStyle">Time Donation Highest</th>
                        <tr>
                            <td class="unit">{{ $memberwith->member_consume }}</td>
                            <td class="qty">{{ $highest->max('member_consume') }}</td>
                            <td class="unit">{{ $memberwith->member_time_donation }}</td>
                            <td class="qty">{{ $highest->max('member_time_donation') }}</td>
                        </tr>
                    </table>
                </div>
                <div style="overflow:auto;">
                    <h4 style="color:#107897 ">Msp Report WithoutWeight</h4>
                    <table border="0" cellspacing="0" cellpadding="0">
               
                           
                    
                            <thead>
                                <tr>
                                <th class="thStyle">Member Reference</th>
                                <th class="thStyle1">Member Club Fund</th>
                                <th class="thStyle">Member Referral club fund</th>
                                <th class="thStyle1">Formation Meeting</th>
                                <th class="thStyle">Club Programm</th> 
                              
                                </tr>
                            </thead>
                            <tbody> 
                                
                                <tr>
                                    <td class="unit">{{ $memberwithout->member_reference }}</td>
                                    <td class="qty">{{ $memberwithout->member_clubfund }}</td>
                                    <td class="unit">{{ $memberwithout->member_referral_clubfund }}</td>
                                    <td class="qty">{{ $memberwithout->member_attend_formationmeeting }}</td>
                                    <td class="unit">{{ $memberwithout->member_attend_clubprogram }}</td>
                                    
                                </tr>

                            </tbody>
                            <th class="thStyle">Community Program</th>
                            <th class="thStyle1">Responsibility</th>
                            <th class="thStyle">Responsibility Gap</th>
                            <th class="thStyle1">Consume</th>
                            <th class="thStyle">Time Donation</th>
                            <tr>
                               
                                <td class="qty">{{ $memberwithout->member_attend_communityprogram }}</td>
                                <td class="unit">{{ $memberwithout->member_responsibility }}</td>
                                <td class="qty">{{ $memberwithout->member_responsibility_gap }}</td>
                               
                                <td class="unit">{{ $memberwithout->member_consume }}</td>
                                
                                <td class="qty">{{ $memberwithout->member_time_donation }}</td>
                            </tr>
                           
                        </table>
                    </div>
           
           
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">notice text goes here</div>
                </div>
            </main>
            <footer>
                Report was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
   
    </div>
</div>
@endisset

@endsection

<script>
   
//    $('#printInvoice').click(function(){
//             Popup($('.invoice').outerHTML);
//             function Popup(data) 
//             {
//                 window.print();
//                 return true;
//             }
//         });

function printDiv(divName) {
  
   
    var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;


     window.print();
     

     document.body.innerHTML = originalContents;
}



</script>
