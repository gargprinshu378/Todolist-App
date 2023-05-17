<?php

namespace app\Controllers;

use \core\View;
use \app\Models\Users;

/**
 * Controller class for handling user signup actions.
 */
class Signup extends \core\Controller
{

    /**
     * Action for rendering the user signup form.
     */
    public function newAction(){
        View::render('Signup/signup.php');
    }
    
    /**
     * Action for processing user signup form submission.
     */
    public function createAction(){
        $user = new Users($_POST);
        if($user->save()) {
            header('Location: /Signup/success');
        }
        else{
            View::render('Signup/signup.php',[
                'user' => $user
            ]);
        }
    }

    /**
     * Action for rendering the user signup success page.
     */
    public function successAction(){
        View::render('Signup/success.php');
    }

}
?>
