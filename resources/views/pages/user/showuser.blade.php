
@extends('layouts.layout')
@section('content')
<div class="m-3 p-3 inputbox">
    <div class="titlebox m-3">
        <p class="p-2">Show Employee Data</p>
    </div>
    
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Enployee id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Status</th>
            <th scope="col">Company</th>
            <th scope="col">department</th>
            <th scope="col">Profile Pic</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td>{{$data->employee_id}}</td>
                    <td>{{$data->name}}</th>
                    <td>{{$data->email}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->status}}</td>
                    <td>{{$data->conpany_name}}</th>
                    <td>{{$data->department_name}}</th>
                    @if($data->profile_pic== null)
                        <td><p>No Image</p></th> 
                    
                    @else
                        <td><img src="{{asset($data->profile_pic)}}" alt="" width="60" height="60"></th>
                    
                    @endif
                    <td><a href="{{route('user.edit',$data->id)}}" type="button" class="btn btn-primary">Edit data</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection