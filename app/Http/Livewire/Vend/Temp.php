<?php

namespace App\Http\Livewire\Vend;

use App\Models\Vend;
use Carbon\Carbon;
use Livewire\Component;
// use LivewireUI\Modal\ModalComponent;
use URL;

class Temp extends Component
{
    public $vend;
    public $dayCountOptions;
    public $selectedDayCountOption;
    public $startDate;
    public $endDate;
    public $previousPageUrl;

    protected $listeners = [
        'refresh' => '$refresh',
    ];

    public function mount($id)
    {
        $this->vend = Vend::findOrFail($id);
        $this->dayCountOptions = [1, 3, 7, 14];
        $this->selectedDayCountOption = 1;

        $vendTempDateArrs = $this->getVendTempDateArrs($this->selectedDayCountOption);
        $this->startDate = $vendTempDateArrs['startDate'];
        $this->endDate = $vendTempDateArrs['endDate'];
        $this->vendTempsArr = $vendTempDateArrs['vendTempsArr'];
        $this->vendDateArr = $vendTempDateArrs['vendDateArr'];

        $this->previousPageUrl = URL::previous();
    }

    public function render()
    {
        return view('livewire.vend.temp');
    }

    public function onDayCountOptionClicked($value)
    {
        $this->selectedDayCountOption = $value;

        $vendTempDateArrs = $this->getVendTempDateArrs($this->selectedDayCountOption);
        $this->startDate = $vendTempDateArrs['startDate'];
        $this->endDate = $vendTempDateArrs['endDate'];
        $this->vendTempsArr = $vendTempDateArrs['vendTempsArr'];
        $this->vendDateArr = $vendTempDateArrs['vendDateArr'];

        $this->emit('updateChart');
    }

    public function returnPrevPage()
    {
        return redirect($this->previousPageUrl);
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }

    private function getVendTempDateArrs($dayDuration)
    {
        $startDate = Carbon::today()->subDays($dayDuration)->format('Y-m-d');
        $endDate = Carbon::today()->format('Y-m-d');

        $vendTemps = $this
                    ->vend
                    ->vendTemps()
                    ->whereDate('created_at', '>=', Carbon::now()->subDays($dayDuration))
                    ->get();
                    // dd($this->vend->toArray(),$vendTemps);
        $vendTempsArr = $vendTemps->map(function($value) {
                                return $value->temp/ 10;
                            });
        $vendDateArr = $vendTemps->map(function($value) {
                                return Carbon::parse($value->created_at)->format('(d) H:i');
                            });
        return [
            'startDate' => $startDate,
            'endDate' => $endDate,
            'vendTempsArr' => $vendTempsArr,
            'vendDateArr' => $vendDateArr
        ];
    }
}
