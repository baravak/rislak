<div data-xhr="sample-list-{{ $sample->id }}" class="flex items-center bg-gray-50 hover:bg-gray-100 transition py-3 sm:py-2 p-2 rounded mt-2">
    @can('management', [$sample, isset($room) ? $room : null])
        <a href="{{ urldecode(route('dashboard.samples.show', $sample->id)) }}" class="w-24 text-xs text-gray-600 hover:text-blue-600 transition hidden lg:flex">
            <span class="text-right dir-ltr en">{{ $sample->id }}</span>
        </a>
    @else
        <div class="w-24 hidden lg:flex text-xs text-gray-600 cursor-default">
            <span class="text-right dir-ltr en">{{ $sample->id }}</span>
        </div>
    @endcan
    <div class="flex-1 px-2 flex flex-col">
        @can('management', [$sample, isset($room) ? $room : null])
            <a href="{{ urldecode(route('dashboard.samples.show', $sample->id)) }}" class="group text-xs text-gray-600 hover:text-blue-600 transition border-r-2 border-gray-400 sm:border-none hover:border-blue-600 pr-2 sm:pr-0">
                <span class="block">{{ $sample->scale->title }}</span>
                <span class="block text-gray-400 font-light group-hover:text-blue-600">{{$sample->edition ? __('Edition :title', ['title' => $sample->edition]) .' - ' : ''}} {{ __('Version :ver', ['ver' => $sample->version]) }}</span>
            </a>
        @else
            <div class="text-xs text-gray-600 border-r-2 border-gray-400 sm:border-none pr-2 sm:pr-0 cursor-default">
                <span class="block">{{ $sample->scale->title }}</span>
                <span class="block text-gray-400 font-light group-hover:text-blue-600">{{$sample->edition ? __('Edition :title', ['title' => $sample->edition]) .' - ' : ''}} {{ __('Version :ver', ['ver' => $sample->version]) }}</span>
            </div>
        @endcan
        <div class="mt-4 sm:hidden flex flex-col">
            @if ((isset($bulkSample) && $bulkSample->case_status == 'personal') || !isset($bulkSample))
                @if ($sample->room)
                    <div class="flex">
                        <a href="{{ $sample->room->route('show') }}" class="text-xs text-gray-600 hover:text-blue-500 underline">{{ __('Therapy room of :user', ['user' => $sample->room->manager->name]) }}</a>
                    </div>
                @endif
                @if ($sample->case)
                    <div class="flex">
                        <a class="text-xs text-gray-500 hover:text-blue-500 underline mt-2" href="{{ route('dashboard.cases.show', $sample->case->id) }}">@lang('Case') {{ $sample->case->id }}</a>
                    </div>
                @endif
            @endif
            @if ($sample->client)
                <span class="md:hidden text-xs text-gray-400 cursor-default mt-2">مراجع: @displayName($sample->client)</span>
            @else
                <span class="md:hidden text-xs text-gray-400 cursor-default mt-2">مراجع: {{ $sample->code }}</span>
            @endif
        </div>
        <div class="mt-2 sm:hidden flex items-center">
            <span class="text-xs text-gray-500 ml-1 cursor-default">@lang('Status'): </span>
            @include('dashboard.samples.tables.status')
        </div>
        <div class="sm:hidden flex items-center dir-ltr mt-4">
            @include('dashboard.samples.do')
        </div>
    </div>
    <div class="flex-1 px-2 hidden md:flex">
        @if ($sample->client)
            <span class="text-xs text-gray-600 cursor-default">@displayName($sample->client)</span>
        @else
            <span class="text-xs text-gray-600 cursor-default">{{ $sample->code }}</span>
        @endif
    </div>


    @if ((isset($bulkSample) && $bulkSample->case_status == 'personal') || !isset($bulkSample))
        <div class="flex-1 px-2 hidden sm:flex flex-col">
            @if ($sample->room)
                <a href="{{ $sample->room->route('show') }}" class="text-xs text-gray-600 hover:text-blue-500 underline">{{ __('Therapy room of :user', ['user' => $sample->room->manager->name]) }}</a>
            @endif
            @if ($sample->case)
                <a class="text-xs text-gray-500 hover:text-blue-500 underline mt-2" href="{{ route('dashboard.cases.show', $sample->case->id) }}">@lang('Case') {{ $sample->case->id }}</a>
            @endif
            @if ($sample->client)
                <span class="md:hidden text-xs text-gray-400 cursor-default mt-2">مراجع: @displayName($sample->client)</span>
            @else
                <span class="md:hidden text-xs text-gray-400 cursor-default mt-2">مراجع: {{ $sample->code }}</span>
            @endif
        </div>
    @endif


    <div class="flex-1 px-2 hidden sm:flex">
        @include('dashboard.samples.tables.status')
    </div>
    <div class="flex-1 px-2 text-left dir-ltr hidden sm:flex">
        @include('dashboard.samples.do')
    </div>
</div>
