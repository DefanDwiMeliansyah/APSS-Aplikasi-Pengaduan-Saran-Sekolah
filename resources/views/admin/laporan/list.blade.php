<table class="admin-table">
    <thead>
        <tr>
            <th>No</th>
            <th>Siswa</th>
            <th>Kategori</th>
            <th>Laporan</th>
            <th>Status</th>
            <th>Feedback</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($laporan as $item)
        <tr>
            <td style="color:var(--gray-400);font-size:.8rem;">
                {{ $loop->iteration + $laporan->firstItem() - 1 }}
            </td>
            <td style="font-weight:500;">{{ $item->siswa->nama ?? '-' }}</td>
            <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
            <td style="color:var(--gray-500);max-width:220px;">{{ Str::limit($item->ket, 50) }}</td>
            <td>
                @php
                    $st = $item->status ?? 'belum';
                    $cls = match($st) {
                        'selesai' => 'badge-status--selesai',
                        'proses'  => 'badge-status--proses',
                        default   => 'badge-status--belum',
                    };
                @endphp
                <span class="badge-status {{ $cls }}">{{ ucfirst($st) }}</span>
            </td>
            <td style="color:var(--gray-500);">{{ $item->feedback }}</td>
            <td>
                <a href="{{ route('admin.laporan.show', $item->id) }}" class="btn-sm-action btn-sm-action--primary">
                    <i class="bi bi-eye"></i> Detail
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" style="text-align:center;padding:2.5rem;color:var(--gray-400);">
                Tidak ada data laporan
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
