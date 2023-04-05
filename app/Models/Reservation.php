<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';
    protected $primaryKey = 'id';
    protected $fillable = [
        'date_to',
        'date_from',
        'reserved_people',
        'resource_id'
    ];

    // Reference to the related table
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    /**
     * Check if a room is available for the given time period
     * 
     * @param int $resourceId
     * @param string $date_from 
     * @param string $date_to
     * 
     * @return bool
     */
    public static function isAvailable($resourceId, $date_from, $date_to)
    {
        $result = self::where('resource_id', $resourceId)
            ->where(function ($query) use ($date_from, $date_to) {
                $query->whereBetween('date_from', [$date_from, $date_to])
                    ->orWhereBetween('date_to', [$date_from, $date_to]);
            })
            ->first();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}