<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class profileAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (request()->ajax()) {
            $query = User::query();
            return Yajra\DataTables\Facades\DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <div class="btn-group">
                      <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle mr-1 mb-1" type="button" data-toggle="dropdown">Aksi</button>
                        <div class="dropdown-menu">
                          <a href="' . route('categories.edit', $item->id) . '" method="POST" class="dropdown-item">Edit</a>
                          <form action="' . route('categories.destroy', $item->id) . '" method="POST">
                          ' . method_field('delete') . csrf_field() . '
                          <button type="submit" class="dropdown-item text-danger">Hapus</button>
                          </form>
                        </div>
                      </div>
                    </div>';
                })
                ->editColumn('photo', function ($item) {
                    return $item->photo ? '<img src="' . Storage::url($item->photo) . '" style="max-height: 48px;" alt="">' : '';
                })
                ->rawColumns(['action', 'photo'])
                ->make();
        }
        return view('pages.admin-profile-admin');
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
