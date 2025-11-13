<?php
// app/Models/ServiceRequest.php
namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceRequest extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceRequestFactory> */
    use HasFactory, Filterable;

    protected $fillable = [
        'full_name',
        'phone_number',
        'address',
        'problem_description',
        'device_type',
        'image',
        'initial_check'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Define the device types as a constant for reuse
    public const DEVICE_TYPES = [
        'coffee_machine' => 'Coffee Machine',
        'ice_machine' => 'Ice Machine',
        'air_conditioner' => 'Air Conditioner',
        'cooling_system' => 'Cooling System',
        'washing_machine' => 'Washing Machine',
        'dishwasher' => 'Dishwasher',
        'oven' => 'Oven',
        'mixer' => 'Mixer',
        'stove' => 'Stove',
        'other' => 'Other'
    ];

    // Accessor for human-readable device type
    public function getDeviceTypeNameAttribute(): string
    {
        return self::DEVICE_TYPES[$this->device_type] ?? 'Unknown';
    }

    public static function getTotalCount(): int
    {
        return self::count();
    }
}
