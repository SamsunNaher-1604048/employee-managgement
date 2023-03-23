@extends('layouts.layout')
@section('content')
<div class="container mt-3">

    <div>
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item">
              <a class="nav-link active" href="{{route('show.profile')}}"><i class="bx bx-user me-1"></i> Account</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=" "><i class="bx bx-bell me-1"></i>Print</a>
            </li>
          </ul>
    </div>

    <div class="m-5 p-5 application">
        <p class="title">JADROO GROUP<p>
            <p class="text-center">KA-18/1(8th-10th floor) Rasulbag Shaheed Tajuddin Ahmed Sarani, Mohakhali,Dhaka 1212</p>
        
            <div class="mb-5">
                <p class="subtitle">Leave Application Form</p>
            </div>
        
            <div>
                <p class="d-inline">I Myself, </p>
                <p class="d-inline text ">{{$user->name}}</p>
        
                <p class="d-inline">Employee ID:</p>
                <p class="d-inline text">{{$user->employee_id}}</p>
        
                <p class="d-inline">Designition</p>
                <p class="d-inline text">{{$user->designation}}</p>
            </div>
        
            <div class="mt-3">
                <p class="d-inline">Department:</p>
                <p class="d-inline text">{{$user->departmentName}}</p>

                @if($report == null)
                        <p class="d-inline">Reporting To</p>
                        <p class="d-inline text">No Reporting Boss</p>
                @else
                        <p class="d-inline">Reporting To</p>
                        <p class="d-inline text">{{$report->name}}</p>
                @endif

            </div>
        
            <div class="mt-3">
                <p class="d-inline">Wish to apply Leave for: </p>
                <p class="d-inline text">{{$leave_apply->leave_day}}</p>
                <p class="d-inline">days</p>
            </div>
        
            <div class="mt-3">
                <p class="d-inline">From: </p>
                <p class="d-inline text">{{$leave_apply->from_date}}</p>
                <p class="d-inline">To:</p>
                <p class="d-inline text">{{$leave_apply->to_date}}</p>
                <p class="d-inline">DOJ:</p>
                <p class="d-inline text">{{$leave_apply->date_to_join}}</p>
            </div>
        
            <div class="mt-5">
                <p>For the folloing Reasone(s)</p>
                <p class="d-inline text">{{$leave_apply->resone}}</p>
            </div>

            <div>
                <input  id="leave_type" value="{{$leave_apply->leave_type}}" hidden/>
                <p class="mt-5 subtitle">Leave Request</p>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">Asking</th>
                        <th scope="col">Taken</th>
                        <th scope="col">Remaining</th>
                        <th scope="col">Remarks</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td scope="row"><input class="Personal-box" type="checkbox"></td>
                        <td class="Personal">Parsonal</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <th scope="row"><input  class="Sick-box" type="checkbox"></th>
                        <td class="Sick">Sick</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <th scope="row" ><input class="Planned-box" type="checkbox"></th>
                        <td class="Planned">Planned</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <th scope="row"><input class="In-Lieu-of-box" type="checkbox"></th>
                        <td class="In-Lieu-of">In Lieu of</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <th scope="row"><input class="Vacation-box" type="checkbox"></th>
                        <td class="Vacation">Vacation</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <th scope="row"><input class="Maternity-box" type="checkbox"></th>
                        <td class="Maternity">Maternity</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <th scope="row"><input class="Other-box" type="checkbox"></th>
                        <td class="Other">other:</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    </tbody>
                </table>
            </div>



            <div class="mt-5">
                <p class="subtitle  mb-5">Signature Section</p>
                    <table class="table">
                        <tbody>
                            @if($leave_approve->reporting_boss!=0)
                               @if($leave_approve->reporting_boss != $leave_approve->department_head )
                                    <tr>
                                        <th scope="row">Reporting Boss Sign</th>

                                        @if($leave_approve->reporting_boss_approval == 'Approve')
                                          <th><img src="{{asset($report->signature)}}" alt="" width="180px" class="mt-3"></th>
                                        @else
                                           <th> </th>
                                        @endif

                                        <td>Name: {{($leave_approve->reporting_boss_approval == 'Approve')?$report->name: " "}}</td>
                                        <td></td>
                                        <td>Date:</td>
                                        <th></th>
                                    </tr>
                                @endif
                            @endif

                          
                            
                            @if($leave_approve->department_head!=0)
                                <tr>
                                    <th scope="row">Department Head:</th>

                                    @if($leave_approve->department_head_approval == 'Approve')
                                      <th><img src="{{asset($department_head->signature)}}" alt="" width="180px" class="mt-3"></th>
                                    @else
                                      <th></th>
                                    @endif

                                    <td>Name: {{($leave_approve->department_head_approval== 'Approve')?$department_head->name: " "}}</td>
                                    <td></td>
                                    <td>Date:</td>
                                    <th></th>
                                </tr>

                            @endif
                            <tr>
                                <th scope="row">HR Sign</th>

                                @if($leave_approve->hr_approval == 'Approve')
                                <th><img src="{{asset($hr->signature)}}" alt="" width="180px" class="mt-3"></th>
                                @else
                                <th></th>
                                @endif

                                <td>Name: {{($leave_approve->hr_approval == 'Approve')?$hr->name: " "}}</td>
                                <td></td>
                                <td>Date:</td>
                                <th></th>
                            </tr>
                        </tbody>
                    </table>
            </div>

                    
            <div class="mb-5">
                <p class="mt-5 subtitle">Office use only</p>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">Asking</th>
                        <th scope="col">Taken</th>
                        <th scope="col">Remaining</th>
                        <th scope="col">Remarks</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row"><input type="checkbox"></th>
                        <td>Casual</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <th scope="row"><input type="checkbox"></th>
                        <td>Sick</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <th scope="row"><input type="checkbox"></th>
                        <td>In Lieu of</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <th scope="row"><input type="checkbox"></th>
                        <td>Maternity</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <th scope="row"><input type="checkbox"></th>
                        <td>other:</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    </tbody>
                </table>
            </div>

            <div class="mt-5 mb-5">
                <p>HR Department</p>
                <p>Jadroo Group</p>
            </div>
    </div>
</div>

<script>
    const val = document. querySelector('#leave_type').value;

    if(val == document.querySelector('.Personal').className){
        document.querySelector('.Personal-box').checked=true;
    }

    else if(val == document.querySelector('.Sick').className){
        document.querySelector('.Sick-box').checked=true;
    }
    else if(val== document.querySelector('.Planned').className){
        document.querySelector('.Planned-box').checked=true;
    }
    else if(val== document.querySelector('.In-Lieu-of').className){
        document.querySelector('.In-Lieu-of-box').checked=true;
    }
    else if(val== document.querySelector('.Vacation').className){
        document.querySelector('.Vacation-box').checked=true;
    }
    else if(val== document.querySelector('.Maternity').className){
        document.querySelector('.Maternity-box').checked=true;
    }
    else{
        document.querySelector('.Other-box').checked=true;
    }
   
    

</script>
@endsection
