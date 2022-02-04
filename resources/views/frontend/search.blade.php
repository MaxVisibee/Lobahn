@extends("layouts.frontend-master")
@section('content')

<div id="" class="bg-gray-warm-pale terms-conditions-container md:pt-52 pt-32 pb-28">
    <p class="text-white md:text-5xl text-3xl text-center pb-12 search-result"> <span id="result-count"> {{
            count($result_count) ?? '' }} </span> result for "<span class="text-lime-orange keyword">{{ $keyword ?? '' }}</span>"</p>
    <div class="text-21 text-gray-pale font-book overflow-hidden relative">
        @foreach($results as $result)
        @if(isset($result->title))
        <!-- Article -->
        <div class="bg-gray-pale contact-horizontal-line my-8"></div>
        <div class="md:flex">
            <div class="md:w-5percent w-full">
                <img src="./img/searchresult/3.png" />
            </div>
            <div class="md:w-90percent w-full md:ml-8 md:mt-0 mt-4">
                <p class="text-lime-orange uppercase  md:text-2xl text-xl font-heavy">Name of the article</p>
                <p class="text-coral text-2xl font-book">Information</p>
                <p class="text-21 text-gray-pale xl:result-letter-spacing result-paragraph">
                    <?php echo e(Str::of(MiscHelper::highlight($result->description, $keyword))->words(50, ' ....')) ?>
                </p>

            </div>
        </div>
        @elseif(isset($result->event_title))
        <div class="bg-gray-pale contact-horizontal-line my-8"></div>
        <!-- Event -->
        <div class="md:flex">
            <div class="md:w-5percent w-full">
                <img src="./img/searchresult/2.png" />
            </div>
            <div class="md:w-90percent w-full md:ml-8 md:mt-0 mt-4">
                <p class="text-lime-orange uppercase  md:text-2xl text-xl font-heavy">Name of the event</p>
                <div class="flex py-1">
                    <div class="flex mr-4">
                        <img src="./img/events/date.svg" />
                        <p class="text-21 text-gray-pale pl-2 whitespace-nowrap">{{$result->event_date ?? ''}}</p>
                    </div>
                    <div class="flex">
                        <img src="./img/events/time.svg" />
                        <p class="text-21 text-gray-pale pl-2 whitespace-nowrap">{{$result->event_time ?? ''}}</p>
                    </div>
                @else
                    <!-- Page -->
                    <div class="bg-gray-pale contact-horizontal-line mt-0 mb-8"></div>
                    <div class="md:flex">
                        <div class="md:w-5percent w-full">
                            <img class="" src="{{ asset('/img/searchresult/1.png') }}" />
                        </div>
                        <div class="md:w-90percent w-full md:ml-8 md:mt-0 mt-4">
                            <p class="text-lime-orange uppercase  md:text-2xl text-xl font-heavy">Name of the page</p>
                            <p class="text-21 text-gray-pale xl:result-letter-spacing">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vel VPN nunc. Proin maximus
                                ligula in
                                lectus sodales vestibulum. Curabitur feugiat est ut lectus convallis, sed ultrices lacus
                                fermentum.
                                Praesent vehicula varius dapibus. Vestibulum ac augue erat. Fusce pretium in lorem sed
                                viverra.
                                Aliquam in convallis felis.
                            </p>
                        </div>
                    </div>
                @endif
            @endforeach
            {{ $results->links('includes.pagination') }}

            {{-- <div class="pb-8 overflow-auto pt-12">
            <div class="flex">
                <button id="discussion-pagination1" type="button" onclick="changeDiscussionPagination(1,45)" class="       
                    uppercase
                    focus:outline-none
                    text-lime-orange text-lg font-book
                    discussion-pagination-btn
                    py-2
                    md:w-10 px-5 flex justify-center mr-2
                    ">
                    1
                </button>
                <button type="button" onclick="changeDiscussionPagination(2,45)" id="discussion-pagination2" class=" pagination2
                    uppercase
                    focus:outline-none
                    text-lime-orange text-lg font-book
                    discussion-pagination-btn
                    py-2
                    md:w-10 px-5 flex justify-center mr-2
                    ">
                    2
                </button>
                <button type="button" id="discussion-pagination3" onclick="changeDiscussionPagination(3,45)" class="
                    pagination3
                        uppercase
                        focus:outline-none
                        text-lime-orange text-lg font-book
                        discussion-pagination-btn
                        py-2
                        md:w-10 px-5 flex justify-center mr-2
                        ">
                    3
                </button>
                <div class="flex justify-center self-center">
                    <span class="text-lg text-lime-orange ml-2 mr-2">.</span>
                    <span class="text-lg text-lime-orange mr-2">.</span>
                    <span class="text-lg text-lime-orange mr-2">.</span>
                </div>
                <button type="button" id="discussion-pagination43" onclick="changeDiscussionPagination(43,45)" class="
                    pagination43
                        uppercase
                        focus:outline-none
                        text-lime-orange text-lg font-book
                        discussion-pagination-btn
                        py-2
                        md:w-10 px-5 flex justify-center mr-2
                        ">
                    43
                </button>
                <button type="button" id="discussion-pagination44" onclick="changeDiscussionPagination(44,45)" class="
                    pagination44
                        uppercase
                        focus:outline-none
                        text-lime-orange text-lg font-book
                        discussion-pagination-btn
                        py-2
                        md:w-10 px-5 flex justify-center mr-2
                        ">
                    &gt;
                </button>
                <button type="button" id="discussion-pagination45" onclick="changeDiscussionPagination(45,45)" class="pagination45
                        uppercase
                        focus:outline-none
                        text-lime-orange text-lg font-book
                        discussion-pagination-btn
                        py-2
                        md:w-10 px-5 flex justify-center
                        ">
                    &#62;&#62;
                </button>
            </div>
        </div> --}}
        </div>
    </div>

    <form action="{{ route('search') }}" id="search_form" method="POST">
        @csrf
        <input type="hidden" name="keyword" id="hidden_keyword">
    </form>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            //textDiv = $('p.result-paragraph').text();
            //var reg = new RegExp({{ $keyword }}, 'gi');
            var regexp = new RegExp('VPN', 'ig');

            $('p.result-paragraph').each(function(num, elem) {
                var text = $(elem).text();
                // use string.replace with $& notation to indicate whatever was matched
                text = text.replace(regexp, "<span class='text-lime-orange'>Hay</span>");
                $(elem).html(text);
            });

            // var txt = textDiv.replace(reg, function(str) {

            // return "<span class='text-lime-orange'>" + str + "</span>"
            // });

            // $('p.result-paragraph').text(txt);
        });
    </script>
@endpush
