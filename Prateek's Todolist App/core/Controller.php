<?php

/**
 * @file
 * Contains \core\Controller.
 *
 * Defines an abstract base class for controllers in the application.
 */

namespace core;

abstract class Controller
{
    /**
     * Route parameters.
     *
     * @var array
     */
    protected $route_params = [];

    /**
     * Constructor.
     *
     * @param array $route_params
     *   The route parameters.
     */
    public function __construct($route_params)
    {
        $this->route_params = $route_params;
    }

    /**
     * Magic method to handle method calls.
     *
     * @param string $name
     *   The method name.
     * @param array $args
     *   The method arguments.
     */
    public function __call($name, $args)
    {
        $method = $name . 'Action';

        if (method_exists($this, $method)) {
            if ($this->before() !== false) {
                call_user_func_array([$this, $method], $args);
                $this->after();
            }
        } else {
            echo "Method $method not found in controller " . get_class($this);
        }
    }

    /**
     * Callback method called before action method.
     *
     * @return mixed
     *   Return value determines if the action should be executed.
     */
    protected function before()
    {
    }

    /**
     * Callback method called after action method.
     */
    protected function after()
    {
    }
}
?>