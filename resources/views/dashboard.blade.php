<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex gap-3.5 flex-col">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Anda berhasil login!") }}
                    {{"Halo " . auth()->user()->name}}
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    <h1 class="text-lg font-medium">Selamat datang di program Pendaftaran Magang</h1>
                    <p class="text-sm text-gray-600 mt-1">Sebelum mengirim lamaran magang, harap membaca dengan teliti
                        ketentuan, berkas, dan prosedur
                        terkait program magang.</p>
                    <div class="bg-gray-100 rounded-lg p-3 border-[1px] border-gray-200" x-data="{open: false}">
                        <div class="flex items-center gap-1.5 cursor-pointer" x-on:click="open = ! open">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path
                                    d="M9 17C9 17 16 18 19 21H20C20.5523 21 21 20.5523 21 20V13.937C21.8626 13.715 22.5 12.9319 22.5 12C22.5 11.0681 21.8626 10.285 21 10.063V4C21 3.44772 20.5523 3 20 3H19C16 6 9 7 9 7H5C3.89543 7 3 7.89543 3 9V15C3 16.1046 3.89543 17 5 17H6L7 22H9V17ZM11 8.6612C11.6833 8.5146 12.5275 8.31193 13.4393 8.04373C15.1175 7.55014 17.25 6.77262 19 5.57458V18.4254C17.25 17.2274 15.1175 16.4499 13.4393 15.9563C12.5275 15.6881 11.6833 15.4854 11 15.3388V8.6612ZM5 9H9V15H5V9Z"></path>
                            </svg>
                            <h1 class="text-md font-medium mb-0">Ketentuan Magang</h1>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                 class="w-5 ml-auto transition opacity-50" :class="!open ? '-rotate-90' : ''">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path fill="#111827"
                                      d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"></path>
                            </svg>
                        </div>
                        <div x-show="open" x-collapse>
                            <div class="h-[1px] bg-gray-300/50 w-full my-2.5"></div>
                            <p class="text-sm text-gray-600 mt-1 mb-0">Magang berlaku maksimal 3 bulan, dan jika ingin
                                diperpanjang, pengajuan perpanjangan izin magang diperlukan.</p>
                        </div>
                    </div>
                    <div class="bg-gray-100 rounded-lg p-3 mt-3.5 border-[1px] border-gray-200 transition-all"
                         x-data="{open: false}">
                        <div class="flex items-center gap-1.5 cursor-pointer" x-on:click="open = ! open">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path fill="#111827"
                                      d="M11 4H21V6H11V4ZM11 8H17V10H11V8ZM11 14H21V16H11V14ZM11 18H17V20H11V18ZM3 4H9V10H3V4ZM5 6V8H7V6H5ZM3 14H9V20H3V14ZM5 16V18H7V16H5Z"></path>
                            </svg>
                            <h1 class="text-md font-medium mb-0">Persyaratan Magang</h1>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                 class="w-5 ml-auto transition opacity-50" :class="!open ? '-rotate-90' : ''">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path fill="#111827"
                                      d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"></path>
                            </svg>
                        </div>
                        <div x-show="open" x-collapse>
                            <div class="h-[1px] bg-gray-300/50 w-full mb-2.5 mt-2.5"></div>
                            <p class="text-sm text-gray-600 mt-1 mb-0">Siapkan berkas persyaratan di bawah ini untuk
                                mendaftar magang:</p>
                            <ul class="flex flex-col p-0 text-sm mb-0 text-gray-700 gap-3.5 mt-3.5">
                                <li class="flex gap-0.5">
                                    <p class="font-medium mb-0 w-3.5">1.</p>
                                    <p class="mb-0">Kartu Tanda Penduduk (KTP)</p>
                                </li>
                                <li class="flex gap-0.5">
                                    <p class="font-medium mb-0 w-3.5">2.</p>
                                    <p class="mb-0">Kartu Tanda Mahasiswa (KTM) atau tanda pengenal lainnya</p>
                                </li>
                                <li class="flex flex-col gap-1.5">
                                    <div class="flex gap-0.5">
                                        <p class="font-medium mb-0 w-3.5">3.</p>
                                        <p class="mb-0">Surat permohonan/pengantar dari lembaga pendidikan atau
                                            instansi.</p>
                                    </div>
                                    <span class="bg-white/50 rounded-lg p-2 text-gray-500"><span class="font-bold">Catatan:</span> Lembaga pendidikan atau instansi dari luar Provinsi Jawa Tengah harus mengajukan rekomendasi ke Badang Kesatuan Bangsa dan Politik Provinsi Jawa Tengah melalui Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Provinsi Jawa Tengah.</span>
                                </li>
                                <li class="flex flex-col gap-1.5">
                                    <div class="flex gap-0.5">
                                        <p class="font-medium mb-0 w-3.5">4.</p>
                                        <p class="mb-0">Proposal Magang yang berisi:</p>
                                    </div>
                                    <ul class="flex flex-col gap-1.5 pl-4">
                                        <li class="flex gap-0.5">
                                            <p class="mb-0 font-medium w-3.5">a.</p>
                                            <p class="mb-0">Latar Belakang</p>
                                        </li>
                                        <li class="flex gap-0.5">
                                            <p class="mb-0 font-medium w-3.5">b.</p>
                                            <p class="mb-0">Maksud dan Tujuan</p>
                                        </li>
                                        <li class="flex gap-0.5">
                                            <p class="mb-0 font-medium w-3.5">c.</p>
                                            <p class="mb-0">Ruang Lingkup</p>
                                        </li>
                                        <li class="flex gap-0.5">
                                            <p class="mb-0 font-medium w-3.5">d.</p>
                                            <p class="mb-0">Jangka Waktu Magang</p>
                                        </li>
                                        <li class="flex gap-0.5">
                                            <p class="mb-0 font-medium w-3.5">e.</p>
                                            <p class="mb-0">Nama Peserta Magang</p>
                                        </li>
                                        <li class="flex gap-0.5">
                                            <p class="mb-0 font-medium w-3.5">f.</p>
                                            <p class="mb-0">Sasaran / Target Magang</p>
                                        </li>
                                        <li class="flex gap-0.5">
                                            <p class="mb-0 font-medium w-3.5">g.</p>
                                            <p class="mb-0">Lokasi Magang</p>
                                        </li>
                                        <li class="flex gap-0.5">
                                            <p class="mb-0 font-medium w-3.5">h.</p>
                                            <p class="mb-0">Hasil yang Diharapkan dari Magang</p>
                                        </li>
                                    </ul>
                                </li>
                                <li class="flex w-full mt-1.5 items-center gap-1.5 bg-red-100/80 p-2 rounded-lg">
                                    <span class="w-full rounded-lg">Semua berkas persyaratan 1 s.d. 4 diunggah dalam format <span
                                            class="font-bold">PDF</span>.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="bg-gray-100 rounded-lg p-3 mt-3.5 border-[1px] border-gray-200 transition-all"
                         x-data="{open: false}">
                        <div class="flex items-center gap-1.5 cursor-pointer" x-on:click="open = ! open">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path
                                    d="M8.00008 6V9H5.00008V6H8.00008ZM3.00008 4V11H10.0001V4H3.00008ZM13.0001 4H21.0001V6H13.0001V4ZM13.0001 11H21.0001V13H13.0001V11ZM13.0001 18H21.0001V20H13.0001V18ZM10.7072 16.2071L9.29297 14.7929L6.00008 18.0858L4.20718 16.2929L2.79297 17.7071L6.00008 20.9142L10.7072 16.2071Z"></path>
                            </svg>
                            <h1 class="text-md font-medium mb-0">Prosedur Magang</h1>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                 class="w-5 ml-auto transition opacity-50" :class="!open ? '-rotate-90' : ''">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path fill="#111827"
                                      d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"></path>
                            </svg>
                        </div>
                        <div x-show="open" x-collapse>
                            <div class="h-[1px] bg-gray-300/50 w-full mb-2.5 mt-2.5"></div>
                            <p class="text-sm text-gray-600 mt-1 mb-0">Berikut adalah langkah-langkah untuk memulai
                                magang Anda:</p>
                            <ul class="flex flex-col p-0 text-sm mb-0 text-gray-700 gap-3.5 mt-3.5">
                                <li class="flex gap-0.5">
                                    <p class="font-medium mb-0 w-3.5">1.</p>
                                    <p class="mb-0">Pemohon melengkapi persyaratan.</p>
                                </li>
                                <li class="flex flex-col gap-1.5">
                                    <div class="flex gap-0.5">
                                        <p class="font-medium mb-0 w-3.5">2.</p>
                                        <p class="mb-0">Pemohon memindai (men-scan) masing-masing dokumen persyaratan
                                            tersebut di atas dengan format PDF. Contoh berkas yang diunggah adalah:</p>
                                    </div>
                                    <ul class="flex flex-col gap-1.5 pl-4">
                                        <li class="flex gap-0.5">
                                            <p class="mb-0 font-medium w-3.5">a.</p>
                                            <p class="mb-0">KTP.pdf</p>
                                        </li>
                                        <li class="flex gap-0.5">
                                            <p class="mb-0 font-medium w-3.5">b.</p>
                                            <p class="mb-0">KTM.pdf</p>
                                        </li>
                                        <li class="flex gap-0.5">
                                            <p class="mb-0 font-medium w-3.5">c.</p>
                                            <p class="mb-0">PERMOHONAN.pdf</p>
                                        </li>
                                        <li class="flex gap-0.5">
                                            <p class="mb-0 font-medium w-3.5">d.</p>
                                            <p class="mb-0">PROPOSAL.pdf</p>
                                        </li>
                                    </ul>
                                </li>
                                <li class="flex gap-0.5">
                                    <p class="font-medium mb-0 w-3.5">3.</p>
                                    <p class="mb-0">Pemohon memasukkan data permohonan melalui sistem dengan alamat
                                        https://pskp.salatiga.go.id/registrasi/create dan mengunggah (upload) dokumen
                                        yang telah dipindai.</p>
                                </li>
                                <li class="flex gap-0.5">
                                    <p class="font-medium mb-0 w-3.5">4.</p>
                                    <p class="mb-0">Setelah data tersimpan, sistem akan memberikan kode berupa 6 (enam)
                                        huruf. Contoh kode yang diberikan: DHNBGW</p>
                                </li>
                                <li class="flex gap-0.5">
                                    <p class="font-medium mb-0 w-3.5">5.</p>
                                    <p class="mb-0">Badan Kesatuan Bangsa dan Politik Kota Salatiga akan berusaha
                                        menghubungi Pemohon jika permohonan disetujui, ditolak, atau hal lain yang perlu
                                        dilengkapi.</p>
                                </li>
                                <li class="flex gap-0.5">
                                    <p class="font-medium mb-0 w-3.5">6.</p>
                                    <p class="mb-0">Surat Keterangan Penelitian (SKP) akan diterbitkan setelah
                                        permohonan disetujui. Pemohon dapat menghubungi Badan Kesatuan Bangsa dan
                                        Politik Kota Salatiga di nomor telepon (0298) 325159 pesawat 328 untuk proses
                                        pengambilan SKP dan informasi lebih lanjut.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
