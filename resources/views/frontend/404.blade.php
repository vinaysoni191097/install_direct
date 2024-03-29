@extends('layouts.main')
@section('content')
    <main class="grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="text-center">
            <p class="text-5xl font-semibold text-black">404</p>
            <h1 class="mt-4 text-3xl font-bold tracking-tight text-green-600 sm:text-5xl">Page not found</h1>
            <p class="mt-6 text-base leading-7 text-gray-600">Sorry, we couldn't find the page you're looking for.</p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="{{ route('home') }}"
                    class="rounded-md  bg-green-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Go
                    back home</a>
                <a href="{{route('contactus')}}" class="text-sm font-semibold text-gray-900">Contact support <span
                        aria-hidden="true">&rarr;</span></a>
            </div>
        </div>
    </main>
@endsection
