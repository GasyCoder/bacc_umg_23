<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Exports\ExportData;
use App\Jobs\FileImportJob;
use Illuminate\Http\Request;
use App\Imports\CandidateImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Redirect;

class ImportController extends Controller
{
    public function data()
    {
        return view('data.import');
    }

    public function export()
    {
        if (Candidate::count() === 0) {
            return Redirect::back()->with('error', 'Impossible d\'exporter. Aucun candidat disponible.');
        }

        return Excel::download(new ExportData, 'candidat.xlsx');
    }

    public function import(Request $request)
    {
        Schema::disableForeignKeyConstraints();

        try {
        $sheet = $request->file('file')->store('file');
        //Excel::import(new FileImportJob, $sheet);
        Queue::push(new FileImportJob($sheet));
        session()->flash('success', 'Importation is Done.'); // Notify that the import started
        } catch (\Exception $e) {
            session()->flash('error', 'Une erreur s\'est produite lors de l\'importation du fichier.');
        } finally {
            Schema::enableForeignKeyConstraints();
        }
        return redirect()->to('/panel');

        // try {
        //     $file = $request->file('file');
        //     $path = $file->path(); // Get the file path

        //     // Queue the import job
        //     Queue::push(new FileImportJob($path));
        //     session()->flash('success', 'Importation is Done.'); // Notify that the import started
        // } catch (\Exception $e) {
        //     session()->flash('error', 'Une erreur s\'est produite lors de l\'importation du fichier.');
        // } finally {
        //     Schema::enableForeignKeyConstraints();
        // }

        // return redirect()->to('/panel');

    }

    public function restoreData()
    {
        if (DB::table('candidates')->count() === 0) {
            return Redirect::back()->with('error', 'Aucune donnée à restaurer ici.');
        }

        DB::table('candidates')->truncate();

        session()->flash('success', 'Toutes les données des candidats ont été restaurées.');

        return redirect()->to('/panel');
    }
}