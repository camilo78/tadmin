<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Types\Like;
use Orchid\Filters\Types\Where;
use Orchid\Filters\Types\WhereDateStartEnd;

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

    protected $allowedFilters = [
        'id'         => Where::class,
        'name'       => Like::class,
        'email'      => Like::class,
        'dni'        => Like::class,
        'functional' => Like::class,
        'nominal'    => Like::class,
        'type'       => Like::class,
        'updated_at' => WhereDateStartEnd::class,
        'created_at' => WhereDateStartEnd::class,
    ];

    protected $allowedSorts = [
        'name',
        'email',
        'dni',
        'functional',
        'nominal',
        'department_id',
        'type',
        'updated_at',
        'created_at',
    ];

    public function departmets() {
    	return $this->belongsTo('App\Models\Department');
    }
}
