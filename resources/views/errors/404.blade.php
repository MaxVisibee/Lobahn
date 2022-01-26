@extends("layouts.frontend-master",['body'=>""])
@section('content')
    <div class="notfount-page-container mt-40 mb-32">
        <div class="notfount-page">
            <h1 class=" leading-none text-gray font-futura-pt font-heavy text-center">404</h1>
            <h2 class="text-gray font-futura-pt font-heavy text-center">Page Not Found</h2>
            <div class="notfount-page-container mt-4">
                <button onclick="location.href='/'"
                    class="notfound-btn cursor-pointer focus:outline-none outline-none focus:border-none flex py-3 px-8">
                    <span class="text-white mr-4 font-heavy">Back Home</span>
                    <img class="ml-auto self-center w-4" src="./img/home/feature/Icon feather-arrow-right.png" /></button>
            </div>
        </div>
    </div>
@endsection
