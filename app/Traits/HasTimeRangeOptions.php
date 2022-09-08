<?php

namespace App\Traits;
use Carbon\Carbon;

trait HasTimeRangeOptions{

    // normal builder
    public function getMonthsWithYear($subYearNum, $addYearNum = 0)
    {
        $monthArr = array();
        $past = Carbon::today()->subYears($subYearNum);
        $future = Carbon::today()->addYears($addYearNum);
        $today = Carbon::today();
        $diffInMonthsWithPast = $today->diffInMonths($past);
        $diffInMonthsWithFuture = $today->diffInMonths($future);

        // $month_options[$today->month.'-'.$today->year] = Month::findOrFail($today->month)->name.' '.$today->year;
        for($i=$diffInMonthsWithFuture; $i>=1; $i--) {
            $future = $future->subMonth();
            $monthArr[$future->month.'-'.$future->year] = $future->format('F').' '.$future->year;
        }
        $monthArr[$today->month.'-'.$today->year] = $today->format('F').' '.$today->year;

        for($i=$diffInMonthsWithPast; $i>=1; $i--) {
            $today = $today->subMonth();
            $monthArr[$today->month.'-'.$today->year] = $today->format('F').' '.$today->year;
        }
        return $monthArr;
    }

}