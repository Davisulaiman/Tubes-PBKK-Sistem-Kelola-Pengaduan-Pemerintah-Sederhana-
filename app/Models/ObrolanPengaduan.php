<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObrolanPengaduan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'obrolan_pengaduans';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'laporan_id',
        'pengirim_id',
        'penerima_id',
        'pesan',
        'waktu_kirim',
        'dibaca',
    ];

    protected $casts = [
        'waktu_kirim' => 'date'
    ];

    /**
     * Get the laporan that the obrolan is associated with.
     */
    public function laporan()
    {
        return $this->belongsTo(Laporan::class);
    }

    /**
     * Get the user who sent the message (admin).
     */
    public function pengirim()
    {
        return $this->belongsTo(User::class, 'pengirim_id');
    }

    /**
     * Get the user who receives the message.
     */
    public function penerima()
    {
        return $this->belongsTo(User::class, 'penerima_id');
    }
}
