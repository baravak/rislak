<div>
    <label for="commission-{{ $defaultTopic }}" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('مقدار سهم از :title', ['title' => $defaultTitle]) }} <span class="text-xs text-gray-500 variable-font-normal">({{ __('درصد') }})</span></label>
    <input type="tel" name="commission" id="commission-{{ $defaultTopic }}" x-lijax:change x-lijax:keyup.1000ms data-merge='{"topic" : "{{ $defaultTopic }}"}' data-method="PUT" data-action="{{ route('dashboard.center.commissions.update', $center->id) }}" autocomplete="off" placeholder="عددی بین صفر تا ۱۰۰. مثال: 5" class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus placeholder-gray-400" x-mask:dynamic="alpinePercentage" :value="commissions.{{ $defaultTopic }}" x-on:statio-done="document.querySelectorAll('[data-topic={{ $defaultTopic }}]').forEach((div) => {div.querySelectorAll('input').forEach(input => {input.disabled = false}); div.dispatchEvent(new CustomEvent('change-regiontopic', {detail : $event.detail.is_ok ? $el.value : null}))}); $el.disabled = false; commissions.{{ $defaultTopic }} = $event.detail.is_ok ? $el.value : commissions.{{ $defaultTopic }};" x-on:statio-init="document.querySelectorAll('[data-topic={{ $defaultTopic }}] input').forEach((input) => {input.disabled = true}); $el.disabled = true">
</div>
