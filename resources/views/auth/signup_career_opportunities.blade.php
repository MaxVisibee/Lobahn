@extends('layouts.master')
@section('content')
    <div class="bg-gray-warm-pale text-white mt-28 py-16 md:pt-28 md:pb-28">
        <div class="flex flex-wrap justify-center items-center sign-up-card-section">
            <div
                class="group sign-up-card-section__explore join-individual flex flex-col items-center justify-center bg-gray-light m-2 rounded-md">
                <h1 class="text-xl sm:text-2xl xl:text-4xl text-center mb-5 font-heavy tracking-wide mt-4">JOIN AS AN
                    INDIVIDUAL MEMBER</h1>
                <form action="{{ route('career_store') }}" method="post" id="msform">
                    @csrf
                    <div class="sign-up-form mb-5">
                        <div class="mb-3 sign-up-form__information">
                            <p
                                class="@if (!$errors->has('name')) hidden @endif signup-name-required-message text-lg text-red-500 mb-1">
                                @foreach ($errors->get('name') as $error)
                                    {{ $error }}
                                @endforeach
                            </p>
                            <input type="text" name="name" id="name" placeholder="Name*" value="{{ old('name') }}"
                                required
                                class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide" />
                        </div>
                        <div class="mb-3 sign-up-form__information">
                            <p
                                class="@if (!$errors->has('email')) hidden @endif signup-email-required-message text-lg text-red-500 mb-1">
                                @foreach ($errors->get('email') as $error)
                                    {{ $error }}
                                @endforeach
                            </p>
                            <input type="email" name="email" id="email" placeholder="Email*" value="{{ old('email') }}"
                                required
                                class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide" />
                        </div>

                        {{-- <div class="mb-3 sign-up-form__information">
                            <p
                                class="@if (!$errors->has('phone')) hidden @endif signup-contactno-required-message text-lg text-red-500 mb-1">
                                @foreach ($errors->get('phone') as $error)
                                    {{ $error }}
                    @endforeach
                    </p>
                    <input type="text" name="phone" id="phone" placeholder="Contact No.*" value="{{ old('phone') }}" class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide" />
                </div> --}}
                        <div class="flex">
                            <div class="lg:w-30percent w-2/5 xl:mr-4 mr-2">
                                <div class="mb-3 sign-up-form__information country-code-container h-full">
                                    <div class="select-wrapper text-gray-pale h-full">
                                        <div class="select-preferences h-full">
                                            <div
                                                class="select__trigger h-full relative flex items-center justify-between pl-2 bg-gray cursor-pointer">
                                                <span>+852</span>
                                                <svg class="arrow transition-all mr-4" xmlns="http://www.w3.org/2000/svg"
                                                    width="13.328" height="7.664" viewBox="0 0 13.328 7.664">
                                                    <path id="Path_150" data-name="Path 150" d="M18,7.5l5.25,5.25L18,18"
                                                        transform="translate(19.414 -16.586) rotate(90)" fill="none"
                                                        stroke="#bababa" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" />
                                                </svg>
                                            </div>
                                            <div
                                                class="custom-options absolute block top-full left-0 right-0 bg-white transition-all opacity-0 invisible pointer-events-none cursor-pointer">
                                                <span
                                                    class="custom-option selected pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+1">+1</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+7">+7</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+20">+20</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+27">+27</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+30">+30</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+31">+31</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+32">+32</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+33">+33</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+34">+34</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+36">+36</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+39">+39</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+40">+40</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+41">+41</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+43">+43</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+44">+44</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+45">+45</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+46">+46</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+47">+47</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+48">+48</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+49">+49</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+51">+51</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+52">+52</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+53">+53</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+54">+54</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+55">+55</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+56">+56</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+57">+57</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+58">+58</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+60">+60</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+61">+61</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+62">+62</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+63">+63</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+64">+64</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+65">+65</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+66">+66</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+81">+81</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+82">+82</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+84">+84</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+86">+86</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+90">+90</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+91">+91</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+92">+92</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+93">+93</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+94">+94</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+95">+95</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+98">+98</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+211">+211</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+212">+212</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+213">+213</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+216">+216</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+218">+218</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+220">+220</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+221">+221</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+222">+222</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+223">+223</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+224">+224</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+225">+225</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+226">+226</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+227">+227</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+228">+228</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+229">+229</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+230">+230</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+231">+231</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+232">+232</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+233">+233</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+234">+234</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+235">+235</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+236">+236</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+237">+237</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+238">+238</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+239">+239</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+240">+240</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+241">+241</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+241">+241</span>

                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+242">+242</span>

                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+243">+243</span>

                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+244">+244</span>

                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+245">+245</span>

                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+246">+246</span>

                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+248">+248</span>

                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+249">+249</span>

                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+250">+250</span>

                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+251">+251</span>

                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+252">+252</span>

                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+253">+253</span>

                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+254">+254</span>

                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+255">+255</span>

                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+256">+256</span>

                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+257">+257</span>

                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+258">+258</span>

                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+260">+260</span>

                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+261">+261</span>


                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+262">+262</span>

                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+263">+263</span>

                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+264">+264</span>

                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+265">+265</span>

                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+266">+266</span>

                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+267">+267</span>

                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+268">+268</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+269">+269</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+290">+290</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+291">+291</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+297">+297</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+298">+298</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+299">+299</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+350">+350</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+351">+351</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+352">+352</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+353">+353</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+354">+354</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+355">+355</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+356">+356</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+357">+357</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+358">+358</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+359">+359</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+370">+370</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+371">+371</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+372">+372</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+373">+373</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+374">+374</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+375">+375</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+376">+376</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+377">+377</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+378">+378</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+379">+379</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+380">+380</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+381">+381</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+382">+382</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+383">+383</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+385">+385</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+386">+386</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+387">+387</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+389">+389</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+420">+420</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+421">+421</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+423">+423</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+500">+500</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+501">+501</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+502">+502</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+503">+503</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+504">+504</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+505">+505</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+506">+506</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+507">+507</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+508">+508</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+509">+509</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+590">+590</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+591">+591</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+592">+592</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+593">+593</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+595">+595</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+597">+597</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+598">+598</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+599">+599</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+670">+670</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+672">+672</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+673">+673</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+674">+674</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+675">+675</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+676">+676</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+677">+677</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+678">+678</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+679">+679</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+680">+680</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+681">+681</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+682">+682</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+683">+683</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+685">+685</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+686">+686</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+687">+687</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+688">+688</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+689">+689</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+690">+690</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+691">+691</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+692">+692</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+850">+850</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+852">+852</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+853">+853</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+855">+855</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+856">+856</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+880">+880</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+886">+886</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+960">+960</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+961">+961</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+962">+962</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+963">+963</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+964">+964</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+965">+965</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+966">+966</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+967">+967</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+968">+968</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+970">+970</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+971">+971</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+972">+972</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+973">+973</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+974">+974</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+975">+975</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+976">+976</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+977">+977</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+992">+992</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+993">+993</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+994">+994</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+995">+995</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+996">+996</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+998">+998</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+1-242">+1-242</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+1-246">+1-246</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+1-264">+1-264</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+1-268">+1-268</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+1-284">+1-284</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+1-340">+1-340</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+1-345">+1-345</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+1-441">+1-441</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+1-473">+1-473</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+1-649">+1-649</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+1-664">+1-664</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+1-670">+1-670</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+1-671">+1-671</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+1-684">+1-684</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+1-721">+1-721</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+1-758">+1-758</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+1-767">+1-767</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+1-784">+1-784</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+1-787">+1-787</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+1-809">+1-809</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+1-829">+1-829</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+1-849">+1-849</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+1-868">+1-868</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+1-869">+1-869</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+1-876">+1-876</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+1-939">+1-939</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+44-1481">+44-1481</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+44-1534">+44-1534</span>
                                                <span
                                                    class="custom-option pr-4 block relative transition-all hover:bg-lime-orange hover:text-gray"
                                                    data-value="+44-1624">+44-1624</span>

                                            </div>
                                            <input type="hidden" name="country_code" value="+852">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:w-70percent w-3/5">
                                <div class="sign-up-form__information">
                                    <p class="hidden signup-contactno-required-message text-lg text-red-500 mb-1">contact
                                        no. is required !</p>
                                    {{-- <input type="tel" id="phone" placeholder="Contact No.*" value="{{ old('phone') }}"
                                        required name="phone"
                                        class="focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide" /> --}}
                                    <input type="number" name="phone" required placeholder="Contact No."
                                        value="{{ old('phone') }}" pattern="/^-?\d+\.?\d$/"
                                        onKeyPress="if(this.value.length==9) return false;"
                                        class="contact-phno focus:outline-none w-full bg-gray text-gray-pale pl-8 pr-4 py-4 rounded-md tracking-wide" />
                                </div>
                            </div>
                        </div>

                        <div class="accept-condition-box text-sm">
                            <input type="checkbox" name="" value="" name="career_agreement" id="career_agreement" required
                                class="focus:outline-none accept-condition-box__checkbox">
                            <label for="career_agreement" class="accept-condition-box__label text-gray-pale"><span>I
                                    understand and accept the <a href="{{ route('terms') }}"
                                        class="text-lime-orange">Terms
                                        and Conditions</a></span></label>
                        </div>
                    </div>
                </form>
                <button type="submit" form="msform"
                    class="text-lg btn h-11 leading-7 py-2 cursor-pointer focus:outline-none border border-lime-orange hover:bg-transparent hover:text-lime-orange">
                    Confirm
                </button>

            </div>
        </div>
    </div>
    {{-- Modal --}}
    <div class="fixed top-0 w-full h-screen left-0 hidden z-50 bg-black-opacity" id="email-verify">
        <div class="text-center text-white absolute top-1/2 left-1/2 popup-text-box bg-gray-light">
            <div class="flex flex-col justify-center items-center popup-text-box__container py-16 relative">
                <button class="absolute top-5 right-5 cursor-pointer focus:outline-none"
                    onclick="toggleModalClose('#email-verify')">
                    {{-- <img src="./img/sign-up/close.svg" alt="close modal image"> --}}
                </button>
                <h1 class="text-lg lg:text-2xl tracking-wide popup-text-box__title mb-4">EMAIL VERIFICATION SENT</h1>
                <p class="text-gray-pale popup-text-box__description">An email was sent to your email. Please click the
                    link
                    to verify the registration.Do check your spam folder if it doesn't arrive.</p>
                <p class="text-lime-orange popup-text-box__description">You are being granted an automatic 30-day free
                    trial!
                </p>
            </div>
        </div>
    </div>
    {{-- End Modal --}}
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.custom-nav').addClass('notransparent')

            $('.custom-option').click(function() {
                $(this).parent().next().val($(this).attr('data-value'));
            });

            $("#msform").submit(function(event) {
                $('#loader').removeClass('hidden')
            });

            @if (session('verified'))
                openModalBox('#email-verify')
                @php
                    \Session::forget('verified');
                @endphp
            @endif
        });
    </script>
@endpush
