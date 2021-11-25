<label for="item-{{$loop->index}}" class="block mb-2 text-sm text-gray-700 font-medium">{{$loop->index + 1}} - {{isset($item->text) ? $item->text : ''}}</label>
<textarea class="border border-gray-500 rounded w-full resize-none" rows="8" data-action="{{urldecode(route('samples.storeItems', $sample->id, 1))}}" data-method="post" data-item="{{$loop->index + 1}}" data-name="items[{{$loop->index}}][1]" data-merge='{"items[{{$loop->index}}][0]" : {{$loop->index + 1}}}' data-lijax="change" id="item-{{$loop->index}}" placeholder="&nbsp;" disabled class="form-items">{{ isset($item->user_answered) ?  $item->user_answered : null }}</textarea>