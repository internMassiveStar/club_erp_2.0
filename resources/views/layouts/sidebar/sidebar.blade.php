<div class="nk-sidebar position-fixed">           
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            @if(Auth::guard('member')->check())
            <li class="nav-label text-info"><b>{{ Auth::guard('member')->user()->name }}</b></li>
           {{-- @if(Auth::guard('member')->user()->role==1) --}}


 <li>
    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
        <i class="icon-grid menu-icon"></i><span class="nav-text">Personal Cheque</span>
    </a>
    <ul aria-expanded="false">
        <li><a href="{{ route('rcs-member_personal') }}">RCS Details</a></li>
        <li><a href="{{ route('ad-member_personal') }}">AD Details</a></li>
    </ul>
</li>
<li>
    <a href="{{ route('change-password') }}" aria-expanded="false">
        <i class="icon-badge menu-icon"></i><span class="nav-text">Change Password</span>
    </a>
</li> 
<li>
    <a href="{{ route('agm-reg') }}" aria-expanded="false">
        <i class="icon-badge menu-icon"></i><span class="nav-text">Agm Registration</span>
    </a>
</li> 
<li>
    <a href="{{ route('logout') }}" aria-expanded="false">
        <i class="icon-grid menu-icon"></i><span class="nav-text">Logout</span>
    </a>
</li>

@elseif(Auth::guard('employee')->check() || Auth::guard('admin')->check())
<li class="nav-label text-info">
    @if(Auth::guard('employee')->check())
    <b>
    {{ Auth::guard('employee')->user()->name }}</b>
    @else
    {{ Auth::guard('admin')->user()->name}}
    @endif
</li>
@if(Auth::guard('admin')->check())
<li>
    <a href="{{ route('set-pin') }}" aria-expanded="false">
        <i class="icon-badge menu-icon"></i><span class="nav-text">Pin Set</span>
    </a>
</li>
<li>
    <a href="{{ route('task') }}" aria-expanded="false">
        <i class="icon-badge menu-icon"></i><span class="nav-text">Compeleted Task</span>
    </a>
</li>

@endif
           
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Member</span>
                </a>
                <ul aria-expanded="false">
                    @if(Auth::guard('admin')->check())
                    <li><a href="{{ route('member-entry') }}">Member Entry</a></li>
                    @endif
                    @if(Auth::guard('employee')->check())
                    <li><a href="{{ route('member-entry-emp') }}">Member Entry Employee</a></li>
                    @endif

            
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <span class="nav-text">Member Table</span>
                        </a>
                        <ul>
                            <li><a href="{{ route('member-table') }}">Member Info</a></li>
                            <li><a href="{{ route('professional-info') }}">Professional Info</a></li>
                            <li><a href="{{ route('education-info') }}">Education Info</a></li>
                            <li><a href="{{ route('personal-info') }}">Personal Info</a></li>
                        </ul>
                    </li>
                    
                </ul>
            </li>
            <li>
                <a href="{{ route('agm') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Agm</span>
                </a>
            </li>
            <li>
                <a href="{{ route('employee-register') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Employee Entry</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i> <span class="nav-text">Asset Deposit</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('ad-operation') }}">Ad operation</a></li>
                </ul>
            </li>
            @if(Auth::guard('admin')->check())
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i> <span class="nav-text">Msp</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('weightage') }}">Weightage</a></li>
                    <li><a href="{{ route('program') }}">Program/Meeting</a></li>
                    <li><a href="{{ route('policy') }}">Policy</a></li>
                    <li><a href="{{ route('specialRcs') }}">Special Rcs</a></li>
                    <li><a href="{{ route('donation') }}">Donation</a></li>
                    <li><a href="{{ url('/msp-form') }}">MSP Form</a></li>
                </ul>
            </li>
            

            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i> <span class="nav-text">Reports</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('reports') }}">Reports</a></li>
                    <li><a href="{{ route('reports-withweight') }}">Reports Withweight</a></li>
                    <li><a href="{{ route('reports-withoutweight') }}">Reports Withoutweight</a></li>


                </ul>
            </li>
            @endif
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-grid menu-icon"></i><span class="nav-text">Running Cost Share</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('rcs-operation') }}">RCS Operation</a></li>
                </ul>
            </li>
           
            <li>
                <a href="{{ route('cheque-management') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Cheque Management</span>
                </a>
            </li>
             <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i> <span class="nav-text">Cheque View</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all-cheque') }}">All Cheque</a></li>
                    <li><a href="{{ route('today-cheque') }}">Today's Chque</a></li>
                    <li><a href="{{ route('tomorrow-cheque') }}">Tomorrows Cheque</a></li>
                    <li><a href="{{ url('/msp-form') }}">MSP Form</a></li>
                    <li><a href="{{ route('searchbyadorrcs-cheque') }}">Search by AD/RCS</a></li>
                </ul>
            </li>
           @if( Auth::guard('admin')->check())
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-grid menu-icon"></i><span class="nav-text">Personal Cheque</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('rcs-member_personal') }}">RCS Details</a></li>
                    <li><a href="{{ route('ad-member_personal') }}">AD Details</a></li>
                </ul>
            </li>
    @endif
            <li>
                <a href="{{ route('total-ad&rcs') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Total Ad and RCS</span>
                </a>
            </li> 
            <li>
                <a href="{{ route('old-total-ad&rcs') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Old Total Ad and RCS</span>
                </a>
            </li> 
         
                
         
       
          
        
        @if( Auth::guard('admin')->check())
            <li>
                <a href="{{ route('chequeQueue-cheque') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Cheque Queue System</span>
                </a>
            </li>
            
           <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Monthly RCS</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('noRcs') }}">RCS Active Member</a></li>
                    <li><a href="{{ route('monthly-procedure') }}">Monthly Procedure</a></li>

                </ul>
            </li>
            @endif
            <li>
                <a href="{{ route('change-password') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Change Password</span>
                </a>
            </li> 
            {{-- <li>
                <a href="{{ route('change-password') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Change Password</span>
                </a>
            </li>  --}}
            <li>
                <a href="{{ route('logout') }}" aria-expanded="false">
                    <i class="icon-grid menu-icon"></i><span class="nav-text">Logout</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</div>