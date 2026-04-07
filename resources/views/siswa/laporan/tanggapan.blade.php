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

    {{-- Tombol Hapus --}}
    <form action="{{ route('siswa.laporan.destroy', $laporan->id) }}"
          method="POST" style="display:inline;margin-left:.75rem;"
          onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-sm-s btn-sm-s--danger" style="border:none;">
            <i class="bi bi-trash"></i> Hapus Laporan
        </button>
    </form>
</div>
