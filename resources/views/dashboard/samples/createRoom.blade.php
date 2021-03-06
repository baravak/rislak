<input type="hidden" name="type" value="room_user">
<div>
    <div class="mt-4">
        <label for="client_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Client') }}</label>
        <select multiple data-template="users" id="room_client_id" name="client_id[]" id="client_id" data-url="{{ isset($room) ? route('dashboard.room.users.index', ['room' => $room->id, 'instance' => 1]) : '' }}" data-url-pattern="{{ route('dashboard.room.users.index', ['room' => '%%', 'status' => 'accepted', 'instance' => 1]) }}" data-placeholder="{{ __('Without specified client') }}" class="select2-select">
        </select>
    </div>
</div>
