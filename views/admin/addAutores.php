<div class="flex flex-col items-center overflow-y-auto w-full" >
    <div class="w-full md:w-2/3" >
        <div class="flex flex-col justify-center gap-1 text-center" >
            <h1 class="font-bold text-2xl text-green-600" >Administra los Autores</h1>
            <p class="text-lg" >Agrega, edita o elimina los autores</p>
        </div>
        <form action="/add-authors" method="POST" class="flex flex-col items-center bg-slate-100 shadow-lg p-5 rounded-md mt-5 gap-3" >

            <div class="grid grid-cols-2 gap-2 w-full" >
                <div class="flex flex-col gap-1 w-full" >
                    <label class="font-bold text-green-600 text-lg">Nombre</label>
                    <input type="text" name="nombre" placeholder="Nombre del Autor" class="px-2 py-1 rounded w-full" value="<?php echo $autor->nombre; ?>" >
                </div>

                <div class="flex flex-col gap-1 w-full" >
                    <label class="font-bold text-green-600 text-lg">Apellidos</label>
                    <input type="text" name="apellidos" placeholder="Apellidos del Autor" class="px-2 py-1 rounded w-full" value="<?php echo $autor->apellidos; ?>" >
                </div>
            </div>

            <div class="text-start mt-5 flex justify-start" >
                <h2 class="font-bold text-black text-xl" >Informacion de contacto</h2>
            </div>

            <div class="flex flex-col gap-1 w-full" >
                <label class="font-bold text-green-600 text-lg">Numero</label>
                <input type="number" name="numero" placeholder="Numero de telefono" class="px-2 py-1 rounded w-full" value="<?php echo $autor->numero; ?>" >
            </div>

            <div class="flex flex-col gap-1 w-full" >
                <label class="font-bold text-green-600 text-lg">Correo</label>
                <input type="email" name="correo" placeholder="Correo" class="px-2 py-1 rounded w-full" value="<?php echo $autor->correo; ?>" >
            </div>

            <div class="flex flex-col gap-1 w-full" >
                <label class="font-bold text-green-600 text-lg">Calle y Numero</label>
                <input type="text" name="calleNumero" placeholder="Calle y Numero" class="px-2 py-1 rounded w-full" value="<?php echo $autor->calleNumero; ?>" >
            </div>

            <div class="grid grid-cols-2 gap-2 w-full" >
                <div class="flex flex-col gap-1 w-full" >
                    <label class="font-bold text-green-600 text-lg">Pais</label>
                    <input type="text" name="pais" placeholder="Pais" class="px-2 py-1 rounded w-full" value="<?php echo $autor->pais; ?>" >
                </div>

                <div class="flex flex-col gap-1 w-full" >
                    <label class="font-bold text-green-600 text-lg">Estado / Provincia</label>
                    <input type="text" name="estado" placeholder="Estado" class="px-2 py-1 rounded w-full" value="<?php echo $autor->estado; ?>" >
                </div>

                <div class="flex flex-col gap-1 w-full" >
                    <label class="font-bold text-green-600 text-lg">Municipio / Delegacion</label>
                    <input type="text" name="municipio" placeholder="Municipio" class="px-2 py-1 rounded w-full" value="<?php echo $autor->municipio; ?>" >
                </div>

                <div class="flex flex-col gap-1 w-full" >
                    <label class="font-bold text-green-600 text-lg">Codigo Postal</label>
                    <input type="text" name="codigoPostal" placeholder="C.P." class="px-2 py-1 rounded w-full" value="<?php echo $autor->codigoPostal; ?>" >
                </div>

                <div class="flex flex-col gap-1 w-full" >
                    <label class="font-bold text-green-600 text-lg">Colonia</label>
                    <input type="text" name="colonia" placeholder="Colonia" class="px-2 py-1 rounded w-full" value="<?php echo $autor->colonia; ?>" >
                </div>
            </div>

            <button
                type="submit"
                class="bg-green-600 text-white font-bold px-2 py-1 rounded-lg mt-5 hover:bg-green-700 transition-colors"
            >
                Guardar
            </button>
        </form>
    </div>

    <div class="flex flex-col justify-center gap-1 text-center mt-10" >
        <h1 class="font-bold text-3xl text-green-600" >Autores</h1>
    </div>

    <div class="mt-5 w-full md:w-2/3 p-5" >
        <table class="w-full" >
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Numero</th>
                <th>Acciones</th>
                <th>Direccion</th>
            </tr>
            <?php foreach($autores as $autor): ?>
                <tr class="border-y" >
                    <td class="px-2 py-1" ><?php echo $autor->id; ?></td>
                    <td class="px-2 py-1" ><?php echo $autor->nombre; ?></td>
                    <td class="px-2 py-1" ><?php echo $autor->correo; ?></td>
                    <td class="px-2 py-1" ><?php echo $autor->numero; ?></td>
                    <td class="px-2 py-1" ><?php echo $autor->calleNumero . ', ' . $autor->colonia . ' ' . $autor->pais . ' ' . $autor->estado . ' ' . $autor->municipio . ' ' . $autor->codigoPostal ?></td>
                    <td class="flex gap-2 justify-center px-2 py-1" >
                    <form action="/add-authors" class="w-full" >
                        <input type="number" name="id" value="<?php echo $autor->id; ?>" hidden >
                        <button
                            type="submit"
                            class="bg-blue-500 font-bold text-base px-2 py-1 rounded-lg text-white w-full"
                        >
                            Editar
                        </button>   
                    </form>
                        
                    <form action="/add-authors" class="w-full" >
                        <input type="number" name="eliminar" value="1" hidden >
                        <input type="number" name="id" value="<?php echo $autor->id; ?>" hidden >
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