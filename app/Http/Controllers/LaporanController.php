<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role !== 'admin') {
                return redirect()->back()->with('error', 'Akses ditolak');
            }
            return $next($request);
        })->only(['index', 'getById', 'updateStatus']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('laporan.index', [
            'laporans' => Laporan::all()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $laporans = Laporan::where('user_id', $user->id)->get();
        return view('laporan.create', [
            'laporans' => $laporans
        ]);
    }

    /**
     * Display the report by ID.
     */
    public function getById($id)
    {
        $data = Laporan::find($id);
        if ($data) {
            return view('laporan.lihat', compact('data'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the status of a report.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Menunggu,Sedang Diproses,Selesai,Tutup',
        ]);

        $laporan = Laporan::find($id);
        if ($laporan) {
            $laporan->status = $request->input('status');
            $laporan->save();
            session()->flash('success', 'Status laporan berhasil diperbarui.');
            return redirect()->route('laporan.index');
        } else {
            return back()->with('error', 'Laporan tidak ditemukan.');
        }
    }


    /**
     * Store a new report.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'jenis_laporan' => 'required|string',
            'keluhan' => 'required|string',
            'tanggal_laporan' => 'required|date',
            'bukti_pendukung' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $buktiPendukung = null;
        if ($request->hasFile('bukti_pendukung')) {
            $file = $request->file('bukti_pendukung');
            $buktiPendukung = 'laporanpdf/' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('laporanpdf'), $buktiPendukung);
        }

        $jenisLainnya = $request->input('jenis_lainnya', null);
        if ($request->input('jenis_laporan') !== 'Lainnya') {
            $jenisLainnya = null;
        }

        $laporan = Laporan::create([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'jenis_laporan' => $request->input('jenis_laporan'),
            'jenis_lainnya' => $jenisLainnya,
            'keluhan' => $request->input('keluhan'),
            'tanggal_laporan' => $request->input('tanggal_laporan'),
            'bukti_pendukung' => $buktiPendukung,
            'user_id' => Auth::id(),
        ]);

        if ($laporan) {
            session()->flash('success', 'Laporan berhasil diinput.');
            return redirect(route('laporan.create'));
        } else {
            return back()->with('error', 'Laporan gagal diinput.');
        }
    }

    public function daftarpengaduansaya()
    {
        $laporans = Laporan::where('user_id', Auth::id())->get();
        return view('laporan.daftarpengaduansaya', compact('laporans'));
    }

    public function kelolapengaduan()
    {
        $laporans = Laporan::all();
        return view('laporan.kelolapengaduan', compact('laporans'));
    }

    public function print($id)
    {
        $data = Laporan::findOrFail($id);
        return view('laporan.print_laporan', compact('data'));
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
    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);
        if (!$laporan) {
            return redirect()->back()->with('error', 'Laporan tidak ditemukan.');
        }
        return view('laporan.edit', compact('laporan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);

        // Validasi dan pembaruan laporan
        $request->validate([
            'nama' => 'required|string|max:255',
            'keluhan' => 'required|string',
        ]);

        $laporan->update([
            'nama' => $request->input('nama'),
            'keluhan' => $request->input('keluhan'),
            // Tambahkan pembaruan lainnya sesuai kebutuhan
        ]);

        // Redirect setelah berhasil
        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);

        if ($laporan) {
            $laporan->delete();
            return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dihapus.');
        }
        return back()->with('error', 'Laporan tidak ditemukan.');
    }

}
