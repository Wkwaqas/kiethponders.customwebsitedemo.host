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
                            <h6>Finance</h6>
                        </div>

                        @foreach ($finance as $finance_items)
                            <div class="col-md-12">
                                <a href="{{ $finance_items['link'] ?? ($finance_items['url'] ?? '#') }}" target="_blank" class="text-decoration-none text-dark">
                                    <div class="related-article-card">
                                        <img src="{{ $finance_items['thumbnail'] ?? $finance_items['image'] ?? $finance_items['urlToImage'] ?? '/frontend/assets/images/no-image-found.png' }}"
                                            onerror="this.onerror=null; this.src='/frontend/assets/images/no-image-found.png';"
                                            referrerpolicy="no-referrer"
                                            alt="{{ $finance_items['title'] ?? 'News Image' }}">
                                        <h6>{{ $finance_items['title'] ?? '' }}</h6>
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
        width: 500px !important;
    }
</style>
