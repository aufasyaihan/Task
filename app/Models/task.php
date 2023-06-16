<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'status'
    ];
    protected $table = 'tasks';
    public $timestamp = 'false';
}