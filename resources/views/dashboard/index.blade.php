<x-layout title="Dashboard">

    @section('subjudul')
    <div class="pagetitle">
        <h1>Form Deskripsi Pengerjaan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Pekerjaan</a></li>
                <li class="breadcrumb-item active">Form </li>
            </ol>
        </nav>
    </div>
@endsection

    @if (auth()->user()->is_teacher)
        <h1>Selamat datang </h1>
        @if (Session::get('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
    @else
        @if (Session::get('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
       
        <div class="card px-3">
            <div class="card-title">
                <div class="card-body px-0">
                    @if (Session::get('failed'))
                        <div class="alert alert-danger">
                            {{ Session::get('failed') }}
                        </div>
                    @endif
                    <form action="{{ route('dashboard.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="date" class="form-label">Tangal Pengerjaan</label>
                            <input type="date" value="{{ old('date') }}" name="date"
                                class="form-control @error('date') is-invalid @enderror" id="date">
                            @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="start_jp" class="form-label">Mulai Pengerjaan</label>
                            <input type="time" value="{{ old('start_jp') }}" name="start_jp"
                                class="form-control @error('start_jp') is-invalid @enderror" id="start_jp">
                            @error('start_jp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="end_jp" class="form-label">Akhir Pengerjaan</label>
                            <input type="time" value="{{ old('end_jp') }}" name="end_jp"
                                class="form-control @error('end_jp') is-invalid @enderror" id="end_jp">
                            @error('end_jp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- <div class="mb-3">
                    <label for="name" class="form-label">Durasi Pengerjaan (menit)</label>
                    <input type="time" value="{{ old('name') }}" name="duration"
                        class="form-control @error('name') is-invalid @enderror" id="name">
                    @error('name')
    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
@enderror
                </div> -->
                        <div class="mb-3">
                            <label for="content" class="form-label">Desc</label>
                            <textarea name="content" class="my-editor form-control @error('content') is-invalid @enderror" id="my-editor"
                                cols="30" rows="10"></textarea>
                            @error('content')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
    @endif

    @push('scripts')
        <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('my-editor');
        </script>
    @endpush
    @stack('scripts')
</x-layout>
