@extends('layouts.master')
@section('content')

<div class="bg-gray-light2 youraccount-container pt-40 pb-40 mt-24 sm:mt-32 md:mt-0">
    <div class="grid lg:grid-cols-2 grid-cols-1 corporate-youraccount-gap-safari gap-2">
        <div class="bg-white rounded-lg py-8 px-8 ">
            <div>
                <p class="text-2xl text-gray uppercase mb-4 font-heavy">membership status</p>
                <div class="overflow-x-auto">
                    <table class="w-full youraccount-status-table" id="youraccount-status-table">
                        <thead>
                        <tr>
                            <th class="text-sm text-smoke pr-24 pl-4">Items</th>
                            <th class="text-sm text-smoke pr-12">Status</th>
                            <th class="text-sm text-smoke pr-12">Expiration</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class=" text-base text-gray whitespace-nowrap pr-24 pl-4">
                                    <p>Membership subscription</p>
                                    <p> {{ $company->package->package_title ?? '' }} Plan</p>
                                <td class="text-base text-gray pr-12">
                                    <div class="py-2">
                                        @if ($company->is_active)
                                        <p
                                        class="text-gray text-sm px-2 rounded-lg inline-block bg-lime-orange text-center">
                                        Active</p>
                                            @else
                                            <p
                                            class="text-gray-light3 text-sm px-2 rounded-lg inline-block bg-coral-dark text-center">
                                            Expired</p>
                                            @endif
                                        
                                    </div>
                                </td>
                                <td class="text-base text-smoke whitespace-nowrap pr-12">{{ date('M d, Y', strtotime($company->package_end_date)) }}</td>
                            </tr>
                        </tbody>
                    </table>
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
                            <th class="text-sm text-smoke pr-10">Invoice #</th>
                            <th class="text-sm text-smoke pr-10">Issued</th>
                            <th class="text-sm text-smoke pr-10">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($company->payments as $payment)
                                    <tr>
                                        <td class="text-base text-gray whitespace-nowrap font-book pr-28 pl-4">
                                            <p>{{ $payment->package->package_title ?? '' }} Subscription</p>
                                        </td>
                                        <td class="text-base ">
                                            <div class="">
                                                <p class="text-base text-smoke mb-1 pr-10">
                                                    {{ $payment->invoice_num ?? '' }}</p>
                                                <div class="flex pr-10">
                                                    <p class="text-base text-gray underline mr-1">
                                                        <a class="text-base text-gray underline mr-1"
                                                            href="{{ route('invoice', $payment->invoice_num) }}">View</a>
                                                    </p>
                                                    <img class="object-contain"
                                                        src="{{ asset('/img/setting/link.svg') }}" />
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-base text-smoke whitespace-nowrap pr-10">
                                            {{ date('M d, Y', strtotime($payment->created_at)) ?? '' }}</td>
                                        <td class="text-base text-smoke pr-10">
                                            ${{ $payment->package->package_price ?? '' }}</td>
                                    </tr>
                                @endforeach
                    </tbody>                    
                    </table>
                    {{-- <div class="pb-8">
                        <div class="flex">
                            <button onclick="changeYourAccountPagination(1)" id="youraccount-pagination1" type="button" class="
                            pagination1
                        uppercase
                        focus:outline-none
                        text-gray text-lg font-book
                        corporate-dashboard-pagination-btn
                        py-3
                        md:w-10 px-5 flex justify-center mr-2
                        ">
                                1
                            </button>
                            <button type="button" onclick="changeYourAccountPagination(2)" id="youraccount-pagination2" class=" pagination2
                            uppercase
                            focus:outline-none
                            text-gray text-lg font-book
                            corporate-dashboard-pagination-btn
                            py-3
                            md:w-10 px-5 flex justify-center mr-2
                            ">
                                2
                            </button>
                            <button type="button" id="youraccount-pagination3" onclick="changeYourAccountPagination(3)" class="
                            pagination3
                                uppercase
                                focus:outline-none
                                text-gray text-lg font-book
                                corporate-dashboard-pagination-btn
                                py-3
                                md:w-10 px-5 flex justify-center mr-2
                                ">
                                3
                            </button>
                            <div class="flex justify-center self-center">
                                <span class="text-lg text-gray ml-2 mr-2">.</span>
                                <span class="text-lg text-gray mr-2">.</span>
                                <span class="text-lg text-gray mr-2">.</span>
                            </div>
                            <button type="button" id="youraccount-pagination43" onclick="changeYourAccountPagination(43)" class="
                            pagination43
                                uppercase
                                focus:outline-none
                                text-gray text-lg font-book
                                corporate-dashboard-pagination-btn
                                py-3
                                md:w-10 px-5 flex justify-center mr-2
                                ">
                                43
                            </button>
                            <button type="button" id="youraccount-pagination44" onclick="changeYourAccountPagination(44)" class="
                            pagination44
                                uppercase
                                focus:outline-none
                                text-gray text-lg font-book
                                corporate-dashboard-pagination-btn
                                py-3
                                md:w-10 px-5 flex justify-center mr-2
                                ">
                                &gt;
                            </button>
                            <button type="button" id="youraccount-pagination45" onclick="changeYourAccountPagination(45)" class="pagination45
                                uppercase
                                focus:outline-none
                                text-gray text-lg font-book
                                corporate-dashboard-pagination-btn
                                py-3
                                md:w-10 px-5 flex justify-center mr-2
                                ">
                                &#62;&#62;
                            </button>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection
