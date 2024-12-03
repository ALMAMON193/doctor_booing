<?php

namespace App\Http\Controllers\Web\Backend\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StripeSettingController extends Controller
{
    public function index()
    {
        return view('backend.admin.layouts.settings.stripe_settings');
    }
    public function update(Request $request): ?\Illuminate\Http\RedirectResponse
    {

        $request->validate([
            'stripe_secret_key' => 'nullable|string',
            'stripe_public_key' => 'nullable|string',
            'stripe_webhook_key' => 'nullable|string',
        ]);

        try {
            $envContent = File::get(base_path('.env'));
            $lineBreak = "\n";
            $envContent = preg_replace([
                '/STRIPE_SECRET_KEY=(.*)\s/',
                '/STRIPE_PUBLIC_KEY=(.*)\s/',
                '/STRIPE_WEBHOOK_KEY=(.*)\s/'
            ], [
                'STRIPE_SECRET_KEY=' . $request->stripe_secret_key. $lineBreak,
                'STRIPE_PUBLIC_KEY=' . $request->stripe_public_key. $lineBreak,
                'STRIPE_WEBHOOK_KEY=' . $request->stripe_webhook_key. $lineBreak
            ], $envContent);

            if ($envContent !== null) {
                File::put(base_path('.env'), $envContent);
            }
            return back()->with('t-success', 'Updated successfully');
        } catch (Exception $e) {
            return back()->with('t-error', 'Failed to update');
        }
    }
}
