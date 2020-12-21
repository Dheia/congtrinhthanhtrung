<?php namespace Baoch\Thanhtrung\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Illuminate\Support\Facades\Input;

class Storage extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
        'Backend\Behaviors\RelationController'
    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $relationConfig = 'config_relation.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Baoch.Thanhtrung', 'cong-trinh', 'storage');
    }

    public function onRelationButtonRemove($id) {
        $input = Input::all();
        if (!empty($input['_relation_field']) && $input['_relation_field'] == 'materials_pivot') {
            $storage = \Baoch\Thanhtrung\Models\Storage::find($id);
            foreach (array_unique($input['checked']) as $v) {
                $materials = $storage->materials()->where('id', $v)->get();
                foreach ($materials as $material) {
                    $material->total -= $material->pivot->amount;
                    $material->save();
                }
            }
        }

        return $this->onRelationManageRemove();
    }
}
