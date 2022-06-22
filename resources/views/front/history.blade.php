@extends('layout.main')
@section('isi')
    <div class="container">
        <div class="table-responsive my-2">
            <table class="table table-hover table-bordered texttabel">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nama Penginapan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Lama Menginap</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Tanggal Keluar</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Image Kost</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($histori->count())
                        <?php $no = 1; ?>
                        @foreach ($histori as $hstr)
                            <tr>
                                <th>{{ $no }}</th>
                                <td>{{ $hstr->user->name }}</td>
                                <td>{{ $hstr->inap->nama }}</td>
                                <td>{{ $hstr->inap->lokasi }}</td>
                                <td align="center">{{ $hstr->hari_menginap }} Hari</td>
                                <td>{{ $hstr->checkin }}</td>
                                <td>{{ $hstr->checkout }}</td>
                                <td>{{ $hstr->total }}</td>
                                <td><img src="{{ url('image/' . $hstr->inap->gambar) }}" class="img-fluid imgtable"></td>
                                <td>
                                    <form action="/hapus/{{ $hstr->id }}" method="post">
                                        @csrf
                                        <button class="aksi btn btn-danger my-2"
                                            onclick="return confirm('apakah yakin ingin hapus')"><i
                                                class="bi bi-trash-fill"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php $no++; ?>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">
                                <h2 class="text-center">Belum ada History</h2>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
