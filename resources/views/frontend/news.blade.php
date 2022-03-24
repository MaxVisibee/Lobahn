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
                        class="whitespace-nowrap rounded-lg news-btn {{ Request::get('category') == '' ? 'news-btn1' : '' }} text-lg text-smoke-dark py-5 w-68 focus:outline-none">

                        All News & Views</button>
                </div>
            </a>
            @foreach ($categories as $category)
                <a href="{{ route('news') }}?category={{ $category->category_name ?? '' }}">
                    <div class="flex justify-center">
                        <button
                            class="whitespace-nowrap rounded-lg news-btn text-lg text-smoke-dark py-5 w-68 focus:outline-none {{ $category->category_name == Request::get('category') ? 'news-btn-hover' : '' }}">
                            {{ $category->category_name ?? '' }}</button>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="grid lg:grid-cols-2 overflow-hidden py-12">
            @foreach ($news as $new)
                <div onclick="go({{ $new->id ?? '' }})" class="newcontent-data-information mb-5 lg:ml-0.625 lg:mr-0.625">
                    <input type="hidden" class="news_title" value="{{ str_replace(' ', '_', $new->title) }}">
                    <div class="relative news-image-container2">
                        <div class="news-image2 news-border-radius">
                            @if ($new->news_image)
                                <img src="{{ asset('uploads/new_image/' . $new->news_image ?? '') }}"
                                    class="w-full object-contain" />
                            @else
                                <img src="{{ asset('./img/news/1.png') }}" class="w-full object-contain"
                                    style="visibility: hidden;" />
                            @endif
                        </div>
                        <div class="news-content bg-gray news-text-radius">
                            <div class="md:flex justify-between px-8">
                                <div class="pt-8">
                                    <p class="text-lime-orange text-2xl uppercase font-heavy">{{ $new->title ?? '' }}</p>
                                    <p class="text-lg text-lightgreen">{{ $new->category->category_name ?? '' }}</p>
                                </div>
                                <p class="pt-8 text-sm text-gray-light1">
                                    {{ Carbon\Carbon::parse($new->created_at)->format('d M Y h:m') }}
                                </p>

                            </div>
                            <div class="text-gray-pale text-lg px-8 py-8 w-94percent result-paragraph">
                                <?php echo Str::of($new->description)->words(30, ' ....'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $news->links('includes.pagination') }}
    </div>
@endsection
@push('scripts')
    <script>
        function go(e) {
            var url = "/event/" + e
            window.location = url;
        }
        $(document).ready(function() {
            $('.event-year').on('click', function(e) {
                var year = $(this).text();
                if (year == 'All Events') {
                    window.location = "{{ url('/events') }}";
                } else {
                    var url = "{{ url('/events') }}?year=" + year;
                    if (url) {
                        window.location = url;
                    }
                    return false;
                }
            });
        });
    </script>
@endpush
