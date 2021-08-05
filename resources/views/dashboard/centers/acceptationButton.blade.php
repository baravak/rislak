<div class="flex" data-xhr="center-acceptation-button">
    <a href="{{ route('dashboard.center.schedules.index', $center->id) }}" class="flex items-center justify-center border border-gray-300 rounded-full h-9 w-9 hover:bg-gray-100 transition text-gray-400 focus mr-2" title="@lang('Therapy Schedules')" aria-label="@lang('Therapy Schedules')">
        <i class="fal fa-calendar-alt"></i>
    </a>
    @can('acceptation', $center)
    <a href="{{route('dashboard.centers.request', $center->id)}}" data-lijax="click" data-method="POST" class="flex justify-center items-center flex-shrink-0 text-white bg-green-600 hover:bg-green-700 w-auto px-4 sm:px-8 h-9 rounded-full text-xs sm:text-sm transition spinner">
        <span class="font-medium">{{ __('Acceptation request') }}</span>
    </a>
    @endcan
</div>
