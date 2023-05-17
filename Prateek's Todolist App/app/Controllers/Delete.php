<?php

namespace app\Controllers;

use core\View;
use app\Models\Users;
use app\Mail;

/**
 * Controller class for handling task deletion.
 */
class Delete extends \core\Controller
{
    /**
     * Action for handling task deletion form submission.
     */
    public function createAction(){
        // Create a new Users object
        $user = new Users();

        // Get Task_no from POST data
        $Task_no = $_POST['Task_no'];

        // Try to delete the task from the database
        if($user->deleteTask($Task_no)) {
            // Redirect to the task display page on success
            header('Location: /Display/display');
        }
        else{
            // Render the main page with error message on failure
            View::render('MainPage/mainpage.php',[
                'user' => $user
            ]);
        }
    }
}
