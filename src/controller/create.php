<?php


class CreateController{

    private $model;

    public function __construct(CreateModel $model) {
        $this->model = $model;
    }

}