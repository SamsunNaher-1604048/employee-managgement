@extends('layouts.layout')
@section('content')
<div class="m-3 p-3 inputbox">
    <div class="titlebox m-3">
        <p class="p-2">Edit Department</p>
    </div>
    <form action="{{route('department.update',$data->id)}}" method="post">
        @csrf
        <div class="row">

            <div class="row mt-4">
                <div class="col-md-6 col-12">
                    <label for="company_id">Enter Company Name</label>
                    <select class="form-control" id="select2" name="company_id">
                        @foreach ($companys as $company)
                            @if($data->companyName == $company->name)
                                <option selected  value={{$company->id}}>{{$company->name}}</option> 
                            @else
                                <option value={{$company->id}}>{{$company->name}}</option> 
                            @endif
                       @endforeach
                     </select>
                </div>
                <div class="col-md-6 col-12">
                    <label for="name">Enter Department Name</label>
                    <input type="text" class="form-control" name="name" aria-describedby="emailHelp" value="{{$data->name}}" />
                </div>
            </div>

            
            <div class="row mt-4">
                <div class="col-md-6 col-12">
                    <label for="status">Enter Department status</label>
                    <select class="form-select" aria-label="Default select example" name="status">
                        @if( $data->status =='1')
                            <option selected value="1">Active</option>
                            <option value="2">Inactive</option>
                       @else
                            <option  value="1">Active</option>
                            <option selected value="2">Inactive</option>
                       @endif
                    </select>
                </div>
                <div class="col-md-6 col-12">
                    <label for="head_of_dep">Enter Head of the Department</label>
                    <select class="form-control" id="select3" name="head_of_dep">
                        @if($data->head == null)
                           <option selected value=0>No Department Head</option>
                        @endif
                        
                        @foreach ($users as $user)
                            
                            @if($data->head == $user->employee_id )
                                <option selected value={{$user->employee_id}}>{{$user->name}}</option> 
                            @else
                                <option value={{$user->employee_id}}>{{$user->name}}</option> 
                            @endif

                        @endforeach
                     </select>
                </div>
            </div>

            <div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
            </div>

        </div>
    </form>
</div>

<script>
    $('#select2').select2();
    $('#select3').select2();
</script>
@endsection

