<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function laporans()
    {
        return $this->hasMany(Laporan::class);
    }

    /**
     * Get all the messages sent by the user (as pengirim).
     */
    public function pesanPengirim()
    {
        return $this->hasMany(ObrolanPengaduan::class, 'pengirim_id');
    }

    /**
     * Get all the messages received by the user (as penerima).
     */
    public function pesanPenerima()
    {
        return $this->hasMany(ObrolanPengaduan::class, 'penerima_id');
    }
}
