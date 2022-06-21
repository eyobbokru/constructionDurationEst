<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParamFieldOption extends Model
{
    use HasFactory;
    protected $fillable = ['name',  'value', 'param_field_id'];

    public function paramField()
    {
        return $this->belongsTo(ParamField::class);
    }
}
