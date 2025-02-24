<link rel="stylesheet" href="{{ asset('assets/css/table.css') }}">

<x-layout title="soal">
    @section('subjudul')
    <div class="pagetitle">
        <h1>Formulir PJBL</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Rekap Hasil </li>
            </ol>
        </nav>
    </div>
    @endsection


    <div class="card">
        <div class="card-header" style="color: black">
            <select class="form-select w-auto"
                onchange="window.location.href = `?grade=${this.value}&region={{ request()->get('region') }}`">
                <option selected disabled hidden>Pilih Rombel</option>
                <option value="">All</option>
                @forelse ($grades as $grade)
                <option {{ $grade->id == request()->get('grade') ? 'selected disabled' : '' }}
                    value="{{ $grade->id }}">{{ $grade->name }}</option>
                @empty
                <option value="" disabled>Empty</option>
                @endforelse
            </select>
        </div>
        <section class="intro mt-3">
            <div class="gradient-custom-1 h-100">
                <div class="mask d-flex ">
                    <div class="container">

                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class=" table table-responsive-xl bg-white">
                                    <table class="table mb-0 table-custom">
                                        <thead>
                                            <tr>
                                                <th class="th">No</th>
                                                <th>Nama Siswa</th>
                                                <th>Rayon</th>
                                                <th>Rombel</th>
                                                <th colspan="2" class="text-center">Aksi</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            @forelse ($students as $student)
                                            <tr>
                                                <td class="text-center"> {{ $loop->iteration }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->grade->name }}</td>
                                                <td>PPlg</td>
                                                <td style="text-align: center; width: 50px;">
                                                    <a href=""><i class="fa-solid fa-pen-to-square"></i></a>
                                                </td>

                                                <td style="text-align: center; width: 50px;">
                                                    <a href=""><i class="fa-solid fa-trash text-danger"></i></i></a>
                                                </td>

                                            </tr>
                                            @empty
                                            <tr>
                                                <td class="text-center" colspan="6">
                                                    Empty
                                                </td>
                                            </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


</x-layout>