<?php namespace Linkonoid\DesktopBuilder\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Construction Back-end Controller
 */
class ConstructionDate extends Controller
{
    public $implement = [
      'Backend.Behaviors.FormController',
      'Backend.Behaviors.ListController',
      'Backend.Behaviors.RelationController',
    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';
    public $relationConfig = 'config_relation.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Linkonoid.DesktopBuilder', 'Constructions');
    }
}
