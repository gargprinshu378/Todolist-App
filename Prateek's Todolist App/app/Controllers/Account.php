<?php

namespace app\Controllers;

use \app\Models\Users;

/**
 * Controller class for handling account-related actions.
 */
class Account extends \core\Controller
{
  /**
   * Action for validating email existence.
   */
  public function validateEmailAction()
  {
    // Check if email exists in the database
    $is_valid = !Users::emailExists($_GET['Email']);
    
    // Set response header to JSON
    header('Content-Type: application/json');
    
    // Output JSON-encoded result
    echo json_encode($is_valid);
  }
}
