<div class="detail-item">
    <div class="detail-item__label">Feedback Kepuasan</div>

    @if ($laporan->aspirasi->feedback)
        {{-- Sudah memberi feedback --}}
        <div style="background:#f0fdf4;border:1px solid #bbf7d0;border-radius:8px;padding:.75rem 1rem;font-size:.875rem;color:#166534;display:flex;align-items:center;gap:.5rem;">
            <i class="bi bi-check-circle"></i>
            Feedback kamu:
            <strong>
                {{ [1=>'Tidak Puas',2=>'Kurang Puas',3=>'Cukup Puas',4=>'Puas',5=>'Sangat Puas'][$laporan->aspirasi->feedback] ?? '-' }}
            </strong>
        </div>
    @else
        {{-- Belum memberi feedback --}}
        <form action="{{ route('siswa.laporan.feedback', $laporan->aspirasi->id) }}" method="POST">
            @csrf

            <div class="feedback-options" style="margin-bottom:1rem;">
                @foreach([1=>'Tidak Puas',2=>'Kurang Puas',3=>'Cukup Puas',4=>'Puas',5=>'Sangat Puas'] as $val => $text)
                <label class="feedback-option">
                    <input type="radio" name="feedback" value="{{ $val }}">
                    <span>{{ $text }}</span>
                </label>
                @endforeach
            </div>

            @error('feedback')
            <div style="font-size:.78rem;color:#dc2626;margin-bottom:.75rem;">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn-primary-s">
                <i class="bi bi-send"></i> Kirim Feedback
            </button>
        </form>
    @endif
</div>