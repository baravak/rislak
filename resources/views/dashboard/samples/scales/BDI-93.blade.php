
<div data-xhr="sample-profiles" id="sample-profile">
    <h3 class="heading">صفحه دوم</h3>
    <div class="mt-4">
        <a href="{{ $scoring->profiles->where('mode', 'profile_page2_png')->first()->url }}" target="_blank" class="inline-block magnific-popup ml-4">
            <img src="{{ $scoring->profiles->where('mode', 'profile_page2_png')->first()->url }}" class="w-32 h-32 object-cover border border-gray-200 p-1 rounded">
            <span class="block text-xs text-gray-400 mt-2 text-center">{{ $item[0] }}</span>
        </a>
    </div>
</div>
