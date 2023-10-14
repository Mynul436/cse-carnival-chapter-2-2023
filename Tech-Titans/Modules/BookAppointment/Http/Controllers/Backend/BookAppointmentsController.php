<?php

namespace Modules\BookAppointment\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;

class BookAppointmentsController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'BookAppointments';

        // module name
        $this->module_name = 'bookappointments';

        // directory path of the module
        $this->module_path = 'bookappointment::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\BookAppointment\Models\BookAppointment";
    }

}
