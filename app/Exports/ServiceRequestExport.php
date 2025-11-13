<?php

namespace App\Exports;

use App\Models\ServiceRequest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class ServiceRequestExport implements FromCollection, WithHeadings, WithMapping
{
    protected $filters;

    public function __construct(array $filters = [])
    {
        $this->filters = $filters;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $query = ServiceRequest::query();

        // تطبيق الفلاتر حسب النوع
        if (isset($this->filters['export_type'])) {
            switch ($this->filters['export_type']) {
                case 'today':
                    $query->whereDate('created_at', Carbon::today());
                    break;

                case 'this_week':
                    $query->whereBetween('created_at', [
                        Carbon::now()->startOfWeek(),
                        Carbon::now()->endOfWeek()
                    ]);
                    break;

                case 'this_month':
                    $query->whereMonth('created_at', Carbon::now()->month)
                        ->whereYear('created_at', Carbon::now()->year);
                    break;

                case 'this_year':
                    $query->whereYear('created_at', Carbon::now()->year);
                    break;

                case 'specific_date':
                    if (isset($this->filters['date'])) {
                        $query->whereDate('created_at', $this->filters['date']);
                    }
                    break;

                case 'date_range':
                    if (isset($this->filters['start_date']) && isset($this->filters['end_date'])) {
                        $query->whereBetween('created_at', [
                            $this->filters['start_date'],
                            $this->filters['end_date']
                        ]);
                    }
                    break;

                case 'all':
                default:
                    // لا يتم تطبيق أي فلتر
                    break;
            }
        }

        return $query->orderBy('created_at', 'desc')->get();
    }

    public function map($serviceRequest): array
    {
        $deviceTypes = [
            'coffee_machine' => 'ماكينة القهوة',
            'ice_machine' => 'ماكينة الثلج',
            'air_conditioner' => 'مكيف الهواء',
            'cooling_system' => 'نظام التبريد',
            'washing_machine' => 'غسالة الملابس',
            'dishwasher' => 'غسالة الأطباق',
            'oven' => 'الفرن',
            'mixer' => 'الخلاط',
            'stove' => 'الموقد',
            'other' => 'أخرى',
        ];

        return [
            $serviceRequest->id,
            $serviceRequest->full_name,
            '+966' . $serviceRequest->phone_number,
            $serviceRequest->address,
            $serviceRequest->problem_description,
            $deviceTypes[$serviceRequest->device_type] ?? 'غير محدد',
            $serviceRequest->created_at->format('Y-m-d H:i:s'),
            $serviceRequest->updated_at->format('Y-m-d H:i:s'),
        ];
    }

    /**
     * Define the headings for the exported file.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'رقم المعرف',
            'الاسم الكامل',
            'رقم الجوال',
            'العنوان',
            'وصف المشكلة',
            'نوع الجهاز',
            'تاريخ الإنشاء',
            'تاريخ التحديث',
        ];
    }
}
