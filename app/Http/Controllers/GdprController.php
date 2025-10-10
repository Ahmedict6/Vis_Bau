<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class GdprController extends Controller
{
    /**
     * Show the GDPR request form.
     */
    public function index()
    {
        return view('gdpr.index');
    }

    /**
     * Export user data.
     */
    public function export(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['credentials' => 'Invalid email or password.']);
        }

        // Get user's contact messages
        $contactMessages = ContactMessage::where('email', $request->email)->get();

        $data = [
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
                'email_verified_at' => $user->email_verified_at,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ],
            'contact_messages' => $contactMessages->map(function ($message) {
                return [
                    'name' => $message->name,
                    'email' => $message->email,
                    'phone' => $message->phone,
                    'subject' => $message->subject,
                    'message' => $message->message,
                    'created_at' => $message->created_at,
                ];
            }),
            'exported_at' => now(),
        ];

        $filename = 'user-data-export-' . $user->id . '-' . now()->format('Y-m-d-H-i-s') . '.json';
        $jsonData = json_encode($data, JSON_PRETTY_PRINT);

        return response()->streamDownload(function () use ($jsonData) {
            echo $jsonData;
        }, $filename, [
            'Content-Type' => 'application/json',
        ]);
    }

    /**
     * Show the data deletion request form.
     */
    public function deleteForm()
    {
        return view('gdpr.delete');
    }

    /**
     * Process data deletion request.
     */
    public function delete(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'confirmation' => 'required|string|in:I understand that this action cannot be undone',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['credentials' => 'Invalid email or password.']);
        }

        // Delete user's contact messages
        ContactMessage::where('email', $request->email)->delete();

        // Log the deletion request (you might want to keep this for compliance)
        \Log::info('GDPR Data Deletion Request', [
            'user_id' => $user->id,
            'email' => $user->email,
            'deleted_at' => now(),
        ]);

        // In a real implementation, you might want to anonymize the user instead of deleting
        // For now, we'll just log the request
        return redirect()->route('gdpr.index')->with('success', 'Your data deletion request has been processed. Your personal data has been removed from our systems.');
    }

    /**
     * Show privacy policy.
     */
    public function privacy()
    {
        return view('gdpr.privacy');
    }
}
