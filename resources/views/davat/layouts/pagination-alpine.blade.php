
<div x-show="{{ $__PaginateVar }}.total > {{ $__PaginateVar }}.per_page" x-effect="console.log({{ $__PaginateVar  }})">
    <nav class="flex justify-center items-center flex-wrap mt-8 text-sm">
        <a x-on:statio-done="$refs.quickSearch ? $refs.quickSearch.dispatchEvent(new CustomEvent('jresp', {detail : event.detail})) : null" data-xhrBase="alpine-paginate" x-show="{{ $__PaginateVar  }}.current_page != 1" :href="function(){var __url = new URL('{{ $paginator->path() }}'); __url.searchParams.set('page', {{ $__PaginateVar  }}.current_page -1); return __url.toString();}" class="flex justify-center items-center flex-shrink-0 h-7 ml-2 text-gray-700 hover:text-blue-600 transition" title="{{ __('Previous') }}" aria-label="{{ __('Previous') }}">{{ __('Previous') }}</a>
        {{-- <template x-for="i in Math.min(Math.ceil({{ $__PaginateVar }}.total / {{ $__PaginateVar }}.per_page), 7)">
            <div>
                <template x-if="{{ $__PaginateVar  }}.current_page != i">
                    <a x-on:statio-done="$refs.quickSearch ? $refs.quickSearch.dispatchEvent(new CustomEvent('jresp', {detail : event.detail})) : null" data-xhrBase="alpine-paginate" href="" :href="function(){var __url = new URL('{{ $paginator->path() }}'); __url.searchParams.set('page', i); return __url.toString();}"  class="flex justify-center items-center flex-shrink-0 w-7 h-7 ml-2 pt-1 text-gray-700 rounded-full hover:bg-gray-200 transition focus" x-text="i"></a>
                </template>
                <template x-if="{{ $__PaginateVar  }}.current_page == i">
                    <span class="flex justify-center items-center flex-shrink-0 w-7 h-7 ml-2 pt-1 bg-brand text-white rounded-full cursor-default" x-text="i"></span>
                </template>
            </div>
        </template> --}}
        <a x-on:statio-done="$refs.quickSearch ? $refs.quickSearch.dispatchEvent(new CustomEvent('jresp', {detail : event.detail})) : null" data-xhrBase="alpine-paginate" x-show="{{ $__PaginateVar  }}.last_page != {{ $__PaginateVar  }}.current_page" :href="function(){var __url = new URL('{{ $paginator->path() }}'); __url.searchParams.set('page', {{ $__PaginateVar  }}.current_page +1); return __url.toString();}" class="flex justify-center items-center flex-shrink-0 h-7 text-gray-700 hover:text-blue-600 transition" title="{{ __('Next') }}" aria-label="{{ __('Next') }}">{{ __('Next') }}</a>
    </nav>
</div>
