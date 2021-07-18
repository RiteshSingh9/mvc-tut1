<?php
class Controller
{
    var $vars = [];
    var $layout = "default";

    function set($d)
    {
        /**
         * Merge all data we want to pass to view
         */
        $this->vars = array_merge($this->vars, $d);
    }

    function render($filename)
    {
        /**
         * It's going to import the data with the method extract and then load the layout requested in the Views directory.
         */

        extract($this->vars); // The extract() function imports variables into the local symbol table from an array. see https://www.w3schools.com/php/func_array_extract.asp
        
        ob_start(); // creates output buffer see https://www.w3schools.com/php/ref_output_ob_start.asp
        // stores the value in buffer and not show it on ;

        require(ROOT . "Views/" . ucfirst(str_replace('Controller', '', get_class($this))) . '/' . $filename . '.php');
        // get_class() return the name of class of given object

        $content_for_layout = ob_get_clean(); // clear output buffer

        if ($this->layout == false) {
            $content_for_layout;
        } else {
            require(ROOT . "Views/Layouts/" . $this->layout . '.php');
        }
    }

    private function secure_input($data)
    {
        /**
         * 
         * secures the provided data 
         * convert html to speacial characters
         * 
         */
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    protected function secure_form($form)
    {
        // secures the form data 
        /**
         * takes form and secures data one by one 
         */
        foreach ($form as $key => $value) {
            $form[$key] = $this->secure_input($value);
        }
    }
}
