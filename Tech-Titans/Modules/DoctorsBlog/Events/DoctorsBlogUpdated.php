<?php

namespace Modules\DoctorsBlog\Events;

use Illuminate\Queue\SerializesModels;
use Modules\DoctorsBlog\Models\DoctorsBlog;

class DoctorsBlogUpdated
{
    use SerializesModels;

    public $country;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(DoctorsBlog $country)
    {
        $this->country = $country;
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
