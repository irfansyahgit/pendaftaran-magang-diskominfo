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


class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        if (auth()->user()->admin) {
            $lamarans = Application::latest()->get();
            return view('lamaran.index', ['lamarans' => $lamarans]);
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
            'telepon' => 'required|min:10',
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
        $application->mulai = $request->input('mulai');
        $application->selesai = $request->input('selesai');
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
        return view('lamaran.show', ['lamaran' => $lamaran]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $lamaran)
    {
        $stats = Stat::all();
        return view('lamaran.edit', ['lamaran' => $lamaran, 'stats' => $stats]);
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
