@extends('layouts.frontend-master')

@section('content')

    <div class="relative com2-banner-box">
        <img src="{{ asset('img/community/banner.png') }}" class="w-full object-cover ctbanner-image" />
        <div class="absolute left-1/2 ctbanner-box text-center w-full">
            <h1 class="text-5xl leading-none text-white letter-spacing-custom ctbanner-title">{{ $community->title ?? '' }}
            </h1>
            <div class="">
                <p class="text-gray-pale font-heavy leading-snug lg:text-lg sm:text-base text-xs mt-3">
                    <span>Posted by</span>
                    <span>{{ $community->user->name ?? '' }}</span>
                    <span>last</span>
                    <span>{!! date('M d, Y', strtotime($community->created_at ?? '')) !!}</span>
                </p>
                <div class="flex justify-center items-center">
                    @if ($community->category == 'Articles')
                        <img src="{{ asset('/img/home/discussion/red.svg') }}" class="green-image" />
                        <p class="ml-2 lg:text-21 text-base text-gray-pale">Articles</p>
                    @elseif($community->category == 'People')
                        <img src="{{ asset('/img/home/discussion/lightgreen.svg') }}" class="green-image" />
                        <p class="ml-2 lg:text-21 text-base text-gray-pale">People</p>
                    @elseif($community->category == 'Announcements')
                        <img src="{{ asset('/img/home/discussion/skyblue.svg') }}" class="green-image" />
                        <p class="ml-2 lg:text-21 text-base text-gray-pale">Annoucements</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-warm-pale community2-container py-28">
        <div class="flex">
            <div class="w-full lg:flex gap-4">
                <div class="lg:w-5percent flex self-start">
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
                <div class="lg:w-95percent">
                    <div class="md:flex md:justify-between">
                        <div class="md:flex pb-5">
                            <p class="text-lg text-gray-pale font-heavy">{{ $community->users->name ?? '' }}</p>
                            <p class="text-lg text-gray-pale font-book">
                                {{ $community->created_at->diffForHumans() ?? '' }}
                            </p>
                        </div>
                        @php
                            $liked = false;
                            if (Auth::check()) {
                                if ($community->is_like($community->id, Auth::user()->id) != null) {
                                    $liked = true;
                                }
                            } elseif ($community->is_like($community->id, Auth::guard('company')->user()->id) != null) {
                                $liked = true;
                            }
                        @endphp
                        <div class="flex md:justify-center like-btn">
                            <img class="@if ($liked) cursor-pointer favimg-active  @endif md:m-auto self-center"
                                src="{{ asset('img/community/fav.png') }}" />
                            <p class="@if ($liked) favbtn-active  @endif like-count flex self-center text-lg text-gray-pale pl-2">
                                @if ($community->like)
                                    {{ $community->like }}
                                @else 0
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="text-gray-pale text-21 font-book font-futura-pt w-full community2-content-desc">
                        {!! $community->description ?? '' !!}
                    </div>
                    <div class="pt-6">
                        <button onclick="history.back()"
                            class="py-2 px-12 text-lg text-gray-light border border-smoke hover:bg-transparent hover:text-lime-orange focus:outline-none rounded-corner bg-smoke uppercase">
                            Back
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (Auth::check())
        <input type="hidden" class="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" class="user_type" value="candidate">
    @else
        <input type="hidden" class="user_id" value="{{ Auth::guard('company')->user()->id }}">
        <input type="hidden" class="user_type" value="coporate">
    @endif
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.like-btn').click(function() {
                $.ajax({
                    type: 'POST',
                    url: 'community-like',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "user_id": $('.user_id').val(),
                        "community_id": "{{ $community->id }}",
                        "user_type": $('.user_type ').val(),
                    },
                    success: function(data) {
                        if (data.status == "liked") {
                            $('.like-btn img').addClass('cursor-pointer favimg-active');
                            $('.like-btn p').addClass('favbtn-active');
                            $('.like-count').text(data.like_count);
                        } else {
                            $('.like-btn img').removeClass('cursor-pointer favimg-active');
                            $('.like-btn p').removeClass('favbtn-active');
                            $('.like-count').text(data.like_count);
                        }

                    }
                });
            });
        });
    </script>
@endpush

@push('css')
    <style>
        .homemenu-bg-div {
            background-color: transparent;
        }

    </style>
@endpush
