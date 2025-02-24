<x-layout title="Soal">
    <link rel="stylesheet" href="{{ asset('assets/css/table.css') }}">
    @section('subjudul')
    <div class="pagetitle">
        <h1>Form Checklist Kegiatan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Pembiasaan</a></li>
                <li class="breadcrumb-item active">Form </li>
            </ol>
        </nav>
    </div>
@endsection

    <div class="card">
        <div class="card-body">
            {{-- <p>{{ print_r(session()->all()) }}</p> --}}
            @if(session('error-add'))
                <div class="alert alert-danger mt-3" role="alert">
                    <span>Anda Sudah Mengisi Untuk Tanggal {{ session('error-add') }}</span>
                </div>
            @endif
            @if(session('success-add'))
                <div class="alert alert-success mt-3" role="alert">
                    <span>Data Berhasil Ditambahkan</span>
                </div>
            @endif
            <form method="POST" action="{{ route('dashboard.centang.store') }}" class="table-responsive mt-3">
                @csrf
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><center>No</center></th>
                            <th><center>Pembiasaan<center></th>
                            <th><center><input type="date" name="date"><center></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <th colspan="9999">{{ $category->name }}</th>
                            </tr>
                            @php $no = 1 @endphp
                            @forelse ($activities as $activity)
                                @if ($activity->category->id === $category->id)
                                    <tr>
                                        <td class="column__max text-center">
                                            {{ $no++ }}
                                        </td>
                                        <td><input type="text" name="activity_id" value="{{ $activity->id }}" hidden>{{ $activity->name }}</td>
        
                                        <td class="column__max">
                                            <center><input type="checkbox" class="checkbox" name="check[]" value="{{ $activity->id }}"></center>
                                            <!-- <form action="{{ route('dashboard.activities.destroy', $activity->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a onclick="event.preventDefault();
                                    this.closest('form').submit();"
                                                    href="{{ route('dashboard.activities.destroy', $activity->id) }}"
                                                    class="text-danger">
                                                </a>
                                            </form> -->
                                           

                                        </td>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td class="text-center" colspan="3">
                                        Empty
                                    </td>
                                </tr>
                            @endforelse
                        @empty
                            <tr>
                                <td class="text-center" colspan="3">
                                    Empty
                                </td>
                            </tr>
                        @endforelse     
                    </tbody>
                </table>
                <div class="d-flex justify-content-between">
                    <div></div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
