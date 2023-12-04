<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Evenement extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
       'dateLimiteInscription',
        'description',
        'imageMiseEnAvant',
        'statut',
        'dateEvenement',
        'admin_id',
        
];
public $timestamps = false;
public function admin():BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function users(): BelongsToMany
    
    {
        return $this->belongsToMany(User::class, 'reservations');
    }
}
