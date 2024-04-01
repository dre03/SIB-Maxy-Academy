@include('component.header')
<section class="bg-soft-blue">
    <div class="container">
        <div class="hero mb-3">
            <h3>Selamat Datang Bloger {{Auth::user()->name}}</h3>
            <p class="mb-0 text-secondary">Silahkan untuk memulai menulis sesukamu dan ajak temanmu untuk melihat postinganmu</p>
        </div>
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h3 class="mb-0 text-dark fw-bold">Dashboard</h3>
            <a href="{{route('create')}}" class="btn btn-primary">Tambah Blog</a>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Judul Blog</th>
                                <th>Tanggal Post</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $i => $item)
                            <tr class="align-middle">
                                <td>{{ ++$i }}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->created_at->format('d-F-Y')}}</td>
                                <td>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('destroy', $item->id) }}" method="POST">
                                    <div class="d-flex gap-1">
                                        <a href="{{route('edit', $item->id)}}" class="btn py-1 btn-warning fw-normal">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn py-1 btn-light fw-normal">Hapus</button>
                                    </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@include('component.footer')
