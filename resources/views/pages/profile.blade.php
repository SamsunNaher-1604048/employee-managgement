@extends('layouts.layout')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  
    <div class="mt-5">
      <p class="profile-title text-primary">Profile</p>
      <p class="profile-subtitle">Employee Section</p>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class='row d-flex justify-content-center mt-5 profile-box'>
          <div class="col-4">
            <p class="profile-data-title text-primary">Details info</p>
            <hr class="my-0  text-primary" />
            <div class="mt-5">
              <p class="profile-data">Name: {{$user->name}}</p>
              <p class="profile-data">Employee_id: {{$user->employee_id}}</p>
              <p class="profile-data">Designation: {{$user->userDesignation}}</p>
              <p class="profile-data">Company Name: {{$user->companyName}}</p>
              <p class="profile-data">Department Name: {{$user->departmentName}}</p>
              <p class="profile-data">Reporting Boss: {{$report == null ? 'No reporting Boss': $report->name}}</p>
              <p class="profile-data">Date of Birth: {{$user->date_of_birth}}</p>
              <p class="profile-data">Total Leave: {{$user->leave}}</p>
            </div>
          </div>
          <div class="col-4 d-flex align-items-center justify-content-center ">
            <div class="">
              <img
                src="{{asset($user->profile_pic)}}" 
                alt="user-avatar"
                height=250px
                width=250px
                id="uploadedAvatar"
                class="profile-img"
              />
            </div>
          </div>
    
          <div class="col-4">
            <p class="profile-data-title  text-primary ">Contact Information</p>
            <hr class="my-0  text-primary" />
            <div class="mt-5">
               <p class="profile-data profile-data-title">Email</p>
               <p class="profile-data">{{$user->email}}</p>
               <p class="profile-data profile-data-title">Phone</p>
               <p class="profile-data"> {{$user->phone}}</p>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>

@include('pages.leaveapply')
@endsection