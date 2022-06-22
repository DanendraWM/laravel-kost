@extends('layout.admin')
@section('isi')
    <div class="container">
        <a href="/add" class="btn btn-success my-2 add">Tambah Data <i class="bi bi-plus-circle"></i></a>
        <div class="table-responsive my-2">
            <table class="table table-hover table-bordered texttabel">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Fasilitas</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($inap as $np)
                        <tr>
                            <th>{{ $no }}</th>
                            <td>{{ $np->nama }}</td>
                            <td>{{ $np->kategori->name }}</td>
                            <td>{{ $np->lokasi }}</td>
                            <td>{{ number_format($np->harga) }}</td>
                            <td>{{ $np->fasilitas }}</td>
                            <td><img src="{{ url('image/' . $np->gambar) }}" class="img-fluid imgtable"></td>
                            <td><a href="/edit/{{ $np->id }}" class="aksi btn btn-info"><i
                                        class="bi bi-pencil-fill"></i></a>
                                <form action="/hapus/{{ $np->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="aksi btn btn-danger my-2"
                                        onclick="return confirm('apakah yakin ingin hapus')"><i
                                            class="bi bi-trash-fill"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php $no++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
