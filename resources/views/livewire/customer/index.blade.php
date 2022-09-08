<div>
    <div class="m-2 sm:mx-5 sm:my-3 px-2 sm:px-4 lg:px-6">
        {{-- <div class="sm:flex sm:items-center"> --}}
            <div class="flex items-center justify-between pt-3">
                <h1 class="text-2xl font-semibold text-gray-900">
                    Customers
                </h1>
                <x-button.create class="px-8 py-2 md:px-8">
                    Create
                </x-button.create>
            </div>
        {{-- </div> --}}
        <div class="-mx-4 sm:-mx-6 lg:-mx-8 bg-white rounded-md border my-5 px-3 md:px-6 py-6 ">
            <div class="grid md:grid-cols-4 lg:grid-cols-6 md:gap-3 space-y-1 md:space-y-0">
                <x-input.form-input type="text" model="filters.code">
                    ID
                </x-input.form-input>
                <x-input.form-input type="text" model="filters.name">
                    ID Name
                </x-input.form-input>
                <x-input.select type="text" model="filters.category_id" multiple>
                    <x-slot name="label">
                        Category
                    </x-slot>
                    <option value=""></option>
                    @foreach($categoryOptions as $categoryOption)
                        <option value="{{ $categoryOption->id }}">
                            {{ $categoryOption->name }}
                        </option>
                    @endforeach
                </x-input.select>
                <x-input.select type="text" model="filters.category_group_id" multiple>
                    <x-slot name="label">
                        Category Group
                    </x-slot>
                    <option value=""></option>
                    @foreach($categoryGroupOptions as $categoryGroupOption)
                        <option value="{{ $categoryGroupOption->id }}">
                            {{ $categoryGroupOption->name }}
                        </option>
                    @endforeach
                </x-input.select>
                <x-input.select type="text" model="filters.status_id" multiple>
                    <x-slot name="label">
                        Status
                    </x-slot>
                    <option value=""></option>
                    @foreach($statusOptions as $statusOption)
                        <option value="{{ $statusOption->id }}">
                            {{ $statusOption->name }}
                        </option>
                    @endforeach
                </x-input.select>
                <x-input.select type="text" model="filters.profile_id">
                    <x-slot name="label">
                        Profile
                    </x-slot>
                    <option value=""></option>
                    @foreach($profileOptions as $profileOption)
                        <option value="{{ $profileOption->id }}">
                            {{ $profileOption->name }}
                        </option>
                    @endforeach
                </x-input.select>
                <x-input.select type="text" model="filters.handled_by">
                    <x-slot name="label">
                        Handle By
                    </x-slot>
                    <option value=""></option>
                    @foreach($userOptions as $userOption)
                        <option value="{{ $userOption->id }}">
                            {{ $userOption->name }}
                        </option>
                    @endforeach
                </x-input.select>
                <x-input.select type="text" model="filters.zone_id">
                    <x-slot name="label">
                        Zone
                    </x-slot>
                    <option value=""></option>
                    @foreach($zoneOptions as $zoneOption)
                        <option value="{{ $zoneOption->id }}">
                            {{ $zoneOption->name }}
                        </option>
                    @endforeach
                </x-input.select>
                <x-input.select type="text" model="filters.created_in">
                    <x-slot name="label">
                        Created In
                    </x-slot>
                    <option value=""></option>
                    @foreach($monthOptions as $monthOptionIndex => $monthOption)
                        <option value="{{ $monthOptionIndex }}">
                            {{ $monthOption }}
                        </option>
                    @endforeach
                </x-input.select>
                <x-input.select type="text" model="filters.price_template_id">
                    <x-slot name="label">
                        Price Template
                    </x-slot>
                    <option value=""></option>
                    @foreach($priceTemplateOptions as $priceTemplateOption)
                        <option value="{{ $priceTemplateOption->id }}">
                            {{ $priceTemplateOption->name }}
                        </option>
                    @endforeach
                </x-input.select>
                <x-input.select type="text" model="filters.tag_id" multiple>
                    <x-slot name="label">
                        Tags
                    </x-slot>
                    <option value=""></option>
                    @foreach($tagOptions as $tagOption)
                        <option value="{{ $tagOption->id }}">
                            {{ $tagOption->slug }}
                        </option>
                    @endforeach
                </x-input.select>
            </div>

            <div class="text-right">
                @if($customers->total())
                <p class="text-sm text-gray-700 leading-5">
                    <span>{!! __('Showing') !!}</span>
                    <span class="font-medium">{{ $customers->firstItem() }}</span>
                    <span>{!! __('to') !!}</span>
                    <span class="font-medium">{{ $customers->lastItem() }}</span>
                    <span>{!! __('of') !!}</span>
                    <span class="font-medium">{{ $customers->total() }}</span>
                    <span>{!! __('results') !!}</span>
                </p>
                @endif
            </div>
        </div>

         <div class="mt-6 flex flex-col">
         <div class="-my-2 -mx-4 sm:-mx-6 lg:-mx-8">
        {{--    <div class="inline-block min-w-full py-2 align-middle"> --}}
            <div class="shadow-sm ring-1 ring-black ring-opacity-5 overflow-scroll">
                <table class="min-w-full border-separate" style="border-spacing: 0">
                <thead class="bg-gray-100">
                    <tr class="divide-x divide-gray-200">
                    <x-table.th>
                        #
                    </x-table.th>
                    <x-table.th-sort
                        model="code"
                        sortKey="{{$sortKey}}"
                        sortAscending="{{$sortAscending}}"
                    >
                        ID
                    </x-table.th-sort>
                    <x-table.th-sort
                        model="name"
                        sortKey="{{$sortKey}}"
                        sortAscending="{{$sortAscending}}"
                    >
                        ID Name
                    </x-table.th-sort>
                    <x-table.th-sort
                        model="first_transaction_created_at"
                        sortKey="{{$sortKey}}"
                        sortAscending="{{$sortAscending}}"
                    >
                        First Inv Date
                    </x-table.th-sort>
                    <x-table.th-sort
                        model="category_name"
                        sortKey="{{$sortKey}}"
                        sortAscending="{{$sortAscending}}"
                    >
                        Cat
                    </x-table.th-sort>
                    <x-table.th-sort
                        model="category_group_name"
                        sortKey="{{$sortKey}}"
                        sortAscending="{{$sortAscending}}"
                    >
                        Group
                    </x-table.th-sort>
                    <x-table.th-sort
                        model="handled_by_name"
                        sortKey="{{$sortKey}}"
                        sortAscending="{{$sortAscending}}"
                    >
                        Handled By
                    </x-table.th-sort>
                    <x-table.th>
                        Attn Name
                    </x-table.th>
                    <x-table.th>
                        Contact
                    </x-table.th>
                    <x-table.th>
                        Del.Address
                    </x-table.th>
                    <x-table.th-sort
                        model="delivery_postcode"
                        sortKey="{{$sortKey}}"
                        sortAscending="{{$sortAscending}}"
                    >
                        Del.Postcode
                    </x-table.th-sort>
                    <x-table.th>
                        Tags
                    </x-table.th>
                     <x-table.th-sort
                        model="zone_name"
                        sortKey="{{$sortKey}}"
                        sortAscending="{{$sortAscending}}"
                    >
                        Zone
                    </x-table.th-sort>
                    <x-table.th-sort
                        model="pay_term_id"
                        sortKey="{{$sortKey}}"
                        sortAscending="{{$sortAscending}}"
                    >
                        Payterm
                    </x-table.th-sort>
                    <x-table.th-sort
                        model="updated_at"
                        sortKey="{{$sortKey}}"
                        sortAscending="{{$sortAscending}}"
                    >
                        Updated At
                    </x-table.th-sort>
                    <x-table.th-sort
                        model="updated_by_name"
                        sortKey="{{$sortKey}}"
                        sortAscending="{{$sortAscending}}"
                    >
                        Updated By
                    </x-table.th-sort>
                    <x-table.th-sort
                        model="created_at"
                        sortKey="{{$sortKey}}"
                        sortAscending="{{$sortAscending}}"
                    >
                        Created At
                    </x-table.th-sort>
                    <x-table.th-sort
                        model="created_by_name"
                        sortKey="{{$sortKey}}"
                        sortAscending="{{$sortAscending}}"
                    >
                        Created By
                    </x-table.th-sort>
                    <x-table.th-sort
                        model="status_id"
                        sortKey="{{$sortKey}}"
                        sortAscending="{{$sortAscending}}"
                    >
                        Status
                    </x-table.th-sort>
                    <x-table.th>
                    </x-table.th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach($customers as $customerIndex => $customer)
                    <tr class="divide-x divide-gray-200" wire:key="customer-{{$customer->id}}">
                        <x-table.td class="text-center">
                            {{ $customers->firstItem() + $customerIndex }}
                        </x-table.td>
                        <x-table.td-bold class="text-center">
                            {{ $customer->code }}
                        </x-table.td-bold>
                        <x-table.td class="text-center">
                            {{ $customer->firstTransaction->created_at }}
                        </x-table.td>
                        <x-table.td class="text-center">
                            {{ $customer->category->name }}
                        </x-table.td>
                        <x-table.td class="text-center">
                            {{ $customer->category->categoryGroup->name }}
                        </x-table.td>
                        <x-table.td class="text-center">
                            {{ $customer->category->name }}
                        </x-table.td>
                        <x-table.td class="text-center">
                            {{ $customer->handledBy->name }}
                        </x-table.td>
                        <x-table.td class="text-center">
                            {{ $customer->contact->name }}
                        </x-table.td>
                        <x-table.td class="text-center">
                            {{ $customer->contact->phone_number }}
                        </x-table.td>
                        <x-table.td class="text-left capitalize">
                            {{ '#'.$customer->deliveryAddress->unit_num }}, {{'Blk '.$customer->deliveryAddress->block_num }}, <br>
                            {{ ucwords(strtolower($customer->deliveryAddress->building)) }}, <br>
                            {{ ucwords(strtolower($customer->deliveryAddress->street_name)) }} <br>
                        </x-table.td>
                        <x-table.td class="text-center">
                            {{ $customer->deliveryAddress->postcode }}
                        </x-table.td>
                        <x-table.td class="text-center">
                            @if($customer->tagBindings)
                                @foreach($customer->tagBindings as $tagBinding)
                                    <x-badge>
                                        {{ $tagBinding->tag->slug }}
                                    </x-badge>
                                @endforeach
                            @endif
                        </x-table.td>
                        <x-table.td class="text-center">
                            {{ $customer->zone->name }}
                        </x-table.td>
                        <x-table.td class="text-center">
                            {{ $customer->payTerm->name }}
                        </x-table.td>
                        <x-table.td class="text-center">
                            {{ $customer->updated_at }}
                        </x-table.td>
                        <x-table.td class="text-center">
                            {{ $customer->updatedBy->name }}
                        </x-table.td>
                        <x-table.td class="text-center">
                            {{ $customer->created_at }}
                        </x-table.td>
                        <x-table.td class="text-center">
                            {{ $customer->createdBy->name }}
                        </x-table.td>
                        <x-table.td class="text-center">
                            {{ $customer->status->name }}
                        </x-table.td>
                        <x-table.td class="text-center">
                            <x-button.edit wire:click="edit({{ $customer->id }})">
                                Edit
                            </x-button.edit>
                        </x-table.td>
                    </tr>
                    @endforeach

                    @if($customers->isEmpty())
                        <tr>
                            <x-table.td class="text-center" colspan="24">
                                No Results Found
                            </x-table.td>
                        </tr>
                    @endif
                </tbody>
                </table>
                <div>
                    @if(!$customers->isEmpty())
                    <span class="m-3">
                        {{ $customers->links() }}
                    </span>
                    @endif
                </div>
            </div>
        </div>
        </div>
    </div>
{{--
    @livewire('customer.edit', [
        'customerForm' => $customerForm,
        'showEditModal' => $showEditModal
    ], key(str()->random())) --}}
</div>
