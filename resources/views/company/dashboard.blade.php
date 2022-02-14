@extends('layouts.master')

@section('content')
    <div class="bg-gray-light2 corporate-dashboard-menu pb-36">
        <div class="grid xl:grid-cols-4 md:grid-cols-2 gap-2 pb-2">
            <div class="md:col-span-2 bg-white flex rounded-lg py-8">
                <div class="md:flex w-full sm:px-8 px-2">
                    <div class="md:w-30percent w-full">
                        <img class="md:ml-0 m-auto"
                            src="{{ $company->company_logo? asset('/uploads/company_logo/' . $company->company_logo): asset('images/default.png') }}" />
                    </div>
                    <div class="md:ml-8 md:w-70percent w-full">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-2xl text-gray font-heavy">{{ $company->name }}</p>
                                <p class="text-base text-gray-light1 font-book">{{ $company->position_title }}</p>
                            </div>
                            <div class="cursor-pointer">
                                <a href="{{ route('company.profile.edit') }}">
                                    <img src="{{ asset('/img/corporate-menu/dashboard/edit.svg') }}" />
                                </a>

                            </div>
                        </div>
                        <div class="flex bg-gray-light3 py-3 px-8 my-4 rounded-lg">
                            <span class="text-base text-smoke mr-1 font-book">Username</span>
                            <span class="text-base text-gray font-book">{{ $company->user_name }}</span>
                        </div>
                        <div class="flex bg-gray-light3 py-3 px-8 my-4 rounded-lg">
                            <span class="text-base text-smoke mr-1 font-book">Office email</span>
                            <span class="text-base text-gray font-book">{{ $company->email }}</span>
                        </div>
                        <div class="flex bg-gray-light3 py-3 px-8 my-4 rounded-lg">
                            <span class="text-base text-smoke mr-1 font-book">Office telephone</span>
                            <span class="text-base text-gray font-book">{{ $company->phone }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:col-span-1 bg-white rounded-lg py-8 flex justify-center">
                <div class="flex justify-center self-center">
                    <div>
                        <img class="object-contain m-auto" src="{{ asset('/img/corporate-menu/dashboard/bar.png') }}" />
                        <div class="mt-4">
                            <p class="text-center text-lg text-gray-light1 font-book">TOTAL IMPRESSIONS</p>
                            <p class="text-center text-4xl text-gray font-heavy">{{ $company->total_impressions }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:col-span-1 bg-white rounded-lg py-8 flex justify-center">
                <div class="self-center">
                    <img class="object-contain m-auto"
                        src="{{ asset('/img/corporate-menu/dashboard/mouseicon.svg') }}" />
                    <div class="mt-4">
                        <p class="text-center text-lg text-gray-light1 font-book">TOTAL CLICKS</p>
                        <p class="text-center  text-4xl text-gray font-heavy">{{ $company->total_clicks }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="xl:flex md:justify-between bg-lime-orange px-8 py-6 mt-2">
            <div class="md:flex">
                <p class="text-2xl text-gray tracking-wider uppercase font-heavy pt-2">Position Listings</p>
                <div class="flex self-center">
                    {{-- <button onclick="location.href='{{url('position-detail-add/'.$company->id)}}'"
                    class="flex self-center text-lime-orange py-2 outline-none focus:outline-none rounded-md bg-gray-light border border-lime-orange px-12 md:ml-2 md:mt-0 mt-2 text-lg">NEW</button> --}}
                </div>
            </div>
            <div class="lg:flex xl:mt-0 mt-4">
                <div class="md:flex">
                    <p class="text-gray text-base flex self-center mr-3 font-book tracking-wider">Search</p>
                    <input
                        class="bg-gray-light3 appearance-none border-2 border-gray-light2
                        rounded-lg md:w-72 py-3 md:px-8 px-3 text-gray leading-tight flex justify-center self-center
                        focus:outline-none focus:bg-gray-light2 border-none search"
                        type="text" value="">
                </div>
                <div class="md:flex lg:mt-0 mt-4">
                    <p class="text-gray text-base flex self-center mr-1 whitespace-nowrap md:ml-4 font-book tracking-wider">
                        Sory by</p>
                    <div class="dashboard-select-wrapper text-gray-pale flex self-center">
                        <div class="dashboard-select-preferences">
                            <div
                                class="dashboard-select__trigger py-3 relative flex items-center text-gray justify-between pl-2 bg-gray-light3 cursor-pointer">
                                <span class="">
                                    @if ($status_sort)
                                        Status
                                    @else
                                        Listing Date
                                    @endif
                                </span>
                                <svg class="transition-all mr-4" xmlns="http://www.w3.org/2000/svg" width="13.328"
                                    height="7.664" viewBox="0 0 13.328 7.664">
                                    <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                        transform="translate(19.414 -16.586) rotate(90)" fill="none" stroke="#2F2F2F"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </svg>

                            </div>
                            <div
                                class="dashboard-custom-options absolute block top-full left-0 right-0 bg-gray-light3 transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                <div class="date-sort flex dashboard-custom-option  pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                    data-value="Listing Date">
                                    <div class="flex dashboard-select-custom-icon-container">
                                        <img class="mr-2 checkedIcon1 @if (!$date_sort) hidden @endif"
                                            src="{{ asset('/img/dashboard/checked.svg') }}" />
                                    </div>
                                    <span class="dashboard-select-custom-content-container text-gray pl-4"
                                        data-sort-column="9" data-sort-direction="ASC">Listing
                                        Date</span>
                                </div>
                                <div class="status-sort flex dashboard-custom-option  pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                    data-value="Status">
                                    <div class="flex dashboard-select-custom-icon-container">
                                        <img class="mr-2 checkedIcon3 @if (!$status_sort) hidden @endif"
                                            src="{{ asset('/img/dashboard/checked.svg') }}" />
                                    </div>
                                    <span class="dashboard-select-custom-content-container text-gray pl-4"
                                        data-sort-column="11" data-sort-direction="ASC">Status</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="flex self-center">&nbsp;
                        <a class="clear-filter self-center" title="clear filter"><i class="fas fa-sync"></i></a>
                    </p>
                </div>

            </div>
        </div>

        <div class="bg-white px-8 py-8">
            <div class="overflow-x-auto">
                <table id="corporate-dashboard-table" class="corporate-dashboard-table mt-4 demo default footable"
                    data-page-size="3" data-paging="true" data-page-navigation=".pagination" data-sorting="true"
                    data-filtering="true" data-filter-placeholder="Search Actions"
                    data-filter-dropdown-title="Sort Actions By:">
                    <thead>
                        <tr>
                            <th class="pl-2 font-book" data-name="Reference">Reference</th>
                            <th class="pl-3 font-book" data-name="Position title">Position title</th>
                            <th>
                                <div class="tooltip">
                                    <img class="self-center m-auto"
                                        src="{{ asset('/img/corporate-menu/dashboard/eye1.svg') }}" />
                                    <span
                                        class="text-gray font-book text-sm inline-block bg-gray-light3 tooltiptext">Unviewed</span>
                                </div>
                            </th>
                            <th>
                                <div class="tooltip">
                                    <img class="self-center m-auto"
                                        src="{{ asset('/img/corporate-menu/dashboard/eye2.svg') }}" />
                                    <span
                                        class="text-gray font-book text-sm inline-block bg-gray-light3 tooltiptext">Viewed</span>
                                </div>

                            </th>
                            <th>
                                <div class="tooltip">
                                    <img class="self-center m-auto"
                                        src="{{ asset('/img/corporate-menu/dashboard/mail.svg') }}" />
                                    <span
                                        class="text-gray font-book text-sm inline-block bg-gray-light3 tooltiptext">Received</span>
                                </div>

                            </th>
                            <th>
                                <div class="tooltip">
                                    <img class="self-center m-auto"
                                        src="{{ asset('/img/corporate-menu/dashboard/download.svg') }}" />
                                    <span
                                        class="text-gray font-book text-sm inline-block bg-gray-light3 tooltiptext">Shortlisted</span>
                                </div>

                            </th>
                            <th>
                                <div class="tooltip">
                                    <img class="self-center m-auto"
                                        src="{{ asset('/img/corporate-menu/dashboard/link.svg') }}" />
                                    <span
                                        class="text-gray font-book text-sm inline-block bg-gray-light3 tooltiptext">Connected</span>
                                </div>
                            </th>
                            <th><img class="self-center m-auto"
                                    src="{{ asset('/img/corporate-menu/dashboard/barchart.svg') }}" /></th>
                            <th><img class="self-center m-auto"
                                    src="{{ asset('/img/corporate-menu/dashboard/mouse.svg') }}" /></th>
                            <th class="pl-3 font-book">Listing</th>
                            <th class="pl-3 font-book">Expiration</th>
                            <th class="pl-3 font-book">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listings as $listing)
                            <tr class="mt-4">
                                <td class="whitespace-nowrap footable-first-column">
                                    {{ $listing->ref_no ? $listing->ref_no : '-' }}
                                </td>
                                <td class=" font-book">
                                    <a href="{{ route('company.positions', $listing->id) }}"
                                        class="hover:underline cursor-pointer">{{ $listing->title ?? 'no title' }}</a>
                                </td>
                                <td class=" font-book" class="text-center">
                                    {{ $listing->getTotalUnviewed($listing->id) }} </td>
                                <td class=" font-book" class="text-center">
                                    {{ $listing->getTotalViewed($listing->id) }} </td>
                                <td class=" font-book" class="text-center">
                                    {{ $listing->getTotalReceived($listing->id) }} </td>
                                <td class=" font-book" class="text-center">{{ $listing->shortlist }}</td>
                                <td class=" font-book" class="text-center">{{ $listing->connected }}</td>
                                <td class=" font-book" class="text-center">{{ $listing->impression }}</td>
                                <td class=" font-book" class="text-center">{{ $listing->click }}</td>
                                <td class=" font-book" class="whitespace-nowrap">
                                    {{ date('d M y', strtotime($listing->created_at)) }}
                                </td>
                                <td class=" font-book" class="whitespace-nowrap">
                                    {{ date('d M y', strtotime($listing->expire_date)) }}</td>
                                <td class="footable-last-column">
                                    @if ($listing->is_active)
                                        <img src="{{ asset('/img/corporate-menu/dashboard/active.svg') }}" />
                                    @else <img src="{{ asset('/img/corporate-menu/dashboard/inactive.svg') }}" />
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-footable/3.1.6/footable.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-footable/3.1.6/footable.paging.js"></script>
    <script>
        $(document).ready(function() {

            $('.status-sort').click(function() {
                window.location = '{{ url(Request::url() . '?status') }}';
            });

            $('.date-sort').click(function() {
                window.location = '{{ url(Request::url() . '?date') }}';
            });

            $('#corporate-dashboard-table').footable();

            // Dropdown
            $('.dashboard-select-preferences span').on('click', function(e) {
                e.preventDefault();
                var sorting = FooTable.get('#corporate-dashboard-table').use(FooTable.Sorting),
                    column = parseInt($(this).attr('data-sort-column')),
                    direction = $(this).attr('data-sort-direction');
                sorting._sort(column, direction);
            });

            // Search
            $('input.search').on('input', function() {
                var filtering = FooTable.get('#corporate-dashboard-table').use(FooTable.Filtering),
                    text = $(this).val();
                if (text == '') {
                    location.reload();
                }
                filtering.addFilter("custom-search", text, ["Reference", "Position title"]);
                filtering.filter();
            });

            $('.clear-filter').on('click', function() {
                location.reload();
            });

        });
    </script>
@endpush

@push('css')
    <style>
        tfoot .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
        }

        tfoot .pagination>.active>a,
        tfoot .pagination>.active>a:focus,
        tfoot .pagination>.active>a:hover,
        tfoot .pagination>.active>span,
        tfoot .pagination>.active>span:focus,
        tfoot .pagination>.active>span:hover,
        tfoot .pagination>li>a:hover,
        tfoot .pagination>.disabled>a,
        tfoot .pagination>.disabled>a:focus,
        tfoot .pagination>.disabled>a:hover,
        tfoot .pagination>.disabled>span,
        tfoot .pagination>.disabled>span:focus,
        tfoot .pagination>.disabled>span:hover {
            color: #ffffff;
            background-color: #2f2f2f !important;
            border-color: #2f2f2f !important;
            border-radius: 5px;
        }

        tfoot td {
            background: white !important;
        }

        tfoot .pagination li {
            font-size: 1.125rem;
            line-height: 1.75rem;
            text-transform: uppercase;
            font-weight: 400;
        }

        tfoot .pagination>li>a,
        tfoot .pagination>li>span {
            color: #2f2f2f;
            font-size: 1.125rem;
            line-height: 1.75rem;
            text-transform: uppercase;
            font-weight: 400;
            background: transparent;
            border: 1px solid #2f2f2f;
            border-radius: 5px;
            width: 2.5rem;
            text-align: center;
            margin-left: 5px;
        }

        tfoot .pagination>li:first-child>a,
        tfoot .pagination>li:first-child>span {
            display: none;
        }

        tfoot {
            background: none !important;
        }

        .footable-filtering {
            display: none;
        }

        .label.label-default {
            display: none;
        }

    </style>
@endpush
