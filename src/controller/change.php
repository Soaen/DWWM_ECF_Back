<?php


class ChangeController{

    private $model;

    public function __construct(ChangeModel $model) {
        $this->model = $model;
    }

}