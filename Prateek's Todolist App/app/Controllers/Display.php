<?php

namespace app\Controllers;

use core\View;
use app\Models\Users;

/**
 * Controller class for displaying tasks.
 */
class Display extends \core\Controller
{
    /**
     * Action for displaying tasks.
     */
    public function displayAction(){
        // Create a new Users object
        $var = new Users();
        
        // Get tasks from the database
        $dis = $var->displayTask();
        
        // Render the main page with tasks if available, otherwise render the main page without tasks
        if($dis){
            View::render('MainPage/mainpage.php',[
                'dis'=>$dis
            ]);
        }
        else{
            View::render('MainPage/mainpage.php');
        }
    }
}
