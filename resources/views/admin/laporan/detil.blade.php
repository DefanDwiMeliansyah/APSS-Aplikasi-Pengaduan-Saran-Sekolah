<div class="panel-card">
    <div class="panel-card__header">
        <h2 class="panel-card__title">Informasi Laporan</h2>
        @php
            $st  = $laporan->aspirasi?->status ?? 'belum';
            $cls = match($st) {
                'selesai' => 'badge-status--selesai',
                'proses'  => 'badge-status--proses',
                default   => 'badge-status--belum',
            };
        @endphp
        <span class="badge-status {{ $cls }}">{{ ucfirst($st) }}</span>
    </div>
    <div class="panel-card__body">
        <table style="width:100%;border-collapse:collapse;font-size:.875rem;">
            @php
                $rows = [
                    ['label' => 'Nama Siswa', 'value' => $laporan->siswa->nama],
                    ['label' => 'NIS',        'value' => $laporan->siswa->nis],
                    ['label' => 'Kelas',      'value' => $laporan->siswa->kelas],
                    ['label' => 'Kategori',   'value' => $laporan->kategori->nama_kategori],
                    ['label' => 'Waktu Lapor','value' => $laporan->created_at->format('d M Y H:i') . ' WIB'],
                    ['label' => 'Lokasi',     'value' => $laporan->lokasi],
                    ['label' => 'Laporan',    'value' => $laporan->ket],
                ];
            @endphp
            @foreach ($rows as $row)
            <tr>
                <td style="width:140px;padding:.65rem 0;color:var(--gray-400);font-size:.8rem;font-weight:600;text-transform:uppercase;letter-spacing:.04em;vertical-align:top;border-bottom:1px solid var(--gray-100);">
                    {{ $row['label'] }}
                </td>
                <td style="padding:.65rem 0 .65rem 1rem;color:var(--gray-700);border-bottom:1px solid var(--gray-100);">
                    {{ $row['value'] }}
                </td>
            </tr>
            @endforeach
            <tr>
                <td style="width:140px;padding:.65rem 0;color:var(--gray-400);font-size:.8rem;font-weight:600;text-transform:uppercase;letter-spacing:.04em;vertical-align:top;border-bottom:1px solid var(--gray-100);">
                    Pesan Admin
                </td>
                <td style="padding:.65rem 0 .65rem 1rem;color:var(--gray-700);border-bottom:1px solid var(--gray-100);">
                    {{ $laporan->aspirasi?->pesan ?: '-' }}
                </td>
            </tr>
            <tr>
                <td style="width:140px;padding:.65rem 0;color:var(--gray-400);font-size:.8rem;font-weight:600;text-transform:uppercase;letter-spacing:.04em;vertical-align:top;">
                    Feedback
                </td>
                <td style="padding:.65rem 0 .65rem 1rem;color:var(--gray-700);">
                    {{ $laporan->feedback ?: '-' }}
                </td>
            </tr>
            <tr>
                <td style="width:140px;padding:.65rem 0;color:var(--gray-400);font-size:.8rem;font-weight:600;text-transform:uppercase;letter-spacing:.04em;vertical-align:top;">
                    Foto Pengaduan
                </td>
                <td style="padding:.65rem 0 .65rem 1rem;">
                    @if($laporan->foto_pengaduan)
                        <div style="margin-bottom:1rem;">
                            <img src="{{ asset('storage/' . $laporan->foto_pengaduan) }}" alt="Foto Pengaduan" style="max-width:100%; border-radius:8px; max-height:400px; object-fit:cover;">
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td style="width:140px;padding:.65rem 0;color:var(--gray-400);font-size:.8rem;font-weight:600;text-transform:uppercase;letter-spacing:.04em;vertical-align:top;">
                    Foto Balasan
                </td>
                <td colspan="2" style="padding-top:1rem;">
                    @if($laporan->aspirasi?->foto_tanggapan)
                        <div>
                            <img src="{{ asset('storage/' . $laporan->aspirasi->foto_tanggapan) }}" alt="Foto Balasan Admin" style="max-width:100%; border-radius:8px; max-height:400px; object-fit:cover;">
                        </div>
                    @endif
                </td>
            </tr>
        </table>
    </div>
</div>