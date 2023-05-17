<?php

namespace core;

class Router
{

    protected $routes = [];

    protected $params = [];

    /**
     * Add a route to the router
     *
     * @param string $route The route URL pattern
     * @param array $params The route parameters
     */
    public function add($route, $params = [])
    {
        // Convert the route to a regular expression: escape forward slashes
        $route = preg_replace('/\//', '\\/', $route);

        // Convert variables e.g. {controller}
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

        // Convert variables with custom regular expressions e.g. {id:\d+}
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

        // Add start and end delimiters, and case insensitive flag
        $route = '/^' . $route . '$/i';

        $this->routes[$route] = $params;
    }

    /**
     * Get all routes registered in the router
     *
     * @return array The routes
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * Match the given URL against registered routes
     *
     * @param string $url The URL to match
     * @return bool Whether a match is found
     */
    public function match($url)
    {
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                // Get named capture group values
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }

                $this->params = $params;
                return true;
            }
        }

        return false;
    }

    /**
     * Get the parameters from the matched route
     *
     * @return array The route parameters
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Dispatch the route to the appropriate controller and action
     *
     * @param string $url The URL to dispatch
     */
    public function dispatch($url)
    {
        $url = $this->removeQueryStringVariables($url);

        if ($this->match($url)) {
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);
            //$controller = "app\Controllers\\$controller";
            $controller = $this->getNamespace() . $controller;

            if (class_exists($controller)) {
                $controller_object = new $controller($this->params);

                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);

                if (is_callable([$controller_object, $action])) {
                    $controller_object->$action();

                } else {
                    echo "Method $action (in controller $controller) not found";
                }
            } else {
                echo "Controller class $controller not found";
            }
        } else {
            echo 'No route matched.';
        }
    }

    /**
     * Convert a string to StudlyCaps format
     *
     * @param string $string The string to convert
     * @return string The converted string
     */
    protected function convertToStudlyCaps($string)
    {
        // Remove hyphens and underscores
        $string = str_replace(['-', '_'], ' ', $string);

        // Capitalize each word and remove spaces
        $string = ucwords($string);
        $string = str_replace(' ', '', $string);

        return $string;
    }

    /**
     * Convert a string to camelCase format
     *
     * @param string $string The string to convert
     * @return string The converted string
     */
    protected function convertToCamelCase($string)
    {
        // Convert to StudlyCaps first
        $string = $this->convertToStudlyCaps($string);

        // Lowercase the first letter
        $string = lcfirst($string);

        return $string;
    }

    /**
     * Remove query string variables from the URL
     *
     * @param string $url The URL to remove query string variables from
     * @return string The URL without query string variables
     */
    protected function removeQueryStringVariables($url)
    {
        if ($url != '') {
            $parts = explode('&', $url, 2);

            if (strpos($parts[0], '=') === false) {
                $url = $parts[0];
            } else {
                $url = '';
            }
        }

        return $url;
    }

    /**
     * Get the namespace of the current controller
     *
     * @return string The namespace of the current controller
     */
    protected function getNamespace()
    {
        $namespace = 'app\Controllers\\';

        if (array_key_exists('namespace', $this->params)) {
            $namespace .= $this->params['namespace'] . '\\';
        }

        return $namespace;
    }
}

