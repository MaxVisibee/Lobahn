@extends("layouts.frontend-master")
@section('content')
<div id="" class="bg-gray-warm-pale terms-conditions-container md:pt-52 pt-32 pb-28">
    <p class="text-white md:text-5xl text-3xl text-center pb-12">
        <span id="result-count"> {{ count($result_count) ?? '' }} </span> 
        result for 
        "<span class="text-lime-orange keyword">{{ $keyword ?? '' }}</span>"
    </p>
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
    <!-- Event -->
    <div class="bg-gray-pale contact-horizontal-line my-8"></div>
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
            </div>
            <p class="text-21 text-gray-pale xl:result-letter-spacing result-paragraph">
                <?php echo e(Str::of(MiscHelper::highlight($result->description, $keyword))->words(50, ' ....')) ?>
            </p>
        </div>
    </div>
    @else
    <!-- Page -->
    <div class="bg-gray-pale contact-horizontal-line my-8"></div>
    <div class="md:flex">
        <div class="md:w-5percent w-full">
            <img class="" src="./img/searchresult/1.png" />
        </div>
        <div class="md:w-90percent w-full md:ml-8 md:mt-0 mt-4">
            <p class="text-lime-orange uppercase  md:text-2xl text-xl font-heavy">Name of the page</p>
            <p class="text-21 text-gray-pale xl:result-letter-spacing">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vel <span class="text-lime-orange">keyword</span>  nunc. Proin maximus ligula in lectus sodales vestibulum. Curabitur feugiat est ut lectus convallis, sed ultrices lacus fermentum. Praesent vehicula varius dapibus. Vestibulum ac augue erat. Fusce pretium in lorem sed viverra. Aliquam in convallis felis.
            </p>
        </div>
    </div>
    @endif
    @endforeach
    {{ $results->links('includes.pagination') }}
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
