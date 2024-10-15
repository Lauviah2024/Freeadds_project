<?php

namespace App\Models;

// use App\Models\Scopes\Product;
// use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

// #[ScopedBy([Product::class])]
class Ads extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'image',
        'category_id',
        'user_id',
        'location',
        'status',
    ];

    /**
     * Get the categorie associated with the Ads
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categorie(): HasOne
    {
        return $this->hasOne(Categorie::class, 'id');
    }

    /**
     * Get the user associated with the Ads
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id');
    }
}
