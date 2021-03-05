@extends($layouts->dashboard)
@section('content')
    @yield('before_content')
    @section('form-tag')
    @hasSection ('form_action')
        <form class="m-auto w-full sm:w-1/2 md:w-1/3" action="@yield('form_action')" method="POST">
    @else
    <form class="m-auto w-full sm:w-1/2 md:w-1/3" action="@yield('form_action', request()->create(isset(${$module->result}) ? ${$module->result}->route('update') : route("$module->resource.store", ($module->parent ? request()->route()->parameters[$module->parent] : null)), 'GET', request()->all())->getUri())" method="POST">
    @endif
            @csrf
            <input type="hidden" name="_method" value="{{$module->action == 'edit' ? 'PUT' : 'POST'}}">
                @yield('form_content')
                <div class="mt-6">
                    <button type="submit" class="inline-flex justify-center items-center h-9 px-8 bg-brand text-white text-sm rounded-full hover:bg-blue-800 transition ml-4">
                        @yield('form-title', __(($module->action == 'create' ? "Create " : 'Edit ') . $module->singular))
                    </button>
                    @if(request()->callback || isset($callbackCancel))
                        <a href="{{request()->callback ?: $callbackCancel}}" class="text-gray-500 hover:text-gray-700 text-sm">{{ __('Cancel') }}</a>
                    @elseif(Route::has($module->resource . '.index'))
                        <a href="{{ route($module->resource . '.index', $module->parent ? request()->route()->parameters[$module->parent] : null) }}" class="text-gray-500 hover:text-gray-700 text-sm">{{ __('Cancel') }}</a>
                    @endif
                </div>
        </form>
    @show
    @yield('other-card')
    @yield('other-content')
@endsection
