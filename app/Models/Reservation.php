<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
         'reference',
        'dateReservation',
        'status',
        'nombreDeReservation',
        'evenement_id',
        'user_id',
        'admin_id',
        ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
