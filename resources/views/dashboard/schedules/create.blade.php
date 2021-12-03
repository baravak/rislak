@php
if(isset($session)){
    $callbackCancel = route('dashboard.sessions.show', $session);
}else{
    $callbackCancel = route('dashboard.rooms.show', $room);
}
@endphp
@section('form_action'){{ isset($session) ? route('dashboard.sessions.update', $session->id) : route('dashboard.room.schedules.store',$room->id) }}@endsection
@extends('dashboard.create')
@section('form_content')
@isset($session)
    <input type="hidden" name="change_id" value="{{ $session->change_id }}">
@endisset
<div class="mt-4">
    <ul data-tabs>
        <li><a data-tabby-default href="#time-tab" class="focus direct" role="presentation">@lang('Time') </a></li>
        @if (!isset($case))
            <li><a href="#clients-tab" class="focus direct" role="presentation">@lang('Clients')</a></li>
        @endif
        <li><a href="#session-tab" class="focus direct" role="presentation">@lang('Session')</a></li>
        <li><a href="#platform" class="focus direct" role="presentation">@lang('Sessions place')</a></li>
        <li><a href="#payment-tab" class="focus direct" role="presentation">@lang('Payment')</a></li>
    </ul>
</div>
<div id="time-tab">
    @include('dashboard.schedules.create.time')
</div>
@isset($case)
    <input type="hidden" name="clients_type" value="case">
    <input type="hidden" name="case_id" value="{{ $case->id }}">
@else
    <div id="clients-tab">
            @include('dashboard.schedules.create.client')
    </div>
@endisset

<div id="session-tab">
    @include('dashboard.schedules.create.session')
</div>

<div id="platform">
    @include('dashboard.schedules.create.platform')
</div>

<div id="payment-tab">
    @include('dashboard.schedules.create.payment')
</div>
@endsection
