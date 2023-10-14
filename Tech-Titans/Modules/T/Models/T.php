<?php

namespace Modules\T\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class T extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'ts';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\T\database\factories\TFactory::new();
    }
}
