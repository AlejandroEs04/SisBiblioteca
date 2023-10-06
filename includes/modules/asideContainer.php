<?php
    $links1 = [
        [
            'nombre' => 'Inicio',
            'link' => '/'
        ],
        [
            'nombre' => 'Ver Prestamos',
            'link' => '/prestamos'
        ],
        [
            'nombre' => 'Ver Multas',
            'link' => '/multas'
        ],
    ];

    $links2 = [
        [
            'nombre' => 'Agregar Libros',
            'link' => '/add-books'
        ],
        [
            'nombre' => 'Agregar Autores',
            'link' => '/add-authors'
        ],
        [
            'nombre' => 'Agregar Generos',
            'link' => '/add-categories'
        ],
    ];

    $links3 = [
        [
            'nombre' => 'Generar Reporte',
            'link' => '/new-report'
        ],
    ]
?>

<div class="h-full" >
    <div class="h-14 flex items-center justify-center bg-green-700 text-center">
        <h1 class="text-3xl font-bold text-white" >Bookstacker</h1>
    </div>

    <nav class="p-5 bg-gray-800 h-full flex flex-col gap-8 items-end" >

        <div class="flex flex-col items-end">
            <?php foreach($links1 as $link): ?>
                <?php incluirTemplate('links', $link) ?>
            <?php endforeach; ?>
        </div>
        
        
        <div class="flex flex-col items-end border-y py-2" >
            <p class="text-gray-300 text-md border-b mr-8" >Libros</p>
            <?php foreach($links2 as $link): ?>
                <?php incluirTemplate('links', $link) ?>
            <?php endforeach; ?>
        </div>
        
        <?php foreach($links3 as $link): ?>
            <?php incluirTemplate('links', $link) ?>
        <?php endforeach; ?>

    </nav>
</div>