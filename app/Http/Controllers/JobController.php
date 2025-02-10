<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobResult;
use App\Jobs\FileGenerationJob;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function generate(Request $request)
    {
        $affiliateId = $request->input('affiliate_id', Auth::user()->affiliate_id);
        $email = $request->input('email', Auth::user()->email);

        if ($affiliateId != Auth::user()->affiliate_id) {
            Auth::user()->update(['affiliate_id' => $affiliateId]);
        }

        $jobResult = JobResult::create([
            'user_id' => Auth::id(),
            'status' => 'processing',
        ]);

        FileGenerationJob::dispatch($jobResult->id, $affiliateId, $email);

        return redirect('/dashboard')->with('success', 'Your request has been queued. Please check the status later.');
    }

    public function status()
    {
        $jobResult = JobResult::where('user_id', Auth::id())->latest()->first();
        $result = $jobResult ?? ['status' => 'no_request'];
        return view('status', compact('result'));
    }

    public function jobStatus()
    {
        $jobResult = JobResult::where('user_id', Auth::id())->latest()->first();
        if ($jobResult) {
            return response()->json([
                'status' => $jobResult->status,
                'download_url' => $jobResult->download_url,
                'message' => $jobResult->message,
            ]);
        }
        return response()->json(['status' => 'none']);
    }
}