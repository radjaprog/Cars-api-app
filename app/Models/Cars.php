<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;
    protected $table = 'cars';

    protected $fillable = [
        'brand',
        'model',
        'year',
        'is_automatic',
        'engine',
        'number_of_doors',
        'max_speed',
    ];


    public function scopeSearchByBrand($query, $brand)
    {
        return $query->where('brand', 'LIKE', '%' . $brand . '%');
    }

    public function scopeSearchByModel($query, $model)
    {
        return $query->where('model', 'LIKE', '%' . $model . '%');
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    // public static function scopeSearchByBrand($term)
    // {
    //     return self::where('brand', 'LIKE', '%' . $term . '%');
    // }

    // public static function scopeSearchByModel($model)
    // {
    //     return self::where('model', 'LIKE', '%' . $model . '%');
    // }

    //     // bolji search query, od gornjeg:
    //     // public function scopeBySearchModel($query, $model)
    //     // {
    //     //     return $query->where('model', 'LIKE', '%' . $model . '%');
    //     // }

    //     //     public static function scopeSearchByModel($term)
    //     //     {
    //     //         return self::where('model', 'LIKE', '%' . $term . '%');
    //     //     }
}
