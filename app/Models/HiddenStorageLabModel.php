<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HiddenStorageLabModel extends Model
{
    use HasFactory;

    protected $table = 'storagelab';
    protected $primaryKey = 'idSLab';
    public $timestamps = false;
}
