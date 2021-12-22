@extends('layouts.master')
@section('content')
    <div class="bg-gray-light2 youraccount-container pt-40 pb-40">
        <div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
            <div class="bg-white rounded-lg py-8 px-8 ">
                <div>
                    <p class="text-2xl text-gray uppercase mb-4">membership status</p>
                    <div class="overflow-x-auto">
                        <table class="w-full youraccount-status-table-left" id="youraccount-status-table">
                            <tr>
                                <th class="text-sm text-smoke pr-24 pl-4">Membership</th>
                                <th class="text-sm text-smoke pr-12">Status</th>
                                <th class="text-sm text-smoke pr-12">Expiration</th>
                            </tr>
                            <tr>
                                <td class="text-base text-gray whitespace-nowrap pr-24 pl-4">
                                    {{ $user->package->package_title ?? '' }} Subscription</td>
                                <td class="text-base text-gray pr-12">
                                    <div class="py-2">
                                        <p class="text-gray text-sm px-2 rounded-lg inline-block bg-lime-orange text-center">
                                            @if ($user->is_active)
                                                Active
                                            @else
                                                No Active
                                            @endif
                                        </p>
                                    </div>
                                </td>
                                <td class="text-base text-smoke whitespace-nowrap pr-12">
                                    {{ date('M d, Y', strtotime($user->package_end_date)) }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg py-8 px-8 ">
                <div>
                    <p class="text-2xl text-gray uppercase mb-4">billing history</p>
                    <div class="overflow-x-auto">
                        <table class="w-full youraccount-status-table" id="youraccount-status-table">
                            <tr>
                                <th class="text-sm text-smoke  pr-28 pl-4">Membership</th>
                                <th class="text-sm text-smoke pr-10">Invoice #</th>
                                <th class="text-sm text-smoke pr-10">Issued</th>
                                <th class="text-sm text-smoke pr-10">Amount</th>
                            </tr>

                            @foreach ($user->payments as $payment)
                                <tr>
                                    <td class="text-base text-gray whitespace-nowrap pr-28 pl-4">
                                        {{ $payment->package->package_title ?? ''}}Subscription</td>
                                    <td class="text-base ">
                                        <div class="">
                                            <p class="text-base text-smoke mb-1 pr-10">{{ $payment->invoice_num ?? '' }}</p>
                                            <div class="flex pr-10">
                                                <a class="text-base text-gray underline mr-1"
                                                    href="{{ route('invoice', $payment->invoice_num) }}">View</a>
                                                <img class="object-contain" src="./img/setting/link.svg" />
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-base text-smoke whitespace-nowrap pr-10">
                                        {{ date('M d, Y', strtotime($payment->created_at)) ?? ''}}</td>
                                    <td class="text-base text-smoke pr-10">${{ $payment->package->package_price ?? ''}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="flex justify-start pt-8 pb-8 hidden">
                <button type="button"
                    class="
    uppercase
    focus:outline-none
    text-gray-light3 text-lg
    setting-back-btn
    py-3
    ">
                    Back
                </button>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
