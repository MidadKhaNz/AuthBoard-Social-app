<?php

namespace App\Core;

class Router {

    private array $routes = [];

    public function get(string $path, $callback): void {
        $this->routes['GET'][$path] = $callback;
    }

    public function post(string $path, $callback): void {
        $this->routes['POST'][$path] = $callback;
    }

    public function delete(string $path, $callback): void {
        $this->routes['DELETE'][$path] = $callback;
    }

    public function dispatch(string $uri, string $method): void {
        // Strip query string and extraneous slashes to get the clean path
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';
        $callback = $this->routes[$method][$path] ?? null;

        if (!$callback) {
            http_response_code(404);
            echo "<h1>404 Not Found</h1>";
            return;
        }

        // Handle controller method callbacks (e.g., [Controller::class, 'method'])
        if (is_array($callback)) {
            // Instantiate the controller
            $controller = new $callback[0]();
            $method = $callback[1];
            
            // Call the specified method on the controller instance
            echo call_user_func([$controller, $method]);
        } else {
            // Handle closure callbacks
            echo call_user_func($callback);
        }
    }
    
    /**
     * Redirects the user to a given path and halts script execution.
     *
     * @param string $path The path to redirect to.
     */
    public function redirect(string $path)
    {
        header("Location: $path");
        exit;
    }
}