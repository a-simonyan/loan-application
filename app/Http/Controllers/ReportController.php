<?php

namespace App\Http\Controllers;

use App\Exports\ReportExport;
use App\Models\CashLoanProduct;
use App\Models\HomeLoanProduct;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @description Show the view with a list of reports of the logged-in advisor
     */
    public function index() {
        $adviser_id = Auth::id();
        $loans =  HomeLoanProduct::where('adviser_id', $adviser_id)->orderBy('created_at', 'desc')->get()->toArray();
        $loans = array_merge($loans, CashLoanProduct::where('adviser_id', $adviser_id)->orderBy('created_at', 'desc')->get()->toArray());

        return view('report.index', compact('loans'));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     * @description Download reports list as XLSX file
     */
    public function download() {
        return Excel::download(new ReportExport, 'report.xlsx');
    }
}
