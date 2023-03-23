@extends('layouts.layout')
@section('content')
<div class="m-3 p-3 inputbox">
    <div class="titlebox m-3">
        <p class="p-2">Show All Designation</p>
    </div>
    
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Department</th>
            <th scope="col">Designation</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td>{{$data->DepartmentName}}</td>
                    <td>{{$data->designation}}</td>
                    <td><a href="{{route('designation.edit',$data->id)}}" type="button" class="btn btn-primary">Edit Data</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection