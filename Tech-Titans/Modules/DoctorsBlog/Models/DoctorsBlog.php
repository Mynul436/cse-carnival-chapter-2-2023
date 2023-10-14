<?php

namespace Modules\DoctorsBlog\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoctorsBlog extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'doctorsblogs';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\DoctorsBlog\database\factories\DoctorsBlogFactory::new();
    }
}
