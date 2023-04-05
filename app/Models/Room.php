<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'number_of_people'
    ];

    // Reference to the related table
    public function reservations() {
        return $this->hasOne(Reservation::class);
    }
}
