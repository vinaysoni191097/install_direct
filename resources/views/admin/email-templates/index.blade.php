@extends('admin.partials.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ __('All Email Templates') }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ 'Email Templates' }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>


    <div>
        <div class="card">
            <div class="card-body">
                <div class="flex">
                    <h4 class="card-title">{{ __('All Templates') }}</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">

                        <thead class="table-light">
                            <tr>
                                <th>{{ __('SNo.') }}</th>
                                <th>{{ __('Template used for') }}</th>
                                <th>{{ __('Subject') }}</th>
                                <th>{{ __('Created At') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($templates->count() > 0)
                                @foreach ($templates as $key => $template)
                                    <tr>
                                        <th> {{ $key + $templates->firstItem() }}</th>
                                        <td>{{ $template->template_used_for }}</td>
                                        <td>{{ $template->subject }}</td>
                                        <td>{{ $template->created_at->format('M d Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.email.template.edit', $template) }}">
                                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="#16a34a" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1">
                                                    </path>
                                                    <path
                                                        d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                                    </path>
                                                    <path d="M16 5l3 3"></path>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                            <x-no-record-found />

                            @endif
                        </tbody>
                    </table>
                </div>

                {{ $templates->links() }}
            </div>
        </div>
    </div>
@endsection
