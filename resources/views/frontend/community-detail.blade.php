@extends('layouts.master')

@section('content')

<div class="relative com2-banner-box">
  <img src="/./img/community/banner.png" class="w-full object-cover ctbanner-image" />
  <div class="absolute left-1/2 ctbanner-box text-center w-full">
    <h1 class="text-5xl leading-none text-white letter-spacing-custom ctbanner-title">Proin quis tempor justo, eu placerat ante</h1>
    <div class="">
      <p class="text-gray-pale font-heavy leading-snug lg:text-lg sm:text-base text-xs mt-3">
        <span>Posted by</span>
        <span>Member Name</span>
        <span>last</span>
        <span>Jun 28, 2021</span>
      </p>
      <div class="flex justify-center items-center">
        <img src="/./img/community/green.png" class="green-image"/>
        <p class="ml-2 lg:text-21 text-base text-gray-pale">Career</p>
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
            <p class="text-lg text-gray-pale font-heavy">Member Name</p>
            <p class="text-lg text-gray-pale font-book">1 month ago</p>
          </div>
          <div class="flex md:justify-center">
            <img class="md:m-auto self-center" src="/./img/community/fav.png" />
            <p class="flex self-center text-lg text-gray-pale pl-2">
              134
            </p>
          </div>
        </div>

        <div class="text-gray-pale text-21 font-book font-futura-pt w-full community2-content-desc">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis tempor justo, eu placerat ante. Duis sodales viverra lacus, ut viverra mi ornare nec. Integer vitae nulla ac velit pharetra imperdiet at consequat est. Interdum et <a class="cursor-pointer text-lime-orange underline">malesuada fames ac ante ipsumprimis in faucibus.</a> Sed ut sagittis ipsum.Phasellus aliquet, nunc sit amet bibendum facilisis, leo mauris finibus risus, quis finibus augue velit vel odio. Ut tincidunt mi fringilla massa tempor, ac rhoncus mi aliquam. Praesent ut odio nec nisimolestie porta tincidunt vel neque. Cras vitae ex eget metus gravida dapibus vitae condimentum odio.  Aenean egestas euismod mauris vitae cursus. In sagittis tincidunt diam, vel molestie ante rutrum sed.Cras nec ornare nulla. Maecenas eu dui enim. Phasellus at accumsan risus. Sed sodales nisi ut elit consectetur porttitor in sed tortor.
        </div>
        <img src="/./img/community/Intersection 153.png" class="my-8"/>
        <div class="text-gray-pale text-21">
          Morbi eu ultrices lorem. Nullam tempus non purus sit amet bibendum. Curabitur ullamcorper
          condimentum lectus in imperdiet. Nullam finibus felis non lacus sodales, at faucibus arcu volutpat. Proin laoreet neque sit amet felis accumsan placerat. Donec ornare congue lacinia. Fusce leo lectus, gravida vitae suscipit eget, ullamcorper et diam. Donec eu justo tristique, iaculis justo sit amet, posuere est. Phasellus varius porta tellus, ac semper velit faucibus sed. Integer dignissim lacus innc egestas eleifend.
        </div>
        <div class="pt-6">
          <a href="{{ url('/community') }}">
            <button onclick="history.back()" class="py-2 px-12 text-lg text-gray-light border border-smoke hover:bg-transparent hover:text-lime-orange focus:outline-none rounded-corner bg-smoke uppercase">
              Back
            </button>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

{{--

<h5 style="font-weight: bold;margin-right: 10px;">{{$community->title ?? ''}}</h5>
<img class="img-fluid box-image" src='{{ asset("uploads/community_image/$community->community_image") }}' alt="{{ $community->title ?? '-' }}">
<p>{{$community->created_by ?? '-'}}</p>
<span>{{ Carbon\Carbon::parse($community->created_at)->format('d M Y h:m') }}</span>
{!! $community->description !!} 
--}}
@endsection

@push('scripts')
  <script>
  </script> 
@endpush