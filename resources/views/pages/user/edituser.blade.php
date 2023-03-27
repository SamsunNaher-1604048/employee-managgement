@extends('layouts.layout')
@section('content')

<div class="m-3 p-3 inputbox">
    <div class="titlebox mt-4 mb-4 ml-3 mr-3">
        <p class="p-2">Edit Employee</p>
    </div>
    <form action="{{route('user.update',$data->id)}}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="row ">

            {{-- employee_id and name --}}
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label for="employee_id">Enter Employee ID:</label><br>
                    <input type="text" name="employee_id" class="form-control" value="{{$data->employee_id}}" required>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="name">Enter Employee Name:</label><br>
                    <input type="text" name="name" class="form-control" value="{{$data->name}}" required>
                </div>
            </div>

    
            {{-- email and phone --}}
            <div class="row mt-3">
                <div class="col-md-6 col-sm-12">
                    <label for="email">Enter Employee Email:</label><br>
                    <input type="email" name="email" class="form-control" value="{{$data->email}}" required>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="phone">Enter Employee Phone No:</label><br>
                    <input type="text" name="phone" class="form-control" value="{{$data->phone}}">
                </div>
            </div>
    
             {{-- Date of Birth and Gender --}}
            <div class="row mt-3">
                <div class="col-md-6 col-sm-12">
                    <label for="date_of_birth">Enter Employee Date of Brith:</label><br>
                    <input type="date" name="date_of_birth" class="form-control" value="{{$data->date_of_birth}}"">
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="gender">Enter Employee Gender:</label><br>
                    <select class="form-select" aria-label="Default select example" name="gender">

                        @if( $data->gender =='Male')
                           <option selected value="Male">Male</option>
                           <option value="Female">Female</option>
                        @else
                           <option value="Male">Male</option>
                          <option  selected value="Female">Female</option>
                        @endif

                    </select>
                </div>
            </div>
    
    
            {{-- company and department --}}
            <div class="row mt-3">
                <div class="col-md-6 col-sm-12">
                    <label for="company_id">Enter Employee Company:</label><br>
                    <select class="form-control company_id" id="select2" name="company_id">
                        @foreach ($companys as $company)

                            @if($data->company_id == $company->id)
                                <option selected  value={{$company->id}}>{{$company->name}}</option> 
                            @else
                                <option value={{$company->id}}>{{$company->name}}</option> 
                            @endif

                       @endforeach
                     </select>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="department_id">Enter Employee Department:</label><br>
                    <select class="form-control department_id " name="department_id" id="select3">
                        @foreach ($departments as $department)

                            @if($data->department_id == $department->id )
                                <option  selected value="{{$department->id}}">{{$department->name}}</option> 
                            @else
                                <option value="{{$department->id}}">{{$department->name}}</option> 
                            @endif

                       @endforeach
                    </select>
                </div>
            </div>
    
            {{-- Designation and role --}}

            <div class="row mt-3">
                <div class="col-md-6 col-sm-12">
                    <label for="designation">Enter Employee Designation:</label><br>
                    <select class="form-select" aria-label="Default select example" name="designation" id='select4'>
                        @foreach($designations as $designation)

                            @if($data->designation == $designation->id )
                                <option selected value="{{$designation->id}}">{{$designation->designation}}</option>
                            @else
                                 <option value="{{$designation->id}}">{{$designation->designation}}</option>
                            @endif
                         
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="status">Enter Employee Role:</label><br>
                    <select class="form-select" aria-label="Default select example" name="role">
                        @foreach($roles as $role)

                           @if($data->role == $role->id )
                                <option selected value="{{$role->id}}">{{$role->role_name}}</option>
                            @else
                                <option value="{{$role->id}}">{{$role->role_name}}</option>
                            @endif

                        @endforeach
                    </select>
                </div>
            </div>


            {{-- reporting boss and status --}}

            <div class="row mt-3">
                <div class="col-md-6 col-sm-12">
                    <label for="repoting_boss">Enter Employee Reporting boss:</label><br>
                    <select class="form-control" name="repoting_boss" id="select5">

                        @foreach ($rep_boss as $rep)

                           @if($rep->employee_id == $data->repoting_boss)
                               <option selected  value={{$rep->employee_id}}>{{$rep->name}}</option>
                           @else
                               <option value={{$rep->employee_id}}>{{$rep->name}}</option> 
                            @endif

                        @endforeach

                            <option {{$data->repoting_boss==0? 'selected':' '}} value="0">No Repoting Boss</option>
                            
                    </select>
                </div>
        
                <div class="col-md-6 col-sm-12">
                    <label for="repoting_boss">Enter Employee Status:</label><br>
                    <select class="form-select" aria-label="Default select example" name='status'>

                        @if( $data->status =='Active')
                            <option selected value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        @else 
                            <option value="Active">Active</option>
                            <option selected value="Inactive">Inactive</option>
                        @endif
                    </select>
                </div>
            </div>


            <div class="col-md-6 col-sm-12 mt-3">
                <label for="repoting_boss">Enter Employee Department Head:</label><br>
                    <select class="form-control" name="department_head" id="select6">
                     
                        @foreach ($department_head as $head)

                           @if($head->employee_id == $head->repoting_boss)
                               <option selected  value={{$head->employee_id}}>{{$head->name}}</option>
                           @else
                               <option value={{$head->employee_id}}>{{$head->name}}</option> 
                            @endif

                        @endforeach

                            <option {{$data->repoting_boss==0? 'selected':' '}} value="0">No Repoting Boss</option>
                    </select>
            </div>


            {{-- image and cv and button --}}
            <div class="mt-4">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <label for="profile_pic">Enter Employee Profile Pic:</label><br>
                        <input type="file" name="profile_pic"  class="imagesubmit" ><br> 
                        <img src="{{asset($data->profile_pic)}}" alt="" width="180px" class="mt-3">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="cv">Enter Employee CV:</label><br>
                        <input type="file" name="cv"  class="imagesubmit"><br> 
                        <img src="{{asset($data->cv)}}" alt="" width="180px" class="mt-3">
                    </div>
                    
                </div>
            </div>

            {{-- edit employee --}}

            <div class="mt-4 row">
                <div class="col-md-6 col-12">
                    <label for="cv">Enter Employee Signature: </label><br>
                    <input type="file" name="signature" class="imagesubmit"><br> 
                    <img src="{{asset($data->signature)}}" alt="" width="180px" class="mt-3">
                </div>
            </div>

            {{-- button --}}
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">update</button>
            </div>
        </div>
    </form>
</div>

<script>
    $('#select2').select2();
    $('#select3').select2();
    $('#select4').select2();
    $('#select5').select2();
    $('#select6').select2();
</script>

@endsection

