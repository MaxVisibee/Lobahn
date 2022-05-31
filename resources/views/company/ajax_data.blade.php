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
                    <tbody id="filter-table">
                       
                        @foreach ($listings as $listing)
                            <tr class="mt-4">
                                <td class="whitespace-nowrap footable-first-column">
                                    {{ $listing->ref_no ? $listing->ref_no : '-' }}
                                </td>
                                <td class="font-book">
                                    <a href="{{ route('company.positions', $listing->id) }}"
                                        class="hover:underline cursor-pointer">{{ $listing->title ?? 'no title' }}</a>
                                </td>
                                <td class="font-book text-center">
                                    {{ $listing->getTotalUnviewed($listing->id) }} </td>
                                <td class="font-book text-center">
                                    {{ $listing->getTotalViewed($listing->id) }} </td>
                                <td class="font-book text-center">
                                    {{ $listing->getTotalReceived($listing->id) }} </td>
                                <td class="font-book text-center">{{ $listing->shortlist }}</td>
                                <td class="font-book text-center">{{ $listing->connected }}</td>
                                <td class="font-book text-center">{{ $listing->impression }}</td>
                                <td class="font-book text-center">{{ $listing->click }}</td>
                                <td class="font-book whitespace-nowrap">
                                    {{ date('d M y', strtotime($listing->created_at)) }}
                                </td>
                                <td class="font-book" class="whitespace-nowrap">
                                    {{ date('d M ', strtotime($listing->expire_date)) }}</td>
                                <td class="footable-last-column">
                                    @if ($listing->is_active)
                                        <img src="{{ asset('/img/corporate-menu/dashboard/active.svg') }}" />
                                    @else
                                        <img src="{{ asset('/img/corporate-menu/dashboard/inactive.svg') }}" />
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $listings->links('includes.dashboard-pagination') }}
            </div>