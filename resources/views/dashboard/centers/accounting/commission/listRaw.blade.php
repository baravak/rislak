<div class="flex flex-col sm:flex-row sm:items-center bg-gray-50 hover:bg-gray-100 transition py-3 pb-4 sm:py-2 p-2 rounded mt-2" x-data='{atom : {{ json_encode($atom) }}}'>
    <div class="flex-1 p-2 cursor-default">
        <div class="text-sm text-gray-600 variable-font-bold sm:variable-font-medium" x-text="atom.owner.name"></div>
    </div>
    @include('dashboard.centers.accounting.commission.column', ['columnTitle' => 'جلسات درمانی', 'columnTopic' => 'session'])
    @include('dashboard.centers.accounting.commission.column', ['columnTitle' => 'آزمون‌ها', 'columnTopic' => 'sample'])
    @include('dashboard.centers.accounting.commission.column', ['columnTitle' => 'خدمات ریسلو', 'columnTopic' => 'service'])
</div>
