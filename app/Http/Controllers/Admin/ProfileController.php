<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use illuminate\Support\Str;
use Illuminate\Auth\Events\Validated;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = User::where('level', 1)->get();
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                     Aksi
                                    </button>
                                    <ul class="dropdown-menu">
                                      <li><a href="' . route('profile.edit', $item->id) . '" method="POST" class="dropdown-item">Edit</a></li>
                                      <form action="' . route('profile.destroy', $item->id) . '" method="POST">
                                        ' . method_field('delete') . csrf_field() . '
                                      <li><a type="submit" class="dropdown-item text-danger">Hapus</a></li>
                                    </form>
                                    </ul>
                                  </div>';
                })
                ->editColumn('photo', function ($item) {
                    return $item->foto ? '<img src="' . Storage::url($item->foto) . '" style="max-height: 48px;" alt="">' : '';
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
        $data['foto'] = $request->file('foto')->store('assets/user', 'public');

        User::create($data);

        return redirect()->route('admin.profile.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        $item = User::findOrFail($id);
        $item->delete();

        return redirect()->route('profile.index');
    }
}
