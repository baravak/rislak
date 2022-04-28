@extends($layouts->dashboard)
@section('content')
    <div x-data="{commissions : {{ json_encode($center->commissions) }}}">
        <div class="m-auto w-full lg:w-2/3 2xl:w-3/5 pt-4">
            <div class="border border-gray-300 rounded p-4">
                <h2 class="text-center variable-font-bold text-green-700 mb-4 cursor-default">{{ __('تعیین سهم مرکز از اتاق‌های درمان') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @include('dashboard.centers.accounting.commission.defaultInput', ['defaultTitle' => 'جلسات درمانی', 'defaultTopic' => 'session'])
                    @include('dashboard.centers.accounting.commission.defaultInput', ['defaultTitle' => 'آزمون‌ها', 'defaultTopic' => 'sample'])
                    @include('dashboard.centers.accounting.commission.defaultInput', ['defaultTitle' => 'خدمات ریسلو', 'defaultTopic' => 'service'])
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="inline-flex justify-center items-center h-9 px-8 bg-brand text-white text-sm rounded-full hover:bg-brand-600 transition ml-4 focus" role="button">
                    {{ __('اعمال درصد') }}
                </button>
            </div>
        </div>
        <div>
            <div class="mt-8 mb-4">
                <h2 class="heading" data-total="" data-xhr="total">{{ __('تعیین سهم به تفکیک اتاق‌های درمان') }}</h2>
            </div>
            @include('dashboard.centers.accounting.commission.list')
        </div>
    </div>
@endsection
