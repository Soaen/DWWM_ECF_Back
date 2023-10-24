<?php

class CreateView{

    public $controller;
    public $template;

    public function __construct(CreateController $controller) {
        $this -> controller = $controller;
        $this -> template = DIR_TEMPLATE . "create.php";
    }

    public function render() {


        require($this->template);

    }

}