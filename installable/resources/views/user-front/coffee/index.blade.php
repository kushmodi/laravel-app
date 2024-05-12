@php
    use App\Constants\Constant;
    use App\Http\Helpers\Uploader;
    use Illuminate\Support\Facades\Auth;

@endphp
@extends('user-front.layout')
@section('pageHeading')
    {{ $keywords['Home'] ?? __('Home') }}
@endsection
@section('style')
    @include('user-front.coffee.include.coffee_css')
@endsection
@section('content')
    <!--===Start Hero Section====--->
    @includeIf('user-front.coffee.heroSeaction')

    <!---===End Hero Section ==-->

    <!---Start Intro Section--->
    @if ($userBs->intro_section == 1)
        @includeIf('user-front.coffee.introSection')
    @endif
    <!---end Intro Section-->


    <!---Start Feature  Section--->
    @if ($userBs->feature_section == 1)
        @includeIf('user-front.coffee.featureSection')
    @endif
    <!---end Feature Section-->

    <!-- Start menu Section -->
    @if ($userBs->menu_section == 1)
        @includeIf('user-front.coffee.categoryProductSection')
    @endif
    <!-- End menu Section -->
    <!--===Start spaecial section --==-->
    @if ($userBs->special_section == 1)
        @includeIf('user-front.coffee.specialSection')
    @endif
    <!--===End spaecial section --==-->

    <!-- Testimonial-blog-area start -->
    <div class="testimonial-blog-area bg-img" data-bg-image="{{Uploader::getImageUrl(Constant::WEBSITE_IMAGE, $userBe->testimonial_bg_img, $userBs)  }}">

        <!-- Start Testimonial Section -->
        @if ($userBs->testimonial_section == 1)
            @includeIf('user-front.coffee.testimoialSection')
        @endif
        <!-- End Testimonial Section -->


        <!---Start Blog Section-->
        @if ($userBs->news_section == 1)
            @includeIf('user-front.coffee.blogSection')
        @endif
        <!--- End Blog Section -->

    </div>
@endsection

@section('script')
    @include('user-front.coffee.include.coffee_js')
@endsection
