@extends("layouts.frontend-master")

@section('content')
    <div class="relative com2-banner-box">
        <img src="{{ asset('/img/community/community-banner.png') }}"
            class="w-full object-cover community1-height-banner" />
        <div class="absolute left-1/2 community-header text-center w-full">
            <h1 class="text-5xl leading-none text-white letter-spacing-custom ctbanner-title">Community</h1>
            <div class="hidden">
                <p class="text-gray-pale font-heavy leading-snug lg:text-lg sm:text-base text-xs mt-3">
                    <span>Posted by</span>
                    <span>Member Name</span>
                    <span>last</span>
                    <span>Jun 28, 2021</span>
                </p>
                <div class="flex justify-center items-center">
                    <div class="bg-coral rounded-xl inline-block text-gray self-end">
                        <span class=" px-4">Articles</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed top-0 w-full h-screen left-0  z-50 bg-black-opacity hidden" id="post-article-popup">
        <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div class="flex flex-wrap justify-center items-center post-article-form-container">
                <div
                    class="group mb-24 postarticle-card-section__explore join-individual pt-40 pb-16 sm:pt-64 sm:pb-40 flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                    <form action="{{ route('community.post') }}" method="POST">
                        @csrf
                        <input type="hidden" id="user_id" name="user_id"
                            value="@if (Auth::check()) {{ Auth()->user()->id }} @endif">
                        <input type="hidden" id="company_id" name="company_id"
                            value="@if (Auth::guard('company')->user()) {{ Auth::guard('company')->user()->id }} @endif">
                        <div class="post-article-form px-8 mb-5">
                            <p class="text-4xl text-center mb-5 font-heavy tracking-wide mt-4 text-white uppercase py-8">
                                Post an
                                article</p>
                            <div class="mb-3 relative">
                                <input type="text" placeholder="Title" name="title"
                                    class="text-21 py-4 w-full placeholder-gray-pale text-gray-pale bg-gray rounded-lg focus:outline-none font-book font-futura-pt text-lg pl-8" />
                            </div>
                            <div class="article-category-select-wrapper text-gray-pale flex self-center">
                                <div class="article-category-select-preferences w-full">
                                    <div
                                        class="article-category-select__trigger py-3 relative flex items-center text-gray justify-between pl-2 bg-gray cursor-pointer">
                                        <span class="text-gray-pale text-21">Category</span>
                                        <svg class="transition-all mr-4" xmlns="http://www.w3.org/2000/svg" width="13.328"
                                            height="7.664" viewBox="0 0 13.328 7.664">
                                            <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                stroke="#2F2F2F" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" />
                                        </svg>

                                    </div>
                                    <div
                                        class="mt-2 py-4 article-category-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                        <div class="category py-2 pl-8 flex article-category-custom-option  pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                            data-value="Articles">
                                            <div class="flex article-category-select-custom-icon-container">
                                                <img class="mr-2 checkedIcon1 hidden"
                                                    src="{{ asset('/img/dashboard/checked.svg') }}" />
                                            </div>
                                            <img class="pl-2"
                                                src="{{ asset('/img/home/discussion/red.svg') }}" />
                                            <span
                                                class="article-category-select-custom-content-container text-gray pl-4">Articles</span>
                                        </div>
                                        <div class="category py-2 pl-8 flex article-category-custom-option  pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                            data-value="People">
                                            <div class="flex article-category-select-custom-icon-container">
                                                <img class="mr-2 checkedIcon3 hidden"
                                                    src="{{ asset('/img/dashboard/checked.svg') }}" />
                                            </div>
                                            <img class="pl-2"
                                                src="{{ asset('/img/home/discussion/lightgreen.svg') }}" />
                                            <span
                                                class="article-category-select-custom-content-container text-gray pl-4">People</span>
                                        </div>
                                        <div class="category py-2 pl-8 flex article-category-custom-option  pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                            data-value="Annoucements">
                                            <div class="flex article-category-select-custom-icon-container">
                                                <img class="mr-2 checkedIcon2 hidden"
                                                    src="{{ asset('/img/dashboard/checked.svg') }}" />
                                            </div>
                                            <img class="pl-2"
                                                src="{{ asset('/img/home/discussion/skyblue.svg') }}" />
                                            <span
                                                class="article-category-select-custom-content-container pl-4 text-gray">Announcements</span>
                                        </div>
                                        <input type="hidden" id="category" name="category" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="sign-up-form__information relative">
                                <div class="mt-4">
                                    <p class="hidden article-thought-required-message text-lg text-red-500 mb-1 text-left">
                                        thought is required !</p>
                                    <textarea name="description"
                                        class="articlePopup bg-gray font-futura-pt text-lg rounded-lg text-gray-pale"
                                        id="articlePopup" rows="10" cols="80">Share your thoughts</textarea>
                                </div>
                            </div>
                            <div class="flex justify-center pb-8">
                                <div class="flex justify-center mr-4">
                                    <button type="submit"
                                        class="mt-6 text-lg bg-lime-orange text-gray px-4 rounded-3xl leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">
                                        Post article
                                    </button>
                                </div>
                                <div class="flex justify-center">
                                    <button onclick="closeModal('#post-article-popup')" type="button"
                                        class="mt-6 text-lg  bg-lime-orange text-gray px-8 rounded-3xl leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">
                                        cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed top-0 w-full h-screen left-0  z-50 bg-black-opacity hidden" id="post-article-success-popup">
        <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div class="flex flex-col justify-center items-center popup-text-box__container py-16 relative">
                <button class="absolute top-5 right-5 cursor-pointer focus:outline-none"
                    onclick="closeModal('#post-article-success-popup')">
                    <img src="./img/sign-up/close.svg" alt="close modal image">
                </button>
                <p class="text-white text-2xl font-book letter-spacing-custom">Thank you for sharing your thoughts</p>
                <p class="text-gray-pale text-21 font-book letter-spacing-custom px-16 mt-2"> An admin will review the
                    article before it will be published in the community.</p>
            </div>
        </div>
    </div>

    <div class="bg-gray-warm-pale discussion-container py-12">
        <div class="xl:flex justify-center">
            <div class="xl:w-1/4 xl:mb-0 mb-8 px-0 2xl-custom-1366:mr-0 mr-4">
                <div class="pb-8 sm-custom-480:flex-col flex justify-center">
                    <button onclick="showModalBox('#post-article-popup')" id="post-article-btn"
                        class="text-lg font-book text-smoke-dark px-12 py-4 focus:outline-none bg-lime-orange border border-lime-orange hover:bg-transparent hover:text-lime-orange start-discussion-btn 2xl-custom-1440:w-72 w-60 rounded-corner">Post
                        an Article</button>
                </div>
                <div class="flex mb-4">
                    <img src="{{ asset('/img/home/discussion/red.svg') }}" />
                    <p class=" text-21 font-book text-gray-pale ml-4">Articles</p>
                </div>
                <div class="flex mb-4">
                    <img src="{{ asset('/img/home/discussion/lightgreen.svg') }}" />
                    <p class="text-21 font-book text-gray-pale ml-4">People</p>
                </div>
                <div class="flex">
                    <img src="{{ asset('/img/home/discussion/skyblue.svg') }}" />
                    <p class="text-21 font-book text-gray-pale ml-4">Announcements</p>
                </div>
            </div>
            <div class="xl:w-3/4">
                <div class="flex justify-between px-0">
                    <div class="discussion-select-wrapper text-gray-pale">
                        <div class="discussion-select-preferences">
                            <div
                                class="discussion-select__trigger py-3 relative flex items-center text-gray justify-between pl-2 bg-gray-light2 cursor-pointer">
                                <span class="pr-8 whitespace-nowrap text-base font-book">
                                    @if ($status)
                                    Most Liked @else Latest
                                    @endif
                                </span>
                                <svg class="transition-all mr-4" xmlns="http://www.w3.org/2000/svg" width="13.328"
                                    height="7.664" viewBox="0 0 13.328 7.664">
                                    <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                        transform="translate(19.414 -16.586) rotate(90)" fill="none" stroke="#2F2F2F"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </svg>

                            </div>
                            <div
                                class="discussion-custom-options rounded-lg mt-1 absolute block top-full left-0 right-0 bg-gray-light3 transition-all 
                          opacity-0 invisible pointer-events-none cursor-pointer">
                                <div class=" flex discussion-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                    data-value="Latest">
                                    <div class="w-10percent flex discussion-select-custom-icon-container">
                                        <img class="mr-2 checkedIcon1 @if ($status) hidden @endif"
                                            src="{{ asset('/img/dashboard/checked.svg') }}" />
                                    </div>
                                    <span onclick="window.location='{{ route('community') }}'"
                                        class="w-90percent discussion-select-custom-content-container text-base font-book pl-2 text-gray">Latest</span>
                                </div>
                                <div class="flex discussion-custom-option  pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                    data-value="Most Liked">
                                    <div class="w-10percent flex discussion-select-custom-icon-container">
                                        <img class="mr-2 checkedIcon2 @if (!$status) hidden @endif"
                                            src="{{ asset('/img/dashboard/checked.svg') }}" />
                                    </div>
                                    <span onclick="window.location='{{ route('community.most.like') }}'"
                                        class="w-90percent discussion-select-custom-content-container text-base font-book pl-2
                                 text-gray">Most
                                        Liked</span>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="cursor-pointer sm-custom-480:justify-start justify-center flex hidden">
                        <img src="{{ asset('/img/home/discussion/refresh.svg') }}" />
                    </div>
                </div>
                <div class="grid lg:grid-cols-2">
                    @foreach ($communities as $community)
                        <div
                            class="community-post lg:mr-2.5 cursor-pointer md:flex bg-smoke-dark hover:bg-gray-light lg:px-8 px-4 py-6 mt-5 rounded-corner">
                            <div class="md:w-full md:mt-0 mt-1">
                                <div class="md:flex">
                                    <div class="post">
                                        <div class="md:flex justify-between">
                                            <p class="text-xl text-lime-orange font-heavy">{{ $community->title }}</p>
                                        </div>
                                        <input type="hidden" class="id" value="{{ $community->id }}">
                                        <input type="hidden" class="title"
                                            value="{{ str_replace(' ', '_', $community->title) }}">
                                        <div class="flex justify-between mt-3">
                                            <div class="mr-4 flex">
                                                <div class="w-1/5">
                                                    @if ($community->user_id)
                                                        @if ($community->user->image)
                                                            <img class="rounded-full w-16"
                                                                src="{{ asset('uploads/profile_photos/' . $community->user->image) }}" />
                                                        @else
                                                            <img class="rounded-full w-16"
                                                                src="{{ asset('uploads/profile_photos/profile-small.jpg') }}" />
                                                        @endif
                                                    @endif
                                                    @if ($community->company_id)
                                                        @if ($community->company->company_logo)
                                                            <img class="rounded-full w-16"
                                                                src="{{ asset('uploads/company_logo/' . $community->company->company_logo) }}" />
                                                        @else
                                                            <img class="rounded-full w-16"
                                                                src="{{ asset('uploads/profile_photos/company-small.jpg') }}" />
                                                        @endif
                                                    @endif
                                                </div>
                                                <div class="w-4/5 md:flex flex-col text-lg text-gray-pale ml-2">
                                                    <p class="pr-2 font-heavy">
                                                        @if ($community->user_id)
                                                            <p class="pr-2 font-heavy">{{ $community->user->name }}
                                                            </p>
                                                        @else
                                                            <p class="pr-2 font-heavy">
                                                                {{ $community->company->company_name }} </p>
                                                        @endif
                                                    </p>
                                                    <p>posted {{ date('M d, Y', strtotime($community->started_date)) }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="md:flex flex-col text-lg text-gray-pale">
                                                <div class="bg-skyblue rounded-xl inline-block text-gray self-end">
                                                    @if ($community->category == 'Articles')
                                                        <div class="bg-coral rounded-xl inline-block text-gray self-end">
                                                            <span class=" px-4">Articles</span>
                                                        </div>
                                                    @elseif($community->category == 'Announcements')
                                                        <div class="bg-skyblue rounded-xl inline-block text-gray self-end">
                                                            <span class=" px-4">Announcements</span>
                                                        </div>
                                                    @elseif($community->category == 'People')
                                                        <div
                                                            class="bg-lightgreen rounded-xl inline-block text-gray self-end">
                                                            <span class=" px-4">People</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="flex self-end mt-1">
                                                    <div class="flex">
                                                        <img class="mr-2 cursor-pointer"
                                                            src="{{ asset('/img/home/discussion/fav.svg') }}" />
                                                        <p class=" cursor-pointer flex self-center text-lg text-gray-pale">
                                                            @if ($community->like)
                                                                {{ $community->like }}
                                                            @else 0
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="hidden">
                                                        <img class="mr-2"
                                                            src="{{ asset('/img/home/discussion/comment.svg') }}" />
                                                        <p class="flex self-center text-lg text-gray-pale">
                                                            @if ($community->like)
                                                                {{ $community->like }}
                                                            @else 0
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-gray-pale contact-horizontal-line my-6"></div>
                                        <div class="description">
                                            <p class="text-lg leading-none font-book text-gray-pale mt-1"
                                                style="color: #ffffff">
                                                {!! str_limit($community->description, $limit = 180, $end = '...') !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- <div class="grid lg:grid-cols-2 gap-4">
                    @foreach ($communities as $community)
                        <div
                            class="lg:mr-2.5 cursor-pointer md:flex bg-smoke-dark hover:bg-gray-light lg:px-8 px-4 py-6 mt-5 rounded-corner">
                            <div class="md:w-full md:mt-0 mt-1">
                                <div class="md:flex">
                                    <div class="post">
                                        <div class="md:flex justify-between">
                                            <p class="text-xl text-lime-orange font-heavy">{{ $community->title }}</p>
                                        </div>
                                        <input type="hidden" class="id" value="{{ $community->id }}">
                                        <input type="hidden" class="title"
                                            value="{{ str_replace(' ', '_', $community->title) }}">
                                        <div class="flex justify-between mt-3">
                                            <div class="mr-4 flex">
                                                <div class="w-1/5">
                                                    @if ($community->user_id)
                                                        @if ($community->user->image)
                                                            <img class="rounded-full w-16"
                                                                src="{{ asset('uploads/profile_photos/' . $community->user->image) }}" />
                                                        @else
                                                            <img class="rounded-full w-16"
                                                                src="{{ asset('uploads/profile_photos/profile-small.jpg') }}" />
                                                        @endif
                                                    @endif
                                                    @if ($community->company_id)
                                                        @if ($community->company->company_logo)
                                                            <img class="rounded-full w-16"
                                                                src="{{ asset('uploads/company_logo/' . $community->company->company_logo) }}" />
                                                        @else
                                                            <img class="rounded-full w-16"
                                                                src="{{ asset('uploads/profile_photos/company-small.jpg') }}" />
                                                        @endif
                                                    @endif
                                                </div>
                                                <div class="w-4/5 md:flex flex-col text-lg text-gray-pale ml-2">
                                                    <p class="pr-2 font-heavy">
                                                        @if ($community->user_id)
                                                            <p class="pr-2 font-heavy">{{ $community->user->name }}
                                                            </p>
                                                        @else
                                                            <p class="pr-2 font-heavy">
                                                                {{ $community->company->company_name }} </p>
                                                        @endif
                                                    </p>
                                                    <p>posted {{ date('M d, Y', strtotime($community->started_date)) }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="md:flex flex-col text-lg text-gray-pale">
                                                <div class="bg-skyblue rounded-xl inline-block text-gray self-end">
                                                    @if ($community->category == 'Articles')
                                                        <div class="bg-coral rounded-xl inline-block text-gray self-end">
                                                            <span class=" px-4">Articles</span>
                                                        </div>
                                                    @elseif($community->category == 'Announcements')
                                                        <div class="bg-skyblue rounded-xl inline-block text-gray self-end">
                                                            <span class=" px-4">Announcements</span>
                                                        </div>
                                                    @elseif($community->category == 'People')
                                                        <div
                                                            class="bg-lightgreen rounded-xl inline-block text-gray self-end">
                                                            <span class=" px-4">People</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="flex self-end mt-1">
                                                    <div class="flex">
                                                        <img class="mr-2 cursor-pointer"
                                                            src="{{ asset('/img/home/discussion/fav.svg') }}" />
                                                        <p class=" cursor-pointer flex self-center text-lg text-gray-pale">
                                                            @if ($community->like)
                                                                {{ $community->like }}
                                                            @else 0
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="hidden">
                                                        <img class="mr-2"
                                                            src="{{ asset('/img/home/discussion/comment.svg') }}" />
                                                        <p class="flex self-center text-lg text-gray-pale">
                                                            @if ($community->like)
                                                                {{ $community->like }}
                                                            @else 0
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-gray-pale contact-horizontal-line my-6"></div>
                                        <div class="description">
                                            <p class="text-lg leading-none font-book text-gray-pale mt-1"
                                                style="color: #ffffff">
                                                {!! str_limit($community->description, $limit = 180, $end = '...') !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> --}}
                <!-- Pagination -->
                {{ $communities->links('includes.pagination') }}
            </div>
        </div>
    </div>

    <div class="fixed top-0 w-full h-screen left-0 block z-50 bg-black-opacity hide" id="sign-up-popup">
        <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div
                class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container--sign-up py-16 relative">
                <button class="absolute top-5 right-5 cursor-pointer focus:outline-none"
                    onclick="window.location='{{ route('home') }}'">
                    <img src="{{ asset('/img/sign-up/close.svg') }}" alt="close modal image" class="close-model">
                </button>
                <h1 class="text-base lg:text-lg tracking-wide popup-text-box__title mb-4">To view this
                    page, you must be a
                    logged in user.</h1>
                <div class="button-bar button-bar--sign-up-btn">
                    <a href="{{ route('signup') }}"
                        class="btn-bar font-heavy inline-block text-lime-orange text-sm lg:text-lg hover:bg-lime-orange hover:text-gray border border-lime-orange rounded-full py-4 px-4 mr-2 btn-pill">Sign
                        Up</a>
                    <a href="{{ route('login') }}"
                        class="btn-bar font-heavy inline-block text-lime-orange text-sm lg:text-lg hover:bg-lime-orange hover:text-gray border border-lime-orange rounded-full py-4 px-4 btn-pill active button-bar--sign-up-btn__login ">Login</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {


            $('.post').find('.description').children('p').addClass(
                "text-lg leading-none font-book text-gray-pale mt-1");

            @if (!Auth::user() && !Auth::guard('company')->user())
                $("#sign-up-popup").removeClass("hide");
            @endif

            $('.close-model').click(function() {
                window.location = '{{ url('/') }}';
            });
            $(".community-post").click(function() {
                window.location = "{{ url('community') }}" + "/" + $(this).find(".title").val() + "/" +
                    $(this).find(".id").val();
            });

            $(".category").on("click", function() {
                $("#category").val($(this).find('span').text());
            });

            @if (session('posted'))
                showModalBox('#post-article-success-popup')
                @php Session::forget('posted'); @endphp
            @endif
        });
    </script>
@endpush

@push('css')
    <style>
        .tox-notifications-container {
            display: none !important;
        }

    </style>
@endpush
