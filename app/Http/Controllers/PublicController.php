<?php

namespace App\Http\Controllers;

use Illuminate\http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Link;
use Illuminate\View\View;


class PublicController extends Controller
{

public function index(): View{
        // 1. Querying data: Filter hanya record dengan status is_active = true
        $links = Link::where('is_active', true)
                     ->latest()
                     ->paginate(5);

        // 2. Render view publik dengan mengoper koleksi $links
        return view('public.index', compact('links'));
    }

    public function redirect(Link $link): RedirectResponse{
        // 1. Eksekusi Atomic Increment pada kolom 'clicks'
        $link->increment('clicks');

        // 2. Pengalihan pengguna ke URL eksternal
        return redirect()->away($link->url);
    }
    //
}
