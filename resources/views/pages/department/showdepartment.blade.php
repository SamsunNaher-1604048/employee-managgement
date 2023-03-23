@extends('layouts.layout')
@section('content')
<div class="m-3 p-3 inputbox">
    <div class="titlebox m-3">
        <p class="p-2">Show Company Data</p>
    </div>
    
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Department Name</th>
            <th scope="col">Company Name</th>
            <th scope="col">Status</th>
            <th scope="col">Head of Department</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <th>{{$data->name}}</th>
                    <th>{{$data->companyName}}</th>
                    @if($data->status==1)
                      <td>Active</td>
                    @else
                       <td>Inactive</td>
                    @endif
                    <th>{{$data->head}}</th>
                    <td><a href="{{route('department.edit',$data->id)}}" type="button" class="btn btn-primary">Edit data</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection