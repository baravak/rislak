@extends($layouts->dashboard)

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Terms') }} <sup>({{ $terms->total() }})</sup>
            @filterBadge($terms)
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>@sortView($terms, 'id', '#')</th>
                            <th>@sortView($terms, 'title')</th>
                            <th>@sortView($terms, 'parents')</th>
                            <th>@sortView($terms, 'creator')</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($terms as $term)
                            <tr>
                                <td>
                                    @id($term)
                                </td>
                                <td>
                                    {{ $term->title }}
                                </td>
                                <td>
                                    @foreach ($term->parents as $parent)
                                        <span class="badge badge-secondary fs-10">{{$parent->title}}</span>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $term->creator->name ?: $term->creator->id }}
                                </td>
                                <td>
                                    <a href="{{route('dashboard.terms.edit', ['id' => $term->id])}}" title="{{__('Edit')}}">
                                        <i class="far fa-user-cog text-primary"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
