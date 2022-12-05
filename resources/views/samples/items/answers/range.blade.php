<div class="sample-item-two-sided">
    <div class="items">
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
                <input type="radio" name="item-{{ $key + 1 }}"
                data-merge='[{{ $key+1 }}]' @radioChecked($item->user_answered, $_item_value + $i)
                data-keyboard="{{ $_item_value + $i }}" data-item="{{ $_item_value + $i }}" id="item-{{ $key+1 }}-{{ $_item_value + $i }}"
                value="{{ $_item_value + $i }}" class="sr-only" />
                <label for="item-{{ $key+1 }}-{{ $_item_value + $i }}" class="{{ $i < floor($_range_side_count /2)  ?  "bg-blue-100" : "bg-blue-50" }}">
                    {{ $_item_value + $i }}
                </label>
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
                <label for="item-{{ $key+1 }}-{{ $_item_value + $_range_side_count + ($_range_count - ($_range_side_count * 2)) + $i }}" class="{{ $i < floor($_range_side_count /2)  ?  "bg-purple-50" : "bg-purple-100" }}">{{ $_item_value + $_range_side_count + ($_range_count - ($_range_side_count * 2)) + $i }}</label>
            </div>
        @endfor
    </div>
</div>
