<div class="panel-card h-100">
    <div class="panel-card__header">
        <h2 class="panel-card__title">
            <i class="bi bi-graph-up-arrow me-2" style="color:var(--primary);"></i> Laporan Trending
        </h2>
    </div>
    <div class="panel-card__body--flush">
        <div class="list-group list-group-flush">
            @forelse ($laporanTrending ?? [] as $trending)
                <div class="list-group-item d-flex align-items-center justify-content-between" style="padding: 1rem 1.25rem; border-color: var(--gray-100);">
                    <div>
                        <div style="font-weight: 600; color: var(--gray-800); margin-bottom: 0.25rem;">
                            {{ $trending->kategori->nama_kategori ?? '-' }}
                        </div>
                        <div style="font-size: .85rem; color: var(--gray-500);">
                            <i class="bi bi-geo-alt" style="margin-right: 0.2rem;"></i> {{ $trending->lokasi }}
                        </div>
                    </div>
                    <div>
                        <span style="background-color: var(--primary-light, #e0e7ff); color: var(--primary, #4f46e5); padding: 0.35rem 0.75rem; border-radius: 50rem; font-size: .8rem; font-weight: 600;">
                            {{ $trending->total }} Laporan
                        </span>
                    </div>
                </div>
            @empty
                <div style="text-align: center; padding: 2rem; color: var(--gray-400);">
                    Belum ada data trending
                </div>
            @endforelse
        </div>
    </div>
</div>
