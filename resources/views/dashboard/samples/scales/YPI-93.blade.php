@php
    $_aProfiles = [
        ['صفحه دوم', 'profile_items_sort_key_png', 'profile_page2_png'],
];
@endphp
<div data-xhr="sample-profiles" id="sample-profile">
    <h3 class="heading">صفحه دوم</h3>
    <div class="mt-4">
        @foreach ($_aProfiles as $item)
            @if ($scoring->profiles && ($prf = $scoring->profiles->whereIn('mode', [$item[1], $item[2]])->first()))
                <a href="{{ $prf->url }}" target="_blank" class="inline-block magnific-popup ml-4">
                    <img src="{{ $prf->url }}" class="w-32 h-32 object-cover border border-gray-200 p-1 rounded">
                    <span class="block text-xs text-gray-400 mt-2 text-center">{{ $item[0] }}</span>
                </a>
            @endif
        @endforeach
    </div>
</div>
