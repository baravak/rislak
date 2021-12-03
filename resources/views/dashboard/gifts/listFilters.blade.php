<div class="flex items-center justify-start mb-4 flex-wrap" x-data='{filters : {!! json_encode(request()->all('open', 'expires', 'awaiting')) !!}}' data-xhr="filters">
    <div class= "ml-2 mt-2 sm:mt-0 relative inline-block">
        <a href="{{ request()->create(url()->current(), 'GET', array_merge(request()->all(), ['open' => 1]))->getUri() }}" class="flex items-center border rounded-full px-4 h-8 transition focus text-xs border-brand text-brand border-gray-300 inline-block" :class='{"border-gray-300" : filters.open == null, "bg-blue-50" : filters.open != null}' data-lijax data-state="true" data-xhrBase="filters" x-on:click="filters.open = true">
            <a href="{{ request()->create(url()->current(), 'GET', array_merge(request()->all(), ['open' => null]))->getUri() }}" class="relative top-0.5 ml-2" x-show="filters.open" data-lijax data-state="true" data-xhrBase="filters" x-on:click="filters.open = null">
                <i class="fas fa-times-circle"></i>
            </a>
            <span class="text-sm">فعال</span>
        </a>
    </div>
    <div class= "ml-2 mt-2 sm:mt-0 relative inline-block">
        <a href="{{ request()->create(url()->current(), 'GET', array_merge(request()->all(), ['expires' => 1]))->getUri() }}" class="flex items-center border rounded-full px-4 h-8 transition focus text-xs border-brand text-brand border-gray-300 inline-block" :class='{"border-gray-300" : filters.expires == null, "bg-blue-50" : filters.expires != null}' data-lijax data-state="true" data-xhrBase="filters" x-on:click="filters.expires = true">
            <a href="{{ request()->create(url()->current(), 'GET', array_merge(request()->all(), ['expires' => null]))->getUri() }}" class="relative top-0.5 ml-2" x-show="filters.expires" data-lijax data-state="true" data-xhrBase="filters" x-on:click="filters.expires = null">
                <i class="fas fa-times-circle"></i>
            </a>
            <span class="text-sm">منقضی</span>
        </a>
    </div>
    <div class= "ml-2 mt-2 sm:mt-0 relative inline-block">
        <a href="{{ request()->create(url()->current(), 'GET', array_merge(request()->all(), ['awaiting' => 1]))->getUri() }}" class="flex items-center border rounded-full px-4 h-8 transition focus text-xs border-brand text-brand border-gray-300 inline-block" :class='{"border-gray-300" : filters.awaiting == null, "bg-blue-50" : filters.awaiting != null}' data-lijax data-state="true" data-xhrBase="filters" x-on:click="filters.awaiting = true">
            <a href="{{ request()->create(url()->current(), 'GET', array_merge(request()->all(), ['awaiting' => null]))->getUri() }}" class="relative top-0.5 ml-2" x-show="filters.awaiting" data-lijax data-state="true" data-xhrBase="filters" x-on:click="filters.awaiting = null">
                <i class="fas fa-times-circle"></i>
            </a>
            <span class="text-sm">درانتظار</span>
        </a>
    </div>
</div>
