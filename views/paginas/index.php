<div class="flex flex-col gap-5" >
    <div class="flex flex-col gap-1" >
        <h2 class="text-2xl font-bold">Opciones</h2>

        <div class="flex flex-row gap-3 flex-wrap" >
            <?php if($_SESSION['rango'] !== "1"): ?>
                <a href="/add-books" class="bg-amber-500 rounded p-4 h-36 w-56 flex flex-col items-start justify-center hover:bg-amber-600 transition-all" >
                    <h3 class="uppercase text-lg font-bold text-white" >Administrar Libros</h3>
                    <p class="text-white text-sm" >Crea, edita o elimina los libros existentes</p>
                </a>

                <a href="/add-categories" class="bg-lime-600 rounded p-4 h-36 w-56 flex flex-col items-start justify-center hover:bg-lime-700 transition-all" >
                    <h3 class="uppercase text-xl font-bold text-white">Administrar Generos</h3>
                    <p class="text-white text-sm">Crea, edita o elimina las generos existentes</p>
                </a>

                <a href="/add-authors" class="bg-blue-600 rounded p-4 h-36 w-56 flex flex-col items-start justify-center hover:bg-blue-700 transition-all" >
                    <h3 class="uppercase text-xl font-bold text-white">Administrar Autores</h3>
                    <p class="text-white text-sm">Crea, edita o elimina los autores existentes</p>
                </a>
            <?php endif; ?>

            <a href="/prestamos" class="bg-red-600 rounded p-4 h-36 w-56 flex flex-col items-start justify-center hover:bg-red-700 transition-all" >
                <h3 class="uppercase text-xl font-bold text-white">Ver prestamos</h3>
                <p class="text-white text-sm">Gestiona los prestamos activos</p>
            </a>

            <a href="/multas" class="bg-yellow-600 rounded p-4 h-36 w-56 flex flex-col items-start justify-center hover:bg-yellow-700 transition-all" >
                <h3 class="uppercase text-xl font-bold text-white">Ver multas</h3>
                <p class="text-white text-sm">Gestiona los prestamos activos</p>
            </a>
        </div>
    </div>

    <div class="relative" >
        <?php incluirTemplate('formularioPrestamo', [$libros, $librosTabla, $empleados, $clientes]); ?>
    </div>
</div>