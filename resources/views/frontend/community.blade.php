@extends('layouts.master')

@section('content')
<div class="relative com2-banner-box">
    <img src="./img/community/community-banner.png" class="w-full object-cover community1-height-banner" />
    <div class="absolute left-1/2 community-header text-center w-full">
        <h1 class="text-5xl leading-none text-white letter-spacing-custom ctbanner-title">Community</h1>
        <div class="hidden">
            <p class="text-gray-pale font-heavy leading-snug lg:text-lg sm:text-base text-xs mt-3">
                <span>Posted by</span>
                <span>Member Name</span>
                <span>last</span>
                <span>Jun 28, 2021</span>
            </p>
            <div class="flex justify-center items-center">
                <img src="./img/community/green.png" class="green-image"/>
                <p class="ml-2 lg:text-21 text-base text-gray-pale">Career</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-gray-warm-pale discussion-container py-12">
    <div class="xl:flex justify-center 2xl-custom-1366:gap-0 gap-4">
        <div class="xl:w-1/4 xl:mb-0 mb-8 px-0">
            <div class="pb-8 sm-custom-480:flex-col flex justify-center">
                <button class="text-lg font-book text-smoke-dark px-12 py-4 focus:outline-none bg-lime-orange border border-lime-orange hover:bg-transparent hover:text-lime-orange start-discussion-btn 2xl-custom-1440:w-72 w-60 rounded-corner">Post an Article</button>
            </div>
            <div class="flex mb-4">
                <img src="./img/home/discussion/red.svg" />
                <p class=" text-21 font-book text-gray-pale ml-4">Account</p>
            </div>
            <div class="flex mb-4">
                <img src="./img/home/discussion/lightgreen.svg" />
                <p class="text-21 font-book text-gray-pale ml-4">Career</p>
            </div>
            <div class="flex">
                <img src="./img/home/discussion/skyblue.svg" />
                <p class="text-21 font-book text-gray-pale ml-4">Subscription</p>
            </div>
        </div>
        <div class="xl:w-3/4">
            <div class="flex justify-between px-0">
                <div class="discussion-select-wrapper text-gray-pale">
                    <div class="discussion-select-preferences">
                        <div class="discussion-select__trigger py-3 relative flex items-center text-gray justify-between pl-2 bg-gray-light2 cursor-pointer">
                            <span class="pr-8 whitespace-nowrap text-base font-book">Latest</span>
                            <svg class="transition-all mr-4" xmlns="http://www.w3.org/2000/svg" width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                    transform="translate(19.414 -16.586) rotate(90)" fill="none" stroke="#2F2F2F" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            </svg>
                        </div>
                        <div class="discussion-custom-options rounded-lg mt-1 absolute block top-full left-0 right-0 bg-gray-light3 transition-all 
                              opacity-0 invisible pointer-events-none cursor-pointer">
                            <div class=" flex discussion-custom-option pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray" data-value="Latest">
                                <div class="w-10percent flex discussion-select-custom-icon-container">
                                    <img class="mr-2 checkedIcon1" src="./img/dashboard/checked.svg" />
                                </div>
                                <span class="w-90percent discussion-select-custom-content-container text-base font-book pl-2 text-gray">Latest</span>
                            </div>
                            <div class="flex discussion-custom-option  pr-4 relative transition-all hover:bg-gray-light2 hover:text-gray" data-value="Most Liked">
                                <div class="w-10percent flex discussion-select-custom-icon-container">
                                    <img class="mr-2 checkedIcon2 hidden" src="./img/dashboard/checked.svg" />
                                </div>
                                <span class="w-90percent discussion-select-custom-content-container text-base font-book pl-2 text-gray">Most Liked</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="cursor-pointer sm-custom-480:justify-start justify-center flex">
                    <img src="./img/home/discussion/refresh.svg" />
                </div>
            </div>
            <!-- <div onclick="goToDetailpage('./community2.html')"  class="gap-4 cursor-pointer md:flex bg-smoke-dark hover:bg-gray-light lg:px-8 px-4 py-4 mt-5 rounded-corner"> -->
            <div class="gap-4 md:flex bg-smoke-dark hover:bg-gray-light lg:px-8 px-4 py-4 mt-5 rounded-corner">
                <div class="md:w-10percent">
                    <img class="rounded-full" src="./img/home/discussion/1.png" />
                </div>
                <div class="md:w-90percent md:mt-0 mt-1">
                    <div class="md:flex">
                        <div class="">
                            <div class="md:flex justify-between">
                                <a href="/community/1"><p class="text-2xl text-lime-orange font-heavy">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p></a>
                                <div class="flex">
                                    <div class="flex mr-6">
                                        <img class="mr-2 cursor-pointer" src="./img/home/discussion/fav.svg" />
                                        <p class=" cursor-pointer flex self-center text-lg text-gray-pale">0</p>
                                    </div>
                                    <div class="hidden">
                                        <img class="mr-2" src="./img/home/discussion/comment.svg" />
                                        <p class="flex self-center text-lg text-gray-pale">0</p>
                                    </div>
                                </div>
                            </div>
                            <div class="md:flex text-lg text-gray-pale">
                                <p class="pr-2 font-heavy">Member Name </p>
                                <p>started Jun 28, 2021</p>
                            </div>
                            <p class="text-lg leading-none font-book text-gray-pale mt-1">
                                Pellentesque mollis vestibulum auctor. Nunc condimentum massa quis elit pellentesque dapibus. Donec accumsan scelerisque hendrerit. Etiam pretium urna eu elit consectetur,ac maximus nisi auctor.
                            </p>
                        </div>

                    </div>
                    <div class="flex pt-4">
                        <img src="./img/home/discussion/red.svg" />
                        <p class="flex self-center text-21 text-gray-pale ml-4">Account</p>
                    </div>
                </div>
            </div>
            {{--
            <div onclick="goToDetailpage('./community2.html')"  class="gap-4 cursor-pointer md:flex bg-smoke-dark hover:bg-gray-light  lg:px-8 px-4 py-4 mt-4 rounded-corner">
                <div class="md:w-10percent">
                    <img class="rounded-full"  src="./img/home/discussion/2.png" />
                </div>
                <div class="md:w-90percent md:mt-0 mt-1">
                    <div class="flex">
                        <div class="">
                            <div class="md:flex justify-between">
                                <p class="text-2xl text-lime-orange font-heavy">Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit</p>
                                <div class="flex">
                                    <div class="flex mr-6">
                                        <img class="mr-2 cursor-pointer" src="./img/home/discussion/fav.svg" />
                                        <p class="flex self-center text-lg text-gray-pale">134</p>
                                    </div>
                                    <div class="hidden">
                                        <img class="mr-2" src="./img/home/discussion/comment.svg" />
                                        <p class="flex self-center text-lg text-gray-pale">134</p>
                                    </div>
                                </div>
                            </div>
                            <div class="md:flex text-lg text-gray-pale">
                                <p class="pr-2 font-heavy">Member Name </p>
                                <p>replied an hour ago</p>
                            </div>
                            <p class="text-lg font-book leading-none text-gray-pale">
                                Pellentesque mollis vestibulum auctor. Nunc condimentum massa quis elit pellentesque dapibus. Donec accumsan scelerisque hendrerit. Etiam pretium urna eu elit consectetur, ac maximus nisi auctor.
                            </p>
                        </div>

                    </div>
                    <div class="flex pt-4">
                        <img src="./img/home/discussion/lightgreen.svg" />
                        <p class="flex self-center text-21 text-gray-pale ml-4">Career</p>
                    </div>
                </div>
            </div>
            --}}
            <div class="pb-8 overflow-auto pt-12">
    			<div class="flex gap-2">
        			<button id="discussion-pagination1" type="button" class=" newcontent-pagination1
        			 uppercase focus:outline-none text-lime-orange text-lg font-book discussion-pagination-btn py-2 md:w-10 px-5 flex justify-center"> 1
        			</button>
			        <button type="button" onclick="changeDiscussionPagination(2)" id="pagination2" class=" pagination2 uppercase  focus:outline-none text-lime-orange text-lg font-book discussion-pagination-btn py-2 md:w-10 px-5 flex justify-center">
			            2
			        </button>
			        <button type="button" id="pagination3" onclick="changeDiscussionPagination(3)" class=" pagination3 uppercase focus:outline-none text-lime-orange text-lg font-book discussion-pagination-btn py-2 md:w-10 px-5 flex justify-center">
			            3
			        </button>
			        <div class="flex justify-center self-center">
			            <span class="text-lg text-lime-orange ml-2 mr-2">.</span>
			            <span class="text-lg text-lime-orange mr-2">.</span>
			            <span class="text-lg text-lime-orange mr-2">.</span>
			        </div>
			        <button type="button" id="pagination43" onclick="changeDiscussionPagination(43)" class="pagination43 uppercase focus:outline-none text-lime-orange text-lg font-book discussion-pagination-btn py-2 md:w-10 px-5 flex justify-center">
			            43
					</button>
			        <button type="button" id="pagination44" onclick="changeDiscussionPagination(44)" class="pagination44 uppercase focus:outline-none text-lime-orange text-lg font-book discussion-pagination-btn py-2 md:w-10 px-5 flex justify-center">
			            &gt;
			        </button>
        			<button type="button" id="pagination45" onclick="changeDiscussionPagination(45)" class="pagination45 uppercase focus:outline-none text-lime-orange text-lg font-book discussion-pagination-btn py-2 md:w-10 px-5 flex justify-center">
			            &#62;&#62;
			        </button>
    	</div>
	</div>
        </div>
    </div>
