<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DynamicForm extends Model
{
    use HasFactory;

    protected $table = 'dynamic_forms';

    protected $fillable = ['name', 'description','created_by'];

    public function fields()
    {
        return $this->hasMany(Field::class);
    }
}
