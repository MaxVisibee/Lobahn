@extends('layouts.master')
@section('content')

    <div class="bg-gray-light2 postition-detail-content md:pt-40 pt-48 pb-32">
        <div class="bg-white py-12 md:px-10 px-4">
            <div class="lg:flex justify-between">
                <p class="lg:text-left text-center text-2xl text-gray uppercase font-book">{{ $listing->title }}
                </p>
                <div class="md:flex lg:justify-start lg:mt-0 mt-4 justify-center md:gap-4">
                    <div class="flex justify-center">
                        <button type="button" onclick="location.href='/position-detail-edit.html'"
                            class="uppercase focus:outline-none text-gray text-lg position-detail-edit-btn py-3 px-12">
                            Edit
                        </button>
                    </div>
                    <div class="flex justify-center">
                        <button type="button"
                            class="
        uppercase
        focus:outline-none
        text-gray-light3 text-lg
        position-detail-back-btn
        py-3
        px-12
        ">
                            Back
                        </button>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 mt-8">
                <div>
                    <p class="text-21 text-smoke pb-2 font-book tracking-wider">Description</p>
                </div>
                <div>
                    <p class="text-21 text-smoke pb-2 pl-2 font-book tracking-wider">Highlights</p>
                </div>

            </div>
            <div class="grid md:grid-cols-2 gap-4">
                <div class="bg-gray-light3 rounded-lg">
                    <div class="">
                        <div class="flex justify-center pl-4 pr-8 py-2">
                            <p class="text-gray text-lg font-book">Manage & execute integrated marketing & communications
                                plans across
                                multiple channels & functions in a dynamic & diverse team environment that pushes boundaries
                                every day.
                            </p>
                        </div>
                    </div>
                </div>
                <div class=" ">
                    <div class="bg-gray-light3 mb-2 py-2 rounded-lg">
                        <div class="flex px-4">
                            <div class="text-lg flex">
                                <p class="text-smoke mr-3">1.</p>
                                <p class="text-gray">Own & create marketing plans</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-light3 mb-2 py-2 rounded-lg">
                        <div class="px-4 ">
                            <div class="text-lg flex">
                                <p class="text-smoke mr-3">2.</p>
                                <p class="text-gray">Define the optimal marketing mix</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-light3 py-2 rounded-lg">
                        <div class="flex px-4">
                            <div class="text-lg flex">
                                <p class="text-smoke mr-3">3.</p>
                                <p class="text-gray">Drive growth through innovationx</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-8">
                <p class="text-21 text-smoke pb-2 font-book tracking-wider">Keywords</p>
            </div>
            <div class="flex flex-wrap gap-2 bg-gray-light3 rounded-lg py-4 pl-6">
                <div class="bg-gray-light1 rounded-2xl text-center px-2 mr-2">
                    <p class="text-gray-light3 text-sm">team management</p>
                </div>
                <div class="bg-gray-light1 rounded-2xl text-center px-2 mr-2">
                    <p class="text-gray-light3 text-sm">thirst for excellence</p>
                </div>
                <div class="bg-gray-light1 rounded-2xl text-center px-2 mr-2">
                    <p class="text-gray-light3 text-sm">travel</p>
                </div>
                <div class="bg-gray-light1 rounded-2xl text-center px-2 mr-2">
                    <p class="text-gray-light3 text-sm">e-commerce</p>
                </div>
                <div class="bg-gray-light1 rounded-2xl text-center px-2 mr-2">
                    <p class="text-gray-light3 text-sm">acquisition metrics</p>
                </div>
                <div class="bg-gray-light1 rounded-2xl text-center px-2 mr-2">
                    <p class="text-gray-light3 text-sm">digital marketing</p>
                </div>
            </div>
            <div class="grid md:grid-cols-2 mt-8 gap-4">
                <div class="">
                    <p class="text-21 text-smoke pb-2 font-book tracking-wider">Expiry Date</p>
                    <div class="flex py-2 bg-gray-light3 rounded-lg">
                        <p class="text-gray text-lg pl-6">2021-11-10</p>
                    </div>
                </div>
                <div class="">
                    <p class="text-21 text-smoke pb-2 font-book tracking-wider">Status</p>
                    <div class="flex justify-between py-2 bg-gray-light3 rounded-lg">
                        <p class="text-gray text-lg pl-6">Open</p>
                        <img class="object-contain self-center pr-4" src="./img/corporate-menu/positiondetail/select.svg" />
                    </div>
                </div>
            </div>
            <div class="mt-8">
                <p class="text-21 text-smoke pb-4">Matching Factors</p>
            </div>
            <div class="grid 2xl:grid-cols-2 grid-cols-1 gap-4">
                <div class="col-span-1">
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Company Name</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">Advanced Card Systems Holdings</p>
                            <img class="object-contain self-center pr-4"
                                src="./img/corporate-menu/positiondetail/select.svg" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Location</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">Hong Kong</p>
                            <img class="object-contain self-center pr-4"
                                src="./img/corporate-menu/positiondetail/select.svg" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Contract terms</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">Full-time</p>
                            <img class="object-contain self-center pr-4"
                                src="./img/corporate-menu/positiondetail/select.svg" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Target pay</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6 py-3"></p>
                            <!-- <img class="object-contain self-center pr-4"
                                        src="./img/corporate-menu/positiondetail/select.svg" /> -->
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Contract hours</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">Normal full-time work week</p>
                            <img class="object-contain self-center pr-4"
                                src="./img/corporate-menu/positiondetail/select.svg" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Location</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">Hong Kong</p>
                            <img class="object-contain self-center pr-4"
                                src="./img/corporate-menu/positiondetail/select.svg" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Keywords</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">Apache</p>
                            <img class="object-contain self-center pr-4"
                                src="./img/corporate-menu/positiondetail/select.svg" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Management level </p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">Normal full-time work week</p>
                            <img class="object-contain self-center pr-4"
                                src="./img/corporate-menu/positiondetail/select.svg" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Years </p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">Hong Kong</p>
                            <img class="object-contain self-center pr-4"
                                src="./img/corporate-menu/positiondetail/select.svg" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Education level </p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p style="word-break: break-all;" class="text-gray text-lg pl-6">HKCEE/HKDSE/IB/NVQ/A-Level</p>
                            <img class="object-contain self-center pr-4"
                                src="./img/corporate-menu/positiondetail/select.svg" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Academic institutions</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">Aarhus University, Denmark</p>
                            <img class="object-contain self-center pr-4"
                                src="./img/corporate-menu/positiondetail/select.svg" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Languages</p>
                        </div>
                        <div class="md:w-6/12 ">
                            <div class="flex justify-between bg-gray-light3 py-2 rounded-lg">
                                <p class="text-gray text-lg pl-6">Add Language</p>
                                <img class="object-contain self-center pr-4"
                                    src="./img/corporate-menu/positiondetail/plus.svg" />
                            </div>
                            <div class="w-full md:flex justify-between gap-4 mt-2">
                                <div class="md:w-2/4 flex justify-between bg-gray-light3 py-2 rounded-lg">
                                    <p class="text-gray text-lg xl:pl-6 pl-3">Cantonese</p>
                                    <img class="object-contain self-center pr-4"
                                        src="./img/corporate-menu/positiondetail/select.svg" />
                                </div>
                                <div class="md:w-2/4 flex justify-between">
                                    <div class="flex justify-between bg-gray-light3 py-2 rounded-lg">
                                        <p class="text-gray text-lg xl:pl-6 pl-3">Basic</p>
                                        <img class="object-contain self-center pr-4"
                                            src="./img/corporate-menu/positiondetail/select.svg" />
                                    </div>
                                    <div class="flex">
                                        <img class="object-contain self-center m-auto lg:pr-4"
                                            src="./img/corporate-menu/positiondetail/close.svg" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Geographical experience</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">Hong Kong and Macau</p>
                            <img class="object-contain self-center pr-4"
                                src="./img/corporate-menu/positiondetail/select.svg" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">People management </p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">0</p>
                            <img class="object-contain self-center pr-4"
                                src="./img/corporate-menu/positiondetail/select.svg" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Software & tech knowledge</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray self-center text-lg pl-6">AbacusLaw</p>
                            <img class="object-contain self-center pr-4"
                                src="./img/corporate-menu/positiondetail/select.svg" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Fields of study</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">AbacusLaw</p>
                            <img class="object-contain self-center pr-4"
                                src="./img/corporate-menu/positiondetail/select.svg" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Qualifications</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">ACA (Associate Chartered Account..</p>
                            <img class="object-contain self-center pr-4"
                                src="./img/corporate-menu/positiondetail/select.svg" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Key strengths</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">Business development</p>
                            <img class="object-contain self-center pr-4"
                                src="./img/corporate-menu/positiondetail/select.svg" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Position titles</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">A.I. Recruiter</p>
                            <img class="object-contain self-center pr-4"
                                src="./img/corporate-menu/positiondetail/select.svg" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Fields of study</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">AbacusLaw</p>
                            <img class="object-contain self-center pr-4"
                                src="./img/corporate-menu/positiondetail/select.svg" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Industry sectors</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">Consumer goods</p>
                            <img class="object-contain self-center pr-4"
                                src="./img/corporate-menu/positiondetail/select.svg" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Functional area</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">Communications</p>
                            <img class="object-contain self-center pr-4"
                                src="./img/corporate-menu/positiondetail/select.svg" />
                        </div>
                    </div>
                    <div class="md:flex justify-between mb-2">
                        <div class="md:w-6/12">
                            <p class="text-21 text-smoke pb-2">Desirable employers</p>
                        </div>
                        <div class="md:w-6/12 flex justify-between bg-gray-light3 py-2 rounded-lg">
                            <p class="text-gray text-lg pl-6">Advanced Card Systems Holdings</p>
                            <img class="object-contain self-center pr-4"
                                src="./img/corporate-menu/positiondetail/select.svg" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
