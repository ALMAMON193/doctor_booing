<?php

namespace App\Http\Controllers\Web\Backend\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use function Laravel\Prompts\alert;

class NotificationController extends Controller
{
    public function index()
    {
        try {
            $notifications = auth('web')->user()->unreadNotifications()->latest()->paginate(10);
            return response()->json([
                'status' => 'success',
                'message' => 'Your action was successful!',
                'data' => $notifications
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function readSingle($id): \Illuminate\Http\RedirectResponse
    {
        try {
            $notification = auth('web')->user()->notifications()->find($id);
            if ($notification) {
                $notification->markAsRead();
            }
            return back();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return back();
        }
    }

    public function deleteSingle($id)
    {
        try {
            $notification = auth('web')->user()->notifications()->find($id);
            if (!$notification) {
                return redirect()->back()->with('error', 'notifications not found.');
            }
            $notification->delete();
            return redirect()->back()->with('success', 'notifications delete successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'something went wrong.');
        }
    }

    public function readAll()
    {
        alert('All notifications have been marked as read.');
        try {
            auth('web')->user()->notifications->markAsRead();
            return response()->json([
                'code' => 200,
                'status' => 'success',
                'message' => 'All notifications have been marked as read.',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'code' => 500,
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
