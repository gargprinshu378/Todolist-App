<?php

namespace app\Controllers;

use core\View;
use app\Models\Users;
use app\Mail;

/**
 * Controller class for handling status actions.
 */
class Status extends \core\Controller
{
    public function createAction(){
        $user = new Users($_POST);
        $Task_no = $_POST['Task_no'];
        $Status = $_POST['Status'];
        var_dump($_POST);
        if($user->Status($Task_no,$Status)) {
            header('Location: /Display/display');
        }
        else{
            View::render('MainPage/mainpage.php',[
                'user' => $user
            ]);
        }
    }
}