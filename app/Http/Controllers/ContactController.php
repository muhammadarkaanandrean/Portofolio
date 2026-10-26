<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:150',
            'subject' => 'required|string|max:150',
            'message' => 'required|string|max:3000',
        ]);

        // Sementara dicatat di storage/logs/laravel.log.
        // Nanti bisa diganti simpan ke database atau kirim email.
        Log::info('Pesan kontak baru', $data);

        return redirect()->to(route('home') . '#contact')
            ->with('success', 'Terima kasih! Pesan kamu sudah terkirim. 🎉');
    }
}
