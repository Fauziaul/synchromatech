<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing-Page</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('background/logo.png')}}" />
    <!-- Icons -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />
    <!-- Page CSS -->

    <link rel="stylesheet" href="../../assets/vendor/css/pages/page-icons.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .centered-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }

        .carousel-inner img {
            object-fit: cover;
            /* Menyesuaikan gambar agar tidak terdistorsi */
            max-height: 780px;
            /* Anda bisa menyesuaikan ini sesuai kebutuhan */
        }
        .icon-card {
            transition: all 0.3s ease-in-out; /* Tambahkan animasi untuk efek halus */
        }

        .icon-card:hover {
            background-color: #f0f8ff; /* Warna latar aktif */
            transform: scale(1.05); /* Sedikit perbesar elemen */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Tambahkan bayangan */
            cursor: pointer; /* Tampilkan ikon pointer */
        }

        .icon-card:hover .icon-name {
            font-weight: bold; /* Buat teks menjadi tebal saat aktif */
        }
        .footer-divider {
        border-top: 2px solid #b39d87; /* Garis pemisah */
        margin: 20px 0;
        }

    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <nav class="navbar navbar-expand-lg" style="background-color: #b39d87;">
        <div class="container-fluid">
            <div class="nav-item">
                <img src="{{ asset('background/logo.png') }}" style="width: 70px; max-width: 70px; border-radius: 50%;">
                <a class="text-black navbar-brand m-3">Synchromatech</a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
</body>

</html>
