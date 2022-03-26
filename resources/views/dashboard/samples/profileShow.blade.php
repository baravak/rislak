@if ($sample->profiles)
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">
        <div data-xhr="sample-profiles" id="sample-profile">
            @if($profile_png = $sample->profiles->where('mode', 'profile_png')->first())
                <h3 class="heading">{{ __('Sample profile') }}</h3>
                <div class="mt-4" id="profile_svg">
                    <a href="{{ $profile_png->url }}" target="_blank" class="inline-block magnific-popup">
                        <img src="{{ $profile_png->url }}" class="w-32 h-32 object-cover border border-gray-200 p-1 rounded">
                    </a>
                </div>
            @endif
        </div>
        @includeIf('dashboard.samples.scales.' . substr($sample->scale->id, 1), ['scoring'=> (object) ['profiles' => $sample->profiles, 'score' => $sample->score, 'id' => $sample->id]])
    </div>
@endif

