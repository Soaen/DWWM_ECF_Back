<?php

class DeleteView{

    public $controller;
    public $template;

    public function __construct(DeleteController $controller) {
        $this -> controller = $controller;
        $this -> template = DIR_TEMPLATE . "delete.php";
    }

    public function render() {


        require($this->template);

    }

}