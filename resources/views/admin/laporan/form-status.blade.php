<div class="panel-card">
    <div class="panel-card__header">
        <h2 class="panel-card__title">Update Status</h2>
    </div>
    <div class="panel-card__body">
        <form action="{{ route('admin.laporan.update', $laporan->id) }}" method="POST" enctype="multipart/form-data">
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

            <div style="margin-bottom:1.25rem;">
                <label class="admin-label">
                    Pesan untuk Siswa
                    <span style="font-weight:400;color:var(--gray-400);">(opsional, maks. 500 karakter)</span>
                </label>
                <textarea
                    name="pesan"
                    class="admin-input"
                    rows="4"
                    placeholder="Tulis pesan atau keterangan untuk siswa..."
                    style="resize:vertical;"
                    maxlength="500">{{ $laporan->aspirasi?->pesan }}</textarea>
                @error('pesan')
                    <div style="font-size:.78rem;color:#dc2626;margin-top:.3rem;">{{ $message }}</div>
                @enderror
            </div>

            <div style="margin-bottom:1.5rem;">
                <label class="admin-label">Foto Balasan (Opsional)</label>
                <input type="file" name="foto_tanggapan" accept="image/jpeg,image/png,image/jpg" style="display:block;width:100%;padding:0.5rem;border:1px solid var(--gray-200);border-radius:0.375rem;font-size:0.875rem;">
                <small style="color:var(--gray-500);font-size:0.75rem;margin-top:0.25rem;display:block;">Maksimal 2MB (JPG, JPEG, PNG)</small>
                @error('foto_tanggapan')
                    <div style="font-size:.78rem;color:#dc2626;margin-top:.3rem;">{{ $message }}</div>
                @enderror
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