@extends('layouts.master')
@section('content')
    <div class="bg-gray-light2 youraccount-container pt-40 pb-40 mt-24 sm:mt-32 md:mt-0">
        <div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
            <div class="bg-white rounded-lg py-8 px-8 ">
                <div>
                    <p class="text-2xl text-gray uppercase mb-4 font-heavy">membership status</p>
                    <div class="overflow-x-auto">
                        <table class="w-full youraccount-status-table-left" id="youraccount-status-table">
                            <thead>
                                <tr>
                                    <th class="text-sm text-smoke pr-24 pl-4">Membership</th>
                                    <th class="text-sm text-smoke pr-12">Status</th>
                                    <th class="text-sm text-smoke pr-12">Expiration</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-base text-gray whitespace-nowrap pr-24 pl-4">Annual Subscription</td>
                                    <td class="text-base text-gray pr-12">
                                        <div class="py-2">
                                            <p
                                                class="text-gray text-sm px-2 rounded-lg inline-block bg-lime-orange text-center">
                                                Active</p>
                                        </div>
                                    </td>
                                    <td class="text-base text-smoke whitespace-nowrap pr-12">22 Dec 2022</td>
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
                        <table class="w-full youraccount-status-table" id="youraccount-status-table">
                            <thead>
                                <tr>
                                    <th class="text-sm text-smoke  pr-28 pl-4">Membership</th>
                                    <th class="text-sm text-smoke pr-10">Invoice #</th>
                                    <th class="text-sm text-smoke pr-10">Issued</th>
                                    <th class="text-sm text-smoke pr-10">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-base text-gray whitespace-nowrap font-book pr-28 pl-4">
                                        <p>Annual Subscription</p>
                                    </td>
                                    <td class="text-base ">
                                        <div class="">
                                            <p class="text-base text-smoke mb-1 pr-10">123456789</p>
                                            <div class="flex pr-10">
                                                <p class="text-base text-gray underline mr-1">View</p>
                                                <img class="object-contain" src="./img/setting/link.svg" />
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-base text-smoke whitespace-nowrap pr-10">21 Aug 2021</td>
                                    <td class="text-base text-smoke pr-10">$1,900</td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td class="text-base text-gray whitespace-nowrap pr-28 pl-4">
                                        <p>Annual Subscription</p>
                                    </td>
                                    <td class="text-base pr-10">
                                        <div class="">
                                            <p class="text-base text-smoke mb-1">123456789</p>
                                            <div class="flex">
                                                <p class="text-base text-gray underline mr-1">View</p>
                                                <img class="object-contain" src="./img/setting/link.svg" />
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-base text-smoke whitespace-nowrap pr-10">21 Aug 2020</td>
                                    <td class="text-base text-smoke pr-10">$1,900</td>
                                </tr>
                            </tbody>
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
