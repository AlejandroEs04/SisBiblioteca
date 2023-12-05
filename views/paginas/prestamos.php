<div class="flex flex-col items-center overflow-y-auto w-full" >
    <div class="w-full md:w-2/3" >
        <div class="flex flex-col justify-center gap-1 text-center" >
            <h1 class="font-bold text-2xl text-green-600" >Ver los Prestamos</h1>
            <p class="text-lg" >Gestiona los prestamos activos</p>
        </div>
        <div class="flex flex-col gap-2 mt-10 items-center" >
            <?php if($libros && $prestamo): ?>
                <div class="flex flex-col gap-2 p-4 rounded-lg bg-gray-100 w-full xl:w-2/3 mb-6 shadow-lg" >
                    <div class="flex flex-col justify-between sm:flex-row gap-5 " >
                        <div>
                            <p class="text-lg" >ID: <span class="font-bold text-green-600" ><?php echo $prestamo->id; ?></span></p>
                            <p class="text-lg" >Cliente: <span class="font-bold text-green-600" ><?php echo $prestamo->nombreCliente; ?></span></p>
                            <p class="text-lg" >Empleado: <span class="font-bold text-green-600" ><?php echo $prestamo->nombreEmpleado; ?></span></p>
                            <div class="grid grid-cols-2 gap-4" >
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

                    <h3 class="text-center text-lg font-bold text-green-600 uppercase mt-2" >Libros Prestados</h3>
                    <?php foreach($libros as $libro): ?>
                        <div class="px-2 py-2 first:border-t-0 border-t-2" >
                            <p class="text-base" >ID: <span class="font-bold text-green-600" ><?php echo $libro->id; ?></span></p>
                            <p class="text-base" >Nombre de libro: <span class="font-bold text-green-600" ><?php echo $libro->nombre; ?></span></p>
                            <p class="text-base" >Descripcion: <span class="font-bold text-green-600 line-clamp-2" ><?php echo $libro->descripcion; ?></span></p>
                            <p class="text-base" >Editorial: <span class="font-bold text-green-600" ><?php echo $libro->editorial; ?></span></p>
                            <p class="text-base" >Genero: <span class="font-bold text-green-600" ><?php echo $libro->genero; ?></span></p>
                            <p class="text-base" >Clasificacion: <span class="font-bold text-green-600" ><?php echo $libro->clasificacion; ?></span></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php foreach($prestamos as $prestamoLi): ?>
                <?php if($prestamoLi->activo === '1' && $prestamoLi->id !== $prestamo->id ): ?>
                <a href="/prestamos?id=<?php echo $prestamoLi->id; ?>" class="flex flex-col justify-between sm:flex-row gap-5 p-4 rounded-lg bg-gray-50 w-full xl:w-2/3" >
                    <div>
                        <p class="text-lg" >ID: <span class="font-bold text-green-600" ><?php echo $prestamoLi->id; ?></span></p>
                        <p class="text-lg" >Cliente: <span class="font-bold text-green-600" ><?php echo $prestamoLi->nombreCliente; ?></span></p>
                        <p class="text-lg" >Empleado: <span class="font-bold text-green-600" ><?php echo $prestamoLi->nombreEmpleado; ?></span></p>
                        <div class="grid grid-cols-2 gap-4" >
                            <p class="text-lg" >Inicio: <span class="font-bold text-green-600" ><?php echo $prestamoLi->fechaInicio; ?></span></p>
                            <p class="text-lg" >Fin: <span class="font-bold text-green-600" ><?php echo $prestamoLi->fechaFin; ?></span></p>
                        </div>
                    </div>

                    <div class="pl-0 sm:pl-4 border-0 sm:border-l-2">
                        <p class="text-lg font-bold text-green-600" >Acciones</p>
                        <form action="/prestamos" >
                            <input type="number" name="eliminar" value="1" hidden >
                            <input type="number" name="prestamo" value="<?php echo $prestamoLi->id ?>" hidden >
                            <button class="mt-2 bg-red-600 hover:bg-red-700 transition-colors text-white font-bold text-base px-2 py-1 rounded w-40" >
                                Eliminar
                            </button>
                        </form>

                        <form action="/prestamos" >
                            <input type="number" name="finalizar" value="1" hidden >
                            <input type="number" name="prestamo" value="<?php echo $prestamoLi->id ?>" hidden >
                            <button class="mt-2 bg-blue-600 hover:bg-blue-700 transition-colors text-white font-bold text-base px-2 py-1 rounded w-40" >
                                Finalizar
                            </button>
                        </form>
                    </div>
                </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>