@extends('layouts.layout')
@section('content')

<div class="d-flex flex-column">
    <div class="row m-4">
        <div class="col-3 dashboard_box m-4">
           <p class="dashboard_text">Total Company: {{$company}}</p>
        </div>
        <div class="col-3 dashboard_box m-4">
            <p class="dashboard_text">Total Depatment: {{$department}}</p>
        </div>
        <div class="col-3 dashboard_box m-4">
            <p class="dashboard_text">Total Employee: {{$user}}</p>
        </div>
    </div>

</div>

@include('pages.leaveapply')
@endsection