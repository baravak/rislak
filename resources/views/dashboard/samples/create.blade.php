@extends('dashboard.create')
@section('form_content')
    <div>
        <label for="room_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Room') }}</label>
        <select class="select2-select" data-relation="case_id room_client_id bulk_case_id" name="room_id"  id="room_id" data-url="{{ route('dashboard.rooms.index' , ['my_management' => 1, 'instance' => 1]) }}">
        @isset($room)
            <option value="{{$room->id}}" selected>{{ $room->manager->name  }}</option>
        @endisset
        </select>
        @isset($room)
        <div data-for="room_id" class="hidden">
            @include('dashboard.rooms.select2', ['rooms' => [$room]])
        </div>
        @endisset
    </div>

    <div class="mt-4">
        <label for="scale_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Scale') }}</label>
        <select class="select2-select" multiple name="scale_id[]" id="scale_id" data-url="{{ route('dashboard.assessments.index', ['instance' => 1]) }}" data-placeholder="جست‌و‌جو">
        </select>
        <div class="flex text-xs text-gray-400 mt-2">
            <i class="fal fa-info-circle ml-1"></i>
            <span>در این قسمت لیست آزمون‌های پُر کاربرد را مشاهده می‌کنید. جهت انتخاب آزمونی که در این لیست وجود ندارد، عنوان آزمون مد نظر را جست‌وجو کرده و آن را انتخاب نمایید. شما می‌توانید لیست تمام آزمون‌های موجود در سامانه را نیز در
                <a href="{{ route('dashboard.assessments.index') }}" data-metarget="assessments" data-metarget-pattern="^/dashboard/assessments.*" target="_blank" class="text-blue-600 hover:text-blue-800">این صفحه</a>
            مشاهده نمایید.
            </span>
        </div>
    </div>

    <div class="mt-4">
        <ul data-tabs>
            <li><a data-tabby-default href="#case-tab" class="focus direct" role="presentation">{{ __('Case') }}</a></li>
            <li><a href="#room-tab" class="focus direct" role="presentation">{{ __('Therapy room') }}</a></li>
            <li><a href="#bulk-tab" class="focus direct" role="presentation">{{ __('Bulk sample') }}</a></li>
        </ul>

        <div id="case-tab">
            @include('dashboard.samples.createCase')
        </div>

        <div id="room-tab">
            @include('dashboard.samples.createRoom')
        </div>

        <div id="bulk-tab">
            @include('dashboard.samples.createBulk')
        </div>
    </div>


    <div class="mt-4">
        <label for="psychologist_description" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Psychologist description') }}</label>
        <textarea id="psychologist_description" name="psychologist_description"  rows="5" class="resize-none border border-gray-500 rounded px-4 py-2 w-full text-sm placeholder-gray-300 focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60"></textarea>
        <div class="flex text-xs text-gray-400 mt-2">
            <i class="fal fa-info-circle ml-1"></i>
            <span>
                در این قسمت شما می‌توانید توضیحاتی را اضافه بر توضیحات یک نمونه وارد کنید تا مراجع قبل از انجام نمونه(ها) این توضیحات را مشاهده کند
            </span>
        </div>
    </div>


    <div class="mt-6">
        <h3 class="mb-2 text-sm text-gray-700 variable-font-medium cursor-default">@lang('مبلغ آزمون‌های انتخاب شده')</h3>
        <div class="px-3 bg-gray-100 rounded divide-y divide-gray-300">
            <div class="flex xs:items-center xs:justify-between flex-col xs:flex-row py-3">
                <div class="cursor-default">
                    <div class="text-gray-700 text-sm">پرسشنامه 16 عاملی شخصیت کتل ویرایش طلیعه سلامت</div>
                    <div class="text-xs text-gray-600 mt-2">
                        <div class="relative inline-block md:block md:mb-1 lg:inline-block lg:mb-0 w-7 align-middle select-none transition ease-in-out duration-700 ml-1">
                            <input name="available" checked type="checkbox" id="available" class="toggle-checkbox absolute block w-4 h-4 rounded-full bg-white border-4 appearance-none cursor-pointer">
                            <label for="available" class="toggle-label block overflow-hidden h-4 rounded-full bg-gray-300 cursor-pointer"></label>
                        </div>
                        <span>مبلغ پیش‌فرض مرکز:</span>
                        <span class="mr-1">120٬000 @lang('تومانءءء')</span>
                    </div>
                </div>
                <div class="mt-2 xs:mt-0 relative inline-block dir-ltr">
                    <input id="amount" disabled type="tel" name="amount" value="120٬000" class="text-left dir-ltr w-40 h-8 pl-12 border border-gray-300 rounded text-sm text-gray-600 focus disabled:opacity-50">
                    <label for="amount" class="absolute left-1 top-1/2 transform -translate-y-1/2 flex items-center px-2 pt-0.5 h-6 text-xs bg-gray-200 rounded text-gray-600">@lang('تومانءءء')</label>
                </div>
            </div>
            <div class="flex xs:items-center xs:justify-between flex-col xs:flex-row py-3">
                <div class="cursor-default">
                    <div class="text-gray-700 text-sm">آزمون مقیاس افسردگی، اضطراب، استرس (DASS) فرم کوتاه</div>
                    <div class="text-xs text-gray-600 mt-2">
                        <div class="relative inline-block md:block md:mb-1 lg:inline-block lg:mb-0 w-7 align-middle select-none transition ease-in-out duration-700 ml-1">
                            <input name="available" type="checkbox" id="available" class="toggle-checkbox absolute block w-4 h-4 rounded-full bg-white border-4 appearance-none cursor-pointer">
                            <label for="available" class="toggle-label block overflow-hidden h-4 rounded-full bg-gray-300 cursor-pointer"></label>
                        </div>
                        <span>مبلغ پیش‌فرض مرکز:</span>
                        <span class="mr-1">80٬000 @lang('تومانءءء')</span>
                    </div>
                </div>
                <div class="mt-2 xs:mt-0 relative inline-block dir-ltr">
                    <input id="amount" type="tel" name="amount" value="95٬000" class="text-left dir-ltr w-40 h-8 pl-12 border border-gray-300 rounded text-sm text-gray-600 focus disabled:opacity-50">
                    <label for="amount" class="absolute left-1 top-1/2 transform -translate-y-1/2 flex items-center px-2 pt-0.5 h-6 text-xs bg-gray-200 rounded text-gray-600">@lang('تومانءءء')</label>
                </div>
            </div>
            <div class="flex items-center justify-between py-3">
                <div class="text-gray-600 text-sm">@lang('جمع کل:')</div>
                <div class="text-gray-800 variable-font-medium">215٬000 @lang('تومانءءء')</div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <label for="default" class="flex items-center cursor-pointer group">
            <input checked id="default" type="checkbox" class="w-5 h-5 rounded border border-gray-400 focus">
            <span class="text-sm text-gray-600 mr-1.5 group-hover:text-blue-600">@lang('هزینه‌ی آزمون پیش از انجام، توسط مراجع پرداخت شود.')</span>
        </label>
    </div>
@endsection
