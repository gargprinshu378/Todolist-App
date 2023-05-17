<?php

namespace core;

class View
{
    /**
     * Render a view file with optional arguments
     *
     * @param string $view The view file to render
     * @param array $args An associative array of optional arguments to pass to the view
     */
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP); // Extract the arguments into local variables

        $file = "../app/Views/$view"; // Define the file path for the view

        if (is_readable($file)) {
            require $file; // Require the view file if it's readable
        } else {
            echo "$file not found"; // Display an error message if the view file is not found
        }
    }
}
