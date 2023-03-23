@extends('layouts.layout')
@section('content')
<div class="m-3 p-3 inputbox">
    <div class="titlebox m-3">
        <p class="p-2">Show Company Data</p>
    </div>
    
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            <th scope="col">logo</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td>{{$data->name}}</td>

                    @if($data->status==1)
                      <td>Active</td>
                    @else
                       <td>Inactive</td>
                    @endif


                    @if($data->logo !=" ")
                      <td><a href="{{asset($data->logo)}}"  type="button" class="btn btn-outline-secondary">Show image</a></th>
                    @else
                      <td>No image</td>
                    @endif

                    <td><a href="{{route('company.edit',$data->id)}}" type="button" class="btn btn-primary">Edit data</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection