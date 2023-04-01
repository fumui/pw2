<?php
$timezone = timezone_open("Asia/Jakarta");
$now = date_create("now", $timezone);
$nextYear = getdate()["year"]+1;
$nextBirthday = date_create($nextYear."-2-21", $timezone);
$interval = date_diff($now, $nextBirthday);
$fmt = new IntlDateFormatter(
    'id_ID',
    IntlDateFormatter::FULL,
    IntlDateFormatter::FULL,
    $timezone,
    IntlDateFormatter::GREGORIAN,
    "EEEE, d MMMM Y"
);
?>
<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pertemuan 8 Lat 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        /* Custom default button */
        .btn-light,
        .btn-light:hover,
        .btn-light:focus {
            color: #333;
            text-shadow: none;
            /* Prevent inheritance from `body` */
        }

        /*
        * Base structure
        */

        .cover-container {
            max-width: 42em;
        }

        /*
        * Header
        */

        .nav-masthead .nav-link {
            color: rgba(0, 0, 0, .5);
            border-bottom: .25rem solid transparent;
        }

        .nav-masthead .nav-link:hover,
        .nav-masthead .nav-link:focus {
            border-bottom-color: rgba(0, 0, 0, .25);
        }

        .nav-masthead .nav-link+.nav-link {
            margin-left: 1rem;
        }

        .nav-masthead .active {
            color: #000;
            border-bottom-color: #000;
        }
    </style>
</head>
<body class="d-flex h-100 text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div>
                <h3 class="float-md-start mb-0">Pertemuan 8</h3>
                <nav class="nav nav-masthead justify-content-center float-md-end">
                    <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="../">Home</a>
                </nav>
            </div>
        </header>
        <main class="px-3 d-flex align-items-center flex-column">
            <h1>Latihan Menggunakah Fungsi Tanggal</h1>
            <div>
                <h4>Today is</h4>
                <p><?=date("l, d M Y")?></p>
                <h4>Countdown to my birthday: </h4>
                <p><?=$interval->format("%m months %d days %h hours %I minutes %S seconds")?></p>
            </div>
            <div>
                <h4>Hari ini adalah</h4>
                <p><?=datefmt_format($fmt, time())?></p>
                <h4>Hitung mundur ke ulang tahun saya:</h4>
                <p><?=$interval->format("%m bulan %d hari %h jam %I menit %S detik")?></p>
            </div>
        </main>
        <footer class="mt-auto text-black-50">
            <p>Fuad Mustamirrul Ishlah (201011400093)</p>
        </footer>
    </div>
</body>

</html>