@php
    $bulk = $theory->response('bulk_sample');
    $bulk = (new  App\BulkSample((array) $bulk));
@endphp
@section('auth-form')
    <div class="flex justify-between items-center border border-gray-300 rounded p-2 mb-2 bg-gray-50">
        @if ($bulk->room->type == 'personal_clinic')
        @else
            <a href="{{ route('dashboard.centers.show', $bulk->room->center->id) }}" class="flex justify-center items-center flex-shrink-0 w-14 h-14 bg-gray-300 text-gray-600 text-xs rounded-full border-2 border-white overflow-hidden" title="@center($bulk->room->center)" aria-label="@center($bulk->room->center)">
                @avatarOrName($bulk->room->center->detail)
            </a>
        @endif
        <div class="text-center px-1">
            @if ($bulk->room->type == 'personal_clinic')
            {{-- <a href="{{ route('dashboard.centers.show', $bulk->room->center->id) }}" class="block text-sm variable-font-medium text-gray-800 hover:text-brand transition" title="@center($bulk->room->center)" aria-label="{{ $bulk->room->manager->name }}">{{ $bulk->room->manager->name }}</a> --}}
            @else
                <a href="{{ route('dashboard.centers.show', $bulk->room->center->id) }}" class="block text-sm variable-font-medium text-gray-800 hover:text-brand transition" title="@center($bulk->room->center)" aria-label="@center($bulk->room->center)">@center($bulk->room->center)</a>
                <a href="{{ route('dashboard.rooms.show', $bulk->room->id) }}" class="block text-xs text-gray-600 hover:text-brand transition mt-1" title="@lang('Therapy room of :user', ['user' => $bulk->room->manager->name])" aria-label="@lang('Therapy room of :user', ['user' => $bulk->room->manager->name])">@lang('Therapy room of :user', ['user' => $bulk->room->manager->name])</a>
            @endif
        </div>
        {{-- <a href="{{ route('dashboard.rooms.show', $bulk->room->id) }}" class="flex justify-center items-center flex-shrink-0 w-14 h-14 bg-gray-300 text-gray-600 text-xs rounded-full border-2 border-white overflow-hidden" title="@lang('Therapy room of :user', ['user' => $bulk->room->manager->name])" aria-label="@lang('Therapy room of :user', ['user' => $bulk->room->manager->name])">
            @avatarOrName($bulk->room->manager)
        </a> --}}
    </div>
    <div class="flex flex-col border border-gray-300 rounded p-4 bg-gray-50 mb-4 cursor-default">
        <h3 class="text-sm variable-font-medium text-gray-700 mb-2">{{ __('Samples list') }}</h3>
        <div class="w-full max-h-36 overflow-y-auto bg-gray-100 rounded p-3">
            <ul class="samplesLogin-list">
                @foreach ($bulk->scales as $scale)
                    <li>{{ $scale->title }}</li>
                @endforeach
            </ul>
        </div>

        <span class="text-xs text-gray-600 mt-4">
            در این فرایند، آزمون‌های فوق برای شما فعال شده و می‌توانید آن‌ها را تکمیل کنید.
        </span>
        {{-- @if (!$bulk->room->center->acceptation)
            <span class="text-xs text-gray-600 mt-1">
                پس از این مرحله، شما عضو این مرکز درمانی و اتاق درمان خواهید شد و مدیران قادر به دیدن شماره تماس شما می‌باشند.
            </span>
        @endif --}}

        @if (!$bulk->room->center->acceptation)
        <div class="mt-4">
            <label for="nickname" class="block mb-2 text-sm text-gray-700 variable-font-medium">{{ __('My nickname') }}</label>
            <input type="text" class="w-full text-sm border border-gray-200 rounded" id="nickname" name="nickname" value="{{ auth()->user()->name }}" placeholder="{{ __('Nickname') }}">
        </div>
        @endif
        <button type="submit" class="flex items-center justify-center w-full h-10 text-sm rounded-full bg-brand text-white hover:bg-brand-600 transition mt-4 focus" title="{{ __('Verify and continue') }}" aria-label="{{ __('Verify and continue') }}" role="button">{{ __('Verify and continue') }}</button>
    </div>
@endsection

@extends('auth.theory')
