<?php

namespace App\Http\Controllers\Web\Backend\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\BalanceTransaction;
use Stripe\Stripe;

class WalletController extends Controller
{
    public function __construct()
    {
        \Stripe\Stripe::setApiKey(config('stripe.STRIPE_SECRET_KEY'));
    }
    public function index(Request $request)
    {
        $doctor = auth()->user();
        if (!$doctor->is_connected){
            return redirect()->back()->with('warning','Please setup your payment');
        }
        $balance = \Stripe\Balance::retrieve([
            'stripe_account' => $doctor->stripe_acc_id
        ]);
        $itemsPerPage = 20;
        $currentPage = $request->input('page', 1);
        $startingAfter = $request->input('starting_after');
        $endingBefore = $request->input('ending_before');
        $balanceTransactions = BalanceTransaction::all([
            'limit' => $itemsPerPage,
            'starting_after' => $startingAfter,
            'ending_before' => $endingBefore,
        ],['stripe_account' => $doctor->stripe_acc_id]);
        $nextPageStartingAfter = $balanceTransactions->data ? $balanceTransactions->data[count($balanceTransactions->data) - 1]->id : null;
        $previousPageEndingBefore = $balanceTransactions->data ? $balanceTransactions->data[0]->id : null;
        $availableBalance = $balance->available[0] && $balance->available[0]->amount > 0 !== null ? $balance->available[0]->amount / 100 : 0;
        $pendingBalance = $balance->pending[0] && $balance->pending[0]->amount > 0 ? $balance->pending[0]->amount / 100 : 0;
        return view('backend.doctor.layouts.wallet.index',compact('doctor','availableBalance','balanceTransactions','nextPageStartingAfter','previousPageEndingBefore','currentPage','pendingBalance'));
    }


}
