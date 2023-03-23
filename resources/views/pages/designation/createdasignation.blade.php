@extends('layouts.layout')
@section('content')
<div class="m-3 p-3 inputbox">
    <div class="titlebox mt-3 mr-2">
        <p class="p-2">Create Designation</p>
    </div>
    <form action="{{route('designation.store')}}" method="post">
        @csrf
        <div class="row">

            <div class="row">
                <div class="col-lg-6 col-12">
                    <label for="name">Enter Department Name</label>
                    <select class="form-select" aria-label="Default select example" name='department_id'>
                        @foreach ($departments as $department)
                           <option value={{$department->id}}>{{$department->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-6 col-12">
                    <label for="status">Enter Designation</label>
                    <input type="text" class="form-control" name="designation">
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Add Designation</button>
            </div>

            </div>
        </div>
    </form>
</div>
@endsection
