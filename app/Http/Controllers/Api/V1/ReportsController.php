<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Project;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /**
     * Index page
     *
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $q = Transaction::with('project')
            ->with('transaction_type')
            ->with('income_source')
            ->with('currency')
            ->orderBy('transaction_date', 'desc');

        if ($request->has('project') && !empty($request->project)) {
            $q->where('project_id', $request->project);
        }

        $transactions = $q->get();

        $entries = [];
        foreach ($transactions as $row) {
            if ($row->transaction_date != null) {
                $date = Carbon::createFromFormat('Y-m-d', $row->transaction_date)->format("Y-m");
                if (!isset($entries[$date])) {
                    $entries[$date] = [];
                }
                $currency = $row->currency->code;
                if (!isset($entries[$date][$currency])) {
                    $entries[$date][$currency] = [
                        'income'   => 0,
                        'expenses' => 0,
                        'fees'     => 0,
                        'total'    => 0
                    ];
                }
                $income   = 0;
                $expenses = 0;
                $fees     = 0;
                if ($row->amount > 0) {
                    $income += $row->amount;
                } else {
                    $expenses += $row->amount;
                }
                if (!is_null($row->income_source->fee_percent)) {
                    $fees = $row->amount * ($row->income_source->fee_percent / 100);
                }

                $total = $income + $expenses - $fees;
                $entries[$date][$currency]['income'] += $income;
                $entries[$date][$currency]['expenses'] += $expenses;
                $entries[$date][$currency]['fees'] += $fees;
                $entries[$date][$currency]['total'] += $total;
            }
        }

        return $this->formatEntries($entries);
    }

    private function formatEntries($entries)
    {
        $formatted = [];

        foreach ($entries as $date => $info) {
            foreach ($info as $currency => $data) {
                $formatted[] = [
                    'date'  => $date,
                    'income' => number_format($data['income'], 2) . ' ' . $currency,
                    'expenses' => number_format($data['expenses'], 2) . ' ' . $currency,
                    'fees' => number_format($data['fees'], 2) . ' ' . $currency,
                    'total' => number_format($data['total'], 2) . ' ' . $currency
                ];
            }
        }

        return response()->json(['data' => $formatted]);
    }
}