<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ECOSystem extends Authenticatable
{
    protected $table = 'eco_systems';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'play_store', 'app_store', 'logo', 'play_store_value', 'app_store_value', 'category_id', 'theme_id'
    ];

    public function category()
    {
        return $this->hasOne('App\Models\ProductCategory', 'id', 'category_id');
    }

    public function theme()
    {
        return $this->hasOne('App\Models\ProductTheme', 'id', 'theme_id');
    }
}
