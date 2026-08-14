@extends('layouts.master')
@section('main-content')
    <div class="container py-5">
        <div class="row">
            <!-- Featured Sidebar -->
            <div class="col-lg-4">
                <div class="sticky-sidebar">
                    <h6 class="text-dark">Featured</h6>

                    <div class="featured-article">
                        <img src="/frontend/assets/images/28akoNpUShT9ibjEvRHEIhenuo.jpg" alt="">
                        <div>
                            <small>July 15, 2025</small><br>
                            Small Businesses Seek Support in 2024
                        </div>
                    </div>

                    <div class="featured-article">
                        <img src="/frontend/assets/images/MGReaTFYzZhzbGFuVBuPIvXbky8.jpg" alt="">
                        <div>
                            <small>July 10, 2025</small><br>
                            US, Companies Address Labor Shortages
                        </div>
                    </div>

                    <div class="featured-article">
                        <img src="/frontend/assets/images/MQdRRIJaH0gQQ3cAvgyN88ouF0.jpg" alt="">
                        <div>
                            <small>July 9, 2025</small><br>
                            The Y2K Fashion Wave Returns
                        </div>
                    </div>

                    <div class="featured-article">
                        <img src="/frontend/assets/images/rfehrGw2CteuSruPZWXaqyi6M.jpg" alt="">
                        <div>
                            <small>July 5, 2025</small><br>
                            Small-Cap Stocks Shine Amid Market Optimism
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Articles -->
            <div class="col-lg-8">
                <div class="related-articles">
                    <div class="row">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6>Business</h6>
                        </div>
                        
                        @if (!empty($feedDescription))
                            <p class="text-muted small mb-4 fst-italic">
                                {{ $feedDescription }}
                            </p>
                        @endif
            
                        @foreach ($business as $business_news)
                            <div class="col-md-12 mb-4">
                                <a 
                                    href="{{ $business_news['url'] ?? '#' }}" 
                                    target="_blank" 
                                    rel="noopener noreferrer" 
                                    class="text-decoration-none text-dark"
                                >
                                    <div class="related-article-card card shadow-sm h-100">
                                        <img
                                            src="{{ $business_news['thumbnail'] ?? $business_news['image'] ?? $business_news['urlToImage'] ?? '/frontend/assets/images/no-image-found.png' }}"
                                            alt="{{ $business_news['title'] ?? 'News Image' }}"
                                            onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png';"
                                            referrerpolicy="no-referrer"
                                            loading="lazy"
                                            class="card-img-top"
                                            style="height: 220px; object-fit: cover;"
                                        >
                                        <div class="card-body d-flex flex-column">
                                            <h6 class="card-title mb-2">{{ $business_news['title'] }}</h6>
                                            
                                            <p class="card-text small text-muted flex-grow-1">
                                                {{ Str::limit($business_news['description_text'] ?? '', 400) }}
                                            </p>
                                            
                                            <!-- Author (fixed: politics_news → business_news) -->
                                            <small class="text-muted d-block mb-1">
                                                By 
                                                @if (!empty($business_news['authors']))
                                                    @php
                                                        $authorNames = collect($business_news['authors'])
                                                            ->pluck('name')
                                                            ->filter()
                                                            ->implode(', ');
                                                    @endphp
                                                    {{ $authorNames ?: 'Unknown Author' }}
                                                @else
                                                    Unknown Author
                                                @endif
                                            </small>
                                            
                                            <small class="text-muted mt-auto">
                                                {{ \Carbon\Carbon::parse($business_news['date_published'])->format('M d, Y') }}
                                            </small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .related-article-card img {
        height: unset !important;
        width: 500px;
    }
</style>
