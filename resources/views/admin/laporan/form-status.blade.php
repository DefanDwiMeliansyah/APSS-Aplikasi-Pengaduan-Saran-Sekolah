<div class="panel-card">
    <div class="panel-card__header">
        <h2 class="panel-card__title">Update Status</h2>
    </div>
    <div class="panel-card__body">
        <form action="{{ route('admin.laporan.update', $laporan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="margin-bottom:1rem;">
                <label class="admin-label">Status Aspirasi</label>
                <select name="status" class="admin-select" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="proses"  {{ $laporan->aspirasi?->status === 'proses'  ? 'selected' : '' }}>Proses</option>
                    <option value="selesai" {{ $laporan->aspirasi?->status === 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <button type="submit" class="btn-teal" style="width:100%;justify-content:center;">
                <i class="bi bi-save"></i> Simpan Perubahan
            </button>
        </form>
    </div>
</div>

<a href="{{ route('admin.laporan.index') }}" class="btn-outline-gray"
   style="width:100%;justify-content:center;margin-top:.75rem;">
    <i class="bi bi-arrow-left"></i> Kembali ke Daftar
</a>