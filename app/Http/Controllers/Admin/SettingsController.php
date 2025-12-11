<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function index()
    {
        if (!auth()->user()->isAdminLevel()) {
            abort(403, 'Unauthorized - Admin access required');
        }

        $settings = [
            'wa_number' => Setting::getValue('wa_number', ''),
        ];

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        if (!auth()->user()->isAdminLevel()) {
            abort(403, 'Unauthorized - Admin access required');
        }

        $validated = $request->validate([
            'wa_number' => 'required|string|max:20',
        ]);

        Setting::setValue('wa_number', $validated['wa_number']);

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan berhasil diperbarui!');
    }
}