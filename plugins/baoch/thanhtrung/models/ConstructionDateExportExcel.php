<?php namespace Baoch\Thanhtrung\Models;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ConstructionDateExportExcel implements FromArray, WithEvents, ShouldAutoSize, WithColumnFormatting
{
    protected $filterData;

    public function __construct(array $filterData)
    {
        $this->filterData = $filterData;
    }

    public function array(): array
    {
        $data = [];

        $constructionId = $this->filterData['construction_id'];
        $from = $this->filterData['date_from'];
        $to = $this->filterData['date_to'];
        $constructionDates = ConstructionDate::where('construction_id', $constructionId)
            ->whereBetween('date', [$from, $to])
            ->get();
        if (!empty($constructionDates)) {
            $dataList = [];
            $totalThu = 0;
            $totalChi = 0;
            foreach ($constructionDates as $constructionDate) {
                $cDate = (new \DateTime($constructionDate->date))
                    ->setTimezone(new \DateTimeZone('Asia/Ho_Chi_Minh'))->format('d/m/Y');
                //
                $cdMaterials = $constructionDate->materials_pivot;
                foreach ($cdMaterials as $cdMaterial) {
                    $mPrice = $cdMaterial->pivot->custom_price * $cdMaterial->pivot->custom_amount;
                    $dataList[] = [
                        $cDate,
                        'Chi', // $cdMaterial->pivot->isPaid  == 'thu' ? 'Thu' : 'Chi',
                        $cdMaterial->pivot->description,
                        $mPrice
                    ];
//                    if ($cdMaterial->pivot->isPaid == 'thu') {
//                        $totalThu += $mPrice;
//                    } else {
//                        $totalChi += $mPrice;
//                    }
                    $totalChi += $mPrice;
                    if (!empty($cDate)) {
                        $cDate = '';
                    }
                }
                //
                $cdEmployees = $constructionDate->employees_pivot;
                foreach ($cdEmployees as $cdEmployee) {
                    $ePrice = $cdEmployee->pivot->working_hour * $cdEmployee->pivot->custom_salary;
                    $dataList[] = [
                        $cDate,
                        'Chi',
                        $cdEmployee->pivot->description,
                        $ePrice
                    ];
                    $totalChi += $ePrice;
                    if (!empty($cDate)) {
                        $cDate = '';
                    }
                }
                //
                $paidOrRecived = $constructionDate->paid_or_received;
                foreach ($paidOrRecived as $por) {
                    $dataList[] = [
                        $cDate,
                        $por['isPaid'] == 'thu' ? 'Thu' : 'Chi',
                        $por['description'],
                        $por['price']
                    ];
                    if ($por['isPaid'] == 'thu') {
                        $totalThu += $por['price'] ?? 0;
                    } else {
                        $totalChi += $por['price'] ?? 0;
                    }
                    if (!empty($cDate)) {
                        $cDate = '';
                    }
                }
            }
            // Create excel
            $construction = Construction::find($constructionId);
            $from = (new \DateTime($from))
                ->setTimezone(new \DateTimeZone('Asia/Ho_Chi_Minh'))->format('d/m/Y');
            $to = (new \DateTime($to))
                ->setTimezone(new \DateTimeZone('Asia/Ho_Chi_Minh'))->format('d/m/Y');
            $data[] = ['Tên công trình:', $construction->name, '', ''];
            $data[] = ['Khách hàng:', $construction->customer->name, '', ''];
            $data[] = ['Từ ngày:', $from, 'Tổng thu:', $totalThu];
            $data[] = ['Đến ngày:', $to, 'Tổng chi:', $totalChi];
            $data[] = ['', '', '', ''];
            $data[] = ['Ngày', 'Loại', 'Nội dung', 'Số tiền'];
            $data = array_merge($data, $dataList);

            return $data;
        }

        return [];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A6:D6')->getFont()->setBold(true);
                $event->sheet->getDelegate()->getStyle('A1:A4')->getFont()->setBold(true);
                $event->sheet->getDelegate()->getStyle('C3:C4')->getFont()->setBold(true);
            },
        ];
    }

    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_TEXT,
            'D' => '#,##',
        ];
    }


}