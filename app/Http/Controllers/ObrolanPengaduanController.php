<?php

namespace App\Http\Controllers;

use App\Models\ObrolanPengaduan;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObrolanPengaduanController extends Controller
{
    public function index($laporanId)
{
    // Get the laporan data to find the user_id
    $laporan = Laporan::findOrFail($laporanId);

    // Get the conversation (obrolan) associated with the laporan
    $obrolan = ObrolanPengaduan::where('laporan_id', $laporanId)
                                ->orderBy('waktu_kirim', 'asc')
                                ->get();

    // If no messages, create a default message
    if ($obrolan->isEmpty()) {
        ObrolanPengaduan::create([
            'laporan_id' => $laporanId,
            'pengirim_id' => Auth::id(), // Admin user (currently logged-in)
            'penerima_id' => $laporan->user_id, // User who created the report
            'pesan' => 'Halooooowwwww',
            'waktu_kirim' => now(),
            'dibaca' => false,
        ]);

        // Fetch the conversation after creating the default message
        $obrolan = ObrolanPengaduan::where('laporan_id', $laporanId)
                                    ->orderBy('waktu_kirim', 'asc')
                                    ->get();
    }

    return view('obrolan.index', compact('obrolan', 'laporan'));
}

public function store(Request $request, $laporanId)
{
    // Validate the input message
    $request->validate([
        'pesan' => 'required|string',
    ]);

    // Get the laporan data to retrieve the user who submitted the report
    $laporan = Laporan::findOrFail($laporanId);

    // Save the new message
    ObrolanPengaduan::create([
        'laporan_id' => $laporanId, // Use $laporanId directly here
        'pengirim_id' => Auth::id(), // Admin user (currently logged-in)
        'penerima_id' => $laporan->user_id, // User who created the report
        'pesan' => $request->input('pesan'),
        'waktu_kirim' => now(),
        'dibaca' => false, // Default to unread
    ]);

    return redirect()->route('obrolan.index', $laporanId)->with('success', 'Pesan berhasil dikirim');
}

}
