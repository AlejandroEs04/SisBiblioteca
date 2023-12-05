<div class="flex flex-col items-center overflow-y-auto w-full" >
    <div class="w-full md:w-2/3" >
    <div class="text-center" >
        <h1 class="font-bold text-3xl text-green-600" >Administrador de Libros</h1>
        <p class="text-xl font-bold" >Agregar los datos que se piden en el formulario para agregar un libro</p>
    </div>
    <form class="flex flex-col items-center bg-slate-100 shadow-lg p-5 rounded-md mt-5 gap-3" action="/add-books" method="POST" >
        <div class="flex flex-col gap-2 w-full" >
            <label class="text-lg font-bold text-green-700" >Nombre del Libro</label>
            <input 
                type="text" 
                name="nombre" 
                placeholder="Nombre del libro" 
                class="px-2 py-1 border-b border"
                value="<?php echo $libro->nombre; ?>"
            >
        </div>

        <div class="flex flex-col gap-2 w-full" >
            <label class="text-lg font-bold text-green-700" >Descripcion del libro</label>
            <textarea 
                name="descripcion" 
                class="px-2 py-1 border-b border h-32"
            ><?php echo $libro->descripcion; ?></textarea>
        </div>

        <div class="grid grid-cols-3 w-full gap-4" >
            <div class="flex flex-col gap-2 w-full" >
                <label class="text-lg font-bold text-green-700">Editorial</label>
                <select
                    name="editorialID" 
                    class="px-2 py-1 border-b border"
                >
                    <?php foreach($editoriales as $editorial): ?>
                        <option <?php echo $libro->editorialID === $editorial->id ? 'selected' : ''; ?> value="<?php echo $editorial->id; ?>" ><?php echo $editorial->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="flex flex-col gap-2 w-full" >
                <label class="text-lg font-bold text-green-700">Genero</label>
                <select
                    name="generoID" 
                    class="px-2 py-1 border-b border"
                >
                    <?php foreach($generos as $genero): ?>
                        <option <?php echo $libro->generoID === $genero->id ? 'selected' : ''; ?> value="<?php echo $genero->id; ?>" ><?php echo $genero->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="flex flex-col gap-2 w-full" >
                <label class="text-lg font-bold text-green-700">Clasificacion</label>
                <select
                    name="clasificacionID" 
                    class="px-2 py-1 border-b border"
                >
                    <?php foreach($clasificaciones as $clasificacion): ?>
                        <option <?php echo $libro->clasificacionID === $clasificacion->id ? 'selected' : ''; ?> value="<?php echo $clasificacion->id; ?>" ><?php echo $clasificacion->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="flex flex-col gap-2 w-full" >
                <label class="text-lg font-bold text-green-700">Limite (Dias)</label>
                <select
                    name="limiteID" 
                    class="px-2 py-1 border-b border"
                >
                    <?php foreach($limites as $limite): ?>
                        <option <?php echo $libro->limiteID === $limite->id ? 'selected' : ''; ?> value="<?php echo $limite->id; ?>" ><?php echo $limite->diasLimite ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="flex flex-col gap-2 w-full" >
                <label class="text-lg font-bold text-green-700">Stock</label>
                <input
                    name="stock"
                    class="px-2 py-1 border-b border"
                    value="<?php echo $libro->stock; ?>"
                >
            </div>

            <?php if($libro): ?>
                <input type="number" name="id" value="<?php echo $libro->id; ?>" hidden >
            <?php endif; ?>

            <div class="flex items-end" >
                <button class="px-2 py-1 bg-green-500 hover:bg-green-600 text-white font-bold rounded-md w-full h-10 transition uppercase" >
                    <?php 
                        if($libro){ 
                            echo 'Editar'; 
                        } else { 
                            echo 'Guardar'; 
                        }
                    ?>
                </button>
            </div>
        </div>

        
    </form>
    </div>

    <div class="mt-5 w-full md:w-2/3 p-5 overflow-x-auto" >
        <h2 class="text-3xl font-bold text-green-600 my-4 uppercase text-center" >Listado Libros</h2>
        <table class="w-full overflow-x-auto" >
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Editorial</th>
                <th>Genero</th>
                <th>Clasificacion</th>
                <th>Dias limite</th>
                <th>Stock</th>
                <th>Activo</th>
                <th>Acciones</th>
            </tr>
            <?php foreach($libros as $libro): ?>
                <tr class="border-y" >
                    <td class="px-2 py-1" ><?php echo $libro->id; ?></td>
                    <td class="px-2 py-1 w-48" ><?php echo $libro->nombre; ?></td>
                    <td class="px-2 py-1 line-clamp-1 w-96" ><?php echo $libro->descripcion; ?></td>
                    <td class="px-2 py-1 w-40" ><?php echo $libro->editorial; ?></td>
                    <td class="px-2 py-1" ><?php echo $libro->genero; ?></td>
                    <td class="px-2 py-1 w-36" ><?php echo $libro->clasificacion; ?></td>
                    <td class="px-2 py-1 w-32" ><?php echo $libro->diaslimite; ?></td>
                    <td class="px-2 py-1" ><?php echo $libro->stock; ?></td>
                    <td class="px-2 py-1" ><?php echo $libro->activo; ?></td>
                    <td class="flex flex-col gap-2 justify-center px-2 py-1" >
                    
                    <form action="add-books" class="w-full" >
                        <input type="number" name="id" value="<?php echo $libro->id; ?>" hidden >
                        <button
                            type="submit"
                            class="bg-blue-500 font-bold text-base px-2 py-1 rounded-lg text-white w-full"
                        >
                            Editar
                        </button>   
                    </form>
                        
                    <form action="add-books" class="w-full" >
                        <input type="number" name="eliminar" value="1" hidden >
                        <input type="number" name="id" value="<?php echo $libro->id; ?>" hidden >
                        <button
                            type="submit"
                            class="bg-red-700 font-bold text-base px-2 py-1 rounded-lg text-white w-full"
                        >
                            Eliminar
                        </button>
                    </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>