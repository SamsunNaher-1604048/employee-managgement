@extends('layouts.layout')
@section('content')
<div class="m-3 p-3 inputbox">
    <div class="titlebox m-3">
        <p class="p-2">Leave Your Opinion</p>
    </div>
    <form action="{{route('leave.approve.status',$id)}}" method="post" >
        @csrf
        <div class="row">

            <div class="col-lg-6 col-12">
                <div class="col-12 mt-3">
                    <label for="status">submit Status</label>
                    <select class="form-select" aria-label="Default select example" name="status">
                        <option value="Approve">Approve</option>
                        <option value="Inapprove">Inapprove</option>
                      </select>
                </div>
            </div>

            <div class="col-lg-6 col-12">
                <label for="description">Enter Your Resone</label>
                <textarea type="text" class="form-control" name="resone" aria-describedby="emailHelp" rows="8" cols="50" ></textarea>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </div>
    </form>
</div>


@endsection