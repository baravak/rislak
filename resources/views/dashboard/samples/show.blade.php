@extends($layouts->dashboard)

@section('content')
    <div id="sample-show" data-status="{{$sample->status}}" data-sample="{{$sample->id}}" class="grid grid-cols-1 lg:grid-cols-3 gap-2">
        <div class="border border-gray-200 rounded p-4 col-span-2 flex flex-col justify-between">
            <div>
                <h3 class="font-bold text-gray-900 cursor-default">{{ $sample->scale->title }} {{ $sample->edition ? ' - ویرایش ' . $sample->edition : ''}}</h3>
                <div class="flex items-center text-sm text-gray-500 cursor-default mt-4">
                    @if ($sample->client)
                        <a href="{{ route('dashboard.center.users.show', ['center' => $center->id, 'user' => $sample->client->id]) }}">
                            <i class="fal fa-user mb-1 ml-2"></i>
                            <span>{{ $sample->client ? $sample->client->name: '' }}</span>
                        </a>
                    @else
                        <div class="flex items-center">
                            <i class="fal fa-user mb-1 ml-2"></i>
                            <span>{{ __('No client and select client') }}</span>
                        </div>
                    @endif
                </div>
            </div>
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between mt-2 sm:mt-0">
                <div>
                    <span class="text-xs text-gray-400 cursor-default">{{ __(ucfirst($sample->status)) }}</span>
                </div>
                <div class="mt-2 sm:mt-0">
                    @if (!in_array($sample->status, ['scoring', 'creating_files']) && $sample->client)
                        @include('dashboard.samples.tools')
                    @endif
                    @if ($sample->profiles)
                    <div class="relative {{in_array($sample->status, ['seald', 'open']) ? 'hidden' : 'dropdown'}}" id="profile-export-menu">
                        <button class="flex items-center px-4 h-8 text-xs text-brand hover:text-white hover:bg-brand border border-brand rounded-full transition dropdown-toggle focus" type="button" id="profile-export" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('Exports') }}
                            <i class="fal fa-chevron-down mr-2"></i>
                        </button>
                        <div aria-labelledby="profile-export" id="profile-export-list" class="absolute left-0 top-10 rounded bg-white border border-gray-200 shadow-lg dropdown-menu">
                            @if ($sample->profiles)
                                @foreach ($sample->profiles as $key => $item)
                                    <a href="{!!$item->url!!}" data-type="{{$item->mode}}" target="_blank" class="dropdown-item profile-{{$item->mode}} block w-full p-1 text-center rounded text-gray-600 hover:text-brand hover:bg-gray-100 pt-2">
                                        {{ strtoupper(str_replace('_', ' ', str_replace('profile_', '', $item->mode))) }}
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="border border-gray-200 rounded p-4 cursor-default">
            <div class="flex justify-between items-center">
                <div class="text-xs text-gray-500 variable-font-light">@lang('مبلغ آزمون')</div>
                <div class="text-green-700 variable-font-semibold">
                    <span class="text-lg">۸۵‌٬۰۰۰</span>
                    <span class="text-xs"> @lang('تومنء')</span>
                </div>
            </div>
            <div class="flex justify-between items-center mt-2">
                <div class="text-xs text-gray-500 variable-font-light">@lang('وضعیت پرداخت')</div>
                <a href="#" class="text-xs xs:text-sm text-gray-600 hover:text-blue-600 transition underline">
                    <span>پرداخت شده</span>
                    <span> (BL966663)</span>
                </a>
                {{-- <div class="text-xs xs:text-sm text-gray-600">نقدی</div> --}}
            </div>
            <div class="flex justify-between items-center mt-3">
                <div class="text-xs text-gray-500 variable-font-light">@lang('زمان پرداخت')</div>
                <div class="text-xs xs:text-sm text-gray-600">5 فروردین 01 ، ساعت 11:45</div>
            </div>
            {{-- <div class="flex justify-between items-center mt-3">
                <div class="text-xs text-gray-500 variable-font-light">@lang('کیف ‌پول')</div>
                <div>
                    <select class="text-xs text-gray-700 border border-gray-400 rounded py-1 px-8 w-44 lijax-sending" name="treasuries">
                        <option value="select" selected="selected">انتخاب کنید</option>
                        <option value="treasurie1">کیف پول ۱</option>
                        <option value="treasurie2">کیف پول شماره و رقم خورده عدد ۲ و خیلی بیشتر از آن چی میشه؟</option>
                    </select>
                    <span class="spinner relative top-3 -right-0.5"></span>
                </div>
            </div> --}}
            {{-- <label for="prepayment" class="flex items-center cursor-pointer group mt-3">
                <input checked id="prepayment" name="prepayment" type="checkbox" class="w-4 h-4 rounded border border-gray-400 focus">
                <span class="text-xs text-gray-500 mr-1.5 group-hover:text-blue-600">@lang('هزینه‌ی آزمون پیش از انجام، توسط مراجع پرداخت شود.')</span>
            </label> --}}
        </div>
    </div>
    @if (in_array($sample->status, ['scoring', 'creating_files']))

        <div class="flex flex-col items-center justify-center border border-gray-200 rounded py-16 px-4 mt-4">
            <i class="fal fa-spinner-third animate-spin text-gray-500 text-6xl"></i>
            <span class="text-gray-500 mt-6">درحال نمره‌دهی و ساخت فایل‌ها</span>
        </div>

        {{-- <div class="flex flex-col items-center justify-center border border-gray-200 rounded py-16 px-4 mt-4">
            <i class="fal fa-check-circle text-green-700 text-6xl"></i>
            <span class="text-green-700 font-semibold mt-6">با موفقیت انجام شد</span>
            <span class="text-sm text-gray-500 mt-2">در حال انتقال...</span>
        </div> --}}
    @else
        @if ($sample->client)
            @include('dashboard.samples.show-detail')
        @else
            <form method="POST">
                <div class="border border-gray-200 rounded p-4 mt-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        <div>
                            <label for="client_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Select client') }}</label>
                            <select multiple data-template="users" id="room_client_id" name="client_id[]" id="client_id" data-url="{{ isset($room) ? route('dashboard.room.users.index', ['room' => $room->id, 'instance' => 1]) : '' }}" data-url-pattern="{{ route('dashboard.room.users.index', ['room' => '%%', 'status' => 'accepted', 'instance' => 1]) }}" data-placeholder="{{ __('Without specified client') }}" class="select2-select"></select>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="inline-flex justify-center items-center h-9 px-8 bg-brand text-white text-sm rounded-full hover:bg-blue-800 transition ml-4">
                            {{ __('Submit') }}
                        </button>
                    </div>
                </div>
            </form>
        @endif
    @endif
@endsection
