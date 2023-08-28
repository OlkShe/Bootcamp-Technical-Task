<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'target_amount',
        'link',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static array $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'target_amount' => 'required|numeric|min:1',
        'link' => 'required|string|url',
    ];

    /**
     * Get the target amount.
     *
     * @return Attribute
     */
    protected function targetAmount(): Attribute
    {
        return Attribute::make(
            get: fn($target_amount) => $target_amount / 100,
            set: fn($target_amount) => $target_amount * 100,
        );
    }

    public function contributors(): HasMany
    {
        return $this->hasMany(Contributor::class);
    }
}
