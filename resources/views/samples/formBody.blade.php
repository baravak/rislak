<div class="container mx-auto pt-8 px-4">
    <div class="flex items-center mb-3 cursor-default">
        <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
        <h1 class="font-bold text-2xl text-gray-800">{{$sample->scale->title}}</h1>
        <span class="text-sm text-gray-500 mr-2">{{ $sample->edition }}</span>
    </div>
    <div id="content" class="flex flex-col lg:flex-row">
        <div class="lg:flex-1 lg:pl-4 mb-4 lg:mb-0">
            <div class="flex h-1 rounded-full overflow-hidden bg-gray-200 mb-2">
                <div id="progress" class="bg-brand transition" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="border border-gray-300 p-4 rounded">
                {{-- @includeWhen($sample->prerequisites, 'samples.panel.information')
                @include('samples.panel.description')
                @include('samples.panel.items')
                @include('samples.panel.close') --}}
                @include('samples.items.imageItem')
            </div>
        </div>
        <div class="lg:flex-shrink-0 lg:w-56">
            @include('samples.formAside')
        </div>
    </div>
</div>


