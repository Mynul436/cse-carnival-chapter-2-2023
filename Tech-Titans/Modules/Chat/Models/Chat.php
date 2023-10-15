<?php

namespace Modules\Chat\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'chats';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return \Modules\Chat\database\factories\ChatFactory::new();
    }
}
