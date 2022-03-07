@extends("layouts.master",["title"=>"YOUR ACCOUNT"])
@section('content')
    <div class="bg-gray-light2 youraccount-container pt-40 pb-40 mt-24 sm:mt-32 md:mt-0">
        <div class="grid lg:grid-cols-2 grid-cols-1 professional-activities-report-gap-safari gap-2">
            <div>
                <div class="bg-white rounded-lg py-8 px-8 ">
                    <div>
                        <p class="text-2xl text-gray uppercase mb-4 font-heavy">membership status</p>
                        <div class="overflow-x-auto">
                            <table class="w-full youraccount-status-table" id="youraccount-status-table">
                                <thead>
                                    <tr>
                                        <th class="text-sm text-smoke pr-24 pl-4">Items</th>
                                        <th class="text-sm text-smoke pr-12">Status</th>
                                        <th class="text-sm text-smoke pr-12">
                                            @if (count($payments) == 1)
                                                Charged On
                                            @else
                                                Expiration
                                            @endif
                                        </th>
                                        <th class="text-sm text-smoke pr-12">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($active_payments as $active_payment)
                                        <tr>
                                            <td class=" text-base text-gray whitespace-nowrap font-book pr-24 pl-4">
                                                <p>{{ $active_payment->package->package_title ?? '' }} Subscription</p>
                                            <td class="text-base text-gray pr-12">
                                                <div class="py-2">
                                                    @if (count($payments) == 1)
                                                        <p
                                                            class="text-gray text-sm px-2 rounded-lg inline-block bg-lime-orange text-center">
                                                            Pending
                                                        </p>
                                                    @elseif ($active_payment->status)
                                                        <p
                                                            class="text-gray text-sm px-2 rounded-lg inline-block bg-lime-orange text-center">
                                                            Active
                                                        </p>
                                                    @else
                                                        <p
                                                            class="text-white text-sm px-2 rounded-lg inline-block bg-coral-dark text-center">
                                                            Expired</p>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="text-base text-smoke whitespace-nowrap pr-12">
                                                <div class="py-2">
                                                    @if (count($payments) == 1)
                                                        {{ date('d M Y', strtotime(Auth::user()->package_end_date)) }}
                                                    @else
                                                        {{ date('d M Y', strtotime($active_payment->package_end_date)) }}
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="text-base text-gray pr-12">
                                                <div class="py-2">
                                                    <a class="btn btn-lg py-1 text-gray text-sm px-2 rounded-lg  bg-lime-orange text-center"
                                                        href="{{ url('refund/' . $active_payment->id) }}">
                                                        Refund
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class=" text-base text-gray whitespace-nowrap font-book pr-24 pl-4">
                                                <p>Free Trial</p>
                                            <td class="text-base text-gray pr-12">
                                                <div class="py-2">
                                                    <p
                                                        class="text-gray text-sm px-2 rounded-lg inline-block bg-lime-orange text-center">
                                                        Active
                                                    </p>
                                                </div>
                                            </td>
                                            <td class="text-base text-smoke whitespace-nowrap pr-12">
                                                {{ date('d M Y', strtotime(Auth::user()->package_end_date)) }}
                                                {{-- {{ date_diff(new \DateTime(Auth::user()->package_start_date),new \DateTime(Auth::user()->package_end_date))->format('%m Months, %d days') }} --}}
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg py-8 px-8 ">
                <div>
                    <p class="text-2xl text-gray uppercase mb-4 font-heavy">billing history</p>
                    <div class="overflow-x-auto">
                        <table class="w-full youraccount-billing-table" id="youraccount-billing-table">
                            <thead>
                                <tr>
                                    <th class="text-sm text-smoke  pr-28 pl-4">Items</th>
                                    <th class="text-sm text-smoke pr-10">Invoice#</th>
                                    <th class="text-sm text-smoke pr-10">Issued</th>
                                    <th class="text-sm text-smoke pr-10">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment)
                                    <tr>
                                        <td class="text-base text-gray whitespace-nowrap font-book pr-28 pl-4">
                                            <p>{{ $payment->package->package_title ?? '' }}</p>
                                        </td>
                                        <td class="text-base ">
                                            <div class="">
                                                <p class="text-base text-smoke mb-1 pr-10">#{{ $payment->invoice_num }}
                                                </p>
                                                <div class="flex pr-10">
                                                    <a class="text-base text-gray underline mr-1"
                                                        href="{{ route('invoice', $payment->invoice_num) }}">View</a>
                                                    <img class="object-contain"
                                                        src="{{ asset('/img/setting/link.svg') }}" />
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-base text-smoke whitespace-nowrap pr-10">
                                            {{ date('M d, Y', strtotime($payment->created_at)) ?? '' }}</td>
                                        <td class="text-base text-smoke pr-10">
                                            ${{ $payment->package->package_price ?? '' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $payments->links('includes.dashboard-pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
