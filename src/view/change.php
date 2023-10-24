<?php

class ChangeView{

    public $controller;
    public $template;

    public function __construct(ChangeController $controller) {
        $this -> controller = $controller;
        $this -> template = DIR_TEMPLATE . "change.php";
    }

    public function render() {

        require($this->template);

    }

}