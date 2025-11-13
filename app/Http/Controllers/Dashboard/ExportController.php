<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\ServiceRequestExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class ExportController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // إضافة debug للتأكد من وصول الطلب
        \Log::info('Export request received', $request->all());

        if (!class_exists(ServiceRequestExport::class)) {
            \Log::error('ServiceRequestExport class not found');
            return redirect()->back()->with('error', 'model export not exist!');
        }

        try {
            // التحقق من صحة البيانات
            $validated = $request->validate([
                'export_type' => 'required|in:all,today,this_week,this_month,this_year,specific_date,date_range',
                'date' => 'nullable|date',
                'start_date' => 'nullable|date',
                'end_date' => 'nullable|date|after_or_equal:start_date',
            ]);

            \Log::info('Validation passed', $validated);

            // إعداد الفلاتر
            $filters = [
                'export_type' => $request->export_type,
            ];

            if ($request->export_type === 'specific_date' && $request->date) {
                $filters['date'] = $request->date;
            }

            if ($request->export_type === 'date_range') {
                if ($request->start_date) $filters['start_date'] = $request->start_date;
                if ($request->end_date) $filters['end_date'] = $request->end_date;
            }

            \Log::info('Filters prepared', $filters);

            // إنشاء اسم الملف
            $filename = $this->generateFilename($request->export_type, $filters);
            \Log::info('Filename generated: ' . $filename);

            // محاولة التصدير
            $export = new ServiceRequestExport($filters);
            \Log::info('Export object created');

            return Excel::download($export, $filename);
        } catch (\Exception $e) {
            \Log::error('Export failed: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());

            return redirect()->back()->with('error', 'حدث خطأ أثناء التصدير: ' . $e->getMessage());
        }
    }

    /**
     * إنشاء اسم الملف حسب نوع التصدير
     */
    private function generateFilename(string $exportType, array $filters): string
    {
        $baseFilename = 'service_requests';
        $date = Carbon::now()->format('Y-m-d');

        switch ($exportType) {
            case 'today':
                return "{$baseFilename}_today_{$date}.xlsx";

            case 'this_week':
                $weekStart = Carbon::now()->startOfWeek()->format('Y-m-d');
                $weekEnd = Carbon::now()->endOfWeek()->format('Y-m-d');
                return "{$baseFilename}_week_{$weekStart}_to_{$weekEnd}.xlsx";

            case 'this_month':
                $month = Carbon::now()->format('Y-m');
                return "{$baseFilename}_month_{$month}.xlsx";

            case 'this_year':
                $year = Carbon::now()->format('Y');
                return "{$baseFilename}_year_{$year}.xlsx";

            case 'specific_date':
                $specificDate = $filters['date'] ?? $date;
                return "{$baseFilename}_date_{$specificDate}.xlsx";

            case 'date_range':
                $startDate = $filters['start_date'] ?? $date;
                $endDate = $filters['end_date'] ?? $date;
                return "{$baseFilename}_range_{$startDate}_to_{$endDate}.xlsx";

            case 'all':
            default:
                return "{$baseFilename}_all_{$date}.xlsx";
        }
    }
}
