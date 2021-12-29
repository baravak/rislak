<div class="relative flex flex-1">
    <input data-basePage="{{isset($global->page) ? $global->page : ''}}" data-xhrBase="quick_search" data-lijax="800 search" data-name="q" data-state="url" id="quick_search" value="{{request()->q}}" type="search" class="flex-1 text-sm border border-gray-300 rounded h-9 pr-2 xs:pl-8 focus placeholder-gray-400 text-gray-700" data-remove-query="page" placeholder="{{ __('Search') }}" x-on:statio-done="$refs.quickSearch ? $refs.quickSearch.dispatchEvent(new CustomEvent('jresp', {detail : event.detail})) : null">
    <span class="spinner"></span>
</div>
