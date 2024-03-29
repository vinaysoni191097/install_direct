<?php

namespace App\Http\Controllers\admin\sections;

use App\Http\Controllers\Controller;
use App\Models\sections\Faq;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class FaqSectionController extends Controller
{
    public function index()
    {
        try {
            return view('admin.sections.faq.index', [
                'faqs' => Faq::paginate(10),
            ]);
        } catch (\Exception $e) {
            Log::info('Error while accessing FAQ section'.$e);
        }
    }

    public function create()
    {
        try {
            return view('admin.sections.faq.create');
        } catch (\Exception $e) {
            Log::info('Error while creating FAQ Tab'.$e);

            return back()->with('error', 'Something went wrong. Unable to create FAQ');
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'question' => 'required',
                    'answer' => 'required',
                    'tab' => 'required',
                ]
            );
            $validated = $validator->validated();
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            DB::transaction(function () use ($validated) {
                Faq::create(
                    [
                        'title' => $validated['tab'],
                        'question' => $validated['question'],
                        'answer' => $validated['answer'],
                    ]
                );
            });

            return redirect()->route('admin.faqs')->with('success', 'FAQ tab created successfully!');
        } catch (\Exception $e) {
            Log::info('Error while saving FAQ '.$e);

            return back()->with('error', 'Something went wrong. Unable to store details.');
        }
    }

    public function edit(Faq $faq)
    {
        try {
            return view('admin.sections.faq.edit', [
                'faq' => $faq,
            ]);
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Unable to fetch edit page');
        }
    }

    public function Update(Request $request, Faq $faq)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'question' => 'required',
                    'answer' => 'required',
                    'tab' => 'required',
                ]
            );
            $validated = $validator->validated();
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            DB::transaction(function () use ($validated, $faq) {
                $faq->update([
                    'title' => $validated['tab'],
                    'question' => $validated['question'],
                    'answer' => $validated['answer'],
                ]);
            });

            return redirect()->route('admin.faqs')->with('success', 'FAQ tab updated successfully!');
        } catch (\Exception $e) {
            Log::info('Error while saving FAQ '.$e);

            return back()->with('error', 'Something went wrong. Unable to store details.');
        }
    }

    public function delete(Faq $faq)
    {
        try {
            if ($faq) {
                $faq->delete();

                return redirect()->back()->with('success', __('FAQ deleted successfully'));
            }
        } catch (Exception $e) {
            Log::info('Error while deleting FAQ'.$e);

            return redirect()->back()->with('error', 'Ops! Something went wrong!');
        }
    }
}
