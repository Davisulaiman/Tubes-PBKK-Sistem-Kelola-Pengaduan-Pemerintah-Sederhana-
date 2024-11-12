<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'laporans';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'email', // Menambahkan email
        'jenis_laporan',
        'jenis_lainnya', // Menambahkan jenis_lainnya
        'status',
        'keluhan', // Menambahkan keluhan
        'tanggal_laporan',
        'bukti_pendukung', // Mengganti 'file' dengan 'bukti_pendukung'
        'user_id', // Menambahkan user_id
    ];

    /**
     * Get the user that owns the laporan.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the obrolan for the laporan.
     */
    public function obrolan()
    {
        return $this->hasMany(ObrolanPengaduan::class);
    }
}
