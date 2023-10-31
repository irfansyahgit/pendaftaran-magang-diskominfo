<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Anda berhasil login!") }}
                    {{"Halo " . auth()->user()->name}}
                </div>
            </div>
            <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
                <!-- Main-->
                <div
                        class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
                    <h4 class="mb-6 text-xl font-bold text-black dark:text-white">
                        Selamat datang di Pendaftaran Magang
                    </h4>

                    <div class="rounded-sm bg-gray-2 dark:bg-meta-4 mb-6">
                        <div class="p-2.5 xl:p-5 flex flex-col gap-2.5">
                            <h5 class="text-xl font-semibold ext-base">Ketentuan</h5>
                            <div class="w-full h-[1px] dark:bg-white bg-boxdark opacity-10"></div>
                            <p>Magang berlaku paling lama 3 (tiga) bulan dan apabila akan memperpanjang, harus
                                mengajukan
                                perpanjangan izin magang kembali.</p>
                        </div>
                    </div>

                    <!-- persyaratan -->

                    <div class="rounded-sm bg-gray-2 dark:bg-meta-4 mb-6">
                        <div class="p-2.5 xl:p-5 flex flex-col gap-2.5">
                            <h5 class="text-xl font-semibold ext-base">Persyaratan</h5>
                            <div class="w-full h-[1px] dark:bg-white bg-boxdark opacity-10"></div>
                            <div class="flex flex-col gap-2.5">
                                <div class="flex gap-2">
                                    <h1 class="">1.</h1>
                                    <p>Kartu Tanda Penduduk (KTP)</p>
                                </div>
                                <div class="flex gap-2">
                                    <h1 class="">2.</h1>
                                    <p>Kartu Tanda Mahasiswa (KTM) atau tanda pengenal lain</p>
                                </div>
                                <div class="flex gap-2">
                                    <h1 class="">3.</h1>
                                    <div class="flex flex-col gap-1.5">
                                        <p>Surat permohonan/pengantar dari lembaga pendidikan atau instansi.</p>
                                    </div>
                                </div>
                                <p class="bg-boxdark p-3 bg-opacity-5 rounded-md"><span
                                        class="font-semibold">Catatan</span>: Lembaga
                                    pendidikan atau instansi dari luar Provinsi Jawa Tengah harus mengajukan
                                    rekomendasi ke Badang Kesatuan Bangsa dan Politik Provinsi Jawa Tengah
                                    melalui Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Provinsi
                                    Jawa Tengah.</p>
                                <div class="flex gap-2">
                                    <h1 class="">4.</h1>
                                    <div class="flex flex-col gap-1.5">

                                        <p>Proposal Magang yang berisi:</p>
                                        <ul class="flex flex-col gap-1 px-3.5">
                                            <li class="flex items-center gap-1.5">
                                                <p>a.</p>
                                                <p>Latar Belakang</p>
                                            </li>
                                            <li class="flex items-center gap-1.5">
                                                <p>b.</p>
                                                <p>Maksud dan Tujuan</p>
                                            </li>
                                            <li class="flex items-center gap-1.5">
                                                <p>c.</p>
                                                <p>Ruang Lingkup</p>
                                            </li>
                                            <li class="flex items-center gap-1.5">
                                                <p>d.</p>
                                                <p>Jangka Waktu Magang</p>
                                            </li>
                                            <li class="flex items-center gap-1.5">
                                                <p>e.</p>
                                                <p>Nama Peserta Magang</p>
                                            </li>
                                            <li class="flex items-center gap-1.5">
                                                <p>f.</p>
                                                <p>Sasaran / Target Magang</p>
                                            </li>
                                            <li class="flex items-center gap-1.5">
                                                <p>g.</p>
                                                <p>Lokasi Magang</p>
                                            </li>
                                            <li class="flex items-center gap-1.5">
                                                <p>h.</p>
                                                <p>Hasil yang Diharapkan dari Magang</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <p class="bg-[#ffcccc] text-black opacity-80 p-3 rounded-md"><span
                                        class="font-semibold">Catatan</span>: Semua berkas persyaratan 1 s.d. 4
                                    diunggah
                                    dalam format PDF.
                                </p>
                            </div>
                        </div>
                    </div>


                    <!-- prosedur -->

                    <div class="rounded-sm bg-gray-2 dark:bg-meta-4">
                        <div class="p-2.5 xl:p-5 flex flex-col gap-2.5">
                            <h5 class="text-xl font-semibold ext-base">Prosedur</h5>
                            <div class="w-full h-[1px] dark:bg-white bg-boxdark opacity-10"></div>
                            <div class="flex flex-col gap-2.5">
                                <div class="flex gap-2">
                                    <h1 class="">1.</h1>
                                    <p>Pemohon melengkapi persyaratan.</p>
                                </div>
                                <div class="flex gap-2">
                                    <h1 class="">2.</h1>
                                    <div class="flex flex-col gap-1.5">

                                        <p>Pemohon memindai (men-scan) masing-masing dokumen persyaratan tersebut di
                                            atas dengan format PDF.
                                            Contoh berkas yang diunggah adalah:</p>
                                        <ul class="flex flex-col gap-1 px-3.5">
                                            <li class="flex items-center gap-2">
                                                <p>(1)</p>
                                                <p>ktp.pdf</p>
                                            </li>
                                            <li class="flex items-center gap-2">
                                                <p>(2)</p>
                                                <p>ktm.pdf</p>
                                            </li>
                                            <li class="flex items-center gap-2">
                                                <p>(3)</p>
                                                <p>permohonan.pdf</p>
                                            </li>
                                            <li class="flex items-center gap-2">
                                                <p>(4)</p>
                                                <p>proposal.pdf</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <h1 class="">3.</h1>
                                    <p>Pemohon memasukkan data permohonan melalui sistem dengan alamat
                                        https://pskp.salatiga.go.id/registrasi/create dan mengunggah (upload)
                                        dokumen yang telah dipindai.</p>
                                </div>
                                <div class="flex gap-2">
                                    <h1 class="">4.</h1>
                                    <p> Setelah data tersimpan, sistem akan memberikan kode berupa 6 (enam) huruf.
                                        Contoh kode yang diberikan: DHNBGW</p>
                                </div>
                                <div class="flex gap-2">
                                    <h1 class="">6.</h1>
                                    <p> Badan Kesatuan Bangsa dan Politik Kota Salatiga akan berusaha menghubungi
                                        Pemohon jika permohonan disetujui, ditolak, atau hal lain yang perlu
                                        dilengkapi.</p>
                                </div>
                                <div class="flex gap-2">
                                    <h1 class="">7.</h1>
                                    <p> Surat Keterangan Penelitian (SKP) akan diterbitkan setelah permohonan
                                        disetujui. Pemohon dapat menghubungi Badan Kesatuan Bangsa dan Politik Kota
                                        Salatiga di nomor telepon (0298) 325159 pesawat 328 untuk proses pengambilan
                                        SKP dan informasi lebih lanjut.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>
