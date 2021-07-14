@extends($layouts->dashboard)
@section('content')
    <div class="mx-auto w-full sm:w-1/2">
        <ul data-tabs>
            <li><a href="#tags-seetings" data-tabby-default class="direct focus flex" title="{{ __('Tags settings') }}">{{ __('Tags settings') }}</a></li>
        </ul>
        <div id="tags-seetings">
            <div class="w-full mt-6">
                {{-- <div class="flex items-start p-4 border bg-gray-100 rounded mb-2 cursor-default">
                    <i class="fal fa-info-circle ml-2 text-sm"></i>
                    <span class="text-sm text-gray-600">جهت نمایش برچسب‌ها به ترتیب اولویت از راست به چپ در صفحه اتاق درمان، جایگاه هر برچسب را با عدد مشخص کنید.</span>
                </div> --}}
                <div class="p-4 border border-gray-200 rounded">
                    <div class="flex items-center mb-4 cursor-default">
                        <span class="text-sm variable-font-semibold ml-2 w-10 text-center">جایگاه</span>
                        <span class="text-sm variable-font-semibold w-full text-center">انتخاب برچسب‌ها</span>
                    </div>
                    @for ($i = 1; $i <= 8; $i++)
                    <div class="flex items-center mb-4">
                        <input type="text" disabled value="{{ $i }}" class="w-10 ml-2 border border-gray-500 h-10 rounded px-2 text-sm text-center focus:border-brand focus">
                        <select class="select2-select" data-lijax="change" data-method="put" data-action="{{ route('dashboard.room.setting.tags.update', $room->id) }}"   id="tag-finder-{{ $i }}" data-fill="tags" name="id" data-merge='{"order" : {{ $i }}}' data-url="{{route('dashboard.tags.index', ['region' => $center->id])}}" data-tags="true" >
                        @if($tags && $tags->where('order', $i)->first())
                            <option value="{{ $tags->where('order', $i)->first()->id }}">{{ $tags->where('order', $i)->first()->title }}</option>
                        @endif
                        </select>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
