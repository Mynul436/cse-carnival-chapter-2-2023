<?php

namespace Modules\DoctorsBlog\Events;

use Illuminate\Queue\SerializesModels;
use Modules\DoctorsBlog\Models\DoctorsBlog;


class DoctorsBlogViewed
{
    use SerializesModels;

    public $location;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(DoctorsBlog $location)
    {
        $this->location = $location;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
