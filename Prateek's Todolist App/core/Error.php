<?php

/**
 * @file
 * Contains \Core\Error.
 *
 * Defines a class for error handling in the application.
 */

namespace Core;

class Error
{
    /**
     * Error handler function.
     *
     * @param int $level
     *   The error level.
     * @param string $message
     *   The error message.
     * @param string $file
     *   The file in which the error occurred.
     * @param int $line
     *   The line number at which the error occurred.
     *
     * @throws \ErrorException
     *   Throws an ErrorException with the provided error details.
     */
    public static function errorHandler($level, $message, $file, $line)
    {
        if (error_reporting() !== 0) {
            throw new \ErrorException($message, 0, $level, $file, $line);
        }
    }

    /**
     * Exception handler function.
     *
     * @param \Exception $exception
     *   The exception object.
     */
    public static function exceptionHandler($exception)
    {
        $code = $exception->getCode();
        if ($code != 404) {
            $code = 500;
        }
        http_response_code($code);
        if (\App\Config::SHOW_ERRORS) {
            echo "<h1>Fatal error</h1>";
            echo "<p>Uncaught exception: '" . get_class($exception) . "'</p>";
            echo "<p>Message: '" . $exception->getMessage() . "'</p>";
            echo "<p>Stack trace:<pre>" . $exception->getTraceAsString() . "</pre></p>";
            echo "<p>Thrown in '" . $exception->getFile() . "' on line " . $exception->getLine() . "</p>";
        } else {
            $log = dirname(__DIR__) . '/logs/' . date('Y-m-d') . '.txt';
            ini_set("log_errors", 1);
            ini_set('error_log', $log);

            $message = "Uncaught exception: '" . get_class($exception) . "'";
            $message .= " with message '" . $exception->getMessage() . "'";
            $message .= "\nStack trace: " . $exception->getTraceAsString();
            $message .= "\nThrown in '" . $exception->getFile() . "' on line " . $exception->getLine();

            error_log($message);

            if ($code == 404) {
                echo "<h1>Page not found</h1>";
            } else {
                echo "<h1>An error occurred</h1>";
            }
        }
    }
}