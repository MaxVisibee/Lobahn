@extends('layouts.master')
@section('content')

    <div class="report-container md:pt-48 pt-60 pb-40">
        <div class="grid 2xl-custom-1366:grid-cols-3 lg:grid-cols-2 md:grid-cols-2 gap-2">
            <div class="bg-white flex rounded-lg pl-8 pr-4 py-12 ">
                <div class="lg:flex w-full self-center gap-4">
                    <div class="lg:w-1/5">
                        <img class="object-contain self-center m-auto" src="./img/reports/icon1.svg" />
                    </div>
                    <div class="lg:w-4/5 lg:mt-0 mt-3 lg:text-left text-center">
                        <p class="uppercase 4xl-custom:whitespace-nowrap text-gray-light1 text-lg font-book">No. of
                            opportunities
                            presented</p>
                        <p class="uppercase text-gray text-4xl">{{ number_format($user->num_shortlists) }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white flex rounded-lg gap-4 pl-8 pr-4 py-12">
                <div class="lg:flex w-full self-center gap-4">
                    <div class="lg:w-1/5">
                        <img class="object-contain self-center m-auto" src="./img/reports/icon2.svg" />
                    </div>
                    <div class="lg:w-4/5 lg:mt-0 mt-3 lg:text-left text-center">
                        <p class="uppercase text-gray-light1 text-lg font-book">No. of profiles sent</p>
                        <p class="uppercase text-gray text-4xl">{{ number_format($user->num_sent_profiles) }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white flex rounded-lg pl-8 pr-4 py-12">
                <div class="lg:flex w-full self-center gap-4">
                    <div class="lg:w-1/5">
                        <img class="object-contain self-center m-auto" src="./img/reports/icon3.svg" />
                    </div>
                    <div class="lg:w-4/5 lg:mt-0 mt-3 lg:text-left text-center">
                        <p class="uppercase whitespace-nowrap text-gray-light1 text-lg font-book">
                            opportunities presented</p>
                        <p class="uppercase text-gray text-4xl">{{ number_format($user->num_opportunities_presented) }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-white flex rounded-lg  pl-8 pr-4 py-12 ">
                <div class="lg:flex w-full self-center gap-4">
                    <div class="lg:w-1/5">
                        <img class="object-contain self-center m-auto" src="./img/reports/icon3.svg" />
                    </div>
                    <div class="lg:w-4/5 lg:mt-0 mt-3 lg:text-left text-center">
                        <p class="uppercase 4xl-custom:whitespace-nowrap text-gray-light1 text-lg font-book">No. of employer
                            connections</p>
                        <p class="uppercase text-gray text-4xl">{{ number_format($user->num_connections) }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white flex rounded-lg gap-4 pl-8 pr-4 py-12">
                <div class="lg:flex w-full self-center gap-4">
                    <div class="lg:w-1/5">
                        <img class="object-contain self-center m-auto" src="./img/reports/icon4.svg" />
                    </div>
                    <div class="lg:w-4/5 lg:mt-0 mt-3 lg:text-left text-center">
                        <p class="uppercase  4xl-custom:whitespace-nowrap text-gray-light1 text-lg font-book">No. of
                            snapshot impressions</p>
                        <p class="uppercase text-gray text-4xl">{{ number_format($user->num_impressions) }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white flex rounded-lg pl-8 pr-4 py-12">
                <div class="lg:flex w-full self-center gap-4">
                    <div class="lg:w-1/5">
                        <img class="object-contain self-center m-auto" src="./img/reports/icon5.svg" />
                    </div>
                    <div class="lg:w-4/5 lg:mt-0 mt-3 lg:text-left text-center">
                        <p class="uppercase whitespace-nowrap text-gray-light1 text-lg font-book">
                            No. of profile views</p>
                        <p class="uppercase text-gray text-4xl">{{ number_format($user->num_profile_views) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="justify-start pt-8 hidden">
            <button type="button"
                class="text-center
uppercase
focus:outline-none
text-gray-light3 text-lg
report-back-btn
py-3
px-12
">
                Back
            </button>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
