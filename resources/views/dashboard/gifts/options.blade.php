<a href="{{ route('dashboard.gifts.edit', ['center' => $gift->region->id, 'gift' => $gift->id]) }}" class="flex items-center border border-gray-300 rounded-lg px-3 text-gray-500 hover:text-blue-600 hover:border-blue-600 hover:bg-blue-50 hover:bg-opacity-20 transition h-14">
    <i class="fal fa-edit"></i>
    <span class="text-sm mr-3 pt-0.5">@lang('ویرایش کد تخفیف')</span>
</a>
@include('dashboard.gifts.renewLink')
<a href="{{ route('dashboard.gifts.create', $gift->region->id) }}" class="flex items-center border border-gray-300 rounded-lg px-3 text-gray-500 hover:text-green-600 hover:border-green-600 hover:bg-green-50 hover:bg-opacity-20 transition h-14">
    <i class="fal fa-layer-plus text-lg"></i>
    <span class="text-sm mr-3 pt-0.5">@lang('کد تخفیف جدید')</span>
</a>
<a href="{{ route('dashboard.gifts.index', $gift->region->id) }}" class="flex items-center border border-gray-300 rounded-lg px-3 text-gray-500 hover:text-pink-500 hover:border-pink-500 hover:bg-pink-50 hover:bg-opacity-20 transition h-14">
    <i class="fal fa-badge-percent text-lg"></i>
    <span class="text-sm mr-3 pt-0.5">@lang('کدهای تخفیف')</span>
</a>
