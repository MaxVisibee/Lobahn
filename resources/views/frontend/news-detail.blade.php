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
    <div class="bg-gray-warm-pale news-detail-container md:pt-20 pt-16 pb-36 detail-slide">
        <div class="flex justify-between">
            <div class="flex cursor-pointer">
                <img class="object-cover self-center flex" src="{{ asset('img/news/left.svg') }}" />
                @if ($previous == $first_id)
                    <p class="text-lg text-gray-pale pl-2"><a href="{{ $previous ?? '' }}"
                            style="pointer-events: none;cursor: default;text-decoration: none;opacity: 0.6;">Previous
                            news</a></p>
                @else
                    <p class="text-lg text-gray-pale pl-2"><a href="{{ $previous ?? '' }}">Previous news</a></p>
                @endif

            </div>
            <div class="flex cursor-pointer ">
                <div class="flex self-center justify-center">
                    @if ($next == $last_id)
                        <p class="text-lg text-gray-pale pr-2"><a href="{{ $next ?? '' }}">Next news</a></p>
                    @else
                        <p class="text-lg text-gray-pale pr-2"><a href="{{ $next ?? '' }}"
                                style="pointer-events: none;cursor: default;text-decoration: none;opacity: 0.6;">Next
                                news</a></p>
                    @endif

                </div>
                <img src="{{ asset('img/news/right.svg') }}" class="object-cover self-center flex pt-1" />
            </div>
        </div>
        <div class="w-full flex justify-center mt-12">
            <div class="md:w-65percent">
                <div class="2xl-custom-1366:flex justify-between pt-12">
                    <div class="">
                        <p class="md:text-4xl text-3xl text-lime-orange uppercase tracking-widest">{{ $new->title ?? '' }}
                        </p>
                        <p class="text-xl text-coral">{{ $new->category->category_name ?? '' }}</p>
                        <div class="flex pt-2">
                            <div class="flex">
                                <img onclick="makelike()" class="cursor-pointer favimg object-contain w-5"
                                    src="{{ asset('img/news/fav.svg') }}" />
                                <p onclick="makelike()"
                                    class="cursor-pointer focus:outline-none favbtn text-lg text-gray-pale pl-3 font-book">
                                    Like
                                </p>
                            </div>
                            <div class="flex ml-8 sharediv">
                                <img onclick="makeshare()" class="cursor-pointer shareimg object-contain m-auto"
                                    src="{{ asset('img/news/share.png') }}" />
                                <p onclick="makeshare()"
                                    class="cursor-pointer sharebtn text-lg text-gray-pale pl-3 font-book">Share
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="pl-2 flex 2xl-custom-1366:justify-center self-center">
                        <p class="text-lg text-gray-light1">{{ $new->created_at ?? '' }}</p>
                    </div>
                </div>
                <div class="w-full pt-12">
                    <div class="">
                        <img src="{{ asset('uploads/new_image/' . $new->news_image) }}" class="object-cover w-full" />
                    </div>

                    <p class="newsdetail-letterspacing w-full text-21 text-gray-pale font-book pt-4 pb-4 result-paragraph">
                        {{ $new->description ?? '' }}
                    </p>
                    <div class="pt-6">
                        <button onclick="backAway()"
                            class="py-2 px-12 text-lg text-gray-light border border-smoke hover:bg-transparent hover:text-lime-orange focus:outline-none rounded-corner bg-smoke uppercase">
                            Back
                        </button>
                    </div>
                </div>
            </div>

        </div>

    </div>
    {{-- <div class="w-full flex justify-center mt-12">
  <div class="md:w-65percent">
    <div class="2xl-custom-1366:flex justify-between pt-12">
      <div class="">
        <p class="md:text-4xl text-3xl text-lime-orange uppercase tracking-widest">{{$new->title ?? ''}}</p>
        <p class="text-2xl pl-2 text-gray-pale">{{ $new->category->category_name ?? ''}}</p>
        <div class="flex pt-2 pl-2">
          <div class="flex">
            <div class="flip-card flex">
              <div class="flip-card-inner flex self-center">
                <div onclick="" class="cursor-pointer flip-card-front">
                  <img class=" favimg object-contain w-5 m-auto" src="/./img/news/fav.svg') }}" />
                </div>
              </div>
              <p class="cursor-pointer focus:outline-none favbtn text-lg text-gray-pale pl-3 font-book">Like</p>
            </div>
            <!-- <img onclick="makelike()" class="cursor-pointer favimg object-contain w-5 m-auto"
                                src="./img/news/fav.svg" /> -->
          </div>
          <div class="flex ml-8 sharediv">
            <img onclick="makeshare()" class="cursor-pointer shareimg object-contain m-auto"
              src="/./img/news/share.png" />
            <p onclick="makeshare()" class="cursor-pointer sharebtn text-lg text-gray-pale pl-3 font-book">Share</p>
          </div>
        </div>
      </div>
      <div class="pl-2 flex 2xl-custom-1366:justify-center self-center">
        <p class="text-lg text-gray-light1">{!! date('M d, Y h:m', strtotime($term->updated_at ?? '')) !!}</p>
      </div>
    </div>
    <div class="w-full pt-12 details-news">
      <div class="">
        <img src="{{ asset('uploads/new_image/' . $new->news_image) }}" class="object-cover w-full"
          style="height: 336px;" /><!-- width: 680px -->
      </div>

      <p class="newsdetail-letterspacing w-full text-21 text-gray-pale font-book pb-4 details-news">
        {!! $new->description ?? '' !!}
      </p>

      <div class="pt-6">
        <a href="{{ url('/news') }}">
          <button onclick="backAway()"
            class="py-2 px-12 text-lg text-gray-light border border-smoke hover:bg-transparent hover:text-lime-orange focus:outline-none rounded-corner bg-smoke uppercase">
            Back
          </button>
        </a>
      </div>
    </div>
  </div>

</div> --}}
    </div>
@endsection
@push('scripts')
    <script>
        function backAway() {

            if (document.referrer == "") {
                window.location = "/news";
            } else {
                history.back();
            }
        }
        $(document).ready(function() {

            var regexp = new RegExp('VPN', 'ig');

            $('p.result-paragraph').each(function(num, elem) {

                var text = $(elem).text();
                // use string.replace with $& notation to indicate whatever was matched
                text = text.replace(regexp, "<span class='text-lime-orange'>Hay</span>");
                $(elem).html(text);
            });

        });
    </script>
@endpush
