<?php
    namespace MVC;
    class Router {
        public $urlGet = [];
        public $urlPost = [];

        public function get($url, $fn) {
            $this->urlGet[$url] = $fn;
        }

        public function checkUrl() {
            $currentUrl = $_SERVER['PATH_INFO'] ?? '/';
            $method = $_SERVER['REQUEST_METHOD'];

            if ($method === 'GET') {
                $fn = $this->urlGet[$currentUrl] ?? null;
            }

            if ($fn) {
                //The url exist and there is an associated function
                call_user_func($fn, $this);
            } else {
                echo "Page Not Found";
            }
            
        }

        //Show a view
        public function render($view) {
            include __DIR__ . "/views/$view.php";
        }
    }
?>