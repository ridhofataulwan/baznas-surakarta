<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;

class AdmFileController extends Controller
{
    public function listFile()
    {
        $file = File::all();
        $title = 'Daftar File';
        return view('admin.file.index', compact('file', 'title'));
    }

    public function storeFile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'file' => 'required|mimes:pdf,doc,docx,xls',
        ]);

        $file = $request->file('file');

        // Check if a file was uploaded
        if (!$file) {
            return redirect()->back()->with('error', 'File tidak ditemukan');
        }

        // Check if there were any errors in the file upload
        if ($file->getError() !== UPLOAD_ERR_OK) {
            return redirect()->back()->with('error', 'Gagal mengunggah file');
        }

        $currentDate = date('Ymd');
        $generateFilename = $request->name . '-' . uniqid() . '-' . $currentDate . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('uploads/unduhan'), $generateFilename);

        if ($validated) {
            File::insert([
                'name' => $request->name,
                'filename' => $generateFilename,
                'created_at' => now(),
            ]);
        }

        return redirect('/admin/file/')->with('success', 'File berhasil ditambahkan');
    }


    public function updateFile(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'file' => 'required|mimes:pdf,doc,docx,xls',
        ]);

        $file = $request->file('file');

        // Check if a file was uploaded
        if (!$file) {
            return redirect()->back()->with('error', 'File tidak ditemukan');
        }

        // Check if there were any errors in the file upload
        if ($file->getError() !== UPLOAD_ERR_OK) {
            return redirect()->back()->with('error', 'Gagal mengunggah file');
        }

        $currentDate = date('Ymd');
        $generateFilename = $request->name . '-' . uniqid() . '-' . $currentDate . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('uploads/unduhan'), $generateFilename);

        if ($validated) {
            $existingFile = File::findOrFail($request->id);
            $existingFilename = $existingFile->filename;

            // Delete the existing file
            unlink('uploads/unduhan/' . $existingFilename);

            // Update the file with the new filename
            $existingFile->update([
                'name' => $request->name,
                'filename' => $generateFilename,
            ]);
        }

        return redirect('/admin/file/')->with('success', 'File berhasil diupdate');
    }

    public function destroyFile($id)
    {
        $file = File::findOrFail($id);
        $filePath = public_path('uploads/unduhan/' . $file->filename);

        if (File::exists($filePath)) {
            unlink($filePath);
        }

        $file->delete();

        return redirect('/admin/file/')->with('success', 'File berhasil dihapus');
    }
}
