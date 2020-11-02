<?php namespace Baoch\Thanhtrung\Models;

use Backend\Models\ExportModel;

/**
 * ConstructionDateExport Model
 */
class ConstructionDateExport extends ExportModel
{

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'construction_id',
        'date_from',
        'date_to'
    ];

    public function export($columns, $options)
    {
        $sessionKey = array_get($options, 'sessionKey');
        $data = $this->exportData(array_keys($columns), $sessionKey);
        $columns = [
            'ngay' => 'Ngày',
            'loai' => 'Loại',
            'noi_dung' => 'Nội dung',
            'so_tien' => 'Số tiền'
        ];
        return $this->processExportData($columns, $data, $options);
    }

    public function exportData($columns, $sessionKey = null)
    {
        $data = [];
        if ($this->construction_id && $this->date_from && $this->date_to) {
            // Do something
            $constructionId = $this->construction_id;
            $from = $this->date_from;
            $to = $this->date_to;
            $constructionDates = ConstructionDate::where('construction_id', $constructionId)
                ->whereBetween('date', [$from, $to])
                ->get();
            if (!empty($constructionDates)) {
                foreach ($constructionDates as $constructionDate){
                    $cDate = (new \DateTime($constructionDate->date))
                        ->setTimezone(new \DateTimeZone('Asia/Ho_Chi_Minh'));
                    $cDate = $cDate->format('d/m/Y');
                    //
                    $cdMaterials = $constructionDate->materials_pivot;
                    foreach ($cdMaterials as $cdMaterial) {
                        $data[] =  [
                            'ngay' => $cDate,
                            'loai' => 'Chi',
                            'noi_dung' => $cdMaterial->pivot->description,
                            'so_tien' =>  $cdMaterial->pivot->custom_price * $cdMaterial->pivot->custom_amount
                        ];
                    }
                    //
                    $cdEmployees = $constructionDate->employees_pivot;
                    foreach ($cdEmployees as $cdEmployee) {
                        $data[] =  [
                            'ngay' => $cDate,
                            'loai' => 'Chi',
                            'noi_dung' => $cdEmployee->pivot->description,
                            'so_tien' =>  $cdEmployee->pivot->working_hour * $cdEmployee->pivot->custom_salary
                        ];
                    }

                    $paidOrRecived = $constructionDate->paid_or_received;
                    foreach ($paidOrRecived as $por) {
                        $data[] =  [
                            'ngay' => $cDate,
                            'loai' => $por['isPaid'] == 'thu' ? 'Thu' : 'Chi',
                            'noi_dung' => $por['description'],
                            'so_tien' =>  $por['price']
                        ];
                    }
                }
            }
        }


        return $data;
    }

    /**
     * Function get list construction
     */
    public function getConstructionIdOptions()
    {
        //do whatever you want to do
        $result = [];
        foreach (Construction::all() as $construction) {
            $result[$construction->id] = [$construction->name];
        }
        return $result;
    }
}
