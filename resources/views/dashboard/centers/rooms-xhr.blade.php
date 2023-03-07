<h2 class="heading" data-total="({{ method_exists($rooms, 'total') ? $rooms->total() : '' }})" data-xhr="total">{{ __('Rooms') }}</h2>
@include('dashboard.centers.rooms')
