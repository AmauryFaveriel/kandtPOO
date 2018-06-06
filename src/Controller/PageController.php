<?php

namespace Controller;
use Model\PageModel;
use View\PageView;

use Model\PageModel;
use View\PageView;

/**
 * Class PageController
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Controller
 */
class PageController
{
<<<<<<< HEAD
    private $model;

    private $view;

=======
    /**
     * @var PageModel
     */
    private $model;

    /**
     * @var PageView
     */
    private $view;

    /**
     * PageController constructor.
     */
>>>>>>> c54fad69b12de39333271ea54eec0ec9de786e2d
    public function __construct()
    {
        $this->model = new PageModel();
        $this->view = new PageView();
    }

<<<<<<< HEAD
    public function index()
    {
        $this->view->index($this->model->findAll());
=======
    /**
     * @throws \Exception
     */
    public function index(): void
    {
        $data = $this->model->findAll();
        $this->view->index($data);
>>>>>>> c54fad69b12de39333271ea54eec0ec9de786e2d
    }

    /**
     *
     */
    public function show()
    {
<<<<<<< HEAD
        $this->view->show($this->model->findOne($_GET['id']));
=======
//        $data = $this->model->findBySlug($slug);
        echo "Il fait show";
>>>>>>> c54fad69b12de39333271ea54eec0ec9de786e2d
    }

    /**
     *
     */
    public function add()
    {
        $this->view->add($this->model);
    }

    /**
     *
     */
    public function delete()
    {
        $this->view->delete($this->model);
    }

    /**
     *
     */
    public function edit()
    {
        $this->view->edit($this->model);
    }

}
