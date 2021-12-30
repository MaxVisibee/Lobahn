@if ($paginator->hasPages())
       
        @if ($paginator->onFirstPage())
            <button class="disabled
            uppercase
                focus:outline-none
                text-gray text-lg font-book
                corporate-dashboard-pagination-btn
                py-3
                md:w-10 px-5 flex justify-center"><span><</span></button>
        @else
            <button><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="uppercase
                focus:outline-none
                text-gray text-lg font-book
                corporate-dashboard-pagination-btn
                py-3
                md:w-10 px-5 flex justify-center"><<</a></button>
        @endif


      
        @foreach ($elements as $element)
           
            @if (is_string($element))
                <button class="disabled
                "><span>{{ $element }}</span></button>
            @endif


           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <button class="active my-active pagination1 
                        uppercase 
                        focus:outline-none 
                        text-gray text-lg font-book 
                        corporate-dashboard-pagination-btn 
                        py-3 md:w-10 px-5 flex justify-center 
                        corporate-dashboard-pagination-btn-active"><span>{{ $page }}</span></button>
                    @else
                        <button><a href="{{ $url }}" class="uppercase
                        focus:outline-none
                        text-gray text-lg font-book
                        corporate-dashboard-pagination-btn
                        py-3
                        md:w-10 px-5 flex justify-center">{{ $page }}</a></button>
                    @endif
                @endforeach
            @endif
        @endforeach


        
        @if ($paginator->hasMorePages())
            <button><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="uppercase
                focus:outline-none
                text-gray text-lg font-book
                corporate-dashboard-pagination-btn
                py-3
                md:w-10 px-5 flex justify-center">></a></button>
        @else
            <button class="disabled
            uppercase
                focus:outline-none
                text-gray text-lg font-book
                corporate-dashboard-pagination-btn
                py-3
                md:w-10 px-5 flex justify-center"><span>>></span></button>
        @endif
    
@endif 