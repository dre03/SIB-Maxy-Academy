@include('component.header')

<section class="bg-soft-blue">
    <div class="container">
        <h3 class="mb-0 text-dark fw-bold mb-5">Tambah Artikel</h3>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title">Judul</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            id="title" value="{{ old('title', $blog->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="description">Isi Konten</label>
                        <textarea name="description" id="description" cols="30" rows="10"
                            class="form-control @error('content') is-invalid @enderror">{{ old('description', $blog->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button class="btn btn-primary" type="submit">Simpan Baru</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-light">Batal & Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@include('component.footer')
