<?php

namespace app\Controllers;

use core\View;
use app\Models\Users;

/**
 * Controller class for generating password.
 */
class GeneratePassword extends \core\Controller
{
    /**
     * Action for rendering the password generation page.
     */
    public function indexAction(){
        View::render('/GeneratePassword/gp.php');
    }
}