</div>
{{--
<div class="fixed top-0 w-full h-screen left-0 block z-50 bg-black-opacity" id="sign-up-popup">   
    <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
        <div class="flex flex-col justify-center items-center popup-text-box__container popup-text-box__container--sign-up py-16 relative">
            <button class="absolute top-5 right-5 cursor-pointer focus:outline-none" onclick="toggleModalClose('#sign-up-popup')">
                <img src="./img/sign-up/close.svg" alt="close modal image">
            </button>
            <h1 class="text-base lg:text-lg tracking-wide popup-text-box__title mb-4">To view this page, you must be a logged in user.</h1>
            <div class="button-bar button-bar--sign-up-btn">
                <a href="../sign-up.html" class="btn-bar font-heavy inline-block text-lime-orange text-sm lg:text-lg hover:bg-lime-orange hover:text-gray border border-lime-orange rounded-full py-4 px-4 mr-2 btn-pill" >Sign Up</a>
                <a href="../login.html" class="btn-bar font-heavy inline-block text-lime-orange text-sm lg:text-lg hover:bg-lime-orange hover:text-gray border border-lime-orange rounded-full py-4 px-4 btn-pill active button-bar--sign-up-btn__login ">Login</a>
            </div> 
        </div>
    </div>  
</div>
--}}
@endsection

@push('scripts')
  <script>
  </script> 
@endpush                   