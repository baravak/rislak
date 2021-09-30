<div x-data='{"treauseries" : {{ json_encode($_myTreauseries->values()->toArray()) }}, "selected" : null}'>
    <label class="block mb-2 text-sm text-gray-700 variable-font-medium">{{ __('Select treasury') }}</label>
    <div class="rounded border border-gray-400">
        <template x-for="treausery in treauseries">
            <label class="flex items-center w-full py-2 px-4 hover:bg-gray-100 border-b last:border-b-0 border-gray-300 transition cursor-pointer" x-data='{"balance" : treausery.balance.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "،") || "0"}'>
                <input type="radio" name="treasury_id" :value="treausery.id" class="cursor-pointer">
                <div class="flex flex-col text-xs mr-4 pr-4 border-r border-gray-300">
                    <span class="flex variable-font-semibold text-gray-700" x-text="treausery.title"></span>
                    <span class="flex text-gray-600 mt-0.5" x-text="treausery.center ? treausery.center.detail.title : ''"></span>
                    <div class="flex items-center mt-0.5">
                        <span class="text-gray-500 ml-1">تراز مالی:</span>
                        <span class="variable-font-medium" :class='{"text-green-600" : treausery.balance > 0, "text-red-500" : treausery.balance < 0 , "text-gray-500" : treausery.balance == 0}' x-text="(treausery.balance >= 0 ? balance : `(${balance})`) + ' تومان'"></span>
                    </div>
                </div>
            </label>
        </template>
    </div>
</div>
