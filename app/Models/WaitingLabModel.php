<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaitingLabModel extends Model
{
    use HasFactory;

    protected $table = 'waitinglab';
    protected $primaryKey = 'idWLab';
    public $timestamps = false;
}
