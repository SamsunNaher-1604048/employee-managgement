@extends('layouts.layout')
@section('content')
<div class="m-3 p-3 inputbox">
    <div class="titlebox m-3">
        <p class="p-2">Show All Role</p>
    </div>
    
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Role name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td>{{$data->role_name}}</td>
                    <td><a href="{{route('role.edit',$data->id)}}" type="button" class="btn btn-primary">Edit Data</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection