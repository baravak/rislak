<a href="{{ $center->route('show') }}" class="border border-gray-200 rounded hover:bg-gray-50 transition">
    <div class="h-24 bg-gray-100 border-b border-gray-200"></div>

    <div class="flex justify-center items-center flex-shrink-0 w-24 h-24 mx-auto -mt-12 bg-gray-300 text-gray-600 rounded-full border-4 border-white overflow-hidden">
        @if ($center->type == 'personal_clinic')
            @avatarOrName($center->manager)
        @else
            @avatarOrName($center->detail)
        @endif
    </div>

    <div class="p-4">
        <div class="text-sm sm:text-base text-center text-gray-700 font-bold">
            @if ($center->type == 'personal_clinic')
                @displayName($center->manager)
            @else
                @displayName($center->detail)
            @endif
        </div>

        @if ($center->type == 'counseling_center')
            <div class="text-xs text-center text-gray-700 mt-2">{{ $center->manager->name }}</div>
        @else
            <div class="text-xs text-center text-gray-500 mt-2">{{ __('Personal clinic') }}</div>
        @endif
    </div>
</a>