<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
    }

    public function updatePersonnal(Request $request)
    {
        $request->validate([
            'login' => 'required|string|max:255|unique:users,login,' . auth()->id(),
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'phone_number' => 'required|string|max:255|unique:users,phone_number,' . auth()->id(),
        ]);

        // unset the mail verification if the email has changed

        auth()->user()->email_verified_at = null;

        auth()->user()->update($request->only('name', 'email', 'login', 'phone_number'));

        return redirect()->route('profile.edit')->with('info-success', 'Profile updated successfully');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'password' => ['required', 'string', Password::min(8)->mixedCase()->numbers()->symbols()],
        ]);

        if (!password_verify($request->current_password, auth()->user()->password)) {
            return back()->with('error', 'Mot de passe incorrect');
        }

        auth()->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('profile.edit')->with('password-success', 'Mot de passe mis à jour');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('home'));
    }
}
