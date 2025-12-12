@include('frontend.layouts.header')

<div class="container mt-5 text-center">
    <h2>Your Generated 2D Interior Design</h2>

    @if(session('generatedImage'))
        <img src="{{ session('generatedImage') }}" class="img-fluid mt-4 rounded shadow" style="max-width: 600px;">
        <p class="mt-3"><strong>Prompt:</strong> {{ session('prompt') }}</p>
    @else
        <p class="text-danger">No generated image found.</p>
    @endif

    <a href="{{ route('ai.2d.form') }}" class="btn btn-secondary mt-3">Generate New</a>
</div>

@include('frontend.layouts.footer')
