<?php

namespace App\Http\Livewire\Vend;

use App\Models\Vend;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $filters = [
        'code' => ''
    ];
    public $itemPerPage = 50;
    public $sortKey = '';
    public $sortAscending = true;

    public function render()
    {
        $vends = Vend::with('vendChannels');

        $vends = $vends
                    ->when($this->filters['code'], fn($query, $input) => $query->where('code', 'LIKE', '%'.$input.'%'));

        // dump($vends->leftJoin('vend_channels', 'vend_channels.vend_id', '=', 'vends.id')->select('vends.code as vend_code', 'vends.id', 'vends.created_at', 'vend_channels.created_at')->limit(5)->first()->vendChannels->toArray());

        if($sortKey = $this->sortKey) {
            $vends = $vends->orderBy($sortKey, $this->sortAscending ? 'asc' : 'desc');
        }else {
            $vends = $vends->orderBy('vends.code', 'asc');
        }

        $vends = $vends->paginate($this->itemPerPage);

        return view('livewire.vend.index', ['vends' => $vends]);
    }

    // methods
    public function onVendTempClicked($vendId)
    {
        return redirect()->to('/vend/'.$vendId.'/temp');
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
}
