@extends('dashboard.create')
@section('form_content')
<div x-data="{room: '{{ isset($room->id) ? $room->id : '' }}' || null, scales: {}, scales_count : 0, amount_sum : 0, purchase: true}">
    <div>
        <label for="room_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Room') }}</label>
        <select class="select2-select" data-relation="case_id room_client_id bulk_case_id" name="room_id"  id="room_id" data-url="{{ route('dashboard.rooms.index' , ['my_management' => 1, 'instance' => 1]) }}" x-model="room" x-on:select2seleced="room = $el.value; document.querySelector('#scale_id').setAttribute('data-url', `/dashboard/rooms/${$el.value}/assessments/`); scales_count = 0; scales = {}; amount_sum = 0;$($refs.scalesList).val(null).trigger('change');">
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
    <div x-show="room">
        <div class="mt-4">
            <label for="scale_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Scale') }}</label>
            <select x-select2 id="scale_id" name="scale_id[]" x-ref="scalesList" data-url="{{ isset($room) ? route('dashboard.atom.assessments.index', $room->id) : '' }}" multiple x-on:select="if(!scales[$event.detail.params.data.id]){scales_count++ ; $event.detail.params.data.custom_amount = $event.detail.params.data.amount; scales[$event.detail.params.data.id] = $event.detail.params.data;}" x-on:unselect="scales_count--; delete scales[$event.detail.params.data.id]; document.querySelector('#amountSum').dispatchEvent(new Event('sum'))">
            </select>
            <template x-template-result="scale_id">
                <div>
                    <div class="text-xs text-gray-700 variable-font-semibold" x-text="result.title"></div>
                    <div class="text-xs text-gray-400"><span x-show="result.assessment.edition"><span>نسخه </span><span x-text="result.assessment.edition"></span> - </span> نسخه <span x-text="result.assessment.version"></span></div>
                </div>
            </template>
            <div class="flex text-xs text-gray-400 mt-2">
                <i class="fal fa-info-circle ml-1"></i>
                <span>در این قسمت لیست آزمون‌های پُر کاربرد را مشاهده می‌کنید. جهت انتخاب آزمونی که در این لیست وجود ندارد، عنوان آزمون مد نظر را جست‌وجو کرده و آن را انتخاب نمایید. شما می‌توانید لیست تمام آزمون‌های موجود در سامانه را نیز در
                    <a href="{{ route('dashboard.assessments.index') }}" data-metarget="assessments" data-metarget-pattern="^/dashboard/assessments.*" target="_blank" class="text-blue-600 hover:text-blue-800">این صفحه</a>
                مشاهده نمایید.
                </span>
            </div>
        </div>
        <div class="mt-4">
            <label for="purchase" class="flex items-center cursor-pointer group">
                <input checked id="purchase" name="purchase" type="checkbox" x-model="purchase" class="w-5 h-5 rounded border border-gray-400 focus">
                <span class="text-sm text-gray-600 mr-1.5 group-hover:text-blue-600" x-show="purchase">@lang('مراجع بابت انجام آزمون‌ها باید به مرکز هزینه پرداخت کند')</span>
                <span class="text-sm text-red-600 mr-1.5 font-bold" x-show="!purchase">@lang('مراجع بابت انجام آزمون‌ها «نباید» به مرکز هزینه پرداخت کند')</span>
            </label>
        </div>
        <div class="flex text-xs text-gray-400 mt-2">
            <i class="fal fa-info-circle ml-1"></i>
            <span> به صورت عادی مراجعین برای انجام نمونه‌های روان‌شناسی نیاز به پرداخت هزینه به کلینیک دارند، اگر شما قصد ندارید، هیچ هزینه‌ای از مراجع دریافت کنید، این قسمت را غیر فعال نمایید؛ به عنوان مثال، یک پژوهشگر برای پر کردن نمونه‌های پژوهشی خود، از جامعه آماری هزینه‌ای دریافت نمی‌کند و این قسمت را غیر فعال می‌نماید.
            </span>
        </div>
        <template x-if="purchase">
        <div x-show="scales_count">
            <div class="mt-6">
                <h3 class="mb-2 text-sm text-gray-700 variable-font-medium cursor-default">@lang('مبلغ آزمون‌های انتخاب شده')</h3>
                <div class="px-3 bg-gray-100 rounded divide-y divide-gray-300">
                    <template x-for="(scale, key) in scales">
                        <div class="flex xs:items-center xs:justify-between flex-col xs:flex-row py-3" x-effect="document.querySelector('#amountSum').dispatchEvent(new Event('sum'))" x-data="{default_amount: true}">
                            <div class="cursor-default">
                                <div class="text-gray-700 text-sm" x-text="scale.title"></div>
                                <div class="text-xs text-gray-600 mt-2">
                                    <div class="relative inline-block md:block md:mb-1 lg:inline-block lg:mb-0 w-7 align-middle select-none transition ease-in-out duration-700 ml-1">
                                        <input checked type="checkbox" :id="`amount_default-${key}`" class="toggle-checkbox absolute block w-4 h-4 rounded-full bg-white border-4 appearance-none cursor-pointer" x-model="default_amount" x-on:change="if(default_amount){scale.custom_amount = scale.amount}">
                                        <label :for="`amount_default-${key}`" class="toggle-label block overflow-hidden h-4 rounded-full bg-gray-300 cursor-pointer"></label>
                                    </div>
                                    <span>مبلغ پیش‌فرض مرکز:</span>
                                    <span class="mr-1" x-currency.3="scale.amount"></span>
                                </div>
                            </div>
                            <div class="mt-2 xs:mt-0 relative inline-block dir-ltr">
                                <input id="amount" :disabled="default_amount" type="tel" class="text-left dir-ltr w-40 h-8 pl-12 border border-gray-300 rounded text-sm text-gray-600 focus disabled:opacity-50" x-amontity="scale.custom_amount" x-on:change="document.querySelector('#amountSum').dispatchEvent(new Event('sum'))" x-on:keyup="document.querySelector('#amountSum').dispatchEvent(new Event('sum')); scale.custom_amount" x-on:paste="document.querySelector('#amountSum').dispatchEvent(new Event('sum'))">
                                <input type="hidden" :name="`amount[${key}]`" :value="scale.custom_amount">
                                <label for="amount" class="absolute left-1 top-1/2 transform -translate-y-1/2 flex items-center px-2 pt-0.5 h-6 text-xs bg-gray-200 rounded text-gray-600">@lang('تومانءءء')</label>
                            </div>
                        </div>
                    </template>
                    <div class="flex items-center justify-between py-3">
                        <div class="text-gray-600 text-sm">@lang('جمع کل:')</div>
                        <div class="text-gray-800 variable-font-medium"><span id="amountSum" x-on:sum="amount_sum =0; var _sum = 0; Object.entries(scales).forEach(s => {_sum += s[1].custom_amount || 0}); amount_sum = _sum" x-currency.3="amount_sum"></span></div>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <label for="default" class="flex items-center cursor-pointer group">
                    <input checked id="default" type="checkbox" class="w-5 h-5 rounded border border-gray-400 focus">
                    <span class="text-sm text-gray-600 mr-1.5 group-hover:text-blue-600">@lang('هزینه‌ی آزمون پیش از انجام، توسط مراجع پرداخت شود.')</span>
                </label>
            </div>
        </div>
        </template>
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
</div>
@endsection
