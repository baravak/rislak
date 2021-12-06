
<div data-xhr="sample-profiles" id="sample-profile">
    <div class="mt-4">
        <h3 class="heading">صفحه دوم</h3>
        <div class="mt-4">
            <a href="{{ $scoring->profiles->where('mode', 'profile_page2_png')->first()->url }}" target="_blank" class="inline-block magnific-popup mr-4">
                    {{ $item[0] }}
                <img src="{{ $scoring->profiles->where('mode', 'profile_page2_png')->first()->url }}" class="w-32 h-32 object-cover border border-gray-200 p-1 rounded">
            </a>
        </div>
    </div>
</div>
