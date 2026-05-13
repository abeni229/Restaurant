<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'first_name',
        'last_name',
        'telephone',
        'email',
        'date_reservation',
        'heure',
        'nombre_personnes',
        'occasion',
        'plat_id',
        'quantity',
        'order_type',
        'address',
        'total_amount',
        'payment_status',
        'payment_method',
        'payment_channel',
        'card_network',
        'payment_reference',
        'statut',
        'notes',
        'withdrawn_at',
    ];

    protected $casts = [
        'date_reservation' => 'datetime',
        'withdrawn_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plat()
    {
        return $this->belongsTo(Plat::class);
    }

    public function getPaymentLabelAttribute(): string
    {
        return $this->payment_status === 'paid' ? 'Payé' : 'En attente';
    }
}
