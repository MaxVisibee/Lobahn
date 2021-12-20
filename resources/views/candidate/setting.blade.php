@extends('layouts.master')
@section('content')

    <div class="professional-setting-bg-container bg-gray-light2 md:pt-40 pt-48 pb-40">
        <div class="grid xl:grid-cols-2 grid-cols-1 gap-2">
            <div class="setting-bgwhite-container rounded-lg bg-white px-12 pb-16 pt-8">
                <div class="pb-8">
                    <p class="text-gray uppercase text-2xl font-heavy font-futura-pt">Email Notifications</p>
                </div>
                <div class="md:flex notifications-content rounded-lg px-8 pt-4 xl:gap-3 gap-8">
                    <!-- <div class="w-10percent md:mb-0 mb-4">
                        <p class="font-book text-smoke text-sm font-futura-pt">Email</p>
                    </div> -->
                    <div class="w-full">
                        <div class="md:flex md:justify-between">
                            <p class="text-lg text-gray font-book font-futura-pt">New Opportunities</p>
                            <div class="pb-2">
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="md:flex md:justify-between">
                            <p class="settingdesc text-lg font-book font-futura-pt">Change-of-status</p>
                            <div class="pb-2">
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="md:flex md:justify-between">
                            <p class="settingdesc text-lg font-book font-futura-pt">Connection</p>
                            <div class="pb-2">
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="md:flex md:justify-between">
                            <p class="settingdesc text-lg font-book font-futura-pt">Lobahn Connect™</p>
                            <div class="pb-2">
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="setting-bgwhite-container rounded-lg bg-white px-12 pb-16 pt-8">
                <div class="pb-8">
                    <p class="text-gray uppercase text-2xl font-heavy font-futura-pt">Auto-connect</p>
                </div>
                <div class="md:flex notifications-content rounded-lg px-8 pt-4  xl:gap-3 gap-8">
                    <!-- <div class="w-10percent md:mb-0 mb-4">
                        <p class="font-book text-smoke text-sm font-futura-pt">Email</p>
                    </div> -->
                    <div class="w-full">
                        <div class="md:flex md:justify-between gap-12">
                            <p class="text-lg text-gray pb-6 font-book font-futura-pt">
                                Please send my Snapshot Profile, Full Profile & CV to the relevant Corporate Member without
                                any further action or authorisation on my part if an Opportunity posted by the Corporate
                                Member registers a JSR™ Score of 80.0% or higher.
                            </p>
                            <div class="pb-4">
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="setting-bgwhite-container rounded-lg bg-white px-12 pb-16 pt-8">
                <div class="pb-8">
                    <p class="text-gray uppercase text-2xl font-heavy">Featured Members Display</p>
                </div>
                <div class="md:flex notifications-content rounded-lg px-8 pt-4  xl:gap-3 gap-8">
                    <!-- <div class="w-10percent md:mb-0 mb-4">
                        <p class="font-book text-smoke text-sm">Email</p>
                    </div> -->
                    <div class="w-full">
                        <div class="md:flex md:justify-between gap-14">
                            <p class="text-lg text-gray pb-6 font-book">Please include my Snapshot Profile in the Featured
                                Members carousel on the Lobahn Connect™ website. I understand that Corporate Members may
                                view my Full Profile and CV via the Featured Members carousel, and that I may suspend my
                                Snapshot Profile from being displayed in the Featured Members carousel at any time by
                                unticking this box, at which time my Snapshot Profile will be removed from the Featured
                                Members carousel no later than the end of the following business day.</p>
                            <div class="pb-4">
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="justify-start pt-8 pb-24 hidden">
            <button type="button"
                class="
uppercase
focus:outline-none font-book
text-gray-light3 text-lg
setting-back-btn
py-3
">
                Back
            </button>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
