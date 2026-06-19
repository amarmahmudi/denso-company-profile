<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    /**
     * Tampilkan form edit profil perusahaan.
     * Jika belum ada record, buat satu record kosong.
     */
    public function edit()
    {
        $profile = CompanyProfile::first();

        // Jika belum ada data profil, buat record default
        if (!$profile) {
            $profile = CompanyProfile::create([
                'company_name' => 'DENSO Indonesia',
                'description'  => '',
                'vision'       => '',
                'mission'      => '',
            ]);
        }

        return view('admin.company-profile.edit', compact('profile'));
    }

    /**
     * Update profil perusahaan di database.
     */
    public function update(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'description'  => 'required|string',
            'vision'       => 'required|string',
            'mission'      => 'required|string',
            'address'      => 'nullable|string|max:255',
            'phone'        => 'nullable|string|max:50',
            'email'        => 'nullable|email|max:255',
        ]);

        $profile = CompanyProfile::first();
        $profile->update($request->only(
            'company_name', 'description', 'vision', 'mission',
            'address', 'phone', 'email'
        ));

        return redirect()->route('admin.company-profile.edit')
            ->with('success', 'Profil perusahaan berhasil diperbarui.');
    }
}
