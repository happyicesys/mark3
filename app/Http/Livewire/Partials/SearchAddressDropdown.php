<?php

namespace App\Http\Livewire\Partials;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchAddressDropdown extends Component
{
    public $endpointUrl = 'https://developers.onemap.sg/commonapi/search';
    public $filterAddress = '';
    public $selectedAddress = '';
    public $searchResults;
    public $results = [];

    public function render()
    {
        $response = Http::get($this->endpointUrl, [
            'searchVal' => $this->filterAddress,
            'returnGeom' => 'Y',
            'getAddrDetails' => 'Y',
        ]);

        if($response->successful()) {
            $this->searchResults = $response->collect();
        }else {
            $this->searchResults = [];
        }

        // $this->searchResults = Http::get('https://developers.onemap.sg/commonapi/search', [
        //     'searchVal' => $this->filterAddress,
        //     'returnGeom' => 'Y',
        //     'getAddrDetails' => 'Y',
        // ])->collect();

        foreach($this->searchResults as $searchResult)
        {
            if(is_array($searchResult)) {
                $this->results = $searchResult;
            }else {
                $this->results = [];
            }
        }

        return view('livewire.partials.search-address-dropdown');
    }

    public function resultSelected($resultIndex)
    {
        $this->filterAddress = $this->results[$resultIndex]['POSTAL'];
        $this->selectedAddress = $this->results[$resultIndex];
        $this->emitUp('selectedAddress', $this->selectedAddress);
        $this->results = [];
    }
}
