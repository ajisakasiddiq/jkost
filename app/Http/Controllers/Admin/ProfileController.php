<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = User::where('role', 'admin')->get();
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                       Aksi
                      </button>
                      <ul class="dropdown-menu">
                        <li><a data-bs-toggle="modal" data-bs-target="#editAdmin{' . route('profile.edit', $item->id) . '" class="dropdown-item">Edit</a></li>
                        <form action="' . route('profile.destroy', Auth::user()->id) . '" method="POST">
                          ' . method_field('delete') . csrf_field() . '
                        <li><a type="submit" class="dropdown-item text-danger">Hapus</a></li>
                      </form>
                      </ul>
                    </div>';
                })
                ->editColumn('foto', function ($item) {
                    return $item->foto ? '<img src="' . Storage::url($item->foto) . '" style="max-height: 48px;" alt="" />' : '';
                })
                ->rawColumns(['action', 'foto'])
                ->make();
            return response()->json([
                'data' => $query
            ]);
        }

        return view('pages.admin.admin-profile-admin');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['foto'] = $request->file('foto')->store('/assets/user', 'public');
        $data['password'] = Hash::make($data['password']);
        User::create($data);

        // $user->assignRole('admin');
        return redirect()->route('profileAdmin-admin');
    }
    // profileAdmin-admin

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::findOrFail($id);
        return view('Profile.show')->with('User', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('pages.admin.admin-profile-admin', [
            'profile' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::findOrFail($id);
        $data->delete();

        return redirect()->route('profile.index');
    }
}
