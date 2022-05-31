@extends('layouts.master')

@section('content')
    <div class="bg-gray-light2 corporate-dashboard-menu pb-36">
        <div class="grid xl:grid-cols-4 md:grid-cols-2 pb-2">
            <div class="md:col-span-2 bg-white flex rounded-lg py-8 custom-margin-right1">
                <div class="md:flex w-full sm:px-8 px-2">
                    <div class="md:w-30percent w-full">
                        <img class="md:ml-0 m-auto rounded-full member-profile-image"
                            src="{{ $company->company_logo ? asset('/uploads/company_logo/' . $company->company_logo) : asset('images/default.png') }}">
                        @if ($company->is_trial)
                            <p class="trial-message block text-gray-light1 font-book text-center mt-4 mb-4">
                                (Free Trial -
                                {{ $company->trial_days }} days left )
                            </p>
                        @endif
                    </div>
                    <div class="md:ml-8 md:w-70percent w-full">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-2xl text-gray font-heavy">{{ $company->name }}
                                </p>
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
                            <span style="word-break: break-all;"
                                class="text-base text-gray font-book">{{ $company->email }}</span>
                        </div>
                        <div class="flex bg-gray-light3 py-3 px-8 my-4 rounded-lg">
                            <span class="text-base text-smoke mr-1 font-book">Office telephone</span>
                            <span style="word-break: break-all;"
                                class="text-base text-gray font-book">{{ $company->phone }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-margin-top md:col-span-1 bg-white rounded-lg py-8 flex justify-center  custom-margin-right">
                <div class="flex justify-center self-center">
                    <div>
                        <img class="object-contain m-auto" src="{{ asset('/img/corporate-menu/dashboard/bar.png') }}" />
                        <div class="mt-4">
                            <p class="text-center text-lg text-gray-light1 font-book">TOTAL IMPRESSIONS</p>
                            <p class="text-center text-4xl text-gray font-heavy">{{ number_format($impressions) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-margin-top md:col-span-1 bg-white rounded-lg py-8 flex justify-center">
                <div class="self-center">
                    <img class="object-contain m-auto"
                        src="{{ asset('/img/corporate-menu/dashboard/mouseicon.svg') }}" />
                    <div class="mt-4">
                        <p class="text-center text-lg text-gray-light1 font-book">TOTAL CLICKS</p>
                        <p class="text-center  text-4xl text-gray font-heavy">{{ number_format($clicks) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="xl:flex md:justify-between bg-lime-orange px-8 py-6 custom-margin-top1">
            <div class="md:flex test">
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
                    <p class="text-gray text-base flex self-center mr-1 whitespace-nowrap lg:ml-4 font-book tracking-wider">
                        Sort by</p>
                    <div class="dashboard-select-wrapper text-gray-pale flex self-center">
                        <div class="dashboard-select-preferences">
                            <div
                                class="dashboard-select__trigger py-3 relative flex items-center text-gray justify-between pl-2 bg-gray-light3 cursor-pointer">
                                    <span class="date">Listing Date</span>
                                    <span class="status hidden">Status</span>
                             
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
                                        <img class="mr-2 checkedIconOne"
                                            src="{{ asset('/img/dashboard/checked.svg') }}" />
                                    </div>
                                    <span class="dashboard-select-custom-content-container text-gray pl-4"
                                        data-sort-column="9" data-sort-direction="ASC">Listing
                                        Date</span>
                                </div>
                                <div class="status-sort flex dashboard-custom-option  pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray"
                                    data-value="Status">
                                    <div class="flex dashboard-select-custom-icon-container">
                                        <img class="mr-2 checkedIconTwo hidden"
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
       
        <div class="bg-white px-8 py-8" id="position-listings" >
            @include('company.ajax_data')
        </div>
       
        <input type="hidden" name="filter" id="filter">
      
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-footable/3.1.6/footable.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-footable/3.1.6/footable.paging.js"></script>
    <script>
        $(document).ready(function() {

            $("#loader").addClass('hidden')
           
            $('.status-sort').click(function() {
               $('#filter').val("status")
                //SELECT BOX TICK SHOW/HIDE
                $('.checkedIconOne').addClass('hidden')
               
                $('.checkedIconTwo').removeClass('hidden')

                $.ajax({
                url:"fetch-data/{{$company->id}}",
                data: {
                    "filter":"status"
                },
                success:function(data)
                {
                    console.log(data)
                    $('#position-listings').html(data);
                }
                });
            });

            $('.date-sort').click(function() {
                $('#filter').val("date")
                //SELECT BOX TICK SHOW/HIDE
                $('.checkedIconOne').removeClass('hidden')
               
                $('.checkedIconTwo').addClass('hidden')

                $.ajax({
                url:"fetch-data/{{$company->id}}",
                data: {
                    "filter":"date"
                },
                success:function(data)
                {
                    $('#position-listings').html(data);
                }
                });
            });

            $(document).on('click', '.page-item a', function(event){
            event.preventDefault(); 
            var page = $(this).attr('href').split('page=')[1];
            $.ajax({
                url:"fetch-data/{{$company->id}}?page="+page,
                data: {
                    "filter":$('#filter').val()
                },
                success:function(data)
                {
                    $('#position-listings').html(data);
                }
                });

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
                // var filtering = FooTable.get('#corporate-dashboard-table').use(FooTable.Filtering),
                //     text = $(this).val();
                // if (text == '') {
                //     location.reload();
                // }
                // filtering.addFilter("custom-search", text, ["Reference", "Position title"]);
                // filtering.filter();test-table

                var value = $(this).val().toLowerCase();
                $("#filter-table tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });

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
