<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bts5/bootstrap.css">
    <script src="bts5/bootstrap.js" defer></script>
</head>
<body>
    
<!-- fonction  afficherDebutTableau() -->
        <?php
        function afficherDebutTableau() {
            echo <<<HTML
            <div class="container mt-5">
                <table class="table table-secondary table-striped table-bordered table-hover table-sm table-responsive text-center">
                    <thead class="table-dark fst-italic">
                        <tr>
            HTML;
        } ?>
<!--  -->