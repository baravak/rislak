@extends($layouts->dashboard)
@section('content')
    <div class="w-full xs:w-2/3 sm:w-4/5 lg:w-3/5 2xl:w-2/5 mx-auto grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-4 gap-4 mt-8">
            <a href="{{ route('dashboard.room.billings.index', $room->id) }}" class="border border-gray-300 hover:border-gray-500 text-gray-500 rounded p-4 flex xs:flex-col items-center xs:justify-center hover:bg-gray-50 transition group focus-current ring-gray-500">
                <i class="fal fa-balance-scale text-2xl"></i>
                <span class="mr-4 xs:mr-0 xs:mt-2 variable-font-medium text-sm text-gray-500 text-center">@lang('Financial-balance')</span>
            </a>
        <a href="{{ route('dashboard.atom.assessments.index', $room->id) }}" class="border border-gray-300 hover:border-blue-500 text-blue-500 rounded p-4 flex xs:flex-col items-center xs:justify-center hover:bg-blue-50 transition group focus-current ring-blue-500">
            <i class="fal fa-clipboard-list-check text-2xl"></i>
            <span class="mr-4 xs:mr-0 xs:mt-2 variable-font-medium text-sm text-gray-500 text-center">@lang('Assessments')</span>
        </a>
    </div>
@endsection
