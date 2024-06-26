<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Exports\UserExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Date;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::paginate(10);
        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'name_lengkap' => 'required|string|max:255',
            'alamat' => 'required|string',
            'role' => 'required|in:admin,petugas,peminjam',
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->name_lengkap = $request->name_lengkap;
        $user->alamat = $request->alamat;
        $user->role = $request->role;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6',
            'name_lengkap' => 'required|string|max:255',
            'alamat' => 'required|string',
            'role' => 'required|in:admin,petugas,peminjam',
        ]);

        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->name_lengkap = $request->name_lengkap;
        $user->alamat = $request->alamat;
        $user->role = $request->role;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $user = User::where('username', 'LIKE', "%$query%")
                    ->orWhere('email', 'LIKE', "%$query%")
                    ->orWhere('alamat', 'LIKE', "%$query%")
                    ->orWhere('name_lengkap', 'LIKE', "%$query%")
                    ->orWhere('role', 'LIKE', "%$query%")
                    ->paginate(10);
        
        if ($user->isEmpty()) {
            return redirect()->route('users.index')->with('error', 'User tidak ditemukan.');
        }

        return view('admin.user.index', compact('user'));
    }

    public function exportPdf()
    {        
        $user = User::all();
        $pdf = Pdf::loadView('pdf.export-user', ['user' => $user])->setOption(['defaultFont' => 'sans-serif']);
        // Membuat nama file PDF dengan waktu saat ini
        $fileName = 'export-user-' . Date::now()->format('Y-m-d_H-i-s') . '.pdf';
        
        return $pdf->download($fileName);
    }

    public function exportExcel()
    {
        return (new UserExport)->download('user-'.Carbon::now()->timestamp.'.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }
}
