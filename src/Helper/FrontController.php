<?php

namespace Helper;

use Controller\PageController;

/**
 * Class FrontController
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Controller
 */
class FrontController
{
    /**
     * FrontController constructor.
     */
    public function __construct()
    {
        $action = $_POST[\KANDT_ACTION_PARAM] ?? $_GET[\KANDT_ACTION_PARAM] ?? '';
        switch ($action) {
            case "page.show":
                // display page details
                $controller = new PageController();
                $controller->show();
                break;

            case "page.add":
<<<<<<< HEAD:src/Controller/FrontController.php
                $controller = new PageController();
                $controller->add();
                break;

            case "page.delete":
                $controller = new PageController();
                $controller->delete();
                break;

            case "page.edit":
                $controller = new PageController();
                $controller->edit();
=======
                break;

            case "page.delete":
                break;

            case "page.edit":
>>>>>>> c54fad69b12de39333271ea54eec0ec9de786e2d:src/Helper/FrontController.php
                break;

            case "page.index":
            default:
                // display page list
                $controller = new PageController();
                $controller->index();
                break;
        }
    }


}
