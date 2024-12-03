<?php

namespace App\Http\Controllers\Web\Backend\Client;

use Exception;
use App\Models\User;
use App\Helpers\Helper;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{

    public function UpdateProfile(Request $request)
    {
        // Validate the request data for updating the profile
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'phone' => 'required',
            'language' => 'nullable|string',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'email' => 'required|string|email|max:255',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();
        $user->update($request->all());
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Profile updated successfully');
    }
    public function uploadAvatar(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif', // Max size 2MB
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Check if an avatar file was uploaded
        if ($request->hasFile('avatar')) {
            // Generate a random string for the filename
            $randomString = (string) Str::uuid();

            // Upload the new image and get the path
            $newImagePath = Helper::fileUpload($request->file('avatar'), 'client/avatar', $randomString);

            // Delete the old avatar if it exists
            if ($user->avatar) {
                $oldImagePath = public_path($user->avatar);
                if (file_exists($oldImagePath)) {
                    Helper::fileDelete($oldImagePath);
                }
            }

            // Update the user's avatar path
            $user->avatar = $newImagePath;
            $user->save();

            return response()->json(['success' => true, 'message' => 'Avatar uploaded successfully']);
        }

        return response()->json(['success' => false, 'message' => 'No file uploaded'], 400);
    }
    public function UpdatePassword(Request $request): ?\Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $user = Auth::user();

            // Check if the old password is correct
            if (Hash::check($request->old_password, $user->password)) {
                // Update the password
                $user->password = Hash::make($request->password);
                $user->save();

                // Log the user out after password update
                Auth::logout();

                return redirect()->route('login')->with('success', 'Password updated successfully. Please log in again.');
            } else {
                return redirect()->back()->with('error', 'Current password is incorrect');
            }
        } catch (Exception $e) {
            Log::error('Password update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
