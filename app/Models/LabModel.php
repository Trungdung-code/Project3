<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabModel extends Model
{
    use HasFactory;

    protected $table = 'lab';
    protected $primaryKey = 'idLab';
    public $timestamps = false;
}
