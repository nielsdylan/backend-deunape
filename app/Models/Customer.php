<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'last_names',
        'document_number',
        'cell_numer',
        'active',
    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

}
