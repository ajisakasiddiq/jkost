<?php

namespace App\Http\Controllers\Pemilik;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\DataKamar;
use Illuminate\Database\QueryException;

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
    public function tambah(Request $request)
    {

        $request->validate(
            [],
            [],
        );

        $datakamar = new DataKamar();

        $fileNameFotoPertama = time() . '.' . $request->img_pertama->extension();
        $request->img_pertama->move(public_path('assets/kamar/depan/'), $fileNameFotoPertama);

        $fileNameFotoKedua = time() . '.' . $request->img_kedua->extension();
        $request->img_kedua->move(public_path('assets/kamar/dalam/'), $fileNameFotoKedua);

        $fileNameFotoKetiga = time() . '.' . $request->img_ketiga->extension();
        $request->img_ketiga->move(public_path('assets/kamar/toilet/'), $fileNameFotoKetiga);

        $fileNameFotoKeempat = time() . '.' . $request->img_keempat->extension();
        $request->img_keempat->move(public_path('assets/kamar/dapur/'), $fileNameFotoKeempat);

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
        $datakamar->save();
        return redirect()->route('data-kamar');
    }

    public function update(Request $request, $id)

    {


        if ($request->img_pertama == null && $request->img_kedua == null && $request->img_ketiga == null && $request->img_keempat == null) {

            // $request->validate(
            //     [
            //         'kost_id' => 'required',
            //         'jenis_kamar' => 'required|max:100',
            //         'no_kamar' => 'required',
            //         'harga' => 'required',
            //         'status' => 'required',
            //         'deskripsi' => 'required|max:250',
            //         'slug' => 'required',
            //     ],
            //     [
            //         'kost_id.required' => 'Kost id tidak boleh kosong',
            //         'jenis_kamar.required' => 'jenis kamar tidak boleh kosong',
            //         'no_kamar.max' => 'Nomor kamar maksimal 30 karakter',
            //         'status.required' => 'Silahkan isi angka 1 antrian',
            //         'deskripsi.required' => 'wajib isi deskripsi kamar kost',
            //         'slug.max' => 'Isi Maksimal 10 karakter',
            //     ],
            // );

            $datakamar = DataKamar::find($id);
            $datakamar->kost_id = $request->id_kost;
            $datakamar->jenis_kamar =  $request->jenis_kamar;
            $datakamar->no_kamar = $request->no_kamar;
            $datakamar->harga = $request->harga;
            $datakamar->status = $request->status;
            $datakamar->deskripsi = $request->deskripsi;
            $datakamar->slug = 1;
            $datakamar->save();

            return redirect()->route('data-kamar');
            // } elseif ($request->img_kedua == null && $request->img_ketiga == null && $request->img_keempat == null) {

            // $request->validate(
            //     [
            //         'kost_id' => 'required',
            //         'jenis_kamar' => 'required|max:100',
            //         'no_kamar' => 'required',
            //         'status' => 'required',
            //         'img_pertama' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            //         'deskripsi' => 'required|max:250',
            //         'slug' => 'required',
            //     ],
            //     [
            //         'kost_id.required' => 'Kost id tidak boleh kosong',
            //         'jenis_kamar.required' => 'jenis kamar tidak boleh kosong',
            //         'no_kamar.max' => 'Nomor kamar maksimal 30 karakter',
            //         'status.required' => 'Silahkan isi angka 1 antrian',
            //         'img_pertama.required' => 'Gambar tidak boleh kosong',
            //         'img_pertama.image' => 'Gambar harus berupa gambar',
            //         'img_pertama.mimes' => 'format harus jpeg,png,jpg,gif,svg',
            //         'img_pertama.max' => 'gambar harus 5 MB',
            //         'deskripsi.required' => 'wajib isi deskripsi kamar kost',
            //         'slug.max' => 'Isi Maksimal 10 karakter',
            //     ],
            // );
            // $update = DataKamar::where('id', $id)->first();
            // File::delete(public_path('assets/kamar/depan') . '/' . $update->img_pertama);

            // $fileNameFotoPertamaUpdate = time() . '.' . $request->img_pertama->extension();
            // $request->img_pertama->move(public_path('assets/kamar/depan/'), $fileNameFotoPertamaUpdate);


            // $datakamar = DataKamar::find($id);
            // $datakamar->kost_id = $request->id;
            // $datakamar->jenis_kamar = $request->jenis_kamar;
            // $datakamar->no_kamar = $request->no_kamar;
            // $datakamar->status = $request->status;
            // $datakamar->img_pertama = $fileNameFotoPertamaUpdate;
            // $datakamar->deskripsi = $request->deskripsi;
            // $datakamar->slug = 1;
            // $datakamar->save();
            // return redirect()->route('data-kamar');
            // } elseif ($request->img_ketiga == null && $request->img_keempat == null) {

            // $request->validate(
            //     [
            //         'kost_id' => 'required',
            //         'jenis_kamar' => 'required|max:100',
            //         'no_kamar' => 'required',
            //         'status' => 'required',
            //         'img_pertama' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            //         'img_kedua' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            //         'deskripsi' => 'required|max:250',
            //         'slug' => 'required',
            //     ],
            //     [
            //         'kost_id.required' => 'Kost id tidak boleh kosong',
            //         'jenis_kamar.required' => 'jenis kamar tidak boleh kosong',
            //         'no_kamar.max' => 'Nomor kamar maksimal 30 karakter',
            //         'status.required' => 'Silahkan isi angka 1 antrian',
            //         'img_pertama.required' => 'Gambar tidak boleh kosong',
            //         'img_pertama.image' => 'Gambar harus berupa gambar',
            //         'img_pertama.mimes' => 'format harus jpeg,png,jpg,gif,svg',
            //         'img_pertama.max' => 'gambar harus 5 MB',
            //         'img_kedua.required' => 'Gambar tidak boleh kosong',
            //         'img_kedua.image' => 'Gambar harus berupa gambar',
            //         'img_kedua.mimes' => 'format harus jpeg,png,jpg,gif,svg',
            //         'img_kedua.max' => 'gambar harus 5 MB',
            //         'deskripsi.required' => 'wajib isi deskripsi kamar kost',
            //         'slug.max' => 'Isi Maksimal 10 karakter',
            //     ],
            // );
            // $updatePertama = DataKamar::where('id', $id)->first();
            // File::delete(public_path('assets/kamar/depan') . '/' . $updatePertama->img_pertama);

            // $fileNameFotoPertamaUpdate = time() . '.' . $request->img_pertama->extension();
            // $request->img_pertama->move(public_path('assets/kamar/depan/'), $fileNameFotoPertamaUpdate);

            // $updateKedua = DataKamar::where('id', $id)->first();
            // File::delete(public_path('assets/kamar/dalam') . '/' . $updateKedua->img_kedua);

            // $fileNameFotoKeduaUpdate = time() . '.' . $request->img_kedua->extension();
            // $request->img_kedua->move(public_path('assets/kamar/dalam/'), $fileNameFotoKeduaUpdate);



            // $datakamar = DataKamar::find($id);
            // $datakamar->kost_id = $request->id;
            // $datakamar->jenis_kamar = $request->jenis_kamar;
            // $datakamar->no_kamar = $request->no_kamar;
            // $datakamar->status = $request->status;
            // $datakamar->img_pertama = $fileNameFotoPertamaUpdate;
            // $datakamar->img_kedua = $fileNameFotoKeduaUpdate;
            // $datakamar->deskripsi = $request->deskripsi;
            // $datakamar->slug = 1;
            // $datakamar->save();
            // return redirect()->route('data-kamar');
            // } elseif ($request->img_keempat == null) {

            // $request->validate(
            //     [
            //         'kost_id' => 'required',
            //         'jenis_kamar' => 'required|max:100',
            //         'no_kamar' => 'required',
            //         'status' => 'required',
            //         'img_ketiga' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            //         'deskripsi' => 'required|max:250',
            //         'slug' => 'required',
            //     ],
            //     [
            //         'kost_id.required' => 'Kost id tidak boleh kosong',
            //         'jenis_kamar.required' => 'jenis kamar tidak boleh kosong',
            //         'no_kamar.max' => 'Nomor kamar maksimal 30 karakter',
            //         'status.required' => 'Silahkan isi angka 1 antrian',
            //         'img_pertama.required' => 'Gambar tidak boleh kosong',
            //         'img_pertama.image' => 'Gambar harus berupa gambar',
            //         'img_pertama.mimes' => 'format harus jpeg,png,jpg,gif,svg',
            //         'img_pertama.max' => 'gambar harus 5 MB',
            //         'img_kedua.required' => 'Gambar tidak boleh kosong',
            //         'img_kedua.image' => 'Gambar harus berupa gambar',
            //         'img_kedua.mimes' => 'format harus jpeg,png,jpg,gif,svg',
            //         'img_kedua.max' => 'gambar harus 5 MB',
            //         'img_ketiga.required' => 'Gambar tidak boleh kosong',
            //         'img_ketiga.image' => 'Gambar harus berupa gambar',
            //         'img_ketiga.mimes' => 'format harus jpeg,png,jpg,gif,svg',
            //         'img_ketiga.max' => 'gambar harus 5 MB',
            //         'deskripsi.required' => 'wajib isi deskripsi kamar kost',
            //         'slug.max' => 'Isi Maksimal 10 karakter',
            //     ],
            // );
            // $updatePertama = DataKamar::where('id', $id)->first();
            // File::delete(public_path('assets/kamar/depan') . '/' . $updatePertama->img_pertama);

            // $fileNameFotoPertamaUpdate = time() . '.' . $request->img_pertama->extension();
            // $request->img_pertama->move(public_path('assets/kamar/depan/'), $fileNameFotoPertamaUpdate);

            // $updateKedua = DataKamar::where('id', $id)->first();
            // File::delete(public_path('assets/kamar/dalam') . '/' . $updateKedua->img_kedua);

            // $fileNameFotoKeduaUpdate = time() . '.' . $request->img_kedua->extension();
            // $request->img_kedua->move(public_path('assets/kamar/dalam/'), $fileNameFotoKeduaUpdate);

            // $updateKetiga = DataKamar::where('id', $id)->first();
            // File::delete(public_path('assets/kamar/toilet') . '/' . $updateKetiga->img_ketiga);

            // $fileNameFotoKetigaUpdate = time() . '.' . $request->img_ketiga->extension();
            // $request->img_ketiga->move(public_path('assets/kamar/toilet/'), $fileNameFotoKetigaUpdate);




            // $datakamar = DataKamar::find($id);
            // $datakamar->kost_id = $request->id;
            // $datakamar->jenis_kamar = $request->jenis_kamar;
            // $datakamar->no_kamar = $request->no_kamar;
            // $datakamar->status = $request->status;
            // $datakamar->img_pertama = $fileNameFotoPertamaUpdate;
            // $datakamar->img_kedua = $fileNameFotoKeduaUpdate;
            // $datakamar->img_ketiga = $fileNameFotoKetigaUpdate;
            // $datakamar->deskripsi = $request->deskripsi;
            // $datakamar->slug = 1;
            // $datakamar->save();
            // return redirect()->route('data-kamar');
        } else {

            // $request->validate(
            //     [
            //         'id_user' => 'required',
            //         'nama_pemeriksa' => 'required|max:30',
            //         'img_pertama' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            //         'img_kedua' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            //         'img_ketiga' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            //         'img_keempat' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            //         'tempat' => 'required|max:30',
            //         'tanggal' => 'required|date',
            //     ],
            //     [
            //         'id_user.required' => 'Nama User tidak boleh kosong',
            //         'nama_pemeriksa.required' => 'Nama Pemeriksa tidak boleh kosong',
            //         'nama_pemeriksa.max' => 'Nama Pemeriksa maksimal 30 karakter',
            //         'ttd_pemeriksa.required' => 'TTD Pemeriksa tidak boleh kosong',
            //         'img_pertama.required' => 'Bukti Pemeriksaan tidak boleh kosong',
            //         'img_pertama.image' => 'Bukti Pemeriksaan harus berupa gambar',
            //         'img_pertama.mimes' => 'Bukti Pemeriksaan harus berupa gambar dengan format jpeg, png, jpg, gif, svg',
            //         'img_pertama.max' => 'Bukti Pemeriksaan maksimal 5 MB',
            //         'img_kedua.required' => 'Gambar tidak boleh kosong',
            //         'img_kedua.image' => 'Gambar harus berupa gambar',
            //         'img_kedua.mimes' => 'format harus jpeg,png,jpg,gif,svg',
            //         'img_kedua.max' => 'gambar harus 5 MB',
            //         'img_ketiga.required' => 'Gambar tidak boleh kosong',
            //         'img_ketiga.image' => 'Gambar harus berupa gambar',
            //         'img_ketiga.mimes' => 'format harus jpeg,png,jpg,gif,svg',
            //         'img_ketiga.max' => 'gambar harus 5 MB',
            //         'img_keempat.required' => 'Gambar tidak boleh kosong',
            //         'img_keempat.image' => 'Gambar harus berupa gambar',
            //         'img_keempat.mimes' => 'format harus jpeg,png,jpg,gif,svg',
            //         'img_keempat.max' => 'gambar harus 5 MB',
            //         'deskripsi.required' => 'wajib isi deskripsi kamar kost',
            //         'slug.max' => 'Isi Maksimal 10 karakter',
            //     ],
            // );

            $updatePertama = DataKamar::where('id', $id)->first();
            File::delete(public_path('assets/kamar/depan') . '/' . $updatePertama->img_pertama);

            $fileNameFotoPertamaUpdate = time() . '.' . $request->img_pertama->extension();
            $request->img_pertama->move(public_path('assets/kamar/depan/'), $fileNameFotoPertamaUpdate);

            $updateKedua = DataKamar::where('id', $id)->first();
            File::delete(public_path('assets/kamar/dalam') . '/' . $updateKedua->img_kedua);

            $fileNameFotoKeduaUpdate = time() . '.' . $request->img_kedua->extension();
            $request->img_kedua->move(public_path('assets/kamar/dalam/'), $fileNameFotoKeduaUpdate);

            $updateKetiga = DataKamar::where('id', $id)->first();
            File::delete(public_path('assets/kamar/toilet') . '/' . $updateKetiga->img_ketiga);

            $fileNameFotoKetigaUpdate = time() . '.' . $request->img_ketiga->extension();
            $request->img_ketiga->move(public_path('assets/kamar/toilet/'), $fileNameFotoKetigaUpdate);

            $updateKeempat = DataKamar::where('id', $id)->first();
            File::delete(public_path('assets/kamar/dapur') . '/' . $updateKeempat->img_keempat);

            $fileNameFotoKeempatUpdate = time() . '.' . $request->img_keempat->extension();
            $request->img_keempat->move(public_path('assets/kamar/dapur/'), $fileNameFotoKeempatUpdate);


            $datakamar = DataKamar::find($id);
            $datakamar->kost_id = $request->id;
            $datakamar->jenis_kamar = $request->jenis_kamar;
            $datakamar->no_kamar = $request->no_kamar;
            $datakamar->status = $request->status;
            $datakamar->img_pertama = $fileNameFotoPertamaUpdate;
            $datakamar->img_kedua = $fileNameFotoKeduaUpdate;
            $datakamar->img_ketiga = $fileNameFotoKetigaUpdate;
            $datakamar->img_keempat = $fileNameFotoKeempatUpdate;
            $datakamar->deskripsi = $request->deskripsi;
            $datakamar->slug = 1;
            $datakamar->save();
            return redirect()->route('data-kamar');
        }
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
