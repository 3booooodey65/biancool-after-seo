<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\ServiceRequestRequest;

class ServiceRequestController extends Controller
{
    public function index()
    {
        $deviceTypes = [
            'coffee_machine' => 'مكينة قهوة',
            'ice_machine' => 'مكينة ثلج',
            'air_conditioner' => 'مكيف هواء',
            'cooling_system' => 'نظام تبريد',
            'washing_machine' => 'غسالة ملابس',
            'dishwasher' => 'غسالة صحون',
            'oven' => 'فرن',
            'mixer' => 'عجانة',
            'stove' => 'بوتاجاز',
            'other' => 'أخرى'
        ];

        return view('website.service_requests', compact('deviceTypes'));
    }

    public function store(ServiceRequestRequest $request)
    {
        try {
            $validatedData = $request->validated();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                if ($image->isValid()) {
                    $imagePath = $image->store('service_requests', 'public');
                    $validatedData['image'] = $imagePath;
                }
            }

            $serviceRequest = ServiceRequest::create($validatedData);

            $deviceTypes = [
                'coffee_machine' => 'مكينة قهوة',
                'ice_machine' => 'مكينة ثلج',
                'air_conditioner' => 'مكيف هواء',
                'cooling_system' => 'نظام تبريد',
                'washing_machine' => 'غسالة ملابس',
                'dishwasher' => 'غسالة صحون',
                'oven' => 'فرن',
                'mixer' => 'عجانة',
                'stove' => 'بوتاجاز',
                'other' => 'أخرى'
            ];

            $deviceTypeArabic = $deviceTypes[$serviceRequest->device_type] ?? 'غير محدد';

            $check = $serviceRequest->initial_check ? '✅ نعم' : '❌ لا';

            $caption = "📩 طلب خدمة جديد: {$serviceRequest->id}\n\n"
                . "👤 الاسم: {$serviceRequest->full_name}\n"
                . "📞 الهاتف: {$serviceRequest->phone_number}\n"
                . "📍 العنوان: {$serviceRequest->address}\n"
                . "🔧 نوع الجهاز: {$deviceTypeArabic}\n"
                . "🧐 هل ترغب في فحص مبدئي؟ {$check}\n"
                . "📝 المشكلة: \n{$serviceRequest->problem_description}";


            if (!empty($serviceRequest->image)) {
                $filePath = storage_path('app/public/' . $serviceRequest->image);

                Http::attach(
                    'photo',
                    file_get_contents($filePath),
                    basename($filePath)
                )->post("https://api.telegram.org/bot" . env('TELEGRAM_BOT_TOKEN') . "/sendPhoto", [
                    'chat_id' => env('TELEGRAM_CHAT_ID'),
                    'caption' => $caption,
                ]);
            } else {
                Http::post("https://api.telegram.org/bot" . env('TELEGRAM_BOT_TOKEN') . "/sendMessage", [
                    'chat_id' => env('TELEGRAM_CHAT_ID'),
                    'text' => $caption,
                ]);
            }
            // ================================

            return redirect()->back()->with('success', 'تم إرسال طلب الخدمة بنجاح! سنتواصل معك قريباً.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput($request->except(['image']))
                ->withErrors(['error' => 'حدث خطأ أثناء إرسال الطلب. يرجى المحاولة مرة أخرى.']);
        }
    }
}
