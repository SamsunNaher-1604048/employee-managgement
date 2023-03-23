@extends('layouts.layout')
@section('content')

<div class="m-3 p-3 inputbox">
    <div class="titlebox m-3">
        <p class="p-2">Create Company</p>
    </div>
    <form action="{{route('company.store')}}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-lg-6 col-12">
                <div class="col-12">
                    <label for="name">Enter Company Name</label>
                    <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="ex:....." required>
                </div>
                <div class="col-12 mt-3">
                    <label for="status">Enter Company Status</label>
                    <select class="form-select" aria-label="Default select example" name="status">
                        <option value="1" selected>Active</option>
                        <option value="2">Inactive</option>
                      </select>
                </div>
                <div class="col-12 mt-4">
                    <div class="col-6">
                        <input type="file" name="logo"  class="imagesubmit"><br> 
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">submit</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-12">
                <label for="description">Enter Company Details(optional)</label>
                <textarea type="text" class="form-control" name="description" aria-describedby="emailHelp" placeholder="ex....."rows="8" cols="50" ></textarea>
            </div>

        </div>
    </form>
</div>


@endsection