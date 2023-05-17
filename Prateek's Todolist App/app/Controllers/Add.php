<?php

namespace app\Controllers;

use core\View;
use app\Models\Users;
use app\Mail;

/**
 * Controller class for handling task creation.
 */
class Add extends \core\Controller
{
    /**
     * Action for rendering the task creation form.
     */
    public function indexAction(){
        View::render('/Add/add.php');
    }

    /**
     * Action for handling task creation form submission.
     */
    public function createAction(){
        // Create a new Users object with POST data
        $user = new Users($_POST);

        // Try to add the task to the database
        if($user->addTask()) {
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
