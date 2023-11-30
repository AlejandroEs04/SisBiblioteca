<!DOCTYPE html>
<html lang="en" class="flex h-full" >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/dist/output.css">
        <title>Bookstacker</title>
    </head>
    <body class="flex-1 overflow-x-hidden" >
        <div class="flex flex-col h-full md:flex-row">
            <!--<aside class="w-full md:w-1/5" >
                <?php // incluirTemplate('asideContainer', null) ?>
            </aside> -->

            <div class="w-full" >
                <header class="px-10 py-3 bg-green-600" >
                    <?php incluirTemplate('header', null) ?>
                </header>

                <main class="mx-5 my-8 md:mx-20" >
                    <?php echo $contenido; ?>
                </main>
            </div>
        </div>
    </body>
    <script src="/build/js/app.js"></script>
</html>