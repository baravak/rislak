@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="border border-gray-300 rounded flex flex-col sm:flex-row sm:items-center sm:justify-between p-4 cursor-default">
            <div>
                <h2 class="variable-font-semibold text-brand">پرسشنامه 16 عاملی شخصیت کتل ویرایش طلیعه سلامت</h2>
                <div class="flex items-center text-xs mt-2">
                    <span class="flex items-center justify-center bg-gray-400 rounded text-white px-2 h-5 pb-0.5 en ml-2">$16PF-9A</span>
                    <span class="text-gray-500">@lang('Edition') طلیعه سلامت</span>
                    <span class="px-2">-</span>
                    <span class="text-gray-500">@lang('Version') 4</span>
                </div>
            </div>
            <div class="sm:text-left mt-4 sm:mt-0">
                <div class="text-xs text-gray-500">مبلغ در مرکز</div>
                <div class="text-brand mt-0.5">
                    <span class="variable-font-semibold text-lg">160٬000</span>
                    <span class="text-sm mr-0.5 pt-0.5">@lang('تومانءءء')</span>
                </div>
            </div>
        </div>

        <div>
            <div class="mt-8 mb-4">
                <h3 class="heading" data-total="(35)" data-xhr="total">@lang('Therapy rooms')</h3>
            </div>

            <div class="mb-4">
                @include('layouts.quick_search')
            </div>

            <div>
                <div class="hidden sm:flex items-center cursor-default px-2 text-xs variable-font-medium text-gray-600 bg-gray-100 py-2 rounded">
                    <div class="flex-1 px-2">@lang('Therapy room')</div>
                    <div class="flex-1 px-2">@lang('مبلغ')</div>
                </div>
                {{-- @foreach ($rooms as $room) --}}
                    <div class="flex flex-col xs:flex-row xs:items-center bg-gray-50 hover:bg-gray-100 transition py-3 pb-4 sm:py-2 p-2 rounded mt-2">
                        <div class="flex-1 px-2 cursor-default">
                            <div class="text-sm text-gray-600">دکتر محمدعلی نخلی</div>
                        </div>
                        <div class="flex-1 px-2 flex justify-end xs:justify-start">
                            <div class="mt-2 xs:mt-0 relative inline-block" x-data="{amount:0}">
                                <input type="tel" class="text-left dir-ltr w-40 h-8 pl-12 border border-gray-300 rounded text-sm text-gray-600 focus" x-data="amontity" x-fill="amount">
                                <input type="hidden" name="" x-model='amount'>
                                <span class="absolute left-1 top-1/2 transform -translate-y-1/2 flex items-center px-2 pt-0.5 h-6 text-xs bg-gray-200 rounded text-gray-600">@lang('تومانءءء')</span>
                            </div>
                        </div>
                    </div>
                {{-- @endforeach --}}
            </div>
        </div>
    </div>
@endsection