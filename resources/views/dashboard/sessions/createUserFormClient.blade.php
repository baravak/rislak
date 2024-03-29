@include('dashboard.sessions.selectField')

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
