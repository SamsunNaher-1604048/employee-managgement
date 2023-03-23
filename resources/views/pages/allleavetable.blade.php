@extends('layouts.layout')
@section('content')
<div>
    <div class="">
        <p class="notification p-3">All Leave Application</p>
        <div class="mt-3">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Department</th>
                    <th scope="col">Staus Change</th>
                    <th scope="col">Show Application</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($datas as $data)
                    <tr>
                        <td scope="row">{{$data->name}}</th>
                        <td>{{$data->userdesignation}}</td>
                        <td>{{$data->deparetmentName}}</td>
                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$data->id}}">Change Status</button></td>
                        <td><a type="button" class="btn btn-primary" href="{{route('application.show',$data->leave_id)}}">Show Application</a></td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>

        {{-- model section --}}

        <div class="modal fade" id="exampleModal{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{route('leave.approve',$data->leave_id)}}" method="post">
                    @csrf
                    <div class="mt-4">
                      <label for="exampleFormControlTextarea1" class="form-label">Show Approval</label>
                      <select class="form-select" aria-label=".form-select example" name="approve">
                        <option value="Approve">Approve</option>
                        <option value="Inapprove">Inapprove</option>
                      </select>
                    </div>

                    <div class="mt-3">
                      <label for="exampleFormControlTextarea1" class="form-label"> Resone Box:</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">submit</button>
                    
                  </form>
                </div>
              </div>
            </div>
          </div>

    </div>

</div>
@endsection