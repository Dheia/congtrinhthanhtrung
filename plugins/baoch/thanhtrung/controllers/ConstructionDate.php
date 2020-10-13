<?php namespace Baoch\Thanhtrung\Controllers;

use Backend\Classes\Controller;
use Backend\Facades\Backend;
use BackendMenu;
use Illuminate\Support\Facades\Session;
use Vdomah\Excel\Classes\Excel;
use Baoch\Thanhtrung\Models\ConstructionDateExportExcel;

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


    public function onExportExcel()
    {
        $optionData = post('ExportOptions');

        return Backend::redirect('baoch/thanhtrung/constructiondate/download-excel')
            ->with('export_data', $optionData);
    }

    public function downloadExcel()
    {
        $filterData = Session::get('export_data') ?? [];

        return Excel::export(new ConstructionDateExportExcel($filterData), 'excel', 'xlsx');
    }
}
