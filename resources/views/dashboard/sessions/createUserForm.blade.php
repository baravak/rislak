<div class="m-auto w-full md:w-2/3 xl:w-1/2">
    <form class="w-full" data-paymental method="POST" action="{{ route($session->status =='registration_awaiting' ? 'dashboard.schedules.booking' : 'dashboard.session.users.store', $session->id) }}" {{ isset($callbackPayment) ? 'data-autosubmit' : '' }}>
        @method('POST')
        <div class="border border-gray-300 rounded p-4" x-data='{gift: {title:null, type:"percent", value:0, amount:0}, amount: {{ $session->fields->count() ===  1 ? $session->fields->first()->amount : 'null' }}, gift_type: null, gift_value: 0, gift_code: {{ isset($callbackPayment->gift_code) ? substr($callbackPayment->gift_code, 10) : 'null' }}, wallet:{{ auth()->user()->treasuries->where('symbol', 'wallet')->first()->balance ?: "0" }}}'>
            @can('admin', $room)
                @include('dashboard.sessions.createUserFormAdmin')
            @else
            @include('dashboard.sessions.createUserFormClient')
            @include('dashboard.sessions.giftCheck')
            @endcan
        </div>
        <button type="submit" class="inline-flex justify-center items-center h-9 px-8 bg-brand text-white text-sm rounded-full hover:bg-brand-600 transition ml-4 focus mt-4" role="button">تأیید و ثبت جلسه درمانی</button>
    </form>
</div>
