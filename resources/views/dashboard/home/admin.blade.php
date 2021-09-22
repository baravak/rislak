<div class="grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-4 md:grid-cols-5 xl:grid-cols-6 2xl:grid-cols-8 gap-4 mt-8">
    <a href="{{ route('dashboard.admin.banks.index') }}" class="border border-gray-300 hover:border-brand text-brand rounded p-4 flex xs:flex-col items-center xs:justify-center hover:bg-blue-50 transition group focus-current ring-brand">
        <i class="fal fa-credit-card-front text-2xl"></i>
        <span class="mr-4 xs:mr-0 xs:mt-2 variable-font-medium text-sm text-gray-500 text-center">@lang('Bank accounts')</span>
    </a>
    <a href="#" class="border border-gray-300 hover:border-yellow-500 text-yellow-500 rounded p-4 flex xs:flex-col items-center xs:justify-center hover:bg-yellow-50 transition group focus-current ring-yellow-500">
        <i class="fal fa-file-export text-2xl"></i>
        <span class="mr-4 xs:mr-0 xs:mt-2 variable-font-medium text-sm text-gray-500 text-center">@lang('Exports')</span>
    </a>
</div>
