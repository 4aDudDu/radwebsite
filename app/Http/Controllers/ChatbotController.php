<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $message = $request->input('message');
        $apiKey = env('OPENAI_API_KEY');

        if (!$apiKey) {
            return response()->json(['reply' => 'Maaf, kunci API OpenAI belum dikonfigurasi.']);
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ])->timeout(30)->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'Kamu adalah AI Assistant resmi dari RiauAktifdigital (RADNEWS), portal berita terkini dan terpercaya. Jawablah dengan ramah, profesional, ringkas, dan berbahasa Indonesia. Jangan terlalu panjang, berikan jawaban singkat yang langsung pada intinya.'
                    ],
                    [
                        'role' => 'user',
                        'content' => $message
                    ]
                ],
                'temperature' => 0.7,
                'max_tokens' => 150,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $reply = $data['choices'][0]['message']['content'] ?? 'Maaf, saya tidak mengerti.';
                return response()->json(['reply' => $reply]);
            }

            $errorData = $response->json();
            if (isset($errorData['error']['code']) && $errorData['error']['code'] === 'insufficient_quota') {
                return response()->json(['reply' => 'Maaf, kuota API Key OpenAI Anda saat ini sedang habis. Silakan top-up saldo Anda terlebih dahulu.']);
            }

            Log::error('OpenAI API Error: ' . $response->body());
            return response()->json(['reply' => 'Maaf, layanan chatbot sedang mengalami gangguan.'], 500);

        } catch (\Exception $e) {
            Log::error('Chatbot Exception: ' . $e->getMessage());
            return response()->json(['reply' => 'Maaf, terjadi kesalahan pada server chatbot.'], 500);
        }
    }
}
