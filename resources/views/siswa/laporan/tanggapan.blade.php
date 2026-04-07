<div class="detail-item">
    <div class="detail-item__label">Tanggapan</div>

    @if ($laporan->aspirasi?->status === 'selesai')
        <span class="badge-s badge-s--selesai">
            <i class="bi bi-check-circle"></i> Selesai
        </span>
    @elseif ($laporan->aspirasi?->status === 'proses')
        <span class="badge-s badge-s--proses">
            <i class="bi bi-hourglass-split"></i> Diproses
        </span>
    @else
        <span class="badge-s badge-s--menunggu">
            <i class="bi bi-clock"></i> Menunggu
        </span>
    @endif

    {{-- Pesan dari Admin --}}
    @if ($laporan->aspirasi?->pesan)
        <div style="margin-top:.875rem;background:var(--teal-50);border:1px solid var(--teal-100);border-radius:8px;padding:.75rem 1rem;">
            <div style="font-size:.72rem;font-weight:700;color:var(--teal-600);text-transform:uppercase;letter-spacing:.05em;margin-bottom:.35rem;">
                <i class="bi bi-chat-left-text"></i> Pesan dari Admin
            </div>
            <p style="font-size:.875rem;color:var(--gray-700);margin:0;line-height:1.6;">
                {{ $laporan->aspirasi->pesan }}
            </p>
        </div>
    @endif

    {{-- Tombol Hapus --}}
    <form action="{{ route('siswa.laporan.destroy', $laporan->id) }}"
          method="POST" style="display:inline;margin-left:.75rem;"
          onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-sm-s btn-sm-s--danger" style="border:none;margin-top:.875rem;">
            <i class="bi bi-trash"></i> Hapus Laporan
        </button>
    </form>
</div>
