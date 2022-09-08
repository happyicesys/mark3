<?php

namespace App\Http\Livewire\Profile;

use App\Models\Profile;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $filters = [
        'name' => '',
        'uen' => '',
    ];
    public $itemPerPage = 50;
    protected $listeners = [
        'refresh' => '$refresh',
        'childSaved' => 'childSaved',
        'childModalClosed' => 'childModalClosed',
    ];
    public $showEditModal = false;
    public $profileForm;
    public $sortKey = '';
    public $sortAscending = true;

    public function mount()
    {
        $this->showEditModal = false;
    }

    public function render()
    {
        $profiles = Profile::with('address');

        $profiles = $profiles
                    ->when($this->filters['name'], fn($query, $input) => $query->where('name', 'LIKE', '%'.$input.'%'))
                    ->when($this->filters['uen'], fn($query, $input) => $query->where('uen', 'LIKE', '%'.$input.'%'));

        if($sortKey = $this->sortKey) {
            $profiles = $profiles->orderBy($sortKey, $this->sortAscending ? 'asc' : 'desc');
        }else {
            $profiles = $profiles->orderBy('created_at', 'asc');
        }

        $profiles = $profiles->paginate($this->itemPerPage);

        return view('livewire.profile.index', [
            'profiles' => $profiles,
        ]);
    }

    public function sortBy($key)
    {
        if($this->sortKey === $key) {
            $this->sortAscending = !$this->sortAscending;
        }else {
            $this->sortAscending = true;
        }

        $this->sortKey = $key;
    }

    public function edit(Profile $profile)
    {
        $this->profileForm = $profile->load('address');
        $this->showEditModal = true;
        $this->emitTo('profile.edit', 'openModal');
    }

    public function childSaved()
    {
        $this->emit('refresh');
        $this->showEditModal = false;
    }

    public function childModalClosed()
    {
        $this->showEditModal = false;
    }
}
