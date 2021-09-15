@extends($layouts->dashboard)
@section('content')
<form action="{{ route('dashboard.billings.store', $model->id) }}" method="post">
<div class="overflow-x-auto">
    <div class="align-middle inline-block min-w-full">
        <div class="overflow-hidden border border-gray-200 rounded">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50 cursor-default">
                    <tr>
                        <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Title') }}</th>
                        <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('طرف صورت‌حساب') }}</th>
                        <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('موقعیت نسبت به فاکتور') }}</th>
                        <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Amount') }} <small>تومان</small></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr data-xhr="transaction-list-id" class="transition hover:bg-gray-50">
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div class="flex items-center">
                                <input placeholder="@lang('Title')" type="text" name="title" id="title" autocomplete="off" class="border border-gray-500 text-xs text-gray-600 h-8 w-full rounded px-2 focus:border-brand focus">
                            </div>
                        </td>
                        <td class="p-3 whitespace-nowrap">
                            <div>
                                <select id="user_id" name="user_id" class="border border-gray-500 h-8 rounded pl-4 pr-8 w-full text-xs focus:border-brand focus">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div>
                                <select id="type" name="type" class="border border-gray-500 h-8 rounded pl-4 pr-8 w-full text-xs focus:border-brand focus">
                                    <option value="debtor">بدهکار</option>
                                    <option value="creditor">بستانکار</option>
                                </select>
                            </div>
                        </td>
                        <td class="p-3 whitespace-nowrap">
                            <div>
                                <input type="number"  name="amount" id="amount" autocomplete="off" class="border border-gray-500 h-8 rounded px-2 w-full text-xs focus:border-brand focus">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
خزانه صورت‌حساب
<select name="treasury">
    @foreach ($treasuries as $treasury)
        <option value="{{ $treasury->id }}">{{ $treasury->title }}</option>
    @endforeach
</select>

<button type="submit">
ذخیره
</button>
</form>
@endsection
