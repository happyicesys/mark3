<?php

namespace App\Console\Commands;

use App\Models\Vend;
use App\Models\VendTemp;
use Illuminate\Console\Command;

class DeleteVendTemp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:vend-temp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete vending machine temperature';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        VendTemp::whereDate('created_at', '<=', Carbon::today()->subDays(30))->delete();

        $vendTemps = \App\Models\Vend::query()->with(['vendTemps' => function($query) {$query->where('created_at', '<', \Carbon\Carbon::today()->subDays(14));}])->whereHas('vendTemps', function($query) {$query->where('created_at', '<', \Carbon\Carbon::today()->subDays(14));})->toSql();

        $vendArr = [];
        foreach($vendTemps as $vendTemp) {

        }
    }
}
