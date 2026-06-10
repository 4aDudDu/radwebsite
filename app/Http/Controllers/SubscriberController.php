<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        Subscriber::firstOrCreate(['email' => $request->email]);

        return back()->with('success', 'Terima kasih telah berlangganan berita kami!');
    }
}
