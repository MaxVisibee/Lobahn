@extends('layouts.frontend-master')

@section('content')

    <div class="relative com2-banner-box">
        <img src="/./img/community/banner.png" class="w-full object-cover ctbanner-image" />
        <div class="absolute left-1/2 ctbanner-box text-center w-full">
            <h1 class="text-5xl leading-none text-white letter-spacing-custom ctbanner-title">{{ $community->title ?? '' }}
            </h1>
            <div class="">
                <p class="text-gray-pale font-heavy leading-snug lg:text-lg sm:text-base text-xs mt-3">
                    <span>Posted by</span>
                    <span>{{ $community->users->name ?? '' }}</span>
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
                    @else
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
                    <img class="m-auto object-contain rounded-full" src="/./img/community/Intersection 97.png" />
                </div>
                <div class="lg:w-95percent">
                    <div class="md:flex md:justify-between">
                        <div class="md:flex pb-5">
                            <p class="text-lg text-gray-pale font-heavy">{{ $community->users->name ?? '' }}</p>
                            <p class="text-lg text-gray-pale font-book">
                                {{ $community->created_at->diffForHumans() ?? '' }}
                            </p>
                        </div>
                        <div class="flex md:justify-center">
                            <img class="md:m-auto self-center" src="/./img/community/fav.png" />
                            <p class="flex self-center text-lg text-gray-pale pl-2">
                                134
                            </p>
                        </div>
                    </div>

                    <div class="text-gray-pale text-21 font-book font-futura-pt w-full community2-content-desc">
                        {!! $community->description ?? '' !!}
                    </div>
                    <img src="/./img/community/Intersection 153.png" class="my-8" />
                    <div class="pt-6">
                        <a href="{{ url('/community') }}">
                            <button onclick="history.back()"
                                class="py-2 px-12 text-lg text-gray-light border border-smoke hover:bg-transparent hover:text-lime-orange focus:outline-none rounded-corner bg-smoke uppercase">
                                Back
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <h5 style="font-weight: bold;margin-right: 10px;">{{$community->title ?? ''}}</h5>
<img class="img-fluid box-image" src='{{ asset("uploads/community_image/$community->community_image") }}' alt="{{ $community->title ?? '-' }}">
<p>{{$community->created_by ?? '-'}}</p>
<span>{{ Carbon\Carbon::parse($community->created_at)->format('d M Y h:m') }}</span>
{!! $community->description !!} --}}
@endsection

@push('scripts')
    <script>
    </script>
@endpush
