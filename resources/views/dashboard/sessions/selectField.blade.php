<div>
    <label class="block mb-2 text-sm text-gray-700 font-medium">انتخاب محور جلسه</label>
    <select class="border border-gray-500 h-10 rounded pl-4 pr-8 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60" name="field" x-on:change="amount = parseInt($el.querySelector('option[value=\''+$el.value+'\']').getAttribute('data-amount')); document.querySelector('#giftCheck').dispatchEvent(new CustomEvent('link'))">
        @if ($session->fields->count() > 1)
        <option disabled selected>یک محور را انتخاب کنید</option>
        @endif
            @foreach ($session->fields as $field)
                <option {{ $session->fields->count() == 1 ? 'selected' : '' }} @selectChecked($callbackPayment->field, $field->id) value="{{ $field->id }}" @formValue($callbackPayment->field) data-amount="{{ $field->amount }}">{{ $field->title }} | @lang(':amount T', ['amount' => $field->amount])</option>
            @endforeach
    </select>
</div>
