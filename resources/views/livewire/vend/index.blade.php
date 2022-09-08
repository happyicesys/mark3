<div>
    <div class="m-2 sm:mx-5 sm:my-3 px-2 sm:px-4 lg:px-6">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto pt-3">
                <h1 class="text-2xl font-semibold text-gray-900">Vending Machines</h1>
            </div>
        </div>
        <div class="-mx-4 sm:-mx-6 lg:-mx-8 bg-white rounded-md border my-5 px-3 md:px-6 py-6 ">
            <div class="flex flex-col md:flex-row md:space-x-3 space-y-1 md:space-y-0">
                <x-input.form-input type="text" model="filters.code">
                    Code
                </x-input.form-input>
            </div>

            <div class="text-right">
                <p class="text-sm text-gray-700 leading-5">
                    <span>{!! __('Showing') !!}</span>
                    <span class="font-medium">{{ $vends->firstItem() }}</span>
                    <span>{!! __('to') !!}</span>
                    <span class="font-medium">{{ $vends->lastItem() }}</span>
                    <span>{!! __('of') !!}</span>
                    <span class="font-medium">{{ $vends->total() }}</span>
                    <span>{!! __('results') !!}</span>
                </p>
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
                        Code
                    </x-table.th-sort>
                    <x-table.th>
                        Serial
                    </x-table.th>
                    <x-table.th>
                        Name
                    </x-table.th>
                    <x-table.th-sort
                        model="temp"
                        sortKey="{{$sortKey}}"
                        sortAscending="{{$sortAscending}}"
                    >
                        Temp(C)
                    </x-table.th-sort>
                    <x-table.th-sort
                        model="temp_updated_at"
                        sortKey="{{$sortKey}}"
                        sortAscending="{{$sortAscending}}"
                    >
                        Last Temp
                    </x-table.th-sort>
                    <x-table.th-sort
                        model="coin_amount"
                        sortKey="{{$sortKey}}"
                        sortAscending="{{$sortAscending}}"
                    >
                        Coin ($)
                    </x-table.th-sort>
                    <x-table.th>
                        Version
                    </x-table.th>
                    <x-table.th>
                        Door Open?
                    </x-table.th>
                    <x-table.th>
                        Sensor Ok?
                    </x-table.th>
                    <x-table.th>
                    </x-table.th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach($vends as $vendIndex => $vend)
                    <tr class="divide-x divide-gray-200" wire:key="vend-{{$vend->id}}">
                        <x-table.td class="text-center">
                            {{ $vends->firstItem() + $vendIndex }}
                        </x-table.td>
                        <x-table.td-bold class="text-center">
                            {{ $vend->code }}
                        </x-table.td-bold>
                        <x-table.td class="text-center">
                            {{ $vend->serial_num }}
                        </x-table.td>
                        <x-table.td class="text-center">
                            {{ $vend->name }}
                        </x-table.td>
                        <x-table.td class="flex justify-center">
                            <x-button
                                wire:click="onVendTempClicked({{$vend->id}})"
                                type="button"
                                class="{{$vend->temp > -15 ? 'bg-red-400 active:bg-red-500 hover:bg-red-600' : 'bg-green-400 active:bg-green-500 hover:bg-green-600'}} text-black w-4/5 text-right justify-center"
                            >
                                {{ $vend->is_temp_error ? 'Error' : $vend->temp}}
                            </x-button>
                        </x-table.td>
                        <x-table.td class="text-center">
                            {{ $vend->temp_updated_at_readable }}
                        </x-table.td>
                        <x-table.td class="text-right">
                            {{ $vend->coin_amount }}
                        </x-table.td>
                        <x-table.td class="text-center">
                            {{ $vend->firmware_ver }}
                        </x-table.td>
                        <x-table.td class="text-center">
                            {{ $vend->is_door_open }}
                        </x-table.td>
                        <x-table.td class="text-center">
                            {{ $vend->is_sensor_normal }}
                        </x-table.td>
                        <x-table.td class="text-center">
                            Edit
                        </x-table.td>
                    </tr>
                    @endforeach

                    @if($vends->isEmpty())
                        <tr>
                            <x-table.td class="text-center" colspan="24">
                                No Results Found
                            </x-table.td>
                        </tr>
                    @endif
                </tbody>
                </table>
                <div>
                    @if(!$vends->isEmpty())
                    <span class="m-3">
                        {{ $vends->links() }}
                    </span>
                    @endif
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
