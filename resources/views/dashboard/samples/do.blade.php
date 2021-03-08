@can('management', [$sample, isset($room) ? $room : null])
    <div class="inline-block mr-4">
        <a href="{{ urldecode(route('dashboard.samples.show', $sample->id)) }}"><i class="fal fa-eye text-sm leading-relaxed text-gray-600 hover:text-blue-600"></i></a>
    </div>
@endcan
@if (in_array($sample->status, ['open', 'seald']))
<div class="inline-block">
    <a href="{{ urldecode(route('samples.form', $sample->id)) }}" target="_blank" class="inline-block px-3 py-1 text-xs text-blue-600 hover:text-white border border-blue-600 hover:bg-blue-600 rounded-full transition">{{ __('Do sample') }}</a>
</div>
    @endif