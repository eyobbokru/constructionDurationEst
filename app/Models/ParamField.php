<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParamField extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'dataType', 'value', 'unit', 'sub_categories_id'];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }


    public function pramFieldsOptions()
    {
        return $this->hasMany(ParamFieldOption::class);
    }
}
