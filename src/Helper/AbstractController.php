<?php
/**
 * Created by PhpStorm.
 * User: mrfvr
 * Date: 06/06/2018
 * Time: 16:40
 */

namespace Helper;
use Model\PageModel;
use View\PageView;


abstract class AbstractController
{
    /**
     * @var PageModel
     */
    protected $model;

    /**
     * @var PageView
     */
    protected $view;

    /**
     * PageController constructor.
     */
    public function __construct()
    {
        $this->model = new PageModel();
        $this->view = new PageView();
    }
}