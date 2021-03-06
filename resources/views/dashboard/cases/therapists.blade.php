<div>
    <div class="mb-4">
        <h2 class="heading" data-total="(1)" data-xhr="total">{{ __('Therapists') }}</h2>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-2">
        <div class="flex items-center border border-gray-200 rounded px-3 py-2 hover:bg-gray-50 transition cursor-default">
            <div class="flex justify-center items-center flex-shrink-0 w-12 h-12 rounded-full overflow-hidden ml-2 bg-gray-200 text-gray-800 text-xs">
                @avatarOrName($case->manager)
            </div>
            <div class="flex-col items-center">
                <div class="font-medium text-sm text-gray-700">@displayName($case->manager)</div>
                {{-- <div class="text-xs text-gray-600 mt-1">کد نظام روانپزشکی ۶۰۹۰۵۳۴۲۳</div> --}}
            </div>
        </div>
    </div>
</div>
