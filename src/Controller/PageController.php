<?php

namespace Controller;
use Model\PageModel;
use View\PageView;

/**
 * Class PageController
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Controller
 */
class PageController
{
    private $model;

    private $view;

    public function __construct()
    {
        $this->model = new PageModel();
        $this->view = new PageView();
    }

    public function index()
    {
        $this->view->index($this->model->findAll());
    }

    public function show()
    {
        $this->view->show($this->model->findOne($_GET['id']));
    }

    public function add()
    {

    }

    public function delete()
    {

    }

    public function edit()
    {

    }

}
