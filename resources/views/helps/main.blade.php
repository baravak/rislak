<div data-xhr="help-content">
    <div class="absolute bottom-6 left-6">
        <div class="relative dropdown">
            <button type="button" class="block bg-white border border-gray-300 rounded-full h-9 w-9 hover:bg-gray-100 transition text-gray-400 focus dropdown-toggle shadow-md text-xl leading-10">؟</button>
            <div class="flex rounded shadow-md dropdown-menu w-60 absolute left-0 bottom-12 p-3 cursor-default">
                @yield('help-content')
                @include('helps.helpDefault')
            </div>
        </div>
    </div>
</div>