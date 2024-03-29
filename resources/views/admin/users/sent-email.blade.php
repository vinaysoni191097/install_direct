@extends('admin.partials.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center gap-2">
                <a href="{{ route('admin.user.view',$user) }}">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#16a34a">
                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                        <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"></path>
                    </svg>
                </a>
                <h4 class="mb-sm-0">{{ __('Email') }}</h4>


                {{-- <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">{{ __('Users') }}</a></li>
                        <li class="breadcrumb-item active">{{ 'View user' }}</li>
                    </ol>
                </div> --}}

            </div>
        </div>
    </div>

    <div>
        <div class="w-50 m-auto bg-white p-4 mb-10">
            <p>{!! json_decode($email->data, true)['email_content'] ?? 'NA' !!}</p>
        </div>

    </div>
    </div>
@endsection
