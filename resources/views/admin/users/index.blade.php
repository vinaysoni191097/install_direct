@extends('admin.partials.main')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{ __('Users') }}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item active">{{ 'All users' }}</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ __('All Users') }}</h4>
            <div class="table-responsive">
                <table class="table table-hover mb-0">

                    <thead>
                        <tr>
                            <th>{{ __('SNo.') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Phone Number') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users->count() > 0)
                        @foreach ($users as $key => $user)
                        <tr>
                            <th> {{ $key + $users->firstItem() }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td class="space-x-2">
                                <a href="{{ route('admin.user.view', $user) }}" class="inline-block">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#16a34a" aria-hidden="true">
                                        <path d="M12 15a3 3 0 100-6 3 3 0 000 6z"></path>
                                        <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd"></path>
                                        <title>{{ __('View') }}</title>
                                    </svg>
                                </a>
                                <a href="{{ route('admin.user.edit', $user) }}" class="inline-block">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#252b3b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                        </path>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                        </path>
                                        <title>{{ __('Edit') }}</title>
                                    </svg>
                                </a>

                                {{-- Reset password  --}}
                                <a href="{{ route('admin.user.password.reset', $user) }}" class="inline-block">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 21" fill="#16a34a">
                                        <g fill="none" fill-rule="evenodd" stroke="#16a34a" stroke-linecap="round" stroke-linejoin="round" transform="matrix(0 1 1 0 2.5 2.5)">
                                            <path d="m3.98652376 1.07807068c-2.38377179 1.38514556-3.98652376 3.96636605-3.98652376 6.92192932 0 4.418278 3.581722 8 8 8s8-3.581722 8-8-3.581722-8-8-8">
                                            </path>
                                            <path d="m4 1v4h-4" transform="matrix(1 0 0 -1 0 6)">
                                            </path>
                                        </g>
                                        <title>{{ __('Reset password') }}</title>
                                    </svg>
                                </a>


                                @if(!$user->is_user_order_available)
                                {{-- Delete Confirmation Modal  --}}
                                <x-delete-confirmation-modal :values="$user" :message="'Are you sure you want to remove this user ?'" routename="{{ route('admin.user.delete', $user) }}" />
                                @else
                                <button type="button" disabled class=" cursor-not-allowed" >
                                    <svg class="w-5 h-5 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentcolor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0">
                                        </path>
                                        <title>{{ __("Can't delete user. Order is assigned") }}</title>
                                    </svg>
                                </button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <x-no-record-found />
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
        {{ $users->links() }}
    </div>
</div>
@endsection
