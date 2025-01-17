  @php
    use App\Constants\Constant;
    use App\Http\Helpers\Uploader;
    use Illuminate\Support\Facades\Auth;

@endphp
  <!-- Category-area start -->
    <section class="category-area category-2 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-center mb-50" data-aos="fade-up">
                        <h2 class="title mb-0"> {{ convertUtf8($userBs->feature_title) }}</h2>
                    </div>
                </div>
                <div class="col-12" data-aos="fade-up">
                    <div class="swiper category-slider" id="category-slider-2" data-slides-per-view="6"
                        data-swiper-loop="false">
                        <div class="swiper-wrapper">
                            @foreach ($features as $feature)
                                <div class="swiper-slide">
                                    <div class="card text-center">
                                        <div class="card-image mb-10 mx-auto">
                                            <a target="_self" title=""
                                                class="lazy-container ratio ratio-1-1 bg-none">
                                                @if (!empty($feature->image))
                                                    <img class="lazyload"
                                                        data-src="{{ Uploader::getImageUrl(Constant::WEBSITE_FEATURE_IMAGES, $feature->image, $userBs)  }}"
                                                        alt="Image">
                                                @endif
                                            </a>
                                        </div>
                                        <h4 class="card-title lc-1 mb-0"><a target="_self"
                                                title="{{ convertUtf8($feature->title) }}">{{ convertUtf8($feature->title) }}</a>
                                        </h4>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="swiper-pagination position-static mt-40" id="category-slider-2-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category-area end -->
