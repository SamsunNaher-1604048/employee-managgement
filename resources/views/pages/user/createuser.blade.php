@extends('layouts.layout')
@section('content')

<div class="m-3 p-3 inputbox">
    <div class="titlebox mt-4 mb-4 ml-3 mr-3">
        <p class="p-2">Create Employee</p>
    </div>
     
    <form action="{{route('user.store')}}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="row ">

            {{-- employee_id and name --}}
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label for="employee_id">Enter Employee ID:</label><br>
                    <input type="text" name="employee_id" class="form-control" required>
                    <span class="text-danger">
                        @error('employee_id')
                           {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="name">Enter Employee Name:</label><br>
                    <input type="text" name="name" class="form-control" required>
                </div>
            </div>
    
            {{-- email and phone --}}
            <div class="row mt-3">
                <div class="col-md-6 col-sm-12">
                    <label for="email">Enter Employee Email:</label><br>
                    <input type="email" name="email" class="form-control">
                    <span class="text-danger">
                        @error('email')
                           {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="phone">Enter Employee Phone No:</label><br>
                    <input type="text" name="phone" class="form-control">
                </div>
            </div>
    
             {{-- Date of Birth and Gender --}}
            <div class="row mt-3">
                <div class="col-md-6 col-sm-12">
                    <label for="date_of_birth">Enter Employee Date of Brith:</label><br>
                    <input type="date" name="date_of_birth" class="form-control">
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="gender">Enter Employee Gender:</label><br>
                    <select class="form-select" aria-label="Default select example" name="gender">
                        <option selected value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
    
    
            {{-- company and department --}}
            <div class="row mt-3">
                <div class="col-md-6 col-sm-12">
                    <label for="company_id">Enter Employee Company:</label><br>
                    <select class="form-control" id="select2" name="company_id" required>

                        @foreach ($companys as $company)
                            <option value={{$company->id}}>{{$company->name}}</option> 
                       @endforeach
                           
                     </select>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="department_id">Enter Employee Department:</label><br>
                    <select class="form-control" name="department_id" id="select3" required>
                        @foreach ($departments as $department)
                            <option value="{{$department->id}}">{{$department->name}}</option> 
                       @endforeach
                     </select>
                </div>
            </div>

            {{-- Designation and role --}}
            <div class="row mt-3">
                <div class="col-md-6 col-sm-12">
                    <label for="designation">Enter Employee Designation:</label><br>
                    <select class="form-select" aria-label="Default select example" name="designation" required>
  
                        @foreach($designations as $designation)
                           <option value="{{$designation->id}}">{{$designation->designation}}</option>
                        @endforeach
                        <option selected value = 0>No Designation</option> 
                    </select>

                    <span class="text-danger">
                        @error('designation')
                           {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="status">Enter Employee Role:</label><br>
                    <select class="form-select" aria-label="Default select example" name="role">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->role_name}}</option>
                        @endforeach
                           <option selected value = 0>No Role</option> 
                    </select>
                </div>
            </div>


            {{-- reporting boss and status --}}

            <div class="row mt-3">
                <div class="col-md-6 col-sm-12">
                    <label for="repoting_boss">Enter Employee Reporting boss:</label><br>
                    <select class="form-control" name="repoting_boss" id="select4">
                        @foreach ($rep_boss as $rep)
                            <option value={{$rep->employee_id}}>{{$rep->name}}</option> 
                       @endforeach
                            <option selected value="0">No Repoting Boss</option>
                     </select>
                </div>

                <div class="col-md-6 col-sm-12">
                    <label for="repoting_boss">Enter Employee Department Head:</label><br>
                    <select class="form-control" name="department_head" id="select5">
                        @foreach ($department_head as $head)
                            <option value={{$head->employee_id}}>{{$head->name}}</option> 
                       @endforeach
                            <option selected value="0">No Department Head </option>
                     </select>
                </div>
            </div>

            {{-- password and status--}}
            
            <div class="row mt-3">
                <div class="col-md-6 col-sm-12">
                    <label for="password">Enter Employee password</label><br>
                    <input type="text" name="password" class="form-control">
                    <span class="text-danger">
                        @error('password')
                           {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="col-md-6 col-sm-12">
                    <label for="repoting_boss">Enter Employee Status:</label><br>
                    <select class="form-select" aria-label="Default select example" name='status' >
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                      </select>
                </div>
            </div>
           


            {{-- profile pic and cv --}}
            <div class="mt-4">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <label for="profile_pic">Enter Employee Profile Pic:</label><br>
                        <input type="file" name="profile_pic"  class="imagesubmit"><br> 

                    </div>
                    <div class="col-md-6 col-12">
                        <label for="cv">Enter Employee CV:</label><br>
                        <input type="file" name="cv"  class="imagesubmit"><br> 
                    </div>
                </div>

            </div>

             {{-- signature --}}
            <div class="mt-4 row">
                <div class="col-md-6 col-12">
                    <label for="signature">Enter Employee signature:</label><br>
                    <input type="file" name="signature"  class="imagesubmit" ><br> 
                </div>
            </div>

            {{-- button --}}
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">submit</button>
            </div>

        </div>
    </form>
</div>

<script>
    $('#select2').select2();
    $('#select3').select2();
    $('#select4').select2();
    $('#select5').select2();
</script>


@endsection

