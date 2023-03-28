@extends('layouts.layout')
@section('content')
<div>
    <div class="">
        <p class="notification p-3">My All Leave Application</p>
        <div class="mt-3">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                    <tr>
                        <td scope="row">{{$data->name}}</th>
                        <td>{{$data->status}}</td>
                        <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d/m/Y')}}</td>
                        <td>
                            <a type="button" class="btn btn-outline-primary" href="{{route('myapplication.show',$data->id)}}">
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