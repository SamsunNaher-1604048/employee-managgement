@extends('layouts.layout')
@section('content')
<div>
    <div class="">
        <p class="notification p-3">All Leave Application</p>
        <div class="mt-3">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Department</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($datas as $data)
                    <tr>
                        <td scope="row">{{$data->name}}</th>
                        <td>{{$data->userdesignation}}</td>
                        <td>{{$data->deparetmentName}}</td>
                        <td>{{$data->status}}</td>
                        <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d/m/Y')}}</td>
                        <td>
                          <a type="button" class="btn btn-outline-primary" href="{{route('application.show',$data->leave_id)}}">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                          </a>

                          
                           @if(Auth::user()->employee_id == $data->reporting_boss && $data->reporting_boss_approval == null)
                              <a type="button" class="btn btn-outline-primary" href="{{route('leave.approve',$data->leave_id)}}">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                              </a>
                            
                           @elseif(Auth::user()->employee_id == $data->department_head && $data->reporting_boss_approval == null)
                              <button type="button" class="btn btn-outline-primary" disabled href="{{route('leave.approve',$data->leave_id)}}">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                              </button>
                            
                           @elseif(Auth::user()->employee_id == $data->department_head && $data->reporting_boss_approval == 'Approve' && $data->department_head_approval == null)
                                <a type="button" class="btn btn-outline-primary" href="{{route('leave.approve',$data->leave_id)}}">
                                  <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>  

                          @elseif(Auth::user()->employee_id == $data->hr && $data->department_head_approval == null)
                                <button type="button" class="btn btn-outline-primary" disabled href="{{route('leave.approve',$data->leave_id)}}">
                                  <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>

                          @elseif(Auth::user()->employee_id == $data->hr && $data->department_head_approval == 'Approve' && $data->hr_approval== null)
                                <a type="button" class="btn btn-outline-primary" href="{{route('leave.approve',$data->leave_id)}}">
                                  <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a> 
                           @endif

                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection