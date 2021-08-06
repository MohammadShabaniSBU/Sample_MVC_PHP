<?php

namespace app\core;

class View {
    private $layout = "";

    private function __construct() {}

    /**
     * A method to make an instance of View
     * 
     * @return View 
     */
    public static function make() : View {
        return new View();
    }

    /**
     * A method to add the main layout to an View instance
     * 
     * @return View return the instance itself
     */
    public function addMainLayout() : View {
        $resources = App::$root . '/resources';

        ob_start();

        include App::$root . "/view/layouts/main.php";
        
        $this->layout = ob_get_clean();
        return $this;
    }

    /**
     * A method to add the template layout to an View instance
     * 
     * @return View return the instance itself
     */
    public function addTemplateLayout() : View {
        $this->layout = str_replace(
            '{{content}}', 
            file_get_contents(App::$root . "/view/layouts/template.php"),
            $this->layout
        );
        return $this;
    }

    /**
     * render the final view
     */
    public function renderView(string $viewName, array $params) : void {

        foreach ($params as $key => $value)
            $$key = $value; 

        ob_start();

        include App::$root . "/view/$viewName.php";

        $view = ob_get_clean();

        $this->layout = str_replace(
            '{{content}}', 
            $view,
            $this->layout
        );

        echo preg_replace_callback(
            "/{{([a-zA-Z_]+)}}/",
            function($matches) use ($params) {
                return $params[$matches[1]];
            },
            $this->layout
        );
    }
}