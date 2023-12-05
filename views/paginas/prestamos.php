<div class="flex flex-col items-center overflow-y-auto w-full" >
    <div class="w-full md:w-2/3" >
        <div class="flex flex-col justify-center gap-1 text-center" >
            <h1 class="font-bold text-2xl text-green-600" >Ver los Prestamos</h1>
            <p class="text-lg" >Gestiona los prestamos activos</p>
        </div>
        <div class="flex flex-col gap-2 mt-10 items-center" >
            <?php foreach($prestamos as $prestamo): ?>
                <?php if($prestamo->activo === '1'): ?>
                <div class="flex flex-col justify-between sm:flex-row gap-5 p-4 rounded-lg bg-gray-50 w-full xl:w-2/3" >
                    <div>
                        <p class="text-lg" >ID: <span class="font-bold text-green-600" ><?php echo $prestamo->id; ?></span></p>
                        <p class="text-lg" >Cliente: <span class="font-bold text-green-600" ><?php echo $prestamo->nombreCliente; ?></span></p>
                        <p class="text-lg" >Empleado: <span class="font-bold text-green-600" ><?php echo $prestamo->nombreEmpleado; ?></span></p>
                        <div class="grid grid-cols-2" >
                            <p class="text-lg" >Inicio: <span class="font-bold text-green-600" ><?php echo $prestamo->fechaInicio; ?></span></p>
                            <p class="text-lg" >Fin: <span class="font-bold text-green-600" ><?php echo $prestamo->fechaFin; ?></span></p>
                        </div>
                    </div>

                    <div class="pl-0 sm:pl-4 border-0 sm:border-l-2">
                        <p class="text-lg font-bold text-green-600" >Acciones</p>
                        <form action="/prestamos" >
                            <input type="number" name="eliminar" value="1" hidden >
                            <input type="number" name="prestamo" value="<?php echo $prestamo->id ?>" hidden >
                            <button class="mt-2 bg-red-600 hover:bg-red-700 transition-colors text-white font-bold text-base px-2 py-1 rounded w-40" >
                                Eliminar
                            </button>
                        </form>

                        <form action="/prestamos" >
                            <input type="number" name="finalizar" value="1" hidden >
                            <input type="number" name="prestamo" value="<?php echo $prestamo->id ?>" hidden >
                            <button class="mt-2 bg-blue-600 hover:bg-blue-700 transition-colors text-white font-bold text-base px-2 py-1 rounded w-40" >
                                Finalizar
                            </button>
                        </form>
                    </div>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>