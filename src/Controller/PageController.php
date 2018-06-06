<?php

namespace Controller;
use Helper\AbstractController;
/**
 * Class PageController
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Controller
 */
class PageController extends AbstractController
{
    /**
     * @throws \Exception
     */
    public function index(): void
    {
        $data = $this->model->findAll();
        $this->view->index($data);
    }

    /**
     * @throws \Exception
     */
    public function show()
    {
        $this->view->show($this->model->find($_GET['id']));
    }

    /**
     * @throws \Exception
     */
    public function add()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST['page'];
            $id = $this->model->add($data);
            header('Location:'.KANDT_ROOT_URI.KANDT_ACTION_PARAM.'=page.show&id=' . $id);
            exit;
        }
    }

    /**
     * @throws \Exception
     */
    public function delete()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = $_POST['page'];
            $this->model->delete($data['id']);
            header('Location:index.php?a=page.index');
            exit;
        }
        $this->view->delete($this->model->find($_GET['id']));
    }

    /**
     * @throws \Exception
     */
    public function edit()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data = $_POST['page'];
            $this->model->edit($data);
            header('Location:index.php?a=page.show&id='.$data['id']);
            exit;
        }
        $this->view->edit($this->model->find($_GET['id']));
    }

}
