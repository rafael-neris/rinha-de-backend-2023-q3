<?php

declare(strict_types=1);

namespace App\Model;

use Hyperf\DbConnection\Model\Model;

/**
 */
class Person extends Model
{
    public bool $timestamps = false;

    /**
     * The table associated with the model.
     */
    protected ?string $table = 'person';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = [
        'id',
        'nick',
        'name',
        'birth',
        'stack',
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = [];
    
    protected array $attributes = [
        'stack' => '[]',
    ];
}
