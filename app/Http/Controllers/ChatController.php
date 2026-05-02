<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'history' => 'nullable|array',
        ]);

        $apiKey = env('GEMINI_API_KEY');
        // Upgrading to Gemini 2.0 Flash as requested
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key={$apiKey}";

        $systemInstruction = "You are CompuBot, AI assistant for Computronix SARL, Lebanon. 
        OUR PRODUCTS:
        1. Alpha POS System (555$): A complete business solution with HP i5 8/256, 22\" Screen, and all peripherals.
        2. Software special offer (500$): Full Alpha Soft license + setup.
        3. Massive Laptop Inventory:
           - Lenovo: i5 13th Gen (8/512GB SSD), i7 13th Gen (16/512GB SSD), i7 8th Gen (8/512GB), i7 (8/256GB SSD), Celeron (8/256GB), ThinkPad T490 i5 8th Gen (8/256GB), ThinkPad T450s i5 6th Gen (8/256GB), ThinkPad T490s i5 8th Gen (8/256GB).
           - HP: Victus i5 13th Gen (8/512GB SSD, RTX 3050 6GB), i5 (4/512GB HDD), Mini Laptop i5 8th Gen (8/128GB), i5 8th Gen (16/512GB), EliteBook i5 8th Gen (8/256GB).
           - Dell: i5 7th Gen (8/256GB), i5 8th Gen (8/256GB), Core 2 Duo (4/256GB), Latitude 3420 i5 11th Gen (16/512GB), Latitude 5480 i7 6th Gen (8/256GB), Latitude 5540 i5 4th Gen (4/256GB), Precision 3510 i5 8th Gen (8/256GB, 2GB VGA), Precision 3530 i7 8th Gen (16/256GB, 4GB VGA), Latitude i5 6th Gen (8/256GB), Latitude 5410 i5 10th Gen (16/256GB).
           - Sony: i5 (4GB/HDD), i5 (6GB/2TB HDD).
           - Toshiba: Pentium (3/512GB HDD), Pentium (4/500GB HDD), Celeron (4/256GB SSD), i7 5th Gen (8/256GB, 2GB VGA), i5 8th Gen (8/256GB).
           - ASUS: i7 7th Gen (16/128GB SSD + 1TB HDD, GTX 1050 4GB).
           - Surface: i7 6th Gen (8/256GB).
           - Life: Intel Inside (4/128GB HDD).
        4. Services: Motherboard/screen repairs, Networking, CCTV.
        
        GUIDANCE: 
        - When someone asks for a laptop, give them specific models from the list above based on their needs (gaming, study, budget). 
        - Always mention the 'Laptops' page for more photos and details.
        - Encourage them to message us on WhatsApp (03 243 504) for the best price.";

        $contents = [];

        if ($request->history) {
            $history = array_slice($request->history, -6);
            foreach ($history as $msg) {
                if (!isset($msg['role']) || !isset($msg['content'])) continue;
                $role = ($msg['role'] === 'user') ? 'user' : 'model';
                if (!empty($contents) && end($contents)['role'] === $role) continue;
                $contents[] = ['role' => $role, 'parts' => [['text' => $msg['content']]]];
            }
        }

        if (!empty($contents) && end($contents)['role'] === 'user') {
            array_pop($contents);
        }

        $contents[] = ['role' => 'user', 'parts' => [['text' => $request->message]]];

        try {
            $response = Http::post($url, [
                'system_instruction' => ['parts' => [['text' => $systemInstruction]]],
                'contents' => $contents,
                'generationConfig' => ['temperature' => 0.6, 'maxOutputTokens' => 400]
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $reply = $data['candidates'][0]['content']['parts'][0]['text'] ?? null;
                if ($reply) return response()->json(['reply' => $reply]);
            }

            // SMART STATIC FALLBACK if API is busy
            $msg = strtolower($request->message);

            // 1. Specific HP / 555 inquiry
            if (str_contains($msg, '555') || str_contains($msg, 'hp i5')) {      
                return response()->json(['reply' => "Our Alpha POS System bundle (555$) includes a high-performance HP Core i5 system, 22\" monitor, and full accessories!"]);
            }

            // 2. Study / CS / Student laptop inquiry
            if (str_contains($msg, 'study') || str_contains($msg, 'student') || str_contains($msg, 'computer science') || str_contains($msg, 'cs')) {
                return response()->json(['reply' => "For Computer Science or engineering studies, we recommend a laptop with at least 16GB RAM and an i7 processor for smooth coding. Visit us at our Ksara shop or message us on WhatsApp so we can show you our current student deals!"]);
            }

            // 3. Gaming Laptops inquiry
            if (str_contains($msg, 'gaming')) {
                return response()->json(['reply' => "We have a great selection of Gaming Laptops with dedicated RTX graphics. Tell us your favorite games on WhatsApp and we will find the perfect machine for you!"]);
            }

            // 4. General POS/System inquiry
            if (str_contains($msg, 'pos') || str_contains($msg, 'system')) {
                return response()->json(['reply' => "Our Alpha POS System is a complete business engine. We have bundles for 555$ or a software-only offer for 500$. Which would you like to know more about?"]);
            }

            return response()->json(['reply' => "CompuBot here! I can help you with laptop recommendations for your studies, POS system details, or repair quotes. What's on your mind?"]);


        } catch (\Exception $e) {

            Log::error("ChatController Exception: " . $e->getMessage());
            return response()->json(['reply' => "I'm having a quick technical update. Please contact us at +961 3 243 504 for immediate support!"]);
        }
    }
}
