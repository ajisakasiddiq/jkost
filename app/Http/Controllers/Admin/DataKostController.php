<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataKost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class DataKostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = DataKost::all();
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                       Aksi
                      </button>
                      <ul class="dropdown-menu">
                        <li><a href="" data-bs-toggle="modal" data-bs-target="#editAdmin" class="dropdown-item">Edit</a></li>
                        <form action="' . route('profile.destroy', $item->id) . '" method="POST">
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

        return view(

            'pages.admin.admin-DataKost',
            [
                'data' => DataKost::first(),
            ]
        );
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
