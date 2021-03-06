<form class="w-full mt-6" action="{{route('dashboard.centers.update', ['center' => $center->id])}}" method="POST">
    @method('PUT')
    <div class="p-4 border border-gray-200 rounded">
        @if (auth()->isAdmin())
        <div class="form-group">
                <label for="manager_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Manager') }}</label>
                <select class="select2-select" name="manager_id"  id="manager_id" data-url="{{route('dashboard.users.index', ['personal_clinic' => 'yes'])}}">
                    <option value="{{$center->manager->user_id}}" selected>{{$center->manager->name}}</option>
                </select>
                <div data-for="manager_id">
                        @include('dashboard.users.select2', ['users' => [App\User::apishow($center->manager->user_id)]])
                </div>
        </div>
        @endif

        <div class="form-group mt-4">
            <label for="title" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Title') }}</label>
            <input type="text" name="title" id="title" autocomplete="off" @formValue($center->detail->title) class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
        </div>

        <div class="mt-4">
            <label for="address" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Address') }}</label>
            <input type="text" name="address" id="address" autocomplete="off" @formValue($center->detail->address) placeholder="{{ __('Optional') }}" class="border border-gray-500 h-10 rounded px-4 w-full text-sm placeholder-gray-300 focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
        </div>

        <div class="mt-4">
            <div>
                <label for="phone_numbers" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Phone numbers') }}</label>
                <select class="select2-select placeholder-gray-300" data-tags="true" placeholder="{{ __('Optional') }}" multiple name="phone_numbers[]" id="phone_numbers">
                    @foreach ($center->detail->phone_numbers ?: [] as $number)
                        <option value="{{$number}}" selected>{{$number}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mt-4">
            <label for="description" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Description') }}</label>
            <textarea id="description" name="description" placeholder="{{ __('Optional') }}" autocomplete="off" class="resize-none border border-gray-500 h-20 rounded px-4 py-2 w-full text-sm placeholder-gray-300 focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">@isset($center->detail->description){{ $center->detail->description }}@endisset</textarea>
        </div>
    </div>

    <button type="submit" class="inline-flex items-center justify-center h-9 mt-4 px-8 bg-brand text-white text-sm rounded-full hover:bg-brand-600 focus transition">
        {{ __('Edition') }}
    </button>
</form>
