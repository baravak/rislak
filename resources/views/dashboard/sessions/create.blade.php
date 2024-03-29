@section('form_action'){{ isset($session) ? route('dashboard.sessions.update', $session->id) :route('dashboard.case.schedules.store', $case->id) }}@endsection
@extends('dashboard.create')
@section('form_content')
    <div class="mt-4">
        <label for="start-picker" class="block mb-2 text-sm text-gray-700 font-medium">@lang('Start time')</label>
        <input type="text" id="start-picker" data-picker-minDate="{{time()}}" data-picker-maxDate="{{time() + (365 * 24 * 60 * 60)}}" data-picker-alt="started_at" dpicker-time value="{{ isset($session->started_at) ? $session->started_at->timestamp : '' }}" class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 date-picker dir-ltr text-left">
        <input type="hidden" name="started_at" id="started_at">
    </div>

    <div class="mt-4">
        <label for="duration" class="inline-block mb-2 text-sm text-gray-700 font-medium">@lang('Session duration')</label>
        <span class="text-xs text-gray-600 font-light mr-1">(دقیقه)</span>
        <input type="text" placeholder="60" id="duration" name="duration" @formValue( $session->duration ) class="border border-gray-500 placeholder-gray-300 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 dir-ltr text-left">
    </div>

    <div class="mt-4">
        <label for="status" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">@lang('Status')</label>
        <select id="status" name="status" class="border border-gray-500 h-10 rounded pl-4 pr-8 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
            @foreach (['client_awaiting', 'session_awaiting', 'in_session', 'finished', 'canceled_by_client', 'canceled_by_center'] as $item)
                <option value="{{ $item }}" {!! isset($session->status) && $session->status == $item ? 'selected' : '' !!}>{{ __($item) }}</option>
            @endforeach
        </select>
    </div>
@endsection
