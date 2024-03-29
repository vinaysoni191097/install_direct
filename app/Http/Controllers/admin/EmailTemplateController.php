<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmailTemplateController extends Controller
{
    public function index()
    {
        try {
            return view('admin.email-templates.index', [
                'templates' => EmailTemplate::paginate(10),
            ]);
        } catch (Exception $e) {
            Log::info('Error while accessing email marketing page'.$e);
        }
    }

    public function edit(EmailTemplate $emailTemplate)
    {
        try {
            return view('admin.email-templates.edit', [
                'template' => $emailTemplate,
            ]);
        } catch (Exception $e) {
            Log::info('Error while accessing email marketing page'.$e);
        }
    }

    public function update(Request $request, EmailTemplate $emailTemplate)
    {
        try {
            $emailTemplate->update([
                'subject' => $request->subject,
                'mail_body' => $request->mail_body,
            ]);

            return redirect()->route('admin.emailtemplates')->with('success', 'Email Template updated successfully');
        } catch (Exception $e) {
            Log::info('Error while updating email template'.$e);

            return back()->with('error', 'Something went wrong.Unable to update template');
        }
    }
}
