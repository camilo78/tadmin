<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;
use Orchid\Attachment\Attachable;

class Employee extends Model
{
    use HasFactory, AsSource, Filterable, Attachable;

    protected $fillable = [
        'name',
        'email',
        'dni',
        'functional',
        'nominal',
        'department_id',
        'type',
    ];
    public function departmets() {
    	return $this->belongsTo('App\Models\Department');
    }
}
