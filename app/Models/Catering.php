<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catering extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'contact', 'description'];

    /**
     * Get the menus for the catering.
     */
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
