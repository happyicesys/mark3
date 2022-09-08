<div>
  <form wire:submit.prevent="save()">
    <x-modal.dialog wire:model="showEditModal" maxWidth="4xl" id="profile-edit">
        <x-slot name="title">
            <div class="">
                <div>
                  <h3 class="text-lg leading-6 font-medium text-gray-600">
                    Editing Profile
                    <span class="font-xl text-gray-900">
                        {{isset($profileForm) ? $profileForm->name : ''}}
                    </span>
                </h3>
            </div>
        </x-slot>
        <x-slot name="content">
              <div class="md:m-4 my-4 py-4 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <div class="sm:col-span-4">
                  <x-input.form-input type="text" model="profileForm.name" required="true">
                    Name
                  </x-input.form-input>
                </div>
                <div class="sm:col-span-2">
                  <x-input.form-input type="text" model="profileForm.alias">
                    Alias
                  </x-input.form-input>
                </div>
                <div class="sm:col-span-3">
                  <x-input.form-input type="text" model="profileForm.uen">
                    UEN
                  </x-input.form-input>
                </div>

                <div class="sm:col-span-3">
                  <div class="mt-1">
                      <x-input.select model="profileForm.base_currency_id" required="true">
                          <x-slot name="label">
                              Base Currency
                          </x-slot>
                          <option value=""></option>
                          @foreach($countryOptions as $countryOption)
                              <option value="{{$countryOption->id}}" wire:key="country-{{$countryOption->id}}">
                                  {{$countryOption->currency_name}}
                              </option>
                          @endforeach
                      </x-input.select>
                  </div>
                </div>

                <div class="sm:col-span-6">
                  <div class="relative">
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                      <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center">
                      <span class="px-3 bg-white text-lg font-medium text-gray-900"> Contact </span>
                    </div>
                  </div>
                </div>
                <div class="sm:col-span-3">
                  <x-input.form-input type="text" model="contactForm.name" required="true">
                    Name
                  </x-input.form-input>
                </div>
                <div class="sm:col-span-3">
                  <x-input.form-input type="text" model="contactForm.email">
                    Email
                  </x-input.form-input>
                </div>
                <div class="sm:col-span-2">
                  <x-input.select model="contactForm.phone_country_id" required="true">
                    <x-slot name="label">
                        Phone Code
                    </x-slot>
                    <option value=""></option>
                    @foreach($countryOptions as $countryOption)
                        <option value="{{$countryOption->id}}" wire:key="phonecode-{{$countryOption->id}}">
                            +{{$countryOption->phone_code}}
                        </option>
                    @endforeach
                </x-input.select>
                </div>
                <div class="sm:col-span-4">
                  <x-input.form-input type="text" model="contactForm.phone_num" required="true">
                    Phone Number
                  </x-input.form-input>
                </div>

                <div class="sm:col-span-6">
                  <div class="relative">
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                      <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center">
                      <span class="px-3 bg-white text-lg font-medium text-gray-900"> Address </span>
                    </div>
                  </div>
                </div>

                <div class="sm:col-span-6">
                  @livewire('partials.search-address-dropdown', key(str()->random()))
                </div>
                <div class="sm:col-span-3">
                  <x-input.form-input type="text" model="addressForm.unit_num" required="true">
                    Unit Num
                  </x-input.form-input>
                </div>
                <div class="sm:col-span-3">
                  <x-input.form-input type="text" model="addressForm.block_num">
                    Block Num
                  </x-input.form-input>
                </div>
                <div class="sm:col-span-4">
                  <x-input.form-input type="text" model="addressForm.building">
                    Building Name
                  </x-input.form-input>
                </div>
                <div class="sm:col-span-4">
                  <x-input.form-input type="text" model="addressForm.street_name" required="true">
                    Street Name
                  </x-input.form-input>
                </div>
                <div class="sm:col-span-2">
                  <x-input.form-input type="text" model="addressForm.postcode" required="true">
                    Postcode
                  </x-input.form-input>
                </div>
                <div class="sm:col-span-3">
                  <x-input.form-input type="text" model="addressForm.city" placeholder="Leave blank default (Singapore)">
                    City
                  </x-input.form-input>
                </div>
                <div class="sm:col-span-3">
                  <div class="mt-1">
                    <x-input.select model="addressForm.country_id" required="true">
                        <x-slot name="label">
                            Country
                        </x-slot>
                        <option value=""></option>
                        @foreach($countryOptions as $countryOption)
                            <option value="{{$countryOption->id}}" wire:key="country-{{$countryOption->id}}">
                                {{$countryOption->name}}
                            </option>
                        @endforeach
                    </x-input.select>
                  </div>
                </div>
                <div class="sm:col-span-6 hidden">
                  <x-input.textarea model="addressForm.full_address">
                    Full Address
                  </x-input.textarea>
                </div>
                <div class="sm:col-span-3 hidden">
                  <x-input.form-input type="text" model="addressForm.latitude">
                    Latitude
                  </x-input.form-input>
                </div>
                <div class="sm:col-span-3 hidden">
                  <x-input.form-input type="text" model="addressForm.longitude">
                    Longitude
                  </x-input.form-input>
                </div>
                <div class="sm:col-span-6">
                  <div class="relative">
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                      <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center">
                      <span class="px-3 bg-white text-lg font-medium text-gray-900"> Tax </span>
                    </div>
                  </div>
                </div>

                <div class="sm:col-span-5">
                  <x-input.select model="profileTaxForm.tax_id" required="true">
                    <x-slot name="label">
                        Tax
                    </x-slot>
                    <option value=""></option>
                    @foreach($taxOptions as $taxOption)
                        <option value="{{$taxOption->id}}" wire:key="tax-{{$taxOption->id}}">
                            {{$taxOption->name}}
                        </option>
                    @endforeach
                  </x-input.select>
                </div>
                <div class="sm:col-span-1 flex items-center justify-center">
                  <x-button.create type="button" class="mt-3" wire:model.prevent="createTaxProfile({{ isset($profileForm) ? $profileForm->id : null }})">
                    Add
                  </x-button.create>
                </div>

                <div class="sm:col-span-6 flex flex-col">
                  {{-- <div class="-my-2 -mx-4 sm:-mx-6 lg:-mx-8"> --}}
                     <div class="shadow-sm ring-1 ring-black ring-opacity-5 overflow-scroll">
                         <table class="min-w-full border-separate" style="border-spacing: 0">
                         <thead class="bg-gray-200">
                             <tr class="divide-x divide-gray-200">
                             <x-table.th>
                                 #
                             </x-table.th>
                             <x-table.th>
                                 Name
                             </x-table.th-sort>
                             <x-table.th>
                                 Rate (%)
                             </x-table.th>
                             <x-table.th>
                                 Default Inclusive?
                             </x-table.th>
                             <x-table.th>
                             </x-table.th>
                             </tr>
                         </thead>
                         <tbody class="bg-white">
                             @foreach($profileTaxes as $profileTaxIndex => $profileTax)
                             <tr class="divide-x divide-gray-200" wire:key="tax-{{$profileTax->id}}">
                                 <x-table.td class="text-center">
                                     {{ $profileTaxIndex + 1 }}
                                 </x-table.td>
                                 <x-table.td-bold class="text-center">
                                     {{ $profileTax->tax->name }}
                                 </x-table.td-bold>
                                 <x-table.td class="text-center">
                                     {{ $profileTax->tax->rate }}
                                 </x-table.td>
                                 <x-table.td class="text-center">
                                     {{ $profileTax->is_inclusive ? 'Yes' : 'No' }}
                                 </x-table.td>
                                 <x-table.td class="text-center">
                                     {{-- <x-button
                                         class="px-2 py-1 bg-gray-500 hover:bg-gray-700 active:bg-gray-900 text-white"
                                         wire:click="edit({{ isset($profileForm) ? $profileForm->id : null }})"
                                     >
                                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                             <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                         </svg>
                                         <span class="pl-1">
                                             Edit
                                         </span>
                                     </x-button> --}}
                                 </x-table.td>
                             </tr>
                             @endforeach

                             @if($profileTaxes->isEmpty())
                                 <tr>
                                     <x-table.td class="text-center" colspan="24">
                                         No Results Found
                                     </x-table.td>
                                 </tr>
                             @endif
                         </tbody>
                         </table>
                     </div>
                  {{-- </div> --}}
                 </div>

              </div>
          </div>
        </x-slot>
        <x-slot name="footer">
          <div class="flex space-x-1">
            <button wire:click.prevent="closeModal" type="button" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-400 hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300">Back</button>
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
          </div>
        </x-slot>
    </x-modal.dialog>
  </form>
</div>
