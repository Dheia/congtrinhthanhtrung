<?php namespace Baoch\Thanhtrung\Controllers;

use Backend\Classes\Controller;
use Backend\Facades\Backend;
use Baoch\Thanhtrung\Models\MaterialImport;
use Vdomah\Excel\Classes\Excel;
use BackendMenu;

class Material extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Baoch.Thanhtrung', 'cong-trinh', 'material');
    }

    public function onImportMaterialExcel()
    {
         Excel::import(new MaterialImport, request()->file('file-upload'));
         return Backend::redirect('baoch/thanhtrung/material');
    }

}