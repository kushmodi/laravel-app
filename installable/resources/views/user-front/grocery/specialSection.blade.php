@php
    use App\Constants\Constant;
    use App\Http\Helpers\Uploader;
    use Illuminate\Support\Facades\Auth;

@endphp
<section class="product-area product-lg-5 pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title title-center mb-50" data-aos="fade-up">
                    <h2 class="title">{{ convertUtf8($userBe->special_section_title) }}</h2>
                </div>
            </div>
            <div class="col-12" data-aos="fade-up">
                <div class="row">
                    @forelse ($special_product as $sproduct)
                        <div class="col-md-6 col-lg-4 item">
                            <div class="product text-center radius-md mb-30 item">
                                <figure class="product-img">
                                    <a href="{{ route('user.front.product.details', [getParam(), $sproduct->slug, $sproduct->product_id]) }}"
                                        target="_self" title="Link" class="lazy-container ratio ratio-2-3 bg-none">
                                        <img class="lazyload"
                                            data-src="{{ Uploader::getImageUrl(Constant::WEBSITE_PRODUCT_FEATURED_IMAGE,  $sproduct->feature_image, $userBs)}}"
                                            alt="Image">
                                    </a>
                                </figure>
                                <div class="product-details p-30">
                                    <h3 class="product-title lc-1 mb-10">
                                        <a href="{{ route('user.front.product.details', [getParam(), $sproduct->slug, $sproduct->product_id]) }}"
                                            target="_self"
                                            title="{{ convertUtf8($sproduct->title) }}">{{ convertUtf8($sproduct->title) }}</a>
                                    </h3>
                                    <div class="ratings justify-content-center mb-10">
                                        <div class="rate">
                                            <div class="rating-icon"
                                                style="width:{{ $sproduct->rating ? $sproduct->rating * 20 : 0 }}% !important">
                                            </div>
                                        </div>
                                        <span class="ratings-total">({{ $sproduct->rating }}))</span>
                                    </div>
                                    <div class="product-price mb-15">
                                        <span class="h4 new-price color-primary">
                                            {{ $userBe->base_currency_symbol_position == 'left' ? $userBe->base_currency_symbol : '' }}{{ convertUtf8($sproduct->current_price) }}{{ $userBe->base_currency_symbol_position == 'right' ? $userBe->base_currency_symbol : '' }}</span>
                                        @if (!empty(convertUtf8($sproduct->previous_price)))
                                            <span
                                                class="prev-price">{{ $userBe->base_currency_symbol_position == 'left' ? $userBe->base_currency_symbol : '' }}{{ convertUtf8($sproduct->previous_price) }}{{ $userBe->base_currency_symbol_position == 'right' ? $userBe->base_currency_symbol : '' }}</span>
                                        @endif

                                    </div>
                                    <p class="product-text">
                                        {{ convertUtf8(strlen($sproduct->summary)) > 70 ? convertUtf8(substr($sproduct->summary, 0, 70)) . '...' : convertUtf8($sproduct->summary) }}
                                    </p>
                                    <div class="mt-25">
                                        @if (in_array('Online Order', $packagePermissions))
                                        <a data-product="{{ $sproduct }}"
                                            data-href="{{ route('user.front.add.cart', [getParam(), $sproduct->id]) }}"
                                            href="{{ route('user.front.product.details', [getParam(), $sproduct->slug, $sproduct->product_id]) }}"
                                            class="cart-link btn btn-lg btn-primary" title="{{ $keywords['Add to Cart'] ?? __('Add to Cart') }}"
                                            target="_self">{{ $keywords['Add to Cart'] ?? __('Add to Cart') }}</a>
                                          @else
                                          @if (!empty(json_decode($sproduct->addons, true)) || !empty(json_decode($sproduct->variations, true)))
                                          <a data-product="{{ $sproduct }}"
                                          data-href="{{ route('user.front.add.cart', [getParam(), $sproduct->product_id]) }}"
                                          href="{{ route('user.front.product.details', [getParam(), $sproduct->slug, $sproduct->product_id]) }}"
                                          class="cart-link btn btn-lg btn-primary" title="{{ $keywords['Extras'] ?? __('Extras') }}"
                                          target="_self">{{ $keywords['Extras'] ?? __('Extras') }}</a>
                                          @endif  
                                          @endif  
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h2>{{ __('No Special Food') }}</h2>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</section>

