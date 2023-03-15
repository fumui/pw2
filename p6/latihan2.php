<?php
    $videoIdsOfEachTalents = array(
        "Ayunda Risu" => array (
            "IGviVpVE1fA",
            "N9M5jX9z5cQ",
            "PYzTq7YEPBI"
        ),
        "Moona Hoshinova" => array (
            "q4N7EhUWOAA",
            "stmZAThUl64",
            "LXRSp8QbOeg"
        ),
        "Airani Iofifteen" => array (
            "jaf_SBcDhFU",
            "beSTVUWjDPI",
            "mDfG11QYZl4"
        ),
        "Kureiji Ollie" => array (
            "oIzQmoz1bE4",
            "2ZqtRc3fa_s",
            "wFTSE4h4SSs"
        ),
        "Anya Melfissa" => array (
            "mqwRg9ZgANI",
            "yM2_YycccsM",
            "2UP3DO56dh4"
        ),
        "Pavolia Reine" => array (
            "MxwV963ZNEU",
            "VFpOBazE3rs",
            "dYvQcVG_dVg"
        ),
        "Vestia Zeta" => array (
            "wQ1_0oeXW6M",
            "Q2GSUd-rhlE",
            "WDueRRGIKzw"
        ),
        "Kaela Kovalskia" => array (
            "MRg1OuBU_i8",
        ),
        "Kobo Kanaeru" => array (
            "SF-_47-oCtk",
            "MK78JU18SxE",
            "iiw9Z1I1AcE"
        ),
        "HoloID Collab" => array (
            "Wp90CrP-s_8",
            "lFQW5S_xH1o",
            "wlyRGXUwjVA"
        ),
    );
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 6 Lat 2</title>
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
        rel="stylesheet" crossorigin="anonymous"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" >
</head>
<body data-bs-theme="dark">
    <div class="col-lg-12 mx-auto p-4 py-md-5 bg-dark-subtle text-emphasis-dark">
        <h1 class="text-center">List Lagu Favorit Dari Setiap Talent Hololive Indonesia</h1>
        <div class="container text-center">
            <?php
                foreach ($videoIdsOfEachTalents as $talent => $videoIds){
                    ?>
                        <div class="container text-center bg-dark text-emphasis-dark">
                            <h2><?=$talent?><h2>
                            <div class="row justify-content-center gap-3 py-3 ">
                                <?php 
                                    foreach ($videoIds as $videoId){
                                        ?>
                                            <div class="col">
                                                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$videoId?>" 
                                                    title="YouTube video player" frameborder="0" allowfullscreen
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share">
                                                </iframe>
                                            </div>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>
</html>