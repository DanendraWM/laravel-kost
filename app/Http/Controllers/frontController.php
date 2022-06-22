<?php

namespace App\Http\Controllers;

use App\Models\histori;
use App\Models\inap;
use App\Models\kategori;
use App\Models\sewa;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class frontController extends Controller
{
    public function home()
    {
        $inap = inap::all();
        if (request('cari')) {
            $inap->where('nama', 'like', '%' . request('cari') . '%');
        }
        return view('front.index', ['title' => 'home']);
    }
    public function kategori()
    {
        $kategori = kategori::all();
        return view('front.kategori', ['title' => 'kategori', 'kategori' => $kategori]);
    }
    public function feed()
    {
        $inap = inap::latest();
        if (request('cari')) {
            $inap->where('nama', 'like', '%' . request('cari') . '%');
        }
        return view('front.feed', [
            'title' => 'feed',
            'inap' => $inap->latest()->paginate(4)->withQueryString(),
        ]);
    }
    public function feedid($id)
    {
        $inap = inap::where('kategori_id', $id)->latest()->paginate(4)->withQueryString();
        return view('front.feed', ['title' => 'feed', 'inap' => $inap]);
    }
    public function detail(inap $inap)
    {
        return view('front.detail', ['title' => 'detail', 'inap' => $inap]);
    }
    public function err($err)
    {
        return view('error', ['title' => 'Not Found', 'error' => $err]);
    }
    public function sewa()
    {
        $sewa = sewa::where('user_id', Auth::user()->id)->get();
        foreach ($sewa as $sw) {
            if (Carbon::now() >= $sw->checkout) {
                $histori = new histori;
                $histori->user_id = $sw->user_id;
                $histori->inap_id = $sw->inap_id;
                $histori->hari_menginap = $sw->hari_menginap;
                $histori->checkin = $sw->checkin;
                $histori->checkout = $sw->checkout;
                $histori->total = $sw->total;
                $histori->save();
                $sw->delete();
            }
        }
        return view('front.sewa', ['title' => 'Sewa', 'sewa' => $sewa]);
    }
    public function sewaid(request $request, $id)
    {
        $sewa = new sewa;
        if (sewa::where('user_id', Auth::user()->id)->count()) {
            toast('Anda Sudah Booking Tempat', 'error');
            return redirect('/sewa')->with('pesan', 'Gagal booking');
        } else {
            $total = (int) $request->harga * (int) $request->pilih;
            $sewa->user_id = Auth::user()->id;
            $sewa->inap_id = $id;
            $sewa->hari_menginap = $request->pilih;
            $sewa->checkin = Carbon::now();
            $sewa->checkout = Carbon::now()->addDays((int) $request->pilih);
            // addMinutes((int)$request->pilih)
            $sewa->total = $total;
            $sewa->save();
            toast('berhasil booking', 'success');
            return redirect('/sewa')->with('pesan', 'berhasil booking');
        }
    }
    public function history()
    {
        $histori = histori::where('user_id', Auth::user()->id)->get();
        return view('front.history', ['title' => 'history', 'histori' => $histori]);
    }
    public function hapusHistori($id)
    {
        Alert::success('data berhasil di hapus');
        $histori = histori::find($id);
        $histori->delete();
        return redirect('/history');
    }
    public function profile()
    {
        $User = User::where('id', Auth::user()->id)->first();
        return view('front.profile', ['title' => 'Profile', 'user' => $User]);
    }
    public function editProfile(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        if (!(Hash::check($request->opass, $user->password))) {
            Alert::error('Password yang Anda masukan salah');
            return redirect()->back();
        }
        if (strcmp($request->opass, $request->npass) == 0) {
            Alert::error('password tidak boleh sama dengan password lama');
            return redirect()->back();
        }

        //Change Password
        $request->validate([
            'name' => ['required', 'min:3', 'max:25'],
            'email' => ['required', 'email:dns'],
            'opass' => ['required'],
            'npass' => ['min:8', 'nullable'],
        ], [
            'npass.min' => 'password minimal 8 karakter',
            'email.email' => 'Email harus sesuai',
        ]);
        $user->name = $request->name;
        if (empty($request->image)) {
            $user->image = $user->name . '.' . $request->file->extension();
            $request->file->move(public_path('image'), $user->image);
        }
        $user->email = $request->email;
        if ($request->npass === null) {
            $user->password = bcrypt($request->opass);
        } else {
            $user->password = bcrypt($request->npass);
        }
        $user->update();
        Alert::success('Info user berhasil di ganti');
        return redirect()->back()->with("success", "Password berhasil di ganti!");
    }
    public function exportPDF()
    {
        $sewa = sewa::where('user_id', Auth::user()->id)->get();
        view()->share('sewa', $sewa);
        view()->share('title', 'print');
        $pdf = PDF::loadview('front.sewa-pdf');
        return $pdf->download('data.pdf');
    }
}
