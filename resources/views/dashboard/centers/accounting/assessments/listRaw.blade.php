<div class="flex flex-col sm:flex-row sm:items-center bg-gray-50 hover:bg-gray-100 transition py-3 pb-4 sm:py-2 p-2 rounded mt-2" x-data="{allowed: {{ $assessment->allowed ? 'true' : 'false' }}, amount:{{ $assessment->amount ?: '0' }}, region_amount:{{ $assessment->region_amount ?: '0' }}, temp_allowed : {{ $assessment->allowed ? 'true' : 'false' }}, default_amount : {{ $assessment->region_amount == $assessment->amount ? 'true' : 'false' }}}">
    <div class="w-40 cursor-default pl-2 hidden lg:flex">
        <span class="block text-xs text-gray-600 en dir-ltr text-right">{{ $assessment->assessment->id }}</span>
    </div>
    <div class="flex-1 px-2 cursor-default">
        <div class="text-xs text-gray-600 variable-font-medium lg:variable-font-normal"> {{ substr($assessment->assessment->title, 0, -4) }}</div>
        <span class="block text-xs text-gray-600 en dir-ltr text-right mt-1 lg:hidden">{{ $assessment->assessment->id }}</span>
        <div class="flex items-center text-xs text-gray-400 mt-1">
            @if ($assessment->assessment->edition)
                <span>@lang('Edition') {{ $assessment->assessment->edition }}</span>
                <span class="px-2">-</span>
            @endif
            <span>@lang('Version') {{ $assessment->assessment->version }}</span></span>
        </div>
    </div>
    @isset ($room)
        <div class="flex-1 px-2 mt-2 sm:mt-0 cursor-default">
            <span class="text-xs text-gray-600 sm:hidden ml-2">@lang('مبلغ در مرکز'):</span>
            <span class="text-xs text-gray-600 pt-0.5 variable-font-medium sm:variable-font-normal" x-currency.3="region_amount"></span>
        </div>
        <div class="flex-1 px-2 mt-1 sm:mt-0">
            @can('updateGraph', [App\Center::class, $center])
                <label for="default-{{ $assessment->assessment->id }}" class="flex items-center cursor-pointer group">
                    <span class="text-xs text-gray-600 sm:hidden cursor-default ml-2">@lang('مبلغ در اتاق'): </span>
                    <template x-if="!default_amount">
                        <input id="default-{{ $assessment->assessment->id }}" type="checkbox" class="w-4 h-4 rounded border border-gray-400 focus" x-model="default_amount" data-method="PUT" data-action="{{ urldecode(route('dashboard.atom.assessments.update', ['room' => $room->id, 'assessment' => $assessment->assessment->id])) }}" x-lijax:click>
                    </template>

                    <template x-if="default_amount">
                        <input id="default-{{ $assessment->assessment->id }}" type="checkbox" class="w-4 h-4 rounded border border-gray-400 focus" x-model="default_amount">
                    </template>
                    <span class="text-xs text-gray-600 mr-1.5 group-hover:text-blue-600">@lang('پیش‌فرض مرکز')</span>
                </label>
                <div class="flex items-center mt-2" x-show="!default_amount">
                    <div class="mt-2 xs:mt-0 relative inline-block">
                        <input id="amount-input-{{ $assessment->assessment->id }}" type="tel" name="amount" class="text-left dir-ltr w-40 h-8 pl-12 border border-gray-300 rounded text-sm text-gray-600 focus" xdata-lijax="700 change"  :data-value="amount" data-method="PUT" data-action="{{ urldecode(route('dashboard.atom.assessments.update', ['room' => $room->id, 'assessment' => $assessment->assessment->id])) }}" autocomplete="off" x-amontity="amount" x-lijax:keyup.700ms x-lijax:change x-lijax:paste x-on:statio-init="$el.readonly = true" x-on:statio-done="$el.readonly = false;">
                        <label for="amount-input-{{ $assessment->assessment->id }}" class="absolute left-1 top-1/2 transform -translate-y-1/2 flex items-center px-2 pt-0.5 h-6 text-xs bg-gray-200 rounded text-gray-600">@lang('تومانءءء')</label>
                    </div>
                </div>
            @else
                <span class="text-xs text-gray-600 pt-0.5 variable-font-medium sm:variable-font-normal" x-currency.3="amount"></span>
            @endcan
        </div>
    @else
        <div class="flex-1 px-2 mt-2 sm:mt-0">
            <span class="text-xs text-gray-600 sm:hidden ml-2">@lang('Amount'):</span>
            <div class="mt-2 xs:mt-0 relative inline-block" x-show="temp_allowed">
                <input id="amount-input-{{ $assessment->assessment->id }}" type="tel" name="amount" class="text-left dir-ltr w-40 h-8 pl-12 border border-gray-300 rounded text-sm text-gray-600 focus" xdata-lijax="700 change"  :data-value="amount" data-method="PUT" data-action="{{ route('dashboard.center.assessments.index', [$center->id]) }}/{{ $assessment->assessment->id }}" autocomplete="off" x-amontity="amount" x-lijax:keyup.700ms x-lijax:change x-lijax:paste x-on:statio-init="$el.readonly = true" x-on:statio-done="$el.readonly = false; allowed=true">
                <label for="amount-input-{{ $assessment->assessment->id }}" class="absolute left-1 top-1/2 transform -translate-y-1/2 flex items-center px-2 pt-0.5 h-6 text-xs bg-gray-200 rounded text-gray-600">@lang('تومانءءء')</label>
            </div>
            <button type="button" class="flex items-center justify-center w-40 h-8 rounded border border-green-600 text-green-600 text-sm hover:text-white hover:bg-green-600 transition" x-show="!temp_allowed" x-on:click="temp_allowed = true">
                @lang('افزودن به لیست')
            </button>
        </div>
        <template x-if="allowed">
            <div class="w-20 dir-ltr text-left px-2 hidden sm:flex" x-data="" >
                <button x-lijax:click data-method="DELETE" data-action="{{ route('dashboard.center.assessments.index', [$center->id]) }}/{{ $assessment->assessment->id }}" class="text-gray-600 hover:text-red-600 transition mr-4" title="حذف آزمون" x-on:statio-done="allowed = false; amount = 0; temp_allowed = false">
                    <i class="fal fa-trash-alt pt-0.5 text-sm"></i>
                </button>
                <a href="{{ urldecode(route('dashboard.center.assessments.show', ['center' => $center->id, 'assessment'=> $assessment->assessment->id])) }}" class="text-gray-600 hover:text-blue-600 transition" title="مبلغ این آزمون در اتاق‌های درمان" x-statio>
                    <i class="fal fa-loveseat pt-1"></i>
                </a>
            </div>
        </template>
        <template x-if="!allowed">
            <div class="w-20 dir-ltr text-left px-2 hidden sm:flex"></div>
        </template>
    @endif
</div>
