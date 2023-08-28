<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contributor extends Model
{
    use HasFactory;

    protected $fillable = [
        'collection_id',
        'user_name',
        'amount',
    ];

    protected $visible = [
        'id',
        'collection_id',
        'user_name',
        'amount',
    ];

    public static $rules = [
        'collection_id' => 'required|exists:collections,id',
        'user_name' => 'required|string|max:255',
        'amount' => 'required|numeric|min:1',
    ];

    /**
     * Get the target amount.
     *
     * @return Attribute
     */
    protected function amount(): Attribute
    {
        return Attribute::make(
            get: fn($amount) => $amount / 100,
            set: fn($amount) => $amount * 100,
        );
    }

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }
}
