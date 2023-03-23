@extends('layouts.layout')
@section('content')
<div>
    <div class="container">
        <p class="notification pt-5">Notification</p>
        <div>
            @foreach ($notifications as $notification)
                <div class="eachNotificationBox mt-3">
                    <p class="d-flex notification-text p-2 ">
                        <a class="a-link" href="{{route('application.show',$notification->leave_id)}}"> {{$notification->name}} Apply for Leave Application </a>
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection