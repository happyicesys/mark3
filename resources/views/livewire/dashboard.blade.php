<div>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex bg-white overflow-hidden shadow-sm sm:rounded-lg space-x-5 p-5">
                @php
                    $users = \App\Models\User::all();
                @endphp
                <div>
                    <label for="User" class="block text-sm font-medium text-gray-700">
                        User
                    </label>
                    <div>
                        <x-input.select2 id="user1" wire:model="form.user1" style="width: 100%" class="block w-full pr-10 focus:outline-none sm:text-sm rounded-md">
                            <option value=""></option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}" wire:key="user-{{$user->id}}">
                                    {{$user->name}}
                                </option>
                            @endforeach
                        </x-input.select2>
                    </div>
                    {{$form['user1']}}
                </div>
                {{-- <div>
                    <x-input.select model="form.user1" multiple>
                        <x-slot name="label">
                            User1
                        </x-slot>
                        @foreach($users as $user)
                            <option value="{{$user->id}}" wire:key="user-{{$user->id}}">
                                {{$user->name}}
                            </option>
                        @endforeach
                    </x-input.select>
                    @json($form['user1'])
                </div>

                <div>
                    <x-input.select model="form.user2" >
                        <x-slot name="label">
                            User2
                        </x-slot>
                        @foreach($users as $user)
                            <option value="{{$user->id}}" wire:key="user-{{$user->id}}">
                                {{$user->name}}
                            </option>
                        @endforeach
                    </x-input.select>
                    @json($form['user2'])
                </div> --}}
                <div>
                    <x-input.date wire:model.lazy="form.date1">
                        Date1
                    </x-input.date>
                    @json($form['date1'])
                </div>
                <div>
                    <x-input.date wire:model.lazy="form.date2">
                        Date2
                    </x-input.date>
                    @json($form['date2'])
                </div>
            </div>
        </div>
    </div>
</div>
