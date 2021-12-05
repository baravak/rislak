@php
    $_requestStatus = explode(',', request()->status)
@endphp
<div class="flex items-center flex-wrap mb-2">
    @if (in_array('open', $_requestStatus))
        <div class="flex items-center bg-gray-200 px-2 h-7 ml-2 rounded">
            <span class="text-xs text-gray-800 ml-2 cursor-default">فعال</span>
            <a href="{{ request()->create(url()->current(), 'GET', array_merge(request()->all(), ['status' => join(',', array_filter($_requestStatus, function($v){return $v != 'open';}))]))->getUri() }}" class="inline-flex items-center text-xs justify-center text-gray-600 w-3 h-3 rounded-full focus:outline-none hover:text-red-600"><i class="fal fa-times"></i></a>
        </div>
    @endif
    @if (in_array('awaiting', $_requestStatus))
        <div class="flex items-center bg-gray-200 px-2 h-7 ml-2 rounded">
            <span class="text-xs text-gray-800 ml-2 cursor-default">در انتظار</span>
            <a href="{{ request()->create(url()->current(), 'GET', array_merge(request()->all(), ['status' => join(',', array_filter($_requestStatus, function($v){return $v != 'awaiting';}))]))->getUri() }}" class="inline-flex items-center text-xs justify-center text-gray-600 w-3 h-3 rounded-full focus:outline-none hover:text-red-600"><i class="fal fa-times"></i></a>
        </div>
    @endif
    @if (in_array('expires', $_requestStatus))
        <div class="flex items-center bg-gray-200 px-2 h-7 ml-2 rounded">
            <span class="text-xs text-gray-800 ml-2 cursor-default">منقضی شده</span>
            <a href="{{ request()->create(url()->current(), 'GET', array_merge(request()->all(), ['status' => join(',', array_filter($_requestStatus, function($v){return $v != 'expires';}))]))->getUri() }}" class="inline-flex items-center text-xs justify-center text-gray-600 w-3 h-3 rounded-full focus:outline-none hover:text-red-600"><i class="fal fa-times"></i></a>
        </div>
    @endif
</div>
