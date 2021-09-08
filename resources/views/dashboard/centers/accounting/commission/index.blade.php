<div x-data="{commission : {{ $center->detail->commission }}}">
    <div class="m-auto w-full md:w-1/2 pt-4">
        <form method="POST" action="{{ route('dashboard.center.commissions.update', $center->id) }}" x-on:jresp.window="if(event.detail.is_ok) commission = $el.querySelector('#commission').value">
            @method('PUT')
            <div class="border border-gray-300 rounded p-4">
                <h2 class="text-center variable-font-bold text-green-700 mb-4 cursor-default">{{ __('تعیین سهم مرکز از اتاق‌های درمان') }}</h2>
                <div>
                    <label for="commission" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('Percentage Amount') }} <span class="text-xs text-gray-500 variable-font-normal">({{ __('درصد') }})</span></label>
                    <input type="number" name="commission" id="commission" autocomplete="off" placeholder="فقط یک عدد وارد نمایید. مثال: 5" class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus placeholder-gray-400" value="{{ $center->detail->commission }}">
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="inline-flex justify-center items-center h-9 px-8 bg-brand text-white text-sm rounded-full hover:bg-brand-600 transition ml-4 focus" role="button">
                    {{ __('اعمال درصد') }}
                </button>
            </div>
        </form>
    </div>
    <div>
        <div class="mt-8 mb-4">
            <h2 class="heading" data-total="" data-xhr="total">{{ __('تعیین سهم به تفکیک اتاق‌های درمان') }}</h2>
        </div>
        @include('dashboard.centers.accounting.commission.commissionList')
    </div>
</div>

