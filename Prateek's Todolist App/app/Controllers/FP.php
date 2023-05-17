<?php

namespace app\Controllers;

use core\View;
use app\Models\Users;
use app\Mail;

/**
 * Controller class for handling forgot password functionality.
 */
class FP extends \core\Controller
{
    /**
     * Action for rendering the forgot password page.
     */
    public function indexAction(){
        View::render('/ForgotPassword/fp.php');
    }

    /**
     * Action for sending a one-time password (OTP) to the user's email.
     */
    public function sendotpAction(){
        if (isset($_POST['Email'])) {
            $this->sendPasswordReset($_POST['Email']);
        }
        View::render('/ForgotPassword/otp.php');
    }

    /**
     * Static method for sending a password reset email with OTP.
     *
     * @param string $Email The email address of the user.
     */
    public static function sendPasswordResetAction($Email) {
        $user = Users::findByEmail2($Email);
        if ($user) {
            $_SESSION['Email'] = $Email;
            $OTP = rand(100000, 999999);
            $_SESSION['OTP'] = $OTP;
            $subject = "One Time Password generated";
            $string = "Your password OTP is $OTP";
            $html = "<h1>OTP is $OTP</h1>";
            Mail::send($Email, $subject, $string, $html);
        }
        else {
            header('Location: /Signup/new.php');
        }
    }

    /**
     * Action for checking if the entered OTP matches the generated OTP.
     */
    public function checkOTPAction() {
        $var = (int)$_POST['OTP'];
        if ($_SESSION['OTP'] == $var) {
            View::render('GeneratePassword/gp.php');
            exit;
        }
        else {
            header('Location: /Home/index?error=wrong OTP');
        }
    }

    /**
     * Action for resetting the password after successful OTP verification.
     */
    public function resetAction() {
        $user = Users::updatePassword($_POST['Password']);
        if ($user) {
            $this->passwordsuccess();
            exit;
        }
        else {
            echo('Password not updated');
            header('Location: /Home/index');
            exit;
        }
    }

    /**
     * Action for rendering the password reset success page.
     */
    public function passwordsuccessAction(){
        View::render('/ForgotPassword/passwordsuccess.php');
    }
}
