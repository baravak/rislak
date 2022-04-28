<div class="flex-1 p-2 cursor-default mb-2 sm:mb-0 pb-4 sm:pb-2 border-b sm:border-none border-gray-200" :id="`${atom.id}-{{ $columnTopic }}`" data-topic="{{ $columnTopic }}" x-on:change-regiontopic="atom.commissions.{{ $columnTopic }}.value = $event.detail !== null && atom.commissions.{{ $columnTopic }}.pinned ? $event.detail : atom.commissions.{{ $columnTopic }}.value" x-on:lock-input="$el.querySelectorAll('input').forEach(input => {input.disabled = true})" x-on:unlock-input="$el.querySelectorAll('input').forEach(input => {input.disabled = false})">
    <div class="text-xs text-gray-600">
        <span class="ml-2">سهم اتاق <span class="sm:hidden">از {{ $columnTitle }}:</span></span>
        <span x-text="'%'+ (100 - atom.commissions.{{ $columnTopic }}.value)"></span>
    </div>
    <div class="mt-2 text-xs text-gray-600">
        <span class="ml-2">سهم مرکز <span class="sm:hidden">از {{ $columnTitle }}:</span></span>
        <template x-if="atom.commissions.{{ $columnTopic }}.pinned">
            <span x-text="'%'+atom.commissions.{{ $columnTopic }}.pinned? commissions.{{ $columnTopic }} : atom.commissions.{{ $columnTopic }}.value"></span>
        </template>
        <template x-if="!atom.commissions.{{ $columnTopic }}.pinned">
            <div class="inline-flex items-center">
                <span class="text-xs text-gray-600 relative top-0.5 cursor-default ml-1">%</span>
                <div class="relative">
                    <input type="tel" x-mask:dynamic="alpinePercentage" name="value" class="w-16 h-7 border border-gray-300 rounded text-xs text-gray-600 focus disabled:bg-gray-100 lijax input-loading" :id="`value-${atom.id}-{{ $columnTopic }}`" x-lijax:change x-lijax:keyup.1000ms data-method="PUT" data-action="{{ route('dashboard.atom.commissions.update', $center->id) }}" :data-merge='`{"action" : "value", "topic" : "{{ $columnTopic }}", "atom" : "${atom.id}"}`' :value="atom.commissions.{{ $columnTopic }}.value" x-on:statio-init="document.querySelector(`#${atom.id}-{{ $columnTopic }}`).dispatchEvent(new Event('lock-input'))" x-on:statio-done="document.querySelector(`#${atom.id}-{{ $columnTopic }}`).dispatchEvent(new Event('unlock-input')); if($event.detail.is_ok) atom.commissions.{{ $columnTopic }}.value = $el.value">
                    <span class="spinner"></span>
                </div>
            </div>
        </template>
    </div>
    <div class="mt-2 flex items-center">
        <input type="checkbox" :id="`pin-${atom.id}-{{ $columnTopic }}`" name="pin" class="w-4 h-w-4 border border-gray-600 rounded-sm focus cursor-pointer relative checkbox-loading-right" :checked="atom.commissions.{{ $columnTopic }}.pinned" x-model="atom.commissions.{{ $columnTopic }}.pinned" x-on:changex="if($el.checked) atom.commissions.{{ $columnTopic }}.value = commissions.{{ $columnTopic }}" x-lijax:click x-on:statio-init="document.querySelector(`#${atom.id}-{{ $columnTopic }}`).dispatchEvent(new Event('lock-input'))" x-on:statio-done="document.querySelector(`#${atom.id}-{{ $columnTopic }}`).dispatchEvent(new Event('unlock-input')); atom.commissions.{{ $columnTopic }}.value = $event.detail.value" data-method="PUT" data-action="{{ route('dashboard.atom.commissions.update', $center->id) }}" :data-merge='`{"action" : "pin", "topic" : "{{ $columnTopic }}", "atom" : "${atom.id}"}`'>
        <label :for="`pin-${atom.id}-{{ $columnTopic }}`"class="text-xs text-gray-600 mr-2 cursor-pointer">@lang('پیش‌فرض')</label>
    </div>
</div>
