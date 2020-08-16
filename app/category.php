<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $appends = ['articels_count'];

    public function getArticelsCountAttribute()
    {
        return $this->articels()->where('visibility_status', 'visible')->count();
    }

    public function articels()
    {
        return $this->hasMany(Articel::class, 'category_id', 'id');
    }
}
