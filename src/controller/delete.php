<?php


class DeleteController{

    private $model;

    public function __construct(DeleteModel $model) {
        $this->model = $model;
    }

}