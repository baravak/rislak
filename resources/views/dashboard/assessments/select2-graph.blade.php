@foreach ($assessments as $assessment)
    <div data-id="{{ $assessment->assessment->id }}">
        <div data-selection>
            <div class="text-xs text-gray-700 variable-font-semibold">{{ $assessment->assessment->parent->title }}</div>
            <div class="text-xs text-gray-400">{{ $assessment->assessment->edition ? __('Edition :title', ['title' => $assessment->assessment->edition]) . ' - ' : ''}} {{ __('Version :ver', ['ver' => $assessment->assessment->version]) }}</div>
        </div>
    </div>
@endforeach
