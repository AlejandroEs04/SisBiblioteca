<div class="flex flex-col items-center w-full" >
    <div class="w-full md:w-2/3" >
        <div class="flex flex-col justify-center gap-1 text-center" >
            <h1 class="font-bold text-2xl text-green-600" >Administra los Generos</h1>
            <p class="text-lg" >Agrega, edita o elimina las categorias</p>
        </div>
        <form action="/add-categories" method="POST" class="flex flex-col items-center bg-slate-100 shadow-lg p-5 rounded-md mt-5" >
            <div class="flex flex-col gap-1 w-full" >
                <label class="font-bold text-green-600 text-lg">Nombre</label>
                <input type="text" name="nombre" placeholder="Nombre del genero" class="px-2 py-1 rounded w-full" value="<?php echo $genero->nombre; ?>" >
            </div>

            <button
                type="submit"
                class="bg-green-600 text-white font-bold px-2 py-1 rounded-lg mt-5 hover:bg-green-700 transition-colors"
            >
                Guardar Genero
            </button>
        </form>
    </div>

    <div class="flex flex-col justify-center gap-1 text-center mt-10" >
        <h1 class="font-bold text-3xl text-green-600" >Generos</h1>
    </div>

    <div class="mt-5 w-full md:w-2/3 p-5" >
        <table class="w-full" >
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
            <?php foreach($generos as $genero): ?>
                <tr class="border-y" >
                    <td class="px-2 py-1" ><?php echo $genero->id; ?></td>
                    <td class="px-2 py-1" ><?php echo $genero->nombre; ?></td>
                    <td class="flex gap-2 justify-center px-2 py-1" >
                        <form action="/add-categories" class="w-full" >
                            <input type="number" name="id" value="<?php echo $genero->id; ?>" hidden >
                            <button
                                type="submit"
                                class="bg-blue-500 font-bold text-base px-2 py-1 rounded-lg text-white w-full"
                            >
                                Editar
                            </button>   
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>