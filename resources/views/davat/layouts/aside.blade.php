@section('aside')
    <aside id="aside" class="bg-gray-50 border-l border-gray-200 overflow-y-auto">
        <div class="flex items-center h-20 px-2">
            <h1 class="text-2xl font-black text-brand">
                <a href="/" target="_blank" class="block">{{ __('App Title') }}</a>
            </h1>
        </div>

        <ul class="px-2">
            <li class="mb-1">
                <a href="{{ route('dashboard.home') }}" class="flex justify-between items-center h-12 px-6 rounded text-gray-900 hover:bg-gray-200 transition">
                    <div class="flex items-center">
                        <i class="fal fa-tachometer-alt-fastest ml-2"></i>
                        <span class="font-light">{{ __('Dashboard') }}</span>
                    </div>
                </a>
            </li>
            <li class="mb-1">
                <a href="{{ route('dashboard.centers.index') }}" class="flex justify-between items-center h-12 px-6 rounded text-white bg-brand transition">
                    <div class="flex items-center">
                        <i class="fal fa-building ml-2"></i>
                        <span class="font-light">{{ __('Therapy centers') }}</span>
                    </div>
                </a>
                <ul class="pr-8 mt-2">
                    @if (auth()->myClinic())
                    <li>
                        <a href="{{ route('dashboard.centers.show', auth()->myClinic()->id) }}" class="flex items-center text-sm text-gray-600 font-semibold hover:text-gray-700 transition h-12 pr-4 border-r border-gray-300">{{  __('My clinic') }}</a>
                    </li>
                    @endif
                    @php
                        $_AsideCenter= auth()->centers(true);
                    @endphp
                    @if ($_AsideCenter->count() < 3)
                        @foreach ($_AsideCenter as $_center)
                        <li>
                            <a href="{{ route('dashboard.centers.show', $_center->id) }}" class="flex items-center text-sm text-gray-600 font-semibold hover:text-gray-700 transition h-12 pr-4 border-r border-gray-300">
                                @if ($_center->type == 'personal_clinic')
                                    @lang('Personal clinic of :user', ['user' => $_center->manager->name])
                                @else
                                {{ $_center->detail->title }}
                                @endif
                            </a>
                        </li>
                        @endforeach
                    @else
                        <li>
                            <a href="{{ route('dashboard.centers.index', ['my' => 'yes']) }}" class="flex items-center text-sm text-gray-600 font-semibold hover:text-gray-700 transition h-12 pr-4 border-r border-gray-300">{{  __('My therapy centers') }}</a>
                        </li>
                    @endif
                </ul>
            </li>
            <li class="mb-1">
                <a href="{{ route('dashboard.cases.index') }}" class="flex justify-between items-center h-12 px-6 rounded text-gray-900 hover:bg-gray-200 transition">
                    <div class="flex items-center">
                        <i class="fal fa-folders ml-2"></i>
                        <span class="font-light">{{ __('Cases') }}</span>
                    </div>
                </a>
            </li>
            <li class="mb-1">
                <a href="{{ route('dashboard.sessions.index') }}" class="flex justify-between items-center h-12 px-6 rounded text-gray-900 hover:bg-gray-200 transition">
                    <div class="flex items-center">
                        <i class="fal fa-user-friends ml-2"></i>
                        <span class="font-light">{{ __('Sessions') }}</span>
                    </div>
                </a>
            </li>
            @if (auth()->isAdmin())
            <li class="mb-1">
                <a href="{{ route('dashboard.users.index') }}" class="flex justify-between items-center h-12 px-6 rounded text-gray-900 hover:bg-gray-200 transition">
                    <div class="flex items-center">
                        <i class="fal fa-users ml-2"></i>
                        <span class="font-light">{{ __('Users') }}</span>
                    </div>
                </a>
            </li>
            @endif
            <li class="mb-1">
                <a href="{{ route('dashboard.assessments.index') }}" class="flex justify-between items-center h-12 px-6 rounded text-gray-900 hover:bg-gray-200 transition">
                    <div class="flex items-center">
                        <i class="fal fa-balance-scale ml-2"></i>
                        <span class="font-light">{{ __('Assessments') }}</span>
                    </div>
                </a>
            </li>
            <li class="mb-1">
                <a href="{{ route('dashboard.samples.index') }}" class="flex justify-between items-center h-12 px-6 rounded text-gray-900 hover:bg-gray-200 transition">
                    <div class="flex items-center">
                        <i class="fal fa-vial ml-2"></i>
                        <span class="font-light">{{ __('Samples') }}</span>
                    </div>
                </a>
            </li>
            <li class="mb-1">
                <a href="{{ route('dashboard.documents.index') }}" class="flex justify-between items-center h-12 px-6 rounded text-gray-900 hover:bg-gray-200 transition">
                    <div class="flex items-center">
                        <i class="fal fa-file-certificate ml-2"></i>
                        <span class="font-light">{{ __('Documents') }}</span>
                    </div>
                </a>
            </li>
            @isset($layouts->asideMenu)
                @include($layouts->asideMenu)
            @endisset
        </ul>
    </aside>
@endsection
