<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Stat;
use App\Models\User;
use App\Models\Application;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        if (auth()->user()->admin) {

            // $lamaran = YourModel::find(1); // Gantilah 1 dengan ID data yang Anda inginkan
            // $formattedDate = Carbon::parse($lamaran->created_at)->format('d/m/Y');

            $institutions = Institution::all();
            $stats = Stat::all();

            $lamarans = Application::latest()->get();
            // foreach($lamarans as $lamaran) {
            //     dd($lamaran->created_at);
            //     // $lamaran->created_at = Carbon::parse($lamaran->created_at)->format('d/m/Y');
            // }
            return view('lamaran.index', ['lamarans' => $lamarans, 'stats' => $stats, 'institutions' => $institutions]);
        }
        $userId = auth()->id();
        $lamarans = Application::where('user_id', $userId)->latest()->get();
        return view('lamaran.index', ['lamarans' => $lamarans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        $institutions = Institution::all();
        $tanggalSekarang = Carbon::now()->format('d/m/Y');
        $user = auth()->user();
        $tanggal3BulanLagi = Carbon::now()->addMonths(3)->format('d/m/Y');

        return view('lamaran.create', ['tanggalSekarang' => $tanggalSekarang, 'tanggal3BulanLagi' => $tanggal3BulanLagi, 'institutions' => $institutions, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputanForm = $request->validate([
            'nama' => 'required',
            'nik' => 'required|min:16',
            'alamat' => 'required',
            'telepon' => 'required|min:12',
            'email' => 'required',
            'univ' => 'required',
            'institution_id' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
            'berkasktp' => 'required|mimes:pdf|max:10000',
            'berkasktm' => 'required|mimes:pdf|max:10000',
            'berkaspermohonan' => 'required|mimes:pdf|max:10000',
            'berkasproposal' => 'required|mimes:pdf|max:10000',
        ]);

        $user = auth()->user();

        // ktp
        $filenamektp = $user->id . '-' . uniqid() . '.pdf';
        $ktp = $request->file('berkasktp');
        Storage::putFileAs('public/ktp', $ktp, $filenamektp);

        // ktm
        $filenamektm = $user->id . '-' . uniqid() . '.pdf';
        $ktm = $request->file('berkasktm');
        Storage::putFileAs('public/ktm', $ktm, $filenamektm);

        // permohonan
        $filenamePermohonan = $user->id . '-' . uniqid() . '.pdf';
        $permohonan = $request->file('berkaspermohonan');
        Storage::putFileAs('public/permohonan', $permohonan, $filenamePermohonan);

        // proposal
        $filenameProposal = $user->id . '-' . uniqid() . '.pdf';
        $proposal = $request->file('berkasproposal');
        Storage::putFileAs('public/proposal', $proposal, $filenameProposal);

        // $newLamaran = Application::create($inputanForm);

        $keterangan = $request->input('keterangan');
        if (empty($keterangan)) {
            $keterangan = '-';
        }
        $keteranganAdmin;
        if (empty($keteranganAdmin)) {
            $keteranganAdmin = '-';
        }

        $application = new Application();
        $application->nama = $request->input('nama');
        $application->nik = $request->input('nik');
        $application->alamat = $request->input('alamat');
        $application->telepon = $request->input('telepon');
        $application->email = $request->input('email');
        $application->universitas = $request->input('univ');
        $application->institution_id = $request->input('institution_id');


        $mulaiString = $request->input('mulai');
        $application->mulai = Carbon::createFromFormat('d/m/Y', $mulaiString)->format('Y-m-d');

        $selesaiString = $request->input('selesai');
        $application->selesai = Carbon::createFromFormat('d/m/Y', $selesaiString)->format('Y-m-d');


        $application->keterangan = $keterangan;
        $application->keterangan_admin = $keteranganAdmin;
        $application->berkas_ktp = $filenamektp;
        $application->berkas_ktm = $filenamektm;
        $application->berkas_permohonan = $filenamePermohonan;
        $application->berkas_proposal = $filenameProposal;
        $application->user_id = auth()->id();
        $application->stat_id = 1;
        $application->save();

        return redirect("/lamaran/{$application->id}")->with('berhasil', 'Berhasil kirim lamaran!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $lamaran)
    {

    $lamaran->mulai = Carbon::parse($lamaran->mulai)->format('d/m/Y');
    $lamaran->selesai = Carbon::parse($lamaran->selesai)->format('d/m/Y');

        return view('lamaran.show', ['lamaran' => $lamaran, 'mulai' => $lamaran->mulai, 'selesai' => $lamaran->selesai]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $lamaran)
    {
        $stats = Stat::all();
        return view('lamaran.edit', ['lamaran' => $lamaran, 'stats' => $stats]);
    }

    public function editAll(Application $lamaran)
    {
        $institutions = Institution::all();
        return view('lamaran.editAll', ['lamaran' => $lamaran, 'institutions' => $institutions]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $lamaran)
    {
        $inputanForm = $request->validate([
            'stat' => 'required'
        ]);

        $lamaran->stat_id = $request->input('stat');
        $lamaran->keterangan_admin = $request->input('keterangan_admin');
        $lamaran->save();

        return redirect("/lamaran/{$lamaran->id}")->with('berhasil', 'Berhasil edit lamaran!');
    }

    public function updateAll(Request $request, Application $lamaran)
    {

        $inputanForm = $request->validate([
            'nama' => 'required',
            'nik' => 'required|min:16',
            'alamat' => 'required',
            'telepon' => 'required|min:12',
            'email' => 'required',
            'univ' => 'required',
            'institution_id' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
        ]);

        $lamaran->nama = $request->input('nama');
        $lamaran->nik = $request->input('nik');
        $lamaran->alamat = $request->input('alamat');
        $lamaran->telepon = $request->input('telepon');
        $lamaran->email = $request->input('email');
        $lamaran->universitas = $request->input('univ');
        $lamaran->institution_id = $request->input('institution_id');
        $lamaran->mulai = $request->input('mulai');
        $lamaran->selesai = $request->input('selesai');
        $lamaran->keterangan = $request->input('keterangan');
        $lamaran->save();

        return redirect("/lamaran/{$lamaran->id}")->with('berhasil', 'Berhasil edit lamaran!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $lamaran)
    {
        $lamaran->delete();
        return redirect('/data')->with('berhasil', 'Berhasil hapus data');
    }

    public function filter(Request $request) {
        $institutions = Institution::all();
        $stats = Stat::all();
        $lamarans = Application::all();

        $institution_filter = $request->institution_filter;
        $stat_filter = $request->stat_filter;
        $mulai_filter = $request->mulai_filter;
        $selesai_filter = $request->selesai_filter;

        if (!$request->filled('mulai_filter') && !$request->filled('selesai_filter') && !$request->filled('stat_filter') && !$request->filled('institution_filter')) {
            return redirect()->back()->with('peringatan', 'Minimal 1 filter harus diisi.');
        }


        $query = Application::query();

        if ($request->filled('mulai_filter')) {
            $mulai_filter = Carbon::createFromFormat('d/m/Y', $request->mulai_filter)->format('Y-m-d');
            $query->whereDate('created_at', '>=', $mulai_filter);
        }
    
        if ($request->filled('selesai_filter')) {
            $selesai_filter = Carbon::createFromFormat('d/m/Y', $request->selesai_filter)->format('Y-m-d');
            $query->whereDate('created_at', '<=', $selesai_filter);
        }
    
        if ($request->filled('stat_filter')) {
            $query->where('stat_id', $request->stat_filter);
        }
    
        if ($request->filled('institution_filter')) {
            $query->where('institution_id', $request->institution_filter);
        }
    
        $lamarans = $query->get();
    
        if ($lamarans->isEmpty()) {
            return redirect()->back()->with('gagal', 'Tidak ada data yang sesuai dengan filter.');
        }

        session(['lamarans' => $lamarans, 'mulai_filter' => $mulai_filter, 'selesai_filter' => $selesai_filter, 'stat_filter' => $request->stat_filter, 'institution_filter' => $request->institution_filter]);


        return redirect('/filter')->with('filter', 'Data berhasil difilter');
    }

    public function filterIndex() {
        $lamarans = session('lamarans');
        $mulai_filter = session('mulai_filter');
        if($mulai_filter == null) {
            $mulai_filter = '-';
        } else {
            $mulai_filter = Carbon::createFromFormat('Y-m-d', $mulai_filter)->format('d/m/Y');
        }

        $selesai_filter = session('selesai_filter');
        if($selesai_filter == null) {
            $selesai_filter = '-';
        } else {
            $selesai_filter = Carbon::createFromFormat('Y-m-d', $selesai_filter)->format('d/m/Y');
        }

        $stat_id = session('stat_filter');
        if($stat_id != null) {
            $stat = DB::table('stats')->where('id', $stat_id)->first();
            $stat_filter = $stat->nama;
        } else {
            $stat_filter = '-';
        }
        
        $institution_id = session('institution_filter');
        if($institution_id != null) {
            $institution = DB::table('institutions')->where('id', $institution_id)->first();
            $institution_filter = $institution->nama;
        } else {
            $institution_filter = '-';
        }

        return view('lamaran.filterIndex', ['lamarans' => $lamarans, 'mulai_filter' => $mulai_filter, 'selesai_filter' => $selesai_filter, 'stat_filter' => $stat_filter, 'institution_filter' => $institution_filter]);
    }
}
