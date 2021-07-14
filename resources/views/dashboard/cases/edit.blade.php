@extends($layouts->dashboard)
@section('content')
    <div class="mx-auto w-full sm:w-1/2">
        <ul data-tabs>
            {{-- <li><a href="#information-tab" data-tabby-default class="direct focus flex" title="@lang('information')">@lang('information')</a></li> --}}
            <li><a href="#tags" data-tabby-default class="direct focus flex" title="@lang('Tags')">@lang('Tags')</a></li>
        </ul>

        {{-- <div id="information-tab">
            @include('dashboard.cases.editInformation')
        </div> --}}
        <div id="tags">
            @include('dashboard.cases.editTags')
        </div>
    </div>
@endsection
