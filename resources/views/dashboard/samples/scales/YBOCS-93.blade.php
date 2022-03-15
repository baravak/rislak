@php
    $_aProfiles = [
        ['مرتب‌شده با شماره سوال', 'profile_items_sort_key_png', 'profile_page2_png'],
        ['مرتب‌شده با پاسخ‌ها', 'profile_items_sort_value_png', 'profile_page3_png'],
];
@endphp
<div data-xhr="sample-profiles" id="sample-profile">
    <div class="mt-4">
        <h3 class="heading">پاسخ‌ها</h3>
        <div class="mt-4">
            @foreach ($_aProfiles as $item)
                @if ($scoring->profiles && ($prf = $scoring->profiles->whereIn('mode', [$item[1], $item[2]])->first()))
                    <a href="{{ $prf->url }}" target="_blank" class="inline-block magnific-popup mr-4">
                         {{ $item[0] }}
                        <img src="{{ $prf->url }}" class="w-32 h-32 object-cover border border-gray-200 p-1 rounded">
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</div>
