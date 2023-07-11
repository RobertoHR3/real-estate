<?php
    namespace MVC;
    class Router {
        public $routesGet = [];
        public $routesPost = [];

        public function get($url, $fn) {
            $this->routesGet[$url] = $fn;
        }

        public function checkUrl() {
            $currentUrl = $_SERVER['PATH_INFO'] ?? '/';
            $method = $_SERVER['REQUEST_METHOD'];

            if ($method === 'GET') {
                $fn = $this->routesGet[$currentUrl] ?? null;
            }

            if ($fn) {
                call_user_func($fn, $this);
            }
        }
    }
?>
