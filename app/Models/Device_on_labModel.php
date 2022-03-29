<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device_on_labModel extends Model
{
    use HasFactory;

    protected $table = 'device_on_lab';
    protected $primaryKey = 'idDol';
    public $timestamps = false;
}
