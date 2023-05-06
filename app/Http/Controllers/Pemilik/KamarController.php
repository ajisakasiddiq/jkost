<?php

namespace App\Http\Controllers\Pemilik;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\DataKamarRequest;
use App\Models\DataKamar;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datakamar = DataKamar::all();



        return view(

            'pages.pemilik.pemilik-dataKamar',
            [
                'data' => $datakamar,
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
    public function store(DataKamarRequest $request)
    {
        // $data = $request->all();
        // $data['img_pertama'] = $request->file('img_pertama')->store('/assets/user', 'public');
        // $data['img_kedua'] = $request->file('img_kedua')->store('/assets/user', 'public');
        // $data['img_ketiga'] = $request->file('img_ketiga')->store('/assets/user', 'public');
        // $data['img_keempat'] = $request->file('img_keempat')->store('/assets/user', 'public');
        // $data['slug'] = Str::slug($request->kost_id);
        // DataKamar::create($data);
        // return redirect()->route('data-kamar');


    }

    public function tambah(Request $request)
    {

        $request->validate(
            [],
            [],
        );

        $datakamar = new DataKamar();

        $fileNameFotoPertama = time() . '.' . $request->img_pertama->extension();
        $request->img_pertama->move(public_path('assets/user/'), $fileNameFotoPertama);

        $fileNameFotoKedua = time() . '.' . $request->img_kedua->extension();
        $request->img_kedua->move(public_path('assets/user/'), $fileNameFotoKedua);

        $fileNameFotoKetiga = time() . '.' . $request->img_ketiga->extension();
        $request->img_ketiga->move(public_path('assets/user/'), $fileNameFotoKetiga);

        $fileNameFotoKeempat = time() . '.' . $request->img_keempat->extension();
        $request->img_keempat->move(public_path('assets/user/'), $fileNameFotoKeempat);

        $datakamar->kost_id = $request->id_kost;
        $datakamar->jenis_kamar =  $request->jenis_kamar;
        $datakamar->no_kamar = $request->no_kamar;
        $datakamar->harga = $request->harga;
        $datakamar->status = $request->status;
        $datakamar->img_pertama = $fileNameFotoPertama;
        $datakamar->img_kedua = $fileNameFotoKedua;
        $datakamar->img_ketiga = $fileNameFotoKetiga;
        $datakamar->img_keempat = $fileNameFotoKeempat;
        $datakamar->deskripsi = $request->deskripsi;
        $datakamar->slug = 1;
        $datakamar->save();
        return redirect()->route('data-kost');
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
    public function destroy($id)
    {
        $deleteimage1 = DataKamar::where('id', $id)->first();
        File::delete(public_path('assets/user') . '/' . $deleteimage1->img_pertama);

        $deleteimage2 = DataKamar::where('id', $id)->first();
        File::delete(public_path('assets/user') . '/' . $deleteimage2->img_kedua);

        $deleteimage3 = DataKamar::where('id', $id)->first();
        File::delete(public_path('assets/user') . '/' . $deleteimage3->img_ketiga);

        $deleteimage4 = DataKamar::where('id', $id)->first();
        File::delete(public_path('assets/user') . '/' . $deleteimage4->img_keempat);

        $deletedata = DataKamar::find($id)->delete();
        if ($deletedata) {
            return redirect()->route('data-kamar');
        }
    }
}
