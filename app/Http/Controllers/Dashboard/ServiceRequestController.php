<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    public function index(Request $request)
    {
        $deviceTypes = [
            'coffee_machine'   => 'ماكينة القهوة',
            'ice_machine'      => 'ماكينة الثلج',
            'air_conditioner'  => 'مكيف الهواء',
            'cooling_system'   => 'نظام التبريد',
            'washing_machine'  => 'غسالة الملابس',
            'dishwasher'       => 'غسالة الأطباق',
            'oven'             => 'الفرن',
            'mixer'            => 'الخلاط',
            'stove'            => 'الموقد',
            'other'            => 'أخرى',
        ];

        $serviceRequests = ServiceRequest::orderByDesc('id')->filter($request->all())->paginate();

        return view('dashboard.service_request.index', compact('serviceRequests', 'deviceTypes'));
    }

    public function getCount(Request $request)
    {
        try {
            $count = ServiceRequest::count();

            return response()->json([
                'success' => true,
                'count' => $count,
                'formatted_count' => number_format($count)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ في جلب العداد'
            ], 500);
        }
    }

    public function show(ServiceRequest $serviceRequest)
    {
        return view('dashboard.service_request.show', compact('serviceRequest'));
    }

    public function destroy(ServiceRequest $serviceRequest)
    {
        $serviceRequest->delete();
        return redirect()
            ->route('dashboard.service_request.index')
            ->with('success', 'تم حذف الطلب بنجاح');
    }
}
