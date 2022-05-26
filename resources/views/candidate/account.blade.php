@extends('layouts.master', ['title' => 'YOUR ACCOUNT'])
@section('content')
    @foreach ($active_payments as $active_payment)
        <div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity"
            id="renew-change-popup{{ $active_payment->id }}">
            <div class="text-center text-gray-pale absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
                <div class="flex flex-col justify-center items-center popup-text-box__container pt-16 pb-12 relative">
                    <p class="text-base lg:text-lg tracking-wide popup-text-box__title mb-4 letter-spacing-custom"></p>
                    <div class="button-bar sm:mt-5">
                        <button
                            class="focus:outline-none btn-bar text-gray-light bg-smoke text-sm sm:text-base xl:text-lg hover:bg-transparent border border-smoke rounded-corner py-2 px-4 hover:text-lime-orange"
                            onclick="cancelRenew('#renew-change-popup{{ $active_payment->id }}',{{ $active_payment->id }})">Cancel</button>
                        <button data-value="{{ $active_payment->id }}"
                            class="toggle-renew focus:outline-none btn-bar text-gray-light bg-lime-orange text-sm sm:text-base xl:text-lg hover:bg-white border border-smoke rounded-corner py-2 px-4 hover:text-lime-orange"
                            onclick="confirmRenew('#renew-change-popup{{ $active_payment->id }}',{{ $active_payment->id }})">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity" id="renew-change-success-popup">
        <div class="text-center text-gray-pale absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div class="flex flex-col justify-center items-center popup-text-box__container pt-16 pb-12 relative">
                <button class="absolute top-5 right-5 cursor-pointer focus:outline-none"
                    onclick="toggleModalClose('#renew-change-success-popup')">
                    <img src="./img/sign-up/close.svg" alt="close modal image">
                </button>
                <p class="text-base lg:text-lg tracking-wide popup-text-box__title mb-4 letter-spacing-custom">Changes
                    successful .</p>
                <div class="button-bar sm:mt-5">
                    <button onclick="toggleModalClose('#renew-change-success-popup')"
                        class="focus:outline-none btn-bar text-gray-light bg-lime-orange text-sm sm:text-base xl:text-lg hover:bg-white border border-smoke rounded-corner py-2 px-4">Return</button>
                </div>
            </div>
        </div>
    </div>


    <div class="bg-gray-light2 youraccount-container pt-40 pb-40 mt-24 sm:mt-32 md:mt-0">
        <div class="grid lg:grid-cols-2 grid-cols-1 professional-activities-report-gap-safari gap-2">
            <div class="">
                <div class="bg-white rounded-lg py-8 px-8 ">
                    <p class="text-2xl text-gray uppercase mb-4 font-heavy">membership status</p>
                    <div class="overflow-x-auto">
                        <table class="w-full youraccount-status-table" id="youraccount-status-table">
                            <thead>
                                <tr>
                                    <th class="text-sm text-smoke pr-24 pl-4">Items</th>
                                    <th class="text-sm text-smoke pr-12">Status</th>
                                    <th class="text-sm text-smoke pr-12">Expiration</th>
                                    <th class="text-sm text-smoke pr-12">AutoRenew</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($active_payments as $active_payment)
                                    <tr>
                                        <td class=" text-base text-gray whitespace-nowrap font-book pr-24 pl-4">
                                            <p>{{ $active_payment->package->package_title ?? '' }} Subscription</p>
                                        <td class="text-base text-gray pr-12">
                                            <div class="py-2">
                                                @if ($active_payment->status)
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
                                            @if (count($payments) == 1)
                                                {{ date('d M Y', strtotime(Auth::user()->package_end_date)) }}
                                            @else
                                                {{ date('d M Y', strtotime($active_payment->package_end_date)) }}
                                            @endif
                                        </td>
                                        <td class="text-base text-smoke whitespace-nowrap pr-12">
                                            <label id="member-professional-renew" data-value="{{ $active_payment->id }}"
                                                class="switch member-professional-renew member-professional-renew{{ $active_payment->id }}">
                                                <input type="checkbox" @if ($active_payment->auto_renew) checked @endif>
                                                <span class="slider round"></span>
                                            </label>
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
                                        </td>
                                        <td></td>
                                    </tr>
                                @endforelse
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
                                    <th class="text-sm text-smoke pr-10">Invoice#</th>
                                    <th class="text-sm text-smoke pr-10">Issued</th>
                                    <th class="text-sm text-smoke pr-10">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($payments as $payment)
                                    <tr>
                                        <td class="text-base text-gray whitespace-nowrap font-book pr-28 pl-4">
                                            <p>{{ $payment->package->package_title ?? '' }}</p>
                                        </td>
                                        <td class="text-base ">
                                            <div class="">
                                                <p class="text-base text-smoke mb-1 pr-10">#{{ $payment->invoice_num }}
                                                </p>
                                                <div class="flex pr-10">
                                                    <a class="text-base text-gray underline mr-1" target="_blank"
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
                                @empty
                                    <tr>
                                        <td colspan="4">
                                            <p class="ml-3"> No data </p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $payments->links('includes.dashboard-pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.toggle-renew').click(function() {
                $.ajax({
                    type: 'POST',
                    url: "{{ url('toggle-subscription') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": $(this).attr('data-value')
                    },
                    success: function(data) {
                        console.log(data.status)
                    }
                })
            })
        });
    </script>
@endpush
