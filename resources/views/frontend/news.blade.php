@extends('layouts.master')

@section('content')
<div class="w-full md:pt-0 ">
    <div class="relative news-banner-container">
        <img src="./img/news/newbanner.png" class="w-full object-cover events-banner-container-img" />
        <div class="absolute premium-content top-1/2 left-1/2 text-center sm-custom-480:pt-0 pt-4">
            <p class="text-5xl text-white font-book whitespace-normal text-center">News</p>
        </div>
    </div>
</div>    

<div class="news-content-container bg-gray-warm-pale py-20">
	<form action="{{ url('/news') }}" method="get" id="news_filter">
	    <div class="flex flex-wrap justify-center gap-4" name="category" id="category">	    	
	        <div>
	            <button class="whitespace-nowrap rounded-lg news-btn-hover text-lg text-smoke-dark py-5 w-68 focus:outline-none {{ (Request::get('category') == '') ? 'active' : '' }}">All News</button>
	        </div>
	        @foreach($categories as $key => $value)
	        <div>
	            <button type="submit" class="whitespace-nowrap rounded-lg news-btn text-lg text-smoke-dark py-5 w-68 focus:outline-none {{ (Request::get('category') == $value->category_name ?? '') ? 'active' : '' }}" name="category" value="{{$value->category_name ?? ''}}">{{$value->category_name ?? ''}}</button>
	        </div>
	        @endforeach
	        {{--
	        <div>
	            <button class="whitespace-nowrap rounded-lg news-btn text-lg text-smoke-dark py-5 w-68 focus:outline-none" name="category" value="Category Two" {{ (Request::get('category') == 'Category Two') ? 'active' : '' }}>Category Two</button>
	        </div>
	        --}}    
	    </div>
	</form>
    {{-- 
    <form class="row gx-3">                            
	    <div class="form-group mb-2 sorting-form">
	        <select name="price" id="price" class="form-select">
	            <option value="">All</option>
	            <option value="popular" {{ (Request::get('price') == 'popular') ? 'selected' : '' }}>Most Popular</option>
	            <option value="lowtohigh" {{ (Request::get('price') == 'lowtohigh') ? 'selected' : '' }}>Price Low to High</option>
	            <option value="hightolow" {{ (Request::get('price') == 'hightolow') ? 'selected' : '' }}>Price High to Low</option>
	        </select>
	    </div>
	</form>
	--}}
    <div class="grid lg:grid-cols-2 overflow-hidden gap-5 py-12">
    	@foreach ($news as $key => $new)
    		<div class="">
            	<div class="relative news-image-container1">
	                <div class="news-image1 spotlight-img-zoom-out news-border-radius overflow-hidden">
	                    <img src="{{ asset('uploads/new_image/' . $new->news_image) }}" class="w-full object-contain" style="" />
	                    <!-- <img src="{{ asset('uploads/new_image/' . $new->news_image) }}" alt="{{ $new->title ?? '-' }}" class="w-full object-contain" style="visibility: hidden;" /> -->
	                </div>
	                <div class="news-content bg-gray news-text-radius">
	                    <div class="md:flex justify-between px-8">
	                        <div class="pt-8">
	                            <p class="text-lime-orange text-2xl uppercase font-heavy"><a href="/news/{{$new->id}}">{{ $new->title ?? ''}}</a></p>
	                            <p class="text-lg text-gray-pale">{{ $new->category->category_name ?? ''}}</p>
	                        </div>
	                        <p class="pt-8 text-sm text-gray-light1">{!! date('d M Y h:m', strtotime($term->updated_at ?? '')) !!}</p>
	        
	                    </div>
	                    <div class="text-gray-pale text-lg px-8 py-8 w-94percent">
	                        {!! \Illuminate\Support\Str::limit($new->description, 308, $end='...') !!}
	                    </div>
	                </div>
	            </div>
	        </div>
    	@endforeach
    </div> 

    {{-- {!! $news->appends(Request::all())->links() !!} --}}
    <div class="pb-8 overflow-auto">
	    <div class="flex md:gap-2">
		  	@if(count($news)>0)
		        <div class="pro-pagination-style text-left mt-30 product-pagination">
		            <ul>
		                <li>{{ $news->appends(request()->all())->links() }}</li>
		            </ul>
		        </div>
		    @endif
		</div>
	</div>
    {{-- 
	<div class="pb-8 overflow-auto">
	    <div class="flex md:gap-2">
	        <button id="newcontent-pagination1" type="button" class="newcontent-pagination1 uppercase  focus:outline-none text-gray text-lg font-book newcontent-pagination-btn py-2 md:w-10 px-5 flex justify-center"> 1 </button>
	        <button type="button" onclick="changeNewsPagination(2)" id="pagination2" class=" pagination2
	        uppercase focus:outline-none text-gray text-lg font-book newcontent-pagination-btn py-2
	        md:w-10 px-5 flex justify-center">2</button>
	        <button type="button" id="pagination3" onclick="changeNewsPagination(3)" class="
	        pagination3 uppercase focus:outline-none text-gray text-lg font-book newcontent-pagination-btn py-2 md:w-10 px-5 flex justify-center">3</button>
	        <div class="flex justify-center self-center">
	            <span class="text-lg text-lime-orange ml-2 mr-2">.</span>
	            <span class="text-lg text-lime-orange mr-2">.</span>
	            <span class="text-lg text-lime-orange mr-2">.</span>
	        </div>
	        <button type="button" id="pagination43" onclick="changeNewsPagination(43)" class="
	        pagination43 uppercase focus:outline-none text-gray text-lg font-book
	            newcontent-pagination-btn py-2 md:w-10 px-5 flex justify-center">43</button>
	        <button type="button" id="pagination44" onclick="changeNewsPagination(44)" class="
	        pagination44 uppercase focus:outline-none text-gray text-lg font-book newcontent-pagination-btn
	            py-2 md:w-10 px-5 flex justify-center">&gt;</button>
	        <button type="button" id="pagination45" onclick="changeNewsPagination(45)" class="pagination45
	            uppercase focus:outline-none text-gray text-lg font-book newcontent-pagination-btn py-2 md:w-10 px-5 flex justify-center">&#62;&#62;</button>
	    </div>
	</div>
	--}}
</div>
@endsection

@push('scripts')
  <script>
 $(document).ready(function(){        
    $('#category').on('change', function() {
        var category=$('#category').val();
        // var url = "{{ url('/admin/reports/product-report') }}?start_date="+ start_date +"&to_date="+ to_date+"&min_price="+ min_price+"&max_price="+ max_price +$(this).val();
        var url = "{{ url('/news') }}?category="+ category;
        if (url) {
            window.location = url;
        }
        return false;
    });
   });
</script>
@endpush
    