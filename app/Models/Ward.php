<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function localbody()
    {
        return $this->belongsTo(LocalBody::class, 'localbody_id', 'id');
    }
}
