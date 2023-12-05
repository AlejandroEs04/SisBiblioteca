<div class="flex flex-col items-center overflow-x-hidden w-full" >
    <div class="w-full md:w-2/3" >
        <div class="text-center" >
            <h1 class="font-bold text-3xl text-green-600" >Configuracion</h1>
            <p class="text-xl font-bold" >Administra la informacion del negocio</p>
        </div>
    </div>

    <form class="flex flex-col gap-4 px-4 py-1 bg-gray-100 rounded-xl my-5" method="POST" action="/admin/config" >
        <fieldset class="my-5 grid grid-cols-3 gap-4">
            <div class="flex flex-col gap-1 grid-cols-3" >
                <label for="nombre" class="text-xl font-bold text-black" >Nombre del negocio</label>
                <input type="text" name="nombre" value="<?php echo $negocio->nombre ?>" placeholder="Nombre del negocio" class="border px-2 py-1 w-full" >
            </div>

            <div class="flex flex-col gap-1" >
                <label for="nombre" class="text-xl font-bold text-black" >Correo del negocio</label>
                <input type="text" name="correo" value="<?php echo $negocio->correo ?>" placeholder="Correo del negocio" class="border px-2 py-1 w-full" >
            </div>

            <div class="flex flex-col gap-1" >
                <label for="nombre" class="text-xl font-bold text-black" >Numero del negocio</label>
                <input type="text" name="numero" value="<?php echo $negocio->numero ?>" placeholder="Numero del negocio" class="border px-2 py-1 w-full" >
            </div>

            <div class="flex flex-col gap-1 col-span-3" >
                <label for="nombre" class="text-xl font-bold text-black" >Vision del negocio</label>
                <textarea name="vision" class="h-56 border p-2" ><?php echo $negocio->vision; ?></textarea>
            </div>

            <div class="flex flex-col gap-1 col-span-3" >
                <label for="nombre" class="text-xl font-bold text-black" >Mision del negocio</label>
                <textarea name="mision" class="h-56 border p-2" ><?php echo $negocio->mision; ?></textarea>
            </div>
        </fieldset>

        <fieldset class="my-5 grid grid-cols-3 gap-4" >
            <div class="flex flex-col gap-1" >
                <label for="nombre" class="text-xl font-bold text-black" >Calle Numero</label>
                <input type="text" name="calleNumero" value="<?php echo $negocio->calleNumero ?>" placeholder="Ej. Aragon 118" class="border px-2 py-1 w-full" >
            </div>

            <div class="flex flex-col gap-1" >
                <label for="nombre" class="text-xl font-bold text-black" >Colonia</label>
                <input type="text" name="colonia" value="<?php echo $negocio->colonia ?>" placeholder="Ej. Villa Sol" class="border px-2 py-1 w-full" >
            </div>

            <div class="flex flex-col gap-1" >
                <label for="nombre" class="text-xl font-bold text-black" >Codigo Postal</label>
                <input type="text" name="codigoPostal" value="<?php echo $negocio->codigoPostal ?>" placeholder="Ej. 66612" class="border px-2 py-1 w-full" >
            </div>
        </fieldset>

        <button 
            class="bg-green-600 px-2 py-1 rounded text-white font-bold text-lg uppercase mb-5 transition-colors hover:bg-green-700"
        >
            Guardar Cambios
        </button>
    </form>
</div>