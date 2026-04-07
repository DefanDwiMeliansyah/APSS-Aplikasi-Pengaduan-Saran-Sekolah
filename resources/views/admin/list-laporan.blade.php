<div class="panel-card">
    <div class="panel-card__header">
        <h2 class="panel-card__title">Laporan Terbaru</h2>
        <a href="{{ route('admin.laporan.index') }}" class="btn-sm-action btn-sm-action--primary">
            Lihat Semua <i class="bi bi-arrow-right"></i>
        </a>
    </div>
    <div class="panel-card__body--flush">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Siswa</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($laporanTerbaru ?? [] as $item)
                    <tr>
                        <td style="color:var(--gray-400);font-size:.8rem;">{{ $loop->iteration }}</td>
                        <td style="font-weight:500;">{{ $item->siswa->nama ?? '-' }}</td>
                        <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                        <td>
                            @php
                                $st = $item->aspirasi?->status ?? 'belum';
                                $cls = match($st) {
                                    'selesai' => 'badge-status--selesai',
                                    'proses'  => 'badge-status--proses',
                                    default   => 'badge-status--belum',
                                };
                            @endphp
                            <span class="badge-status {{ $cls }}">{{ ucfirst($st) }}</span>
                        </td>
                        <td style="color:var(--gray-400);font-size:.82rem;">
                            {{ $item->created_at->format('d M Y') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align:center;padding:2rem;color:var(--gray-400);">
                            Belum ada laporan
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>