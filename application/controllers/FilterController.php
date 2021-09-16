<?php

class FilterController
{
    public $action;
    public $param;
    function __construct($action, $param)
    {
        $this->action = $action;
        $this->param = $param;
        $this->$action();
    }

    public function filter()
    {
        require_once 'application/core/View.php';
        $view = new View;
        $brands = require_once 'application/config/brands.php';
        $material = require_once 'application/config/materials.php';
        $color =  require_once 'application/config/color.php';

        $param['filter_brands'] = explode(',', $brands['brands']);
        $param['filter_material_val'] = explode(',', $material['material_val']);
        $param['filter_material_text'] = explode(',', $material['material_text']);
        $param['filter_colors_val'] = explode(',', $color['color_val']);
        $param['filter_colors_text'] = explode(',', $color['color_text']);

        $view->render($this->action . 'View', $param);
    }

    public function filter_ajax()
    {
        require_once 'application/models/Filter.php';
        $filter = new Filter($this->param);
    }
}
