@extends('admin.partials.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ __('Edit FAQ Section') }}</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ 'FAQs Section' }}</li>
                        <li class="breadcrumb-item active">{{ 'Edit FAQ' }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div>
        <form action="{{ route('admin.faq.update', $faq) }}" method="post">
            @method('put')
            @csrf
            <div class="card">
                <h3 class="font-bold text-xl text-gray-800 leading-tight px-4 py-2 mt-2">
                    Edit Faq
                </h3>
                <div class="card-body">
                    <div class="grid  grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                        <div class="col-span-full">
                            <label for="street-question"
                                class="block text-sm  leading-6 text-black font-bold">{{ __('Question') }}
                                <sup class="text-red-600">*</sup>
                            </label>
                            <div class="mt-2">
                                <input type="text" value="{{ $faq->question }}" id="question" name="question" required
                                    maxlength="250"
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            <x-input-error :messages="$errors->get('question')" class="mt-1" />
                        </div>

                        <div class="col-span-2">
                            <label for="street-tab" class="block text-sm leading-6 text-black font-bold">Type
                                <sup class="text-red-600">*</sup>
                            </label>
                            <div class="mt-2">
                                <select type="text" value="" id="tab" name="tab" required
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="1" @if ($faq->title == 1) selected @endif>Battery
                                    </option>
                                    <option value="2" @if ($faq->title == 2) selected @endif>Solar</option>
                                </select>
                            </div>
                            <x-input-error :messages="$errors->get('tab')" class="mt-1" />
                        </div>
                        <div class="col-span-full">
                            <label for="street-address"
                                class="block text-sm  leading-6 text-black font-bold">{{ __('Answer') }}
                                <sup class="text-red-600">*</sup>
                            </label>
                            <div class="mt-2">
                                <textarea name="answer" rows="4"
                                    class="block w-full rounded-md border-1 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $faq->answer }}</textarea>
                            </div>
                            <x-input-error :messages="$errors->get('answer')" class="mt-1" />
                        </div>

                    </div>
                    <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10  py-4 mt-10">
                        <a href="{{ route('admin.faqs') }}" type="button"
                            class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600 mb-3">Cancel</a>
                        <button type="submit"
                            class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 mb-3">Update</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection
