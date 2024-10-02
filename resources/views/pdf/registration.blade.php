<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            @page {
                size: landscape; /* Mengatur ukuran halaman ke landscape saat dicetak */
            }
        }

        .certificate-box {
            border: 2px solid #007bff;
            padding: 20px;
            border-radius: 10px;
            width: 100%; /* Menggunakan lebar 100% untuk landscape */
            margin: auto;
            font-family: Arial, sans-serif;
        }
        .header-text {
            text-align: center;
            margin-bottom: 20px;
        }
        .details {
            margin-bottom: 20px;
        }
        .photo-box {
            width: 100px;
            height: 120px;
            border: 2px solid black;
            text-align: center;
            display: inline-block;
            vertical-align: top;
        }
        .photo-box img {
            max-width: 100%; /* Memastikan gambar tidak melebihi batas */
            max-height: 100%; /* Memastikan gambar tidak melebihi batas */
            border-radius: 5px; /* Menambahkan sudut membulat pada gambar */
        }
        .photo-box p {
            margin-top: 40px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="certificate-box">
        <h5 class="header-text">BUKTI PENDAFTARAN PELATIHAN</h5>
        <h4 class="header-text">{{$pendaftaran->pelatihan->nama_pelatihan}}</h4>
        <p> Saya yang bertandatangan dibawah ini :</p>
        <div class="details">
            <p><strong>No. Pendaftaran:</strong> {{$registrationNumber }}</p>
            <p><strong>NIK:</strong> {{$user->nik}}</p>
            <p><strong>Nama:</strong> {{$user->nama_lengkap}}</p>
            <p><strong>Jenis Kelamin:</strong> {{$user->data_user->jenis_kelamin}}</p>
            <p><strong>Email:</strong> {{$user->email}}</p>
            <p><strong>Alamat:</strong> {{$user->alamat}}</p>
        </div>
        <div class="row">
            <div class="col-md-8">
                <p>
                    Dengan ini saya menyatakan mendaftarkan diri saya untuk mengikuti pelatihan sampai selesai, data dan dokumen yang saya masukan adalah yang sebenar-benarnya sesuai data yang saya miliki.
                </p>
                <p>Hormat, <br>{{$user->nama_lengkap}}</p>
            </div>
            <div class="col-md-4">
                <div class="photo-box">
                    <img src="{{asset('upload/user/'. $user->data_user->photo)}}">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
