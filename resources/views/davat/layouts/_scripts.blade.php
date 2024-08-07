@section('scripts')
    <script src="/vendors/jquery-3.6.0.min.js"></script>
    @if ($layouts->vendor->popper)
        <script src="/vendors/popper.min.js"></script>
    @endif

    <script src="@staticVersion('/js/sarkoot.min.js')"></script>

    <script src="@staticVersion('/js/davat.dashboard.min.js')"></script>
    <script>
        window.addEventListener('load', function(){
            $('<style>body::before{animation:bodyLoading 500ms normal forwards;}</style>').appendTo('body');
            setTimeout(function() {
                $('.bodyLoading').remove();
            }, 1000);
        }, false);
    </script>
@endsection
