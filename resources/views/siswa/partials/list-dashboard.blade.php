<table class="siswa-table">
    <thead>
        <tr>
            <th style="width:44px;">#</th>
            <th>Laporan</th>
            <th style="width:110px;">Status</th>
            <th style="width:56px;"></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($laporan as $item)
        <tr>
            <td style="color:var(--gray-400);font-size:.8rem;">
                {{ $loop->iteration + ($laporan->firstItem() - 1) }}
            </td>
            <td>
                <div style="font-size:.875rem;color:var(--gray-700);margin-bottom:.2rem;">
                    {{ $item->ket }}
                </div>
                <div style="font-size:.75rem;color:var(--gray-400);">
                    {{ $item->created_at->format('d M Y H:i') }} WIB
                    &middot; {{ $item->kategori->nama_kategori ?? '-' }}
                    &middot; {{ $item->lokasi }}
                    @if($item->feedback)
                        &middot; Feedback: {{ $item->feedback }}
                    @endif
                </div>
            </td>
            <td>
                @php
                    $st  = $item->status ?? 'menunggu';
                    $cls = match($st) {
                        'selesai' => 'badge-s--selesai',
                        'proses'  => 'badge-s--proses',
                        default   => 'badge-s--menunggu',
                    };
                    $label = match($st) {
                        'selesai' => 'Selesai',
                        'proses'  => 'Diproses',
                        default   => 'Menunggu',
                    };
                @endphp
                <span class="badge-s {{ $cls }}">{{ $label }}</span>
            </td>
            <td>
                <a href="{{ route('siswa.laporan.show', $item->id) }}"
                   class="btn-sm-s btn-sm-s--view" title="Lihat Detail">
                    <i class="bi bi-eye"></i>
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" style="text-align:center;padding:2.5rem;color:var(--gray-400);">
                <i class="bi bi-inbox" style="font-size:1.5rem;display:block;margin-bottom:.5rem;"></i>
                Belum ada laporan
            </td>
        </tr>
        @endforelse
    </tbody>
</table>