<template x-for="bank in banks">
        <tr class="transition hover:bg-gray-50" x-data='{"action" : "raw"}' :class='{"edit-table-row" : action == "edit"}'>
            <td class="px-3 py-2 whitespace-nowrap">
                <div class="flex items-center">
                    <span class="text-xs text-gray-600 block text-right dir-ltr en cursor-default" x-text="bank.bank.isbn"></span>
                </div>
            </td>
            <td class="px-3 py-2 whitespace-nowrap">
                <div class="flex flex-col justify-center">
                    <span class="text-xs text-gray-600 variable-font-medium cursor-default" x-text="bank.user ? bank.user.name : bank.center.detail.title"></span>
                    <span class="text-xs text-gray-500 cursor-default mt-1" x-text="bank.creator.name"></span>
                </div>
            </td>
            <td class="px-3 py-2 whitespace-nowrap" x-show="action == 'raw'">
                <div class="flex items-center relative top-0.5">
                    <span class="text-xs text-red-600 block cursor-default" x-show="bank.status == 'unverified'">تأیید نشده</span>
                    <span class="text-xs text-green-600 block cursor-default" x-show="bank.status == 'verified'">تأیید شده</span>
                    <span class="text-xs text-gray-600 block cursor-default"x-show="bank.status == 'awaiting'">در انتظار</span>
                </div>
            </td>
            <td class="px-3 py-2 whitespace-nowrap" x-show="action == 'edit'">
                <div class="flex flex-col justify-center relative top-1">
                    <div>
                        <label class="inline-flex items-center group">
                            <input type="radio" :name="`status-${bank.id}`" :id="`status${bank.id}-awaiting`" value="awaiting" :checked="bank.status == 'awaiting'" x-model="bank.status" class="w-3.5 h-3.5 border border-gray-600 focus">
                            <span class="text-xs text-gray-600 mr-2 group-hover:text-blue-600">@lang('Awaiting')</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center group">
                            <input type="radio" :name="`status-${bank.id}`" :id="`status${bank.id}-unverified`" value="unverified" :checked="bank.status == 'unverified'" x-model="bank.status" class="w-3.5 h-3.5 border border-gray-600 focus">
                            <span class="text-xs text-gray-600 mr-2 group-hover:text-blue-600">@lang('Unverified')</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center group">
                            <input type="radio" :name="`status-${bank.id}`" :id="`status${bank.id}-verified`" value="verified" :checked="bank.status == 'verified'" x-model="bank.status" class="w-3.5 h-3.5 border border-gray-600 focus">
                            <span class="text-xs text-gray-600 mr-2 group-hover:text-blue-600">@lang('Verified')</span>
                        </label>
                    </div>
                </div>
            </td>
            <td class="px-3 py-2 whitespace-nowrap" x-show="action == 'raw' || bank.status == 'awaiting'">
                <div class="flex items-center text-xs text-gray-600 cursor-default" x-show="bank.notic">
                    <span class="variable-font-medium ml-1">@lang('Description'):</span>
                    <span x-text="bank.notic"></span>
                </div>
                <div class="flex items-center text-xs text-gray-600 cursor-default" x-show="bank.bank.owner">
                    <span class="variable-font-medium ml-1">@lang('نام صاحب حساب'):</span>
                    <span x-text="bank.bank.owner"></span>
                    <span class="mx-2">-</span>
                    <span x-text="bank.bank.bank_title"></span>
                </div>
            </td>
            <td class="px-3 py-2 whitespace-nowrap" x-show="action == 'edit' && bank.status == 'verified'">
                <div class="flex items-center">
                    <div>
                        <label :for="`owner-${bank.id}`" class="block mb-1 text-xs text-gray-700 variable-font-medium">@lang('نام صاحب حساب')</label>
                        <input type="text" :name="`owner-${bank.id}`" :id="`owner-${bank.id}`" :value="bank.bank.owner" x-model="bank.bank.owner" autocomplete="off" class="w-40 border border-gray-400 text-xs text-gray-600 h-8 rounded px-2 focus ml-2">
                    </div>
                    <div>
                        <label for="bank-${bank.id}`" class="block mb-1 text-xs text-gray-700 variable-font-medium">@lang('نام بانک')</label>
                        <select name="" id="" class="w-40 border border-gray-400 text-xs text-gray-600 h-8 rounded px-2 focus">
                            <option value="">بانک ملی</option>
                            <option value="">بانک ملت</option>
                        </select>
                        {{-- <input type="text" :name="`bank${bank.id}`" :id="`bank-${bank.id}`" :value="bank.bank.bank_id" x-model="bank.bank.bank_id" autocomplete="off" class="w-40 border border-gray-400 text-xs text-gray-600 h-8 rounded px-2 focus"> --}}
                    </div>
                </div>
            </td>
            <td class="px-3 py-2 whitespace-nowrap" x-show="action == 'edit' && bank.status == 'unverified'">
                <div class="flex items-center">
                    <div>
                        <label :for="`notic-${bank.id}`" class="block mb-1 text-xs text-gray-700 variable-font-medium">@lang('Description')</label>
                        <input type="text" :name="`notic-${bank.id}`" :id="`notic-${bank.id}`" :value="bank.notic" x-model="bank.notic"  placeholder="@lang('علت عدم تایید شماره شبا را بنویسید')" autocomplete="off" class="w-80 border border-gray-400 text-xs text-gray-600 h-8 rounded px-2 focus placeholder-gray-300">
                    </div>
                </div>
            </td>
            <td class="px-3 p-3 whitespace-nowrap text-left dir-ltr">
                <div class="flex items-center">
                    <a href="#" aria-label="{{ __('Edit') }}" @click.prevent="event.preventDefault()" @click="action = 'edit'" x-show="action == 'raw'"><i class="fal fa-edit text-sm text-gray-600 hover:text-blue-600 relative top-0.5"></i></a>
                    <div  x-show="action == 'edit'">
                        <form  :action="`/dashboard/admin/banks/${bank.id}`" method="POST" @submit="action = 'raw'">
                            @method('PUT')
                            <input type="hidden" name="status" :value="bank.status">
                            <input type="hidden" name="notic" :value="bank.notic">
                            <input type="hidden" name="owner" :value="bank.bank.owner">
                            <input type="hidden" name="bank_id" :value="bank.bank.bank_id">
                            <button type="submit" aria-label="@lang('Save')" class="flex items-center border border-green-600 h-6 px-4 text-green-600 hover:bg-green-600 hover:text-white transition text-xs rounded-full">@lang('Save')</button>
                        </form>
                    </div>
                </div>
            </td>
        </tr>
</template>
