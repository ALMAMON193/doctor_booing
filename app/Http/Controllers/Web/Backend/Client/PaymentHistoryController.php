<?php

namespace App\Http\Controllers\Web\Backend\Client;

use App\Http\Controllers\Controller;
use App\Models\AppointmentBooking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PaymentHistoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $authUser = Auth::user();
            $data = Payment::select('id', 'transaction_id', 'appointment_id', 'amount', 'status')->get();
            return DataTables::of($data)
                ->addIndexColumn()  // Add an index column
                ->editColumn('status', function($data) {
                    // Assign different classes based on the status value
                    $status = $data->status;
                    $buttonClass = '';

                    if ($status === 'pending') {
                        $buttonClass = 'btn-warning'; // Yellow for pending
                    } elseif ($status === 'success') {
                        $buttonClass = 'btn-success'; // Green for success
                    } elseif ($status === 'failed') {
                        $buttonClass = 'btn-danger'; // Red for failed
                    } else {
                        $buttonClass = 'btn-secondary'; // Gray for other statuses
                    }

                    // Return the button with the appropriate class
                    return '<button class="btn ' . $buttonClass . ' btn-sm">' . ucfirst($status) . '</button>';
                })
                ->rawColumns(['status'])  // Mark 'status' as raw to render HTML
                ->make(true);
        }

        return view('backend.client.layouts.payment_history.index');
    }

}
