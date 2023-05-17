<?php

namespace app\Controllers;

use core\View;
use app\Models\Users;

/**
 * Controller class for handling home page actions.
 */
class Home extends \core\Controller
{
    /**
     * Executed before the action method.
     */
    protected function before()
    {
        // echo "(before) ";
        //return false;
    }

    /**
     * Executed after the action method.
     */
    protected function after()
    {
        // echo " (after)";
    }

    /**
     * Action for rendering the home page.
     */
    public function indexAction()
    {
        View::render('Home/index.php');
    }

    /**
     * Action for processing form submission on the home page.
     */
    public function createAction(){
        $user = Users::findByEmail($_POST['Email'],$_POST['Password']);
        if($user){
            $_SESSION['Email']=$_POST['Email'];
            header('Location: /Display/display');
        }
        else{
            echo "Invalid Username or Password";
            View::render('Home/index.php');
        }
    }
}
