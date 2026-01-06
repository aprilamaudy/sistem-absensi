<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan QR Kehadiran</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <!-- TITLE -->
    <div class="text-center mb-4">
        <h3 class="fw-bold">Scan QR Kehadiran</h3>
        <p class="text-muted mb-0">Pilih absensi untuk memulai absensi</p>
    </div>

    <!-- CARD -->
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm border-0">
                <div class="card-body">

                    {{-- pesan error dari backend --}}
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('mahasiswaShowQr') }}" method="POST">
                        @csrf

                        <!-- ABSENSI -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Absensi</label>

                            @php
                                $today = \Carbon\Carbon::today();
                            @endphp

                            <select name="absensi_id" class="form-select" id="absensiSelect" required>
                                <option value="">-- Pilih Absensi --</option>

                                @foreach ($dataAbsensi as $absensi)
                                    @php
                                        $tanggalAbsen = \Carbon\Carbon::parse($absensi->tanggal_absen);
                                        $isExpired = $tanggalAbsen->lt($today);
                                    @endphp

                                    <option 
                                        value="{{ $absensi->id }}"
                                        data-expired="{{ $isExpired ? '1' : '0' }}"
                                        {{ $isExpired ? 'disabled' : '' }}
                                    >
                                        {{ $absensi->nama }} - {{ $absensi->matkul->nama }}
                                        {{ $isExpired ? '(Tanggal Terlewat)' : '' }}
                                    </option>
                                @endforeach
                            </select>

                            <div class="alert alert-danger mt-2 d-none" id="expiredAlert">
                                ❌ Absensi ini sudah melewati tanggal dan tidak dapat digunakan.
                            </div>
                        </div>

                        <!-- BUTTON -->
                        <div class="d-grid">
                            <button class="btn btn-primary" id="btnSubmit" disabled>
                                Lanjutkan
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            <a href="{{ route('mahasiswa.dashboard') }}" class="btn btn-secondary mt-3">Kembali</a>

        </div>
    </div>

</div>

<!-- SCRIPT -->
<script>
    const selectAbsensi = document.getElementById('absensiSelect');
    const alertExpired = document.getElementById('expiredAlert');
    const btnSubmit = document.getElementById('btnSubmit');

    selectAbsensi.addEventListener('change', function () {
        if (!this.value) {
            alertExpired.classList.add('d-none');
            btnSubmit.disabled = true;
            return;
        }

        const selectedOption = this.options[this.selectedIndex];
        const isExpired = selectedOption.getAttribute('data-expired');

        if (isExpired === '1') {
            alertExpired.classList.remove('d-none');
            btnSubmit.disabled = true;
        } else {
            alertExpired.classList.add('d-none');
            btnSubmit.disabled = false;
        }
    });
</script>

</body>
</html>
