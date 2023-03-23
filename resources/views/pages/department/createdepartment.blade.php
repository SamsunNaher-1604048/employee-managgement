@extends('layouts.layout')
@section('content')
<div class="m-3 p-3 inputbox">
    <div class="titlebox m-3">
        <p class="p-2">Create Department</p>
    </div>
    <form action="{{route('department.store')}}" method="post">
        @csrf
        <div class="row">

            <div class="row mt-4">
                <div class="col-12 col-md-6">
                    <label for="company_id">Enter Company Name</label>
                    <select class="form-control" id="select2" name="company_id">
                        @foreach ($companys as $company)
                            <option value="{{$company->id}}">{{$company->name}}</option> 
                       @endforeach
                     </select>

                </div>
                <div class="col-12 col-md-6">
                    <label for="name">Enter Department Name</label>
                    <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="ex....." required/>
                </div>
            </div>

            
            <div class="row mt-4">
                <div class="col-12 col-md-6">
                    <label for="status">Enter Department status</label>
                    <select class="form-select" aria-label="Default select example" name="status" required>
                        <option value="1">Active</option>
                        <option value="2">inactive</option>
                    </select>
                </div>
                <div class="col-12 col-md-6">
                    <label for="head_of_dep">Enter Head of the Department</label>
                    <select class="form-control" id="select3" name="head_of_dep">
                        <option value = 0 >No Department Head</option>
                        @foreach ($users as $user)
                            <option value={{$user->employee_id}}>{{$user->name}}</option> 
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

