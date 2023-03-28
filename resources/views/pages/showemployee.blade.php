@extends('layouts.layout')
@section('content')
<div>
    <div class="">
        <p class="notification p-3">All Employee</p>
        <div class="mt-3">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->designation}}</td>
                        <td>
                            <a type="button" class="btn btn-outline-primary" href="">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection