<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('user')->get();

        return view('admin.account.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.account.student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', Rules\Password::defaults()],
            'nis' => ['required', 'numeric', 'max_digits:5'],
            'jurusan' => ['required', 'string'],
            'kelas' => ['required', 'string'],
            'gender' => ['required', 'string'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->assignRole('siswa');

        $user->student()->create([
            'nis' => $request->nis,
            'jurusan' => $request->jurusan,
            'kelas' => $request->kelas,
            'gender' => $request->gender,
        ]);

        return to_route('account.student.index')->with('success', 'Successfully created a new student');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('admin.account.student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class . ',email,' . $student->user_id],
            'password' => ['nullable', Rules\Password::defaults()],
            'nis' => ['required', 'numeric', 'max_digits:5'],
            'jurusan' => ['required', 'string'],
            'kelas' => ['required', 'string'],
            'gender' => ['required', 'string'],
        ]);

        $student->update([
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

        $student->user()->update($updateUserData);

        return to_route('account.student.index')->with('success', 'Successfully edit a student');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->user()->delete();

        return to_route('account.student.index')->with('success', 'Successfully deleted a student');
    }
}
