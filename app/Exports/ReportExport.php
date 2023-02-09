<?php

namespace App\Exports;

use App\Models\CashLoanProduct;
use App\Models\HomeLoanProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReportExport implements FromView
{
    /**
     * @return View
     * @description Return the view with a list of reports of the logged-in adviser for download
     */
    public function view(): View
    {
        $adviser_id = Auth::id();
        $loans =  HomeLoanProduct::where('adviser_id', $adviser_id)->orderBy('created_at', 'desc')->get()->toArray();
        $loans = array_merge($loans, CashLoanProduct::where('adviser_id', $adviser_id)->orderBy('created_at', 'desc')->get()->toArray());

        return view('report.export', [
            'loans' => $loans
        ]);
    }
}
