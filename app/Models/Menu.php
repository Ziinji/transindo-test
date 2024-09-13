<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['catering_id', 'name', 'description', 'price', 'photo'];

    /**
     * Get the catering that owns the menu.
     */
    public function catering()
    {
        return $this->belongsTo(Catering::class);
    }
}
