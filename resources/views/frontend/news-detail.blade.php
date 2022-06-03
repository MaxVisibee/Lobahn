@extends('layouts.frontend-master')

@section('content')
    <div class="w-full md:pt-0 ">
        <div class="relative news-banner-container">
            <img src="{{ asset('img/news/newbanner.png') }}" class="w-full object-cover events-banner-container-img" />
            <div class="absolute premium-content top-1/2 left-1/2 text-center sm-custom-480:pt-0 pt-4">
                <p class="text-5xl text-white font-book whitespace-normal text-center">News</p>
            </div>
        </div>
    </div>
    <div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity" id="share-socials">
        <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div class="flex flex-col justify-center items-center popup-text-box__container py-16 relative">
                <button class="absolute top-5 right-5 cursor-pointer focus:outline-none"
                    onclick="toggleModalClose('#share-socials')">
                    <img src="{{ asset('img/sign-up/close.svg') }}" alt="close modal image">
                </button>
                <p class="text-gray-pale text-base letter-spacing-custom">Share this page to your friends.</p>
                <ul class="flex flex-row flex-wrap justify-between items-center mt-5 social-icons-box">
                    @php $url = Request::url(); @endphp
                    <li>
                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}">
                            <img src="{{ asset('img/social-icons/facebook.png') }}" alt="facebook icon" />
                        </a>
                    </li>
                    <li>
                        <a target="_blank" class="twitter-share-button"
                            href="https://twitter.com/intent/tweet?url={{ $url }}">
                            <img src="{{ asset('img/social-icons/twitter.png') }}" alt="twitter icon" />
                        </a>
                    </li>
                    <li>
                        <a href="mailto:?subject=I wanted you to see this news &amp;body=Check out this site {{ $url }}"
                            title="Share by Email">
                            <img src="{{ asset('img/social-icons/email.png') }}" alt="email icon" />
                        </a>

                    </li>
                    <li>
                        <a href="https://api.whatsapp.com/send?text={{ $url }}" target="_blank"><img
                                src="{{ asset('img/social-icons/whatapps.png') }}" alt="whatapps icon" />
                        </a>
                    </li>
                    <li>
                        <a href="weixin://dl/moments" target="_blank">
                            <img src="{{ asset('img/social-icons/wechat.png') }}" alt="wechat icon" />
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="bg-gray-warm-pale news-detail-container md:pt-20 pt-16 pb-36 detail-slide">
        <div class="flex justify-between">
            <div class="flex cursor-pointer">
                <img class="object-cover self-center flex" src="{{ asset('img/news/left.svg') }}" />
                {{-- @if ($previous == $first_id || $previous == null) --}}
                @if ($previous == null)
                    <p class="text-lg text-gray-pale pl-2"><a href="{{ $previous ?? '' }}"
                            style="pointer-events: none;cursor: default;text-decoration: none;opacity: 0.6;">Previous
                            news</a></p>
                @else
                    <p class="text-lg text-gray-pale pl-2"><a href="{{ $previous ?? '' }}">Previous news</a></p>
                @endif

            </div>
            <div class="flex cursor-pointer ">
                <div class="flex self-center justify-center">
                    @if ($next == null)
                        <p class="text-lg text-gray-pale pr-2"><a href="{{ $next ?? '' }}"
                                style="pointer-events: none;cursor: default;text-decoration: none;opacity: 0.6;">Next
                                news</a>
                        </p>
                    @else
                        <p class="text-lg text-gray-pale pr-2"><a href="{{ $next ?? '' }}">Next
                                news</a></p>
                    @endif

                </div>
                <img src="{{ asset('img/news/right.svg') }}" class="object-cover self-center flex pt-1" />
            </div>
        </div>

        <div class="w-full flex justify-center mt-12">
            <div class="xl:w-65percent w-full">
                <div class="2xl-custom-1366:flex justify-between pt-12">
                    <div class="">
                        <div class="">
                            <p class="md:text-4xl text-3xl text-lime-orange uppercase tracking-widest">{{ $new->title }}
                            </p>
                            {{-- <p class="text-xl text-coral">Information</p> --}}
                            @isset($new->category_id)
                                @if ($new->category->category_name == 'Information')
                                    <p class="text-lg text-antique-white">
                                    @elseif($new->category->category_name == 'Advice')
                                    <p class="text-lg text-lightgreen">
                                    @elseif($new->category->category_name == 'Opinion')
                                    <p class="text-lg text-skyblue">
                                @endif
                                {{ $new->category->category_name ?? '' }}
                                </p>
                            @endisset
                            <div class="
                                        flex pt-2">
                                @php
                                    $liked = false;
                                    if (!Auth::user() && !Auth::guard('company')->user()) {
                                        $auth_check = false;
                                    } else {
                                        $auth_check = true;
                                        if (Auth::guard('company')->user()) {
                                            if ($new->is_like($new->id, Auth::guard('company')->user()->id) != null) {
                                                $liked = true;
                                            } else {
                                                $liked = false;
                                            }
                                        } else {
                                            if ($new->is_like($new->id, Auth::user()->id) != null) {
                                                $liked = true;
                                            } else {
                                                $liked = false;
                                            }
                                        }
                                    }
                                @endphp

                                <div class="flex @if ($auth_check) like-btn @else to-login @endif">
                                    <img class=" @if ($liked) cursor-pointer favimg-active @endif favimg object-contain w-5"
                                        src="{{ asset('/img/news/fav.svg') }}" />
                                    <p
                                        class="@if ($liked) favbtn-active @endif cursor-pointer focus:outline-none favbtn text-lg text-gray-pale pl-3 font-book hover:text-lime-orange">
                                        Like
                                    </p>
                                </div>
                                <div class="flex ml-8 sharediv">
                                    <img onclick="makeshare()"
                                        class="cursor-pointer shareimg object-contain m-auto hover:text-lime-orange"
                                        src="{{ asset('/img/news/share.png') }}" />
                                    <p onclick="makeshare()"
                                        class="cursor-pointer focus:outline-none favbtn text-lg text-gray-pale pl-3 font-book hover:text-lime-orange">
                                        Share
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pl-2 flex 2xl-custom-1366:justify-center self-center">
                        <p class="text-lg text-gray-light1">{{ $new->created_at ?? '' }}</p>
                    </div>
                </div>
                <div class="detail w-full pt-12">
                    <div class="">
                        @if ($new->news_image)
                            <img src="{{ asset('uploads/new_image/' . $new->news_image) }}"
                                class="object-cover w-full" />
                        @else
                            <img src="{{ asset('uploads/new_image/news.jpg') }}" class="object-cover w-full" />
                        @endif
                    </div>

                    {!! $new->description ?? '' !!}

                    <div class="pt-6">
                        <button onclick="backAway()"
                            class="py-2 px-12 text-lg text-gray-light border hover:border-gray-light border-lime-orange hover:bg-transparent hover:text-lime-orange focus:outline-none rounded-corner bg-lime-orange uppercase">
                            Back
                        </button>
                    </div>
                </div>
                @if (Auth::check())
                    <input type="hidden" class="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" class="user_type" value="candidate">
                @elseif(Auth::guard('company')->user())
                    <input type="hidden" class="user_id" value="{{ Auth::guard('company')->user()->id }}">
                    <input type="hidden" class="user_type" value="coporate">
                @endif
            </div>
        </div>
    </div>
