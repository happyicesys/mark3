<div>
    <div class="m-2 sm:mx-5 sm:my-3 px-2 sm:px-4 lg:px-6">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto pt-3">
                <h1 class="text-2xl font-semibold text-gray-900">Profiles</h1>
            </div>
        </div>
        {{-- @dd($profiles->toArray()) --}}
        <div class="-mx-4 sm:-mx-6 lg:-mx-8 bg-white rounded-md border my-5 px-3 md:px-6 py-6 ">
            <div class="flex flex-col md:flex-row md:space-x-3 space-y-1 md:space-y-0">
                <x-input.form-input type="text" model="filters.name">
                    Name
                </x-input.form-input>
                <x-input.form-input type="text" model="filters.uen">
                    UEN
                </x-input.form-input>
            </div>

            <div class="text-right">
                <p class="text-sm text-gray-700 leading-5">
                    <span>{!! __('Showing') !!}</span>
                    <span class="font-medium">{{ $profiles->firstItem() }}</span>
                    <span>{!! __('to') !!}</span>
                    <span class="font-medium">{{ $profiles->lastItem() }}</span>
                    <span>{!! __('of') !!}</span>
                    <span class="font-medium">{{ $profiles->total() }}</span>
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
                        model="name"
                        sortKey="{{$sortKey}}"
                        sortAscending="{{$sortAscending}}"
                    >
                        Name
                    </x-table.th-sort>
                    <x-table.th>
                        Alias
                    </x-table.th>
                    <x-table.th>
                        UEN
                    </x-table.th>
                    <x-table.th>
                        Address
                    </x-table.th>
                    <x-table.th>
                    </x-table.th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach($profiles as $profileIndex => $profile)
                    <tr class="divide-x divide-gray-200" wire:key="profile-{{$profile->id}}">
                        <x-table.td class="text-center">
                            {{ $profiles->firstItem() + $profileIndex }}
                        </x-table.td>
                        <x-table.td-bold class="text-center">
                            {{ $profile->name }}
                        </x-table.td-bold>
                        <x-table.td class="text-center">
                            {{ $profile->alias }}
                        </x-table.td>
                        <x-table.td class="text-center">
                            {{ $profile->uen }}
                        </x-table.td>
                        <x-table.td class="text-left capitalize">
                            @if($profile->address)
                            <span>
                                {{ '#'.$profile->address->unit_num }}, {{'Block '.$profile->address->block_num }} <br>
                                {{ ucwords(strtolower($profile->address->building)) }} <br>
                                {{ ucwords(strtolower($profile->address->street_name)) }} <br>
                                {{ $profile->address->country->name }} {{ $profile->address->postcode }}
                            </span>
                            @endif
                        </x-table.td>
                        <x-table.td class="text-center">
                            <x-button.edit
                                wire:click="edit({{$profile->id}})"
                                class="py-1 px-1"
                            >
                                    Edit
                            </x-button.edit>
                        </x-table.td>
                    </tr>
                    @endforeach

                    @if($profiles->isEmpty())
                        <tr>
                            <x-table.td class="text-center" colspan="24">
                                No Results Found
                            </x-table.td>
                        </tr>
                    @endif
                </tbody>
                </table>
                <div>
                    @if(!$profiles->isEmpty())
                    <span class="m-3">
                        {{ $profiles->links() }}
                    </span>
                    @endif
                </div>
            </div>
        </div>
        </div>
    </div>

    @livewire('profile.edit', [
        'profileForm' => $profileForm,
        'showEditModal' => $showEditModal
    ], key(str()->random()))
</div>
