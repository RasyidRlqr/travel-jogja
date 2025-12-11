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
            'phone_number' => Setting::getValue('phone_number', ''),
            'email' => Setting::getValue('email', ''),
        ];

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        if (!auth()->user()->isAdminLevel()) {
            abort(403, 'Unauthorized - Admin access required');
        }

        $validated = $request->validate([
            'wa_number' => 'nullable|string|min:9|max:20',
            'phone_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
        ]);

        if ($request->filled('wa_number')) {
            Setting::setValue('wa_number', $validated['wa_number']);
        }
        if ($request->filled('phone_number')) {
            Setting::setValue('phone_number', $validated['phone_number']);
        }
        if ($request->filled('email')) {
            Setting::setValue('email', $validated['email']);
        }

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan berhasil diperbarui!');
    }
}