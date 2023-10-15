<?php

namespace Modules\Chat\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;

class ChatsController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Chats';

        // module name
        $this->module_name = 'chats';

        // directory path of the module
        $this->module_path = 'chat::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\Chat\Models\Chat";
    }

}
