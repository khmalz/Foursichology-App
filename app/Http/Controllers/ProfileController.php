<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'student' => $request->user()->student,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class . ',email,' . $request->user()->id],
            'password' => ['nullable', Password::defaults()],
            'nis' => ['required', 'numeric', 'max_digits:5'],
            'jurusan' => ['required', 'string'],
            'kelas' => ['required', 'string'],
            'gender' => ['required', 'string'],
        ]);

        $request->user()->student()->update([
            'nis' => $request->nis,
            'jurusan' => $request->jurusan,
            'kelas' => $request->kelas,
            'gender' => $request->gender,
        ]);

        $updateUserData = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->password) {
            $updateUserData['password'] = bcrypt($request->password);
        }

        $request->user()->update($updateUserData);

        return to_route('dashboard')->with('success', 'profile-updated');
    }
}
