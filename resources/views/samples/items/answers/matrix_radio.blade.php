<div x-data="{row: {{isset($item->user_answered) ? substr($item->user_answered, 0, 1) : 'null'}}, col: {{isset($item->user_answered) ? substr($item->user_answered, 2, 1) : 'null'}}}">
    <div class="hidden md:block sample-matrix">
        <div class="matrix-grid">
            <div></div>
            @foreach ($item->answer->matrix[0] as $col)
                <h3>{{$col}}</h3>
            @endforeach
        </div>
        @foreach ($item->answer->matrix[1] as $rid => $row)
            <div class="matrix-grid">
                <h4 :class="{{$rid + 1}}  == row ? 'bg-gray-100' : 'bg-gray-50'">{{$row}}</h4>
                @foreach ($item->answer->matrix[0] as $cid => $col)
                    <label class="bg-gray-50">
                        <input type="radio" name="item-{{ $key + 1 }}" id="item-{{ $key + 1 }}-{{$rid + 1}}-{{$cid + 1}}" data-item="{{$rid + 1}},{{$cid + 1}}" value="{{$rid + 1 }},{{$cid + 1 }}"
                        data-merge="[{{$key + 1}}]" {{isset($item->user_answered) && $item->user_answered == ($rid + 1) . ',' . ($cid + 1) ? 'checked' : ''}} x-on:change="col = {{$cid + 1}}; row = {{$rid + 1}};">
                    </label>
                @endforeach
            </div>
            @endforeach
    </div>
    <div class="md:hidden mt-2 sample-matrix-select">
        <h4>ردیف</h4>
        <select name="item-{{ $key + 1 }}-row" id="item-{{ $key + 1 }}-row" data-matrixindex="{{$key + 1}}" data-matrix-row>
            <option value="" disabled selected>@lang('انتخاب کنید')</option>
            @foreach ($item->answer->matrix[1] as $rid => $row)
                <option value="{{$rid + 1}}" {{isset($item->user_answered) && substr($item->user_answered, 0, 1) == $rid + 1 ? 'selected' : ''}}>{{$row}}</option>
            @endforeach
        </select>
    </div>
    <div class="md:hidden mt-2 sample-matrix-select">
        <h4>ستون</h4>
        <select name="item-{{ $key + 1 }}-col" id="item-{{ $key + 1 }}-col" data-matrixindex="{{$key + 1}}" data-matrix-col>
            <option value="" disabled selected>@lang('انتخاب کنید')</option>
            @foreach ($item->answer->matrix[0] as $cid => $col)
                <option value="{{$cid + 1}}" {{isset($item->user_answered) && substr($item->user_answered, 2, 1) == $cid + 1 ? 'selected' : ''}}>{{$col}}</option>
            @endforeach
        </select>
    </div>
</div>