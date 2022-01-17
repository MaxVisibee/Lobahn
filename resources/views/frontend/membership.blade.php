@extends('layouts.frontend-master')

@section('content')

    <div class="bg-gray-warm-pale pb-32 pt-48 membership-container">
        <div>
            <p class="text-white font-book text-5xl uppercase text-center">Membership</p>
            <div class="flex justify-center">
                <p class="font-book text-21 text-gray-pale text-center membership-list-desc flex justify-center">
                    In finibus orci at dui posuere, a varius sapien facilisis. Maecenas ut bibendum dui. Suspendisse non
                    convallis orci, sed fermentum magna. Sed ornare lectus ante, nec ullamcorper urna sollicitudin vitae.
                </p>
            </div>
            <div class="grid xl:grid-cols-3 grid-cols-1">
                <div class="bg-gray flex pl-8 xl:col-span-2 membership-list-div xl:-mr-4 pr-12">
                    <div class="flex self-center">
                        <div>
                            <div class="flex">
                                <img class="object-contain" src="./img/home/membership/check.svg" />
                                <p class=" pl-6 text-lime-orange text-21 font-book ">UNLIMITED<span
                                        class="text-gray-pale text-21 font-book pl-2"> MATCHES TO CAREER AND BUSINESS
                                        OPPORTUNITIES</span> </p>

                            </div>
                            <div class="flex">
                                <img class="object-contain" src="./img/home/membership/check.svg" />
                                <p class=" pl-6 text-lime-orange text-21 font-book ">DIRECT<span
                                        class="text-gray-pale text-21 font-book pl-2">CONNECTION TO MEMBERS</span> </p>

                            </div>
                            <div class="flex">
                                <img class="object-contain" src="./img/home/membership/check.svg" />
                                <p class=" pl-6 text-gray-pale text-21 font-book pr-2">
                                    CASH AND EXPERIENCE
                                    <span class="text-lime-orange text-21 font-book pr-2">REWARDS </span>
                                    <span class="text-gray-pale text-21 font-book">FOR EVERY SUCCESSFUL MATCH </span>
                                </p>


                            </div>
                            <div class="flex">
                                <img class="object-contain" src="./img/home/membership/check.svg" />
                                <p class=" pl-6 text-lime-orange text-21 font-book pr-2">INVITATIONS
                                    <span class="text-gray-pale text-21 font-book">TO MEMBER EVENTS</span>
                                </p>

                            </div>
                            <div class="flex">
                                <img class="object-contain" src="./img/home/membership/check.svg" />
                                <p class=" pl-6 text-gray-pale text-21 font-book pr-2">CANCEL <span
                                        class="text-lime-orange text-21 font-book">ANYTIME</span></p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-1 ">
                    <img class="object-contain m-auto" src="./img/home/membership/Intersection 37.png" />
                </div>
            </div>
            <!-- <div class="w-full flex justify-between ">
                            <div class="bg-gray w-70percent flex pl-8 pr-12">
                                <img class="object-contain opacity-0 m-auto" src="./img/home/membership/Intersection 37.png" />
                                
                                
                            </div>
                            <div class="membership-image w-30percent">
                                <img class="object-contain opacity-0 m-auto" src="./img/home/membership/Intersection 37.png" />
                            </div>
                        </div> -->
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.homemenu-bg-div').css("background-color", "rgb(26, 26, 26) !important");
        });
    </script>
@endpush
