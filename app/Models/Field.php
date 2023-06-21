<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $table = 'fields';

    protected $fillable = [
        'label', 'type', 'class', 'img_url',
        'is_required', 'is_multiple', 'options'
    ];

    public function dynamicForm()
    {
        return $this->belongsTo(DynamicForm::class);
    }


}
