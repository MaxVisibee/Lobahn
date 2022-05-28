@extends('layouts.frontend-master')

@section('content')
    <div class="w-full md:pt-0 ">
        <div class="relative news-banner-container">
            <img src="{{ asset('/img/news/newbanner.png') }}" class="w-full object-cover events-banner-container-img" />
            <div class="absolute premium-content top-1/2 left-1/2 text-center sm-custom-480:pt-0 pt-4">
                <p class="text-5xl text-white font-book text-center whitespace-nowrap">News & Views</p>
            </div>
        </div>
    </div>
    <div class="news-content-container bg-gray-warm-pale py-20">
        <div class="grid xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4 lg:ml-0.625 lg:mr-0.625" id="menu">
            <a href="{{ route('news') }}">
                <div class="flex justify-center">
                    <button
                        class="whitespace-nowrap rounded-lg news-btn {{ Request::get('category') == '' ? 'news-btn1' : '' }} text-lg text-smoke-dark py-5 w-68 m-2 focus:outline-none">

                        All News & Views</button>
                </div>
            </a>
            @foreach ($categories as $category)
                <a href="{{ route('news') }}?category={{ $category->category_name ?? '' }}">
                    <div class="flex justify-center">
                        <button
                            class="whitespace-nowrap rounded-lg news-btn text-lg text-smoke-dark py-5 w-68 m-2 focus:outline-none {{ $category->category_name == Request::get('category') ? 'news-btn-hover' : '' }}">
                            {{ $category->category_name ?? '' }}</button>
                    </div>
            </a>
            @endforeach
        </div>
        <div class="grid lg:grid-cols-2 overflow-hidden py-12">
            @forelse ($news as $new)
                <div class="w-full cursor-pointer newcontent-data-opinion mb-5 ">
                    <input type="hidden" class="news_title" value="{{ str_replace(' ', '_', $new->title) }}">
                    <a href="#">
                        <div class="relative lg:ml-0.625 lg:mr-0.625 news-image-container1 bg-gray news-text-radius h-full">
                            <div class="news-image2 spotlight-img-zoom-out news-border-radius">
                                @if ($new->news_image)
                                    <img src="{{ asset('uploads/new_image/' . $new->news_image ?? '') }}"
                                        class="w-full object-contain" />
                                @else
                                    <img src="{{ asset('./img/news/1.png') }}" class="w-full object-contain" />
                                @endif
                            </div>
                            <div class="news-content bg-gray news-text-radius">
                                <div class="md:flex justify-between px-8">
                                    <div class="pt-8 sm:w-3/4 w-4/5 overflow-hidden">
                                        <p class=" news-title text-lime-orange text-2xl uppercase font-heavy">
                                            {{ $new->title ?? '' }}</p>
                                        @isset($new->category_id)
                                            <p
                                                class="text-lg
                                        @if ($new->category->category_name == 'Information') text-antique-white @elseif($new->category->category_name == 'Advice') text-lightgreen
                                        @elseif($new->category->category_name == 'Opinion') text-skyblue @endif 
                                        ">
                                                {{ $new->category->category_name ?? '' }}</p>
                                        @endisset
                                    </div>
                                    <div class="sm:w-1/4 w-full">
                                        <p class="pt-8 text-sm text-gray-light1 whitespace-nowrap">
                                            {{ Carbon\Carbon::parse($new->created_at)->format('d M Y') }}</p>
                                    </div>

                                </div>
                                <div class="text-gray-pale text-lg px-8 py-8 w-f">
                                    {{ Str::of($new->coverage_sentence)->words(50, ' ....') }}

                                    <div class="flex justify-end ">
                                        <a href="{{ url('/news/' . str_replace(' ', '_', $new->title) . '/' . $new->id) }}"
                                            class="ml-auto border-2 border-lime-orange hover:bg-white whitespace-nowrap rounded-md focus:outline-none outline-none py-1 text-sm bg-lime-orange px-2 text-gray">Read
                                            More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <p class="text-2xl font-bold text-center text-white py-12 nopost-msg">There is no post available</p>
            @endforelse
        </div>
        {{ $news->links('includes.pagination') }}
    </div>
@endsection
@push('scripts')
    <script>
        // function go(e) {
        //     var title = $('.news_title').val();
        //     var url = "/news/" + title + "/" + e;
        //     window.location = url;
        // }
        $(document).ready(function() {
            var regexp = new RegExp('VPN', 'ig');
            $('div.result-paragraph').each(function(num, elem) {
                var text = $(elem).text();
                text = text.replace(regexp, "<span class='text-lime-orange'>Hay</span>");
                $(elem).html(text);
            });
        });
    </script>
@endpush
