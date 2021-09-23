<div x-data='{"treauseries" : {{ json_encode($_myTreauseries->values()->toArray()) }}, "selected" : null}'>
    <label class="block mb-2 text-sm text-gray-700 variable-font-medium">{{ __('Select treasury') }}</label>
    <div class="relative dropdown w-full">
        <div class="rounded bg-white border border-gray-200 mt-1 shadow-md">
            <template x-for="treausery in treauseries">
                <label class="flex items-center justify-between w-full py-2 px-3 hover:bg-gray-100 border-b border-gray-200 transition cursor-pointer" x-data='{"balance" : treausery.balance.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "،") || "0"}'>
                    <input type="radio" name="treasury_id" :value="treausery.id">
                    <div class="flex flex-col text-xs">
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
</div>
