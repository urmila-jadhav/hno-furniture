<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AI2DInteriorController extends Controller
{
    // Show the form
    public function form()
    {
        return view('ai-2d-interior');
    }

    // Handle form submission and generate image
   public function generate(Request $request)
{
    // 1️⃣ Validate form inputs
    $request->validate([
        'room_type' => 'required',
        'interior_style' => 'required',
        'layout' => 'required',
        'color_palette' => 'required',
        'reference_image' => 'nullable|image|max:5000',
    ]);

    // 2️⃣ Build the prompt for OpenAI
    $prompt = "Create a 2D interior layout top-view for a "
        . $request->room_type
        . " in " . $request->interior_style
        . " style. Layout: " . $request->layout
        . ". Colors: " . $request->color_palette
        . ". Make a clean 2D floor-plan style drawing.";

    // 3️⃣ Optional reference image
    $base64Image = null;
    if ($request->hasFile('reference_image')) {
        $img = file_get_contents($request->file('reference_image')->path());
        $base64Image = base64_encode($img);
    }

    // 4️⃣ Prepare API call
    $apiKey = env('OPENAI_API_KEY');
    if (!$apiKey) {
        return back()->with('error', 'OpenAI API key not set.');
    }

    $payload = [
        "model" => "gpt-image-1",
        "prompt" => $prompt,
        "size" => "1024x1024",
    ];

    // Only include reference image for edit endpoint
    // For generation from scratch, skip "image" field
    // $base64Image optional, we skip for now to avoid errors

    $ch = curl_init("https://api.openai.com/v1/images/generations");
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "Authorization: Bearer $apiKey"
        ],
        CURLOPT_POSTFIELDS => json_encode($payload)
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);

    // 5️⃣ Check if OpenAI returned an error
    if (isset($data['error'])) {
        return back()->with('error', 'OpenAI Error: ' . $data['error']['message']);
    }

    if (!isset($data['data'][0]['b64_json'])) {
        return back()->with('error', 'AI failed to generate an image.');
    }

    // 6️⃣ Save generated image
    $imageBase64 = $data['data'][0]['b64_json'];
    $filename = 'ai_design_' . time() . '.png';
    Storage::disk('public')->put('ai_results/' . $filename, base64_decode($imageBase64));

    // 7️⃣ Redirect to result page
    return redirect()->route('ai.2d.result')->with([
        'generatedImage' => asset('storage/ai_results/' . $filename),
        'prompt' => $prompt,
    ]);
}

    // Show the result page
    public function result()
    {
        return view('ai-2d-interior-result', [
            'generatedImage' => session('generatedImage'),
            'prompt' => session('prompt'),
        ]);
    }
}
