<?php

namespace App\Http\Controllers\Web\Auth;

use App\Models\User;
use App\Helpers\Helper;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    // public function create(): View
    // {
    //     return view('client.create_account');
    // }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            // Validate the request data
            $request->validate([
                'fname' => ['required', 'string', 'max:255'],
                'lname' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:20', 'phone:US'],
                'city' => ['required', 'string', 'max:255'],
                'preferred_type' => ['required', 'string', 'max:255'],
                'gender' => ['required', 'string', 'in:Male,Female'],
                'dob' => ['required', 'date', 'before:today'],
                'postalcode' => ['required', 'integer'],
                'street' => ['required', 'string', 'max:255'],
                'area_focus' => ['required', 'string', 'max:255'],
                'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif'],
                'email' => ['required', 'string', 'email:rfc,dns', 'max:120', 'unique:users,email'],
                'password' => ['required', Password::min(8)],
            ], [
                'phone.phone' => 'Invalid phone number.',
            ]);

            // Handle image upload
            if ($request->hasFile('avatar')) {
                $randomString = Str::random(10);
                $imagePath = Helper::fileUpload($request->file('avatar'), 'client', $randomString);
            }

            // Create the user
            $user = User::create([
                'name' => $request->fname,
                'lname' => $request->lname,
                'phone' => $request->phone,
                'city' => $request->city,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'postalcode' => $request->postalcode,
                'street' => $request->street,
                'area_focus' => $request->area_focus,
                'preferred_type' => $request->preferred_type,
                'avatar' => $imagePath ?? null,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Trigger the Registered event
            event(new Registered($user));

            Auth::login($user);

            return redirect()->route('client.dashboard')->with('success', 'Client Successfully registered!');
        } catch (Exception $e) {
            Log::error('User registration failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred during registration. Please try again later.');
        }
    }

}
