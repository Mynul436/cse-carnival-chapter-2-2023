<?php

namespace Modules\BookAppointment\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookAppointment extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'bookappointments';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\BookAppointment\database\factories\BookAppointmentFactory::new();
    }
}
