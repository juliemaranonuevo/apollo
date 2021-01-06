<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Random extends Model
{
    use HasFactory;

    protected $table = 'randoms';

    protected $fillable = [
        'values',
        'flag'
    ];

    public function breakdown()
    {
        return $this->hasMany(Breakdown::class);
    }
}
