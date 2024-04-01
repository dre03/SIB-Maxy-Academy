@include('component.header')
<section class="bg-soft-blue">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-dark fw-bold">
                    {{ $blog->title }}
                </h1>
                <p class="mb-0 text-secondary fs-7">Dipublish pada {{ $blog->created_at->format('d-F-Y') }} oleh
                    {{ $blog->user->name }}</p>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($blog->image && Storage::exists('public/blogs/' . $blog->image))
                    <img src="{{ asset('/storage/blogs/' . $blog->image) }}" class="rounded-3 mb-3" alt="Gambar Error">
                @else
                    <img src="{{ asset('assets/images/huddle.png') }}" class="rounded-3 mb-3" alt="Gambar Error">
                @endif

                <div class="text-secondary">
                    <p>
                        {{ $blog->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@include('component.footer')
