<?php
    $videoIds = array(
        "_I9ThOymB6U",
        "LoZCAEgioDg",
        "jNEhofjuwLA",
        "SF-_47-oCtk",
        "pFgUluV_00s",
        "A9HY4DsRTCg",
        "PNA-sTiC0Ds",
        "EjlMPu5sEgw",
        "D1CxQMS8EPc",
        "vV-5W7SFHDc"
    );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 6 Lat 1</title>
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
        rel="stylesheet" crossorigin="anonymous"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" >
</head>
<body data-bs-theme="dark">
    <div class="col-lg-12 mx-auto p-4 py-md-5 bg-dark-subtle text-emphasis-dark">
        <h1 class="text-center">List Lagu Favorit</h1>
        <div class="d-flex flex-wrap justify-content-center gap-3 py-3">
            <?php
                foreach ($videoIds as $videoId){
                    ?>
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$videoId?>" 
                            title="YouTube video player" frameborder="0" allowfullscreen
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share">
                        </iframe>
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