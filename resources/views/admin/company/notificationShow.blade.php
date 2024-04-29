@extends('layouts.master')
@section('title') Admin | Notification @endsection
@section('content')
<div class="notification-container" >
    @foreach ($notifications as $notification)
    <div class="notification" id="notification{{ $notification->id }}">
        <div class="notification-header"> {{Helper::get_localizedDefault ($notification->title) }}</div>
        <div class="notification-body hidden">{{ Helper::get_localizedDefault ($notification->message) }}</div>
    </div>
    @endforeach
</div>

<style>
    .notification-container {
    max-width: 400px;
    margin: 50px auto;
    padding: 50px;
}

.notification {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 10px;
}

.notification-header {
    padding: 10px;
    font-weight: bold;
    color: #333;
    border-bottom: 1px solid #ddd;
}

.notification-body {
    padding: 10px;
    color: #666;
}

.hidden {
    display: none;
}

.notification.active .notification-body {
    display: block;
}

</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.notification').click(function() {
            $('.notification').removeClass('active');
            $(this).toggleClass('active');
        });
    });
</script>

@endsection