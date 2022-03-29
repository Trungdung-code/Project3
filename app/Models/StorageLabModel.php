<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageLabModel extends Model
{
    use HasFactory;

    protected $table = 'storagelab';
    protected $primaryKey = 'idSLab';
    public $timestamps = false;
}
