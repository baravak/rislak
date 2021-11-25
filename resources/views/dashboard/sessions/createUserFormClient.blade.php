<div>
    <label class="block mb-2 text-sm text-gray-700 font-medium">انتخاب محور جلسه</label>
    <select class="border border-gray-500 h-10 rounded pl-4 pr-8 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60" name="field">
        @if ($session->fields->count() > 1)
        <option></option>
        @endif
            @foreach ($session->fields as $field)
                <option @selectChecked($callbackPayment->field, $field->id) value="{{ $field->id }}" @formValue($callbackPayment->field)>{{ $field->title }} | @lang(':amount T', ['amount' => $field->amount])</option>
            @endforeach
    </select>
</div>

<div class="mt-4">
    <label class="block mb-2 text-sm text-gray-700 font-medium">@lang('محل برگزاری جلسه')</label>
    <select id="session_platform" name="session_platform" class="border border-gray-500 h-10 rounded pl-4 pr-8 w-full text-sm focus">
        @if ($session->session_platforms->count() > 1)
            <option disabled selected>@lang('انتخاب کنید')</option>
        @endif
        @foreach ($session->session_platforms as $platform)
            <option value="{{ $platform->id }}" @selectChecked($callbackPayment->session_platform, $platform->id)>{{ $platform->title }} (@lang($platform->type))</option>
        @endforeach
    </select>
</div>
@isset($case)
@else
@if (auth()->user()->centers && auth()->user()->centers->where('id', $center->id)->first())
    <div class="mt-4">
        <label class="block mb-2 text-sm text-gray-700 font-medium">انتخاب پرونده</label>
        <select class="select2-select"  id="case_id" name="case_id" data-url="{{ route('dashboard.cases.index', ['room' => $room->id, 'instance' => 1]) }}" data-allow-clear="true" data-placeholder="@lang('Search')">
            @if (isset($callbackPayment->case_id))
                <option value="{{ $callbackPayment->case_id }}" selected>{{ $callbackPayment->case_id }}</option>
            @endif
        </select>
        <div class="flex text-xs text-gray-400 mt-2">
            <i class="fal fa-info-circle ml-1"></i>
            <span>اگر پرونده‌ای در جریان دارید؛ می‌توانید با انتخاب آن، این جلسه را به آن پرونده متصل نمایید.</span>
        </div>
    </div>
@else
<div class="mt-4">
    <label for="nickname" class="inline-block mb-2 text-sm text-gray-700 font-medium">@lang('DisplayName')</label>
    <input type="text" @formValue($callbackPayment->nickname) id="nickname" name="nickname" value="{{ auth()->user()->name }}" class="border border-gray-500 placeholder-gray-300 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
    <div class="flex text-xs text-gray-400 mt-2">
        <i class="fal fa-info-circle ml-1"></i>
        <span>شما عضو این مرکز درمانی نیستید، پس از درخواست، عضو این مرکز خواهید شد؛ ما شما را با آن نامی که وارد می‌کنید به مرکز معرفی خواهیم کرد</span>
    </div>
</div>
@endif
    <div class="mt-4" id="problem-element">
        <label for="problem" class="block mb-2 text-sm text-gray-700 variable-font-medium">مسئله</label>
        <textarea id="problem" name="problem" autocomplete="off" class="resize-none border border-gray-500 h-24 md:h-16 rounded px-4 py-2 w-full text-sm placeholder-gray-300 focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">{{ isset($callbackPayment->problem) ? $callbackPayment->problem : '' }}</textarea>
    </div>
@endisset
<div class="mt-4">
    <label for="description" class="block mb-2 text-sm text-gray-700 variable-font-medium">توضیحات</label>
    <textarea id="description" name="description" autocomplete="off" class="resize-none border border-gray-500 h-24 md:h-16 rounded px-4 py-2 w-full text-sm placeholder-gray-300 focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">{{ isset($callbackPayment->description) ? $callbackPayment->description : '' }}</textarea>
</div>

<div class="mt-4">
    <label for="gift" class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('Gift')</label>
    <div class="flex flex-col xs:flex-row">
        <div class="w-full relative">
            <input type="text" placeholder="محل درج کد تخفیف" name="gift" id="gift" class="border border-gray-500 h-10 rounded pr-4 w-full text-sm dir-ltr focus placeholder-gray-300" style="padding-left: 6.5rem;">
            <span class="absolute left-1 top-1 px-2 rounded text-sm text-gray-500 flex items-center h-8 cursor-default dir-ltr text-left pt-0.5">RS966666Q -</span>
        </div>
        <button class="mt-2 xs:mt-0 xs:mr-2 flex-shrink-0 text-sm text-white px-4 h-10 rounded bg-green-600 hover:bg-green-700 transition focus-current ring-green-600">@lang('اعمال کد تخفیف')</button>
    </div>
</div>

<div class="mt-6 pt-6 border-t border-dashed border-gray-300 cursor-default">
    <div class="flex flex-col xs:flex-row xs:items-center justify-between">
        <span class="text-sm text-gray-400">کد تخفیف: عید نوروز</span>
        <span class="text-sm text-gray-500 variable-font-medium mt-0.5 text-left">14.000 تومان</span>
    </div>
    <div class="flex flex-col xs:flex-row xs:items-center justify-between mt-2">
        <span class="text-sm text-gray-400">مبلغ قابل پرداخت</span>
        <span class="text-gray-600 variable-font-semibold mt-0.5 text-left">32.000 تومان</span>
    </div>
</div>