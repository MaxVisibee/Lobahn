@extends('layouts.master')

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
        <div class="flex justify-center">
            <button
                class="whitespace-nowrap rounded-lg news-btn {{(Request::get('category') == '')? 'news-btn1' : '' }} text-lg text-smoke-dark py-5 w-68 focus:outline-none">
                <a href="{{ route('news') }}">
                    All News & Views</a></button>
        </div>
        @foreach ($categories as $category)
        <div class="flex justify-center">
            <button
                class="whitespace-nowrap rounded-lg news-btn text-lg text-smoke-dark py-5 w-68 focus:outline-none {{($category->category_name == Request::get('category'))? 'news-btn-hover' : '' }}">
                <a href="{{ route('news') }}?category={{$category->category_name}}">
                    {{$category->category_name}}</a></button>
        </div>
        @endforeach
    </div>
    <div class="grid lg:grid-cols-2 overflow-hidden py-12">
        @foreach ($news as $new)
        <div onclick="go({{$new->id}})" class="newcontent-data-advice  lg:ml-0.625 lg:mr-0.625">
            <div class="relative news-image-container2">
                <div class="news-image2 news-img-zoom-out news-border-radius">
                    <img src="{{ asset('uploads/new_image/'.$new->news_image) }}" class="w-full object-contain" />
                </div>
                <div class="news-content bg-gray news-text-radius">
                    <div class="md:flex justify-between px-8">
                        <div class="pt-8">
                            <p class="text-lime-orange text-2xl uppercase font-heavy">{{$new->title}}</p>
                            <p class="text-lg text-lightgreen">{{$new->category->category_name}}</p>
                        </div>
                        <p class="pt-8 text-sm text-gray-light1">{{$new->created_at}}</p>

                    </div>
                    <div class="text-gray-pale text-lg px-8 py-8 w-94percent result-paragraph">
                        <?php echo e(Str::of($new->description)->words(30, ' ....')) ?>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $news->links('includes.pagination') }}
    {{-- <div class="pb-8 overflow-auto">
        <div class="flex md:justify-center">
            <button id="newcontent-pagination1" type="button" onclick="changeNewsPagination(1,45)" class="
        newcontent-pagination1
    uppercase
    focus:outline-none
    text-gray text-lg font-book
    newcontent-pagination-btn
    py-2 text-center self-center items-center
    md:w-10 px-5 flex justify-center
    ">
                1
            </button>
            <button type="button" onclick="changeNewsPagination(2,45)" id="newcontent-pagination2" class=" pagination2
        uppercase
        focus:outline-none
        text-gray text-lg font-book
        newcontent-pagination-btn
        py-2
        md:w-10 px-5 flex justify-center ml-1 mr-1
        ">
                2
            </button>
            <button type="button" id="newcontent-pagination3" onclick="changeNewsPagination(3,45)" class="
        pagination3
            uppercase
            focus:outline-none
            text-gray text-lg font-book
            newcontent-pagination-btn
            py-2
            md:w-10 px-5 flex justify-center ml-1 mr-1
            ">
                3
            </button>
            <div class="flex justify-center self-center">
                <span class="text-lg text-lime-orange ml-2 mr-2">.</span>
                <span class="text-lg text-lime-orange mr-2">.</span>
                <span class="text-lg text-lime-orange mr-2">.</span>
            </div>
            <button type="button" id="newcontent-pagination43" onclick="changeNewsPagination(43,45)" class="
        pagination43
            uppercase
            focus:outline-none
            text-gray text-lg font-book
            newcontent-pagination-btn
            py-2
            md:w-10 px-5 flex justify-center ml-1 mr-1
            ">
                43
            </button>
            <button type="button" id="newcontent-pagination44" onclick="changeNewsPagination(44,45)" class="
        pagination44
            uppercase
            focus:outline-none
            text-gray text-lg font-book
            newcontent-pagination-btn
            py-2
            md:w-10 px-5 flex justify-center ml-1 mr-1
            ">
                &gt;
            </button>
            <button type="button" id="newcontent-pagination45" onclick="changeNewsPagination(45,45)" class="pagination45
            uppercase
            focus:outline-none
            text-gray text-lg font-book
            newcontent-pagination-btn
            py-2
            md:w-10 px-5 flex justify-center ml-1 mr-1
            ">
                &#62;&#62;
            </button>
        </div>
    </div> --}}

</div>
@endsection

@push('scripts')
<script>
    // $(document).ready(function(){        
    // $('#category').on('change', function() {
    //     var category=$('#category').val();
    //     // var url = "{{ url('/admin/reports/product-report') }}?start_date="+ start_date +"&to_date="+ to_date+"&min_price="+ min_price+"&max_price="+ max_price +$(this).val();
    //     var url = "{{ url('/news') }}?category="+ category;
    //     if (url) {
    //         window.location = url;
    //     }
    //     return false;
    // });
    // });

    function go(e){
    
    var url ="/news/"+e
    window.location = url;
    }

    $(document).ready(function(){
    
    var regexp = new RegExp('VPN', 'ig');
    
    $('div.result-paragraph').each(function(num, elem) {
        
    var text = $(elem).text();
    // use string.replace with $& notation to indicate whatever was matched
    text = text.replace(regexp, "<span class='text-lime-orange'>Hay</span>");
    $(elem).html(text);
    });

    
    
    });
</script>
@endpush