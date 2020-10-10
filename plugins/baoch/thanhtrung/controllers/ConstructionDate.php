<?php namespace Baoch\Thanhtrung\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class ConstructionDate extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
        'Backend\Behaviors\ReorderController',
        'Backend\Behaviors\RelationController',
        'Backend\Behaviors\ImportExportController',
    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';
    public $relationConfig = 'config_relation.yaml';
    public $importExportConfig = 'config_import_export.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Baoch.Thanhtrung', 'cong-trinh');
    }
}
