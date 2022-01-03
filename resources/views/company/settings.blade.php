@extends('layouts.master')
@section('content')
    <div class="setting-bg-container  md:pt-40 pt-48 pb-40">
        <div class="setting-bgwhite-container rounded-lg bg-white px-8 pb-16 pt-8">
            <div class="pb-8">
                <p class="setting-notification uppercase">Email Notifications</p>
            </div>
            <div class="md:flex notifications-content rounded-lg md:px-12 px-4 pt-4 xl:gap-3 gap-8">
                {{-- <div class="w-full">
                    <div class="md:flex md:justify-between">
                        <p class="text-sm text-gray font-book font-futura-pt">New Opportunities</p>
                        <div class="pb-2">
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="md:flex md:justify-between">
                        <p class="settingdesc font-book font-futura-pt">Change-of-status</p>
                        <div class="pb-2">
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="md:flex md:justify-between">
                        <p class="settingdesc font-book font-futura-pt">Connection</p>
                        <div class="pb-2">
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="md:flex md:justify-between">
                        <p class="settingdesc font-book font-futura-pt">Lobahn Connect™</p>
                        <div class="pb-2">
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div> --}}
                <div class="w-full">
                    <div class="md:flex md:justify-between">
                        <p class="text-lg text-gray font-book font-futura-pt">New Opportunities</p>
                        <div class="pb-2">
                            <label class="switch">
                                <input type="checkbox" class="setting" name="new_opportunities"
                                    @if ($company->new_opportunities == true) checked @endif>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="md:flex md:justify-between">
                        <p class="settingdesc text-lg font-book font-futura-pt">Change-of-status</p>
                        <div class="pb-2">
                            <label class="switch">
                                <input type="checkbox" class="setting" name="change_of_status"
                                    @if ($company->change_of_status == true) checked @endif>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="md:flex md:justify-between">
                        <p class="settingdesc text-lg font-book font-futura-pt">Connection</p>
                        <div class="pb-2">
                            <label class="switch">
                                <input type="checkbox" class="setting" name="connection" @if ($company->connection == true) checked @endif>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="md:flex md:justify-between">
                        <p class="settingdesc text-lg font-book font-futura-pt">Lobahn Connect™</p>
                        <div class="pb-2">
                            <label class="switch">
                                <input type="checkbox" class="setting" name="lobahn_connect"
                                    @if ($company->lobahn_connect == true) checked @endif>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="justify-start pt-8 pb-8 hidden">
            <button type="button" class="uppercase focus:outline-none text-gray-light3 text-lg setting-back-btn py-3">
                Back
            </button>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.setting').click(function() {
                $.ajax({
                    type: 'POST',
                    url: 'company-setting-update',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'name': $(this).attr('name')
                    }
                });
            });
        });
    </script>
@endpush
