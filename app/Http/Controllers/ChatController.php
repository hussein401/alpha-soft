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
        3. Laptop Sales: We carry a wide range of laptops for students (CS/Engineering), business, and gaming.
        4. Services: Motherboard/screen repairs, Networking, CCTV.
        
        GUIDANCE: 
        - If someone asks for a laptop for studies (like Computer Science) or gaming, recommend they visit us for the latest specs or contact us on WhatsApp for a personalized quote.
        - Only refer to the 555$ bundle as the 'Alpha POS System'.";

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
