<input data-basePage="{{isset($global->page) ? $global->page : ''}}" data-xhrBase="quick_search" data-lijax="300" data-name="q" data-state="both" id="quick_search" value="{{request()->q}}" type="search" class="flex-1 ml-4 text-sm border border-gray-200 rounded-sm" placeholder="{{ __('Search') }}">
