<?php

namespace app\Controllers;

use core\View;
use app\Models\Users;
use app\Mail;

/**
 * Controller class for handling task update actions.
 */
class Update extends \core\Controller
{
    /**
     * Action for rendering the task update form.
     */
    public function indexAction(){
        $user = new Users($_POST);
        $Task_no = $_POST['Task_no'];
        $Task = $_POST['Task'];
        View::render('/Update/update.php',[
            'Task' => $Task,'Task_no' => $Task_no
        ]);
    }

    /**
     * Action for processing task update form submission.
     */
    public function createAction(){
        $user = new Users($_POST);
        var_dump($_POST);
        $Task_no = $_POST['Task_no'];
        $Task = $_POST['updateTask'];
        if($user->updateTask($Task_no,$Task)) {
            header('Location: /Display/display');
        }
        else{
            View::render('MainPage/mainpage.php',[
                'user' => $user
            ]);
        }
    }
}

