@if ($paginator->hasPages())
    <div class="pb-8">
        <div class="flex">
            <!-- Previous Page Link -->
            @if ($paginator->onFirstPage())
                <button
                    class="disabled uppercase focus:outline-none text-gray text-lg font-book corporate-dashboard-pagination-btn py-3 md:w-10 px-5 flex justify-center mr-2">
                    <span class="page-link">&laquo;</span></button>
            @else
                <button class="page-item"><a
                        class="uppercase focus:outline-none text-gray text-lg font-book corporate-dashboard-pagination-btn py-3 md:w-10 px-5 flex justify-center mr-2"
                        href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a>
                </button>
            @endif
            <!-- Pagination Elements -->
            @foreach ($elements as $element)
                <!-- "Three Dots" Separator -->
                @if (is_string($element))
                    <button class="disabled"><span>{{ $element }}</span></button>
                @endif
                <!-- Array Of Links -->
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <button
                                class="active my-active pagination3 uppercase focus:outline-none text-gray text-lg font-book corporate-dashboard-pagination-btn py-3 md:w-10 px-5 flex justify-center mr-2 corporate-dashboard-pagination-btn-active">
                                <span class="page-link">{{ $page }}</span></button>
                        @else
                            <button class="page-item">
                                <a class="uppercase focus:outline-none text-gray text-lg font-book corporate-dashboard-pagination-btn py-3 md:w-10 px-5 flex justify-center mr-2"
                                    href="{{ $url }}">{{ $page }}</a></button>
                        @endif
                    @endforeach
                @endif
            @endforeach
            <!-- Next Page Link -->
            @if ($paginator->hasMorePages())
                <button class="page-item">
                    <a class="uppercase focus:outline-none text-gray text-lg font-book corporate-dashboard-pagination-btn py-3 md:w-10 px-5 flex justify-center mr-2"
                        href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></button>
            @else
                <button
                    class="disabled uppercase focus:outline-none text-gray text-lg font-book corporate-dashboard-pagination-btn py-3 md:w-10 px-5 flex justify-center mr-2">
                    <span class="page-link">&raquo;</span></button>
            @endif
        </div>
    </div>
@endif
