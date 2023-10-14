<?php

namespace Modules\DoctorsBlog\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;

class DoctorsBlogsController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'DoctorsBlogs';

        // module name
        $this->module_name = 'doctorsblogs';

        // directory path of the module
        $this->module_path = 'doctorsblog::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\DoctorsBlog\Models\DoctorsBlog";
    }

}