@endsection



@push('scripts')
    <script>
        $(document).ready(function() {
            $('.detail *').removeAttr('style');
            $('.detail .p1 ,.detail ul li ,.detail p ,.detail strong').addClass(
                'newsdetail-letterspacing w-full text-21 text-gray-pale font-book pt-4 pb-4');
            $('.detail a').css('color', '#ffdb5f');
            $('div.content').children('p').addClass(
                'newsdetail-letterspacing w-full text-21 text-gray-pale font-book pt-4 pb-4');

            $('.to-login').click(function() {
                window.location.href = "{{ route('login') }}";
            });

            $('.like-btn').click(function() {
                $.ajax({
                    type: 'POST',
                    url: 'news-like',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "user_id": $('.user_id').val(),
                        "news_id": "{{ $new->id }}",
                        "user_type": $('.user_type ').val(),
                    },
                    success: function(data) {
                        if (data.status == "liked") {
                            $('.like-btn img').addClass('cursor-pointer favimg-active');
                            $('.like-btn p').addClass('favbtn-active');

                        } else {
                            $('.like-btn img').removeClass('cursor-pointer favimg-active');
                            $('.like-btn p').removeClass('favbtn-active');
                        }

                    }
                });
            });

            var regexp = new RegExp('VPN', 'ig');
            $('p.result-paragraph').each(function(num, elem) {

                var text = $(elem).text();
                // use string.replace with

                text = text.replace(regexp,
                    "<span class='text-lime-orange'>Hay</span>");
                $(elem).html(text);
            });

        });

        function backAway() {
            document.referrer == "" ? window.location = "/news" : history.back();
        }
    </script>
@endpush
