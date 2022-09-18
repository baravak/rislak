@foreach ($sample->items as $key => $item)
    @isset($sample->entities)
        @foreach ($sample->entities as $entKey => $entity)
            @if ($entity->offset == $key)
                @include('samples.panel.entities')
            @endif
        @endforeach
    @endisset
    <div  data-nav="{{ $key+1 }}"
    data-title="{{ $key+1 }}"
    class="hidden"
    data-type="item"
    {{isset($item->user_answered) && $item->user_answered ? '' :  'data-nullable'}}
    data-answer-type="{{ $item->answer->type }}"
    data-answer="{{ isset($item->user_answered) ? $item->user_answered : null }}"
    {{isset($item->answer->description) ? '' : 'data-autonext'}}>
        @isset($item->category)
        <h4 class="text-gray-700 mb-2">{{ $item->category }}</h4>
        @endisset
        @include('samples.items.types.' . $item->type)
        @isset($item->description)
            <p class="text-sm mb-8">{{ $item->description }}</p>
        @endisset
        @isset($item->answer->nullable)
            <label>
                <input type="checkbox" data-nullable {{isset($item->user_answered) && $item->user_answered ? '' :  'checked'}} data-merge="[{{$key + 1}}]"> {{$item->answer->nullable->text ?:  'برای این سوال جوابی ندارم'}}
            </label>
        @endisset
        <div id="answer-content-panel-{{$key + 1}}">
            @includeWhen(isset($item->answer->description->at_first), 'samples.items.description')
            @if (\View::exists('samples.items.compact.'.$item->type ))
                @include('samples.items.compact.' . $item->type)
            @else
                <div id="item-section">
                    @includeFirst(['samples.items.answers.' . $item->answer->type, 'samples.items.answers.fail'])
                </div>
            @endif
            @includeWhen(isset($item->answer->description) && !isset($item->answer->description->at_first), 'samples.items.description')
        </div>
    </div>
@endforeach
