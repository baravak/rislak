<div class="mb-4 mt-8">
    <h3 class="heading" data-total="({{ $bulkSample->samples && $bulkSample->samples->count() ? $bulkSample->samples->count() : 0 }})" data-xhr="total">{{ __('Samples') }}</h3>
</div>

@include('dashboard.samples.list', ['samples' => $bulkSample->samples])