<?php

namespace App\Http\Livewire\Profile;

use App\Models\Address;
use App\Models\Country;
use App\Models\Profile;
use App\Models\Tax;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Edit extends Component
{
    public $addressForm;
    public $countryOptions;
    protected $listeners = [
        'refresh' => '$refresh',
        'openModal' => 'openModal',
        'selectedAddress' => 'childSelectedAddress',
    ];
    public $profileForm;
    public $profileTaxes;
    public $profileTaxForm;
    public $showCreateProfileTaxModal;
    public $showEditModal;
    public $taxOptions;

    protected $rules = [
        'contactForm.name' => 'required',
        'contactForm.email' => 'sometimes|email',
        'contactForm.phone_country_id' => 'sometimes',
        'contactForm.phone_num' => 'nullable|phone:SG',

        'profileForm.name' => 'required',
        'profileForm.alias' => 'sometimes',
        'profileForm.uen' => 'sometimes',
        'profileForm.base_currency_id' => 'sometimes',

        'addressForm.unit_num' => 'sometimes',
        'addressForm.block_num' => 'sometimes',
        'addressForm.building' => 'sometimes',
        'addressForm.street_name' => 'required',
        'addressForm.postcode' => 'required|digits:6',
        'addressForm.city' => 'sometimes',
        'addressForm.country_id' => 'required',
        'addressForm.full_address' => 'sometimes',
        'addressForm.latitude' => 'sometimes',
        'addressForm.longitude' => 'sometimes',

        'profileTaxForm.profile_id' => 'sometimes',
        'profileTaxForm.tax_id' => 'sometimes',
        'profileTaxForm.is_default_inclusive' => 'sometimes',
    ];

    public function mount()
    {
        $this->countryOptions = Country::orderBy('sequence')->get();
        $this->taxOptions = isset($this->profileForm->profileTaxes) ? Tax::whereNotIn('id', $this->profileForm->profileTaxes->pluck('id'))->orderBy('name')->get() : Tax::orderBy('name')->get();
        $this->contactForm = isset($this->profileForm->contact) ? $this->profileForm->contact : null;
        $this->addressForm = isset($this->profileForm->address) ? $this->profileForm->address : null;
        $this->showCreateProfileTaxModal = false;
        $this->profileTaxes = isset($this->profileForm) && isset($this->profileForm->profileTaxes) ? $this->profileForm->profileTaxes : collect();
    }

    public function render()
    {
        return view('livewire.profile.edit');
    }

    public function save()
    {
        $this->validate();

        $this->profileForm->save();

        if(isset($this->profileForm->contact->id)) {
            $this->profileForm->contact()->save($this->contactForm);
        }else {
            $this->profileForm->contact()->create($this->contactForm);
        }

        if(isset($this->profileForm->address->id)) {
            $this->profileForm->address()->save($this->addressForm);
        }else {
            $this->profileForm->address()->create($this->addressForm);
        }

        $this->showEditModal = false;

        $this->emitUp('childSaved');
    }

    public function openModal()
    {
        $this->dispatchBrowserEvent('pharaonic.select2.init');
    }

    public function closeModal()
    {
        $this->showEditModal = false;
        $this->emitUp('childModalClosed');
    }

    public function childSelectedAddress($value)
    {
        $this->addressForm['block_num'] = $value['BLK_NO'];
        $this->addressForm['street_name'] = $value['ROAD_NAME'];
        $this->addressForm['building'] = $value['BUILDING'];
        $this->addressForm['full_address'] = $value['ADDRESS'];
        $this->addressForm['postcode'] = $value['POSTAL'];
        $this->addressForm['latitude'] = $value['LATITUDE'];
        $this->addressForm['longitude'] = $value['LONGITUDE'];
    }

    public function createTaxProfile($profileId)
    {
        if($profileId) {
            $profile = Profile::findOrFail($profileId);
        }
        // $profile->profileTaxes()->create([

        // ]);
    }
}
