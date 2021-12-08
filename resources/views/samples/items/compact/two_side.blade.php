<div class="sample-item-two-sided">
    <div class="titles bg-blue-100">{{ $item->sides[0] }}</div>
    @php
        $item->answer->reverse = isset($item->answer->reverse) ? $item->answer->reverse : false;
    @endphp
    <div class="items {{ $item->answer->reverse ? 'reverse' : '' }}">
        @php
            $_range_count = $item->answer->max - $item->answer->min + 1;
            if($_range_count == 2){
                $_range_side_count = 1;
            }elseif($_range_count % 2 == 0){
                $_range_side_count = (int) floor(($_range_count -1) / 2);
            }else{
                $_range_side_count = (int)floor($_range_count / 2);
            }
            $_item_value = $item->answer->min;
        @endphp
        @for ($i = 0; $i < $_range_side_count; $i++)
            <div class="item">
                <input type="radio" name="item-{{ $key + 1 }}" data-merge='[{{ $key+1 }}]' @radioChecked($item->user_answered, $_item_value + $i) data-keyboard="{{ $_item_value + $i }}" data-item="{{ $_item_value + $i }}" id="item-{{ $key+1 }}-{{ $_item_value + $i }}" value="{{ $_item_value + $i }}" class="sr-only">
                @if($item->answer->reverse)
                    <label for="item-{{ $key+1 }}-{{ $_item_value + $i }}" class="{{ $i < floor($_range_side_count /2)  ?  "bg-purple-100" : "bg-purple-50" }}">{{ $_item_value + $i }}</label>
                @else
                    <label for="item-{{ $key+1 }}-{{ $_item_value + $i }}" class="{{ $i < floor($_range_side_count /2)  ?  "bg-blue-100" : "bg-blue-50" }}">{{ $_item_value + $i }}</label>
                @endif
            </div>
        @endfor
        @for ($i = 0; $i < $_range_count - ($_range_side_count * 2) ; $i++)
            <div class="item">
                <input type="radio" name="item-{{ $key + 1 }}" data-merge='[{{ $key+1 }}]' @radioChecked($item->user_answered, $_item_value + $_range_side_count + $i) data-keyboard="{{ $_item_value + $_range_side_count + $i }}" data-item="{{ $_item_value + $_range_side_count + $i }}" id="item-{{ $key+1 }}-{{ $_item_value + $_range_side_count + $i }}" value="{{ $_item_value + $_range_side_count + $i }}" class="sr-only">
                <label for="item-{{ $key+1 }}-{{ $_item_value + $_range_side_count + $i }}" class="bg-gray-50">{{ $_item_value + $_range_side_count + $i }}</label>
            </div>
        @endfor
        @for ($i = 0; $i < $_range_side_count; $i++)
            <div class="item">
                <input type="radio" name="item-{{ $key + 1 }}" data-merge='[{{ $key+1 }}]' @radioChecked($item->user_answered, $_item_value + $_range_side_count + ($_range_count - ($_range_side_count * 2)) + $i) data-keyboard="{{ $_item_value + $_range_side_count + ($_range_count - ($_range_side_count * 2)) + $i }}" data-item="{{ $_item_value + $_range_side_count + ($_range_count - ($_range_side_count * 2)) + $i }}" id="item-{{ $key+1 }}-{{ $_item_value + $_range_side_count + ($_range_count - ($_range_side_count * 2)) + $i }}" value="{{ $_item_value + $_range_side_count + ($_range_count - ($_range_side_count * 2)) + $i }}" class="sr-only">
                @if($item->answer->reverse)
                    <label for="item-{{ $key+1 }}-{{ $_item_value + $_range_side_count + ($_range_count - ($_range_side_count * 2)) + $i }}" class="{{ $i < floor($_range_side_count /2)  ?  "bg-blue-50" : "bg-blue-100" }}">{{ $_item_value + $_range_side_count + ($_range_count - ($_range_side_count * 2)) + $i }}</label>
                @else
                    <label for="item-{{ $key+1 }}-{{ $_item_value + $_range_side_count + ($_range_count - ($_range_side_count * 2)) + $i }}" class="{{ $i < floor($_range_side_count /2)  ?  "bg-purple-50" : "bg-purple-100" }}">{{ $_item_value + $_range_side_count + ($_range_count - ($_range_side_count * 2)) + $i }}</label>
                @endif
            </div>
        @endfor
    </div>
    <div class="titles bg-purple-100">{{ $item->sides[1] }}</div>
</div>
{{-- {
    "type": "two_side",
    "sides": [
        "دستور اجرای این آزمون را به خوبی فهمیده‌ام.",
        "زیادی مطمئن به فهم دستور آزمون نیستم"
    ],
    "answer": {
        "reverse":true,
        "type": "range",
        "min" : 1,
        "max" : 2
    }
} --}}
