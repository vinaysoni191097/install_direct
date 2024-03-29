@extends('admin.partials.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ __('Team Members') }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ 'All members' }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ __('All Members') }}</h4>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <div class="flex justify-content-end gap-4">
                            <a href="{{ route('admin.team.member.create') }}">
                                <button type="button"
                                    class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 mb-3">
                                    {{ 'Add Member' }}
                                </button>
                            </a>
                        </div>
                        <thead>
                            <tr>
                                <th>{{ __('SNo.') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Phone Number') }}</th>
                                <th>{{ __('Designation') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($members->count() > 0)
                                @foreach ($members as $key => $member)
                                    <tr>
                                        <th> {{ $key + $members->firstItem() }}</th>
                                        <td>{{ $member->full_name }}</td>
                                        <td>{{ $member->email }}</td>
                                        <td>{{ $member->phone_number }}</td>
                                        <td>{{ $member->designation }}</td>
                                        <td class="space-x-2">
                                            <a href="{{ route('admin.team.member.view', $member->slug) }}"
                                                class="inline-block">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="#16a34a" aria-hidden="true">
                                                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z"></path>
                                                    <path fill-rule="evenodd"
                                                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                                                        clip-rule="evenodd"></path>
                                                    <title>{{ __('View') }}</title>
                                                </svg>
                                            </a>
                                            <a href="{{ route('admin.team.member.edit', $member) }}" class="inline-block">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="#252b3b"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                    </path>
                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                    </path>
                                                    <title>{{ __('Edit') }}</title>
                                                </svg>
                                            </a>

                                            {{-- Delete Confirmation Modal  --}}
                                            <x-delete-confirmation-modal :values="$member" :message="'Are you sure you want to remove this member ?'"
                                                routename="{{ route('admin.team.member.delete', $member->slug) }}" />
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
            {{ $members->links() }}
        </div>
    </div>
@endsection
