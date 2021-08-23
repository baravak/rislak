@extends($layouts->dashboard)
@section('content')
    <div class="m-auto w-full md:w-2/3 xl:w-1/2 border border-gray-300 rounded p-4 mb-2 bg-gray-50 cursor-default">
        <div class="flex items-center flex-wrap cursor-default mb-2">
            <h3 class="text-gray-900 variable-font-semibold">رزرو @lang('Therapy session') {{ $session->id }}</h3>
        </div>
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div class="flex items-start text-sm text-gray-700">
                <i class="fal fa-calendar-alt ml-2 w-4 pb-1"></i>
                <span class="variable-font-medium">@time($session->started_at, '%A %d %B %y ، ساعت H:i')</span>
            </div>
            <div class="flex items-start text-sm text-gray-700 mt-2 sm:mt-0">
                <i class="fal fa-clock ml-2 w-4 pb-1"></i>
                <span>{{ __(':time minute(s)', ['time' => $session->duration]) }}</span>
            </div>
        </div>
        <div class="text-sm variable-font-light text-gray-500 mt-2 cursor-default">{{ $session->description }}</div>
    </div>
    @include('dashboard.sessions.createUserForm')
@endsection