@extends('layouts.layout')
@section('content')
<div class="m-3 p-3 inputbox">
    <div class="titlebox mt-3 mr-2">
        <p class="p-2">Create Role</p>
    </div>
    <form action="{{route('role.store')}}" method="post">
        @csrf
        <div class="row">

            <div class="row">
                <div class="col-lg-6 col-12">
                    <label for="role_name">Enter Role</label>
                    <input type="text" class="form-control" name="role_name">
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Add Role</button>
            </div>

            </div>
        </div>
    </form>
</div>
@endsection
