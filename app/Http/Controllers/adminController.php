<?php

namespace App\Http\Controllers;

use App\Models\inap;
use App\Models\sewa;
use App\Models\kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class adminController extends Controller
{
    public function admin()
    {
        $inap = inap::all();
        return view('admin.read', ['title' => 'admin', 'inap' => $inap]);
    }
    public function hapus($id)
    {
        Alert::success('data berhasil di hapus');
        $inap = inap::find($id);
        if ($inap <> "") {
            unlink(public_path('image') . '\\' . $inap->gambar);
        }
        $inap->delete();
        return back();
    }
    public function add()
    {
        $kategori = kategori::all();
        return view('admin.add', ['title' => 'Tambah', 'kategori' => $kategori]);
    }
    public function tambah(request $request)
    {
        $request->validate([
            'nama' => ['required', 'min:5', 'max:25', 'unique:inaps'],
            'harga' => ['required', 'min:4', 'max:7'],
            'fasilitas' => ['required', 'min:2'],
            'alamat' => ['required', 'min:5'],
            'gambar' => ['mimes:jpeg,png,jpg', 'max:1000'],
            'kategori' => ['required']
        ]);

        $file = $request->gambar;
        $slug = Str::slug($request->nama);
        $filename = $slug . '.' . $file->extension();
        $file->move(public_path('image'), $filename);

        $inap = new inap;
        $inap->kategori_id = $request->kategori;
        $inap->nama = $request->nama;
        $inap->slug = $slug;
        $inap->harga = $request->harga;
        $inap->lokasi = $request->alamat;
        $inap->fasilitas = $request->fasilitas;
        $inap->gambar = $filename;
        $inap->save();
        toast('berhasil masukan data', 'success');
        return redirect('/admin')->with('pesan', 'Berhasil');
    }
    public function edit($id)
    {
        $kategori = kategori::all();
        $inap = inap::find($id);
        return view('admin.edit', ['title' => 'edit', 'inap' => $inap, 'kategori' => $kategori]);
    }
    public function ubah(Request $request, $id)
    {
        $file = $request->gambar;
        $slug = Str::slug($request->nama);

        $inap = inap::where('id', $id)->first();
        $inap->nama = $request->nama;
        $inap->slug = $slug;
        $inap->harga = $request->harga;
        $inap->lokasi = $request->alamat;
        $inap->fasilitas = $request->fasilitas;
        $gambar = $inap->gambar;
        if ($file === null) {
            $gambar = preg_replace('/(\w+)-(\w+)\./', $slug . '.', $gambar);
        } else {
            if ($inap <> "") {
                unlink(public_path('image') . '\\' . $gambar);
            }
            $filename = $slug . '.' . $file->extension();
            $inap->gambar = $filename;
            $file->move(public_path('image'), $filename);
        }
        $inap->update();

        toast('berhasil ubah data', 'success');
        return redirect('/admin')->with('pesan', 'Berhasil');
    }
}
