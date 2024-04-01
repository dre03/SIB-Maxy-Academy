@include('component.header')

<section class="bg-soft-blue">
    <div class="container">
        <h1 class="text-dark fw-bold">Blogku</h1>
        <h3>Selamat Datang {{Auth::user()->name}} Senang bertemu denganmu</h3>
        <p class="mb-0 text-secondary">Silahkan untuk memulai petuangan yang nyaman akan membuatmu mendapatkan informasi terbaru dan terupdate disini</p>
    </div>
</section>

<section>
    <div class="container">
        <div class="row g-4">
            @foreach ($blogs as $item)
            <div class="col-md-4">
                <a href="{{ route('detail', $item->id) }}" class="article">
                    @if ($item->image && Storage::exists('public/blogs/' . $item->image))
                    <img src="{{ asset('/storage/blogs/'.$item->image) }}" class="rounded-3 mb-3" alt="Gambar Error">
                    @else
                        <img src="{{ asset('assets/images/huddle.png') }}" class="rounded-3 mb-3" alt="Gambar Error">
                    @endif
                    <h3>
                        {{$item->title}}
                    </h3>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@include('component.footer')
