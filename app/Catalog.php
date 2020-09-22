<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    public function sub_catalogs()
    {
        return $this->hasMany(Catalog::class, 'parent_catalog_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'catalog_id');
    }
}
