<form class="w-full mt-6" action="{{route('dashboard.users.change-password', ['user' => $user->id])}}" method="POST">
    <div class="p-4 border border-gray-200 rounded">
        @if (auth()->isAdmin() || auth()->user()->no_password)
        @else
            <div>
                <label for="cp-password" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Current password') }}</label>
                <input type="password" id="cp-password" name="password" autocomplete="password" class="border border-gray-500 h-10 rounded px-4 w-full text-left dir-ltr focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
            </div>
        @endif
        <div>
            <label for="cp-new-password" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('New password') }}</label>
            <input type="password" id="cp-new-password" name="new_password" autocomplete="password" class="border border-gray-500 h-10 rounded px-4 w-full text-left dir-ltr focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
            <div class="flex items-center text-xs text-gray-400 mt-2">
                <i class="fal fa-info-circle ml-1"></i>
                <span>{{ __('Password help') }}</span>
            </div>
        </div>
    </div>
    <button type="submit" class="inline-flex items-center justify-center h-9 mt-4 px-8 bg-brand text-white text-sm rounded-full hover:bg-brand-600 focus transition">
        {{__('Change password')}}
    </button>
</form>
