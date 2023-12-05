<div class="flex flex-col items-center overflow-y-auto w-full" >
    <div class="w-full md:w-2/3" >
        <div class="flex flex-col justify-center gap-1 text-center" >
            <h1 class="font-bold text-2xl text-green-600" >Ver las multas</h1>
            <p class="text-lg" >Gestiona las multas activas</p>
        </div>

        <div class="grid grid-cols-2 gap-5 mt-5" >
            <?php foreach($multas as $multa): ?>
                <?php if($multa->activo === '1'): ?>
                <div class="flex justify-center gap-5 items-center bg-gray-100 py-5 px-4 rounded" >
                    <div class="px-2 border-r" >
                        <p>ID: <?php echo $multa->id; ?></p>
                        <p class="font-bold text-md" >Costo <span>$<?php echo ((strtotime(date("Y-m-d")) - strtotime($multa->fechaFin))/86400) * 20 ?></span></p>
                    </div>
                    <div>
                        <p><?php echo $multa->nombreCliente; ?></p>
                        <p><?php echo $multa->fechaFin; ?></p>
                    </div>

                    <form action="/multas">
                        <input type="number" name="id" value="<?php echo $multa->prestamoID; ?>" hidden >
                        <button
                            class="bg-red-500 px-2 py-1 rounded transition-colors hover:bg-red-600 text-white font-bold text-md"
                            type="submit"
                        >
                            Eliminar
                        </button>
                    </form>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <div class="flex flex-col justify-center gap-1 text-center" >
            <h1 class="font-bold text-2xl text-green-600" >Historial de multas</h1>
            <p class="text-lg" >Gestiona las multas no activas</p>
        </div>

        <div class="grid grid-cols-2 gap-5 mt-5" >
            <?php foreach($multas as $multa): ?>
                <?php if($multa->activo === '0'): ?>
                <div class="flex justify-center gap-5 items-center bg-gray-100 py-5 px-4 rounded" >
                    <div class="px-2 border-r" >
                        <p>ID: <?php echo $multa->id; ?></p>
                        <p class="font-bold text-md" >Costo <span>$<?php echo ((strtotime(date("Y-m-d")) - strtotime($multa->fechaFin))/86400) * 20 ?></span></p>
                    </div>
                    <div>
                        <p><?php echo $multa->nombreCliente; ?></p>
                        <p><?php echo $multa->fechaFin; ?></p>
                    </div>

                    <form action="/multas">
                        <input type="number" name="id" value="<?php echo $multa->prestamoID; ?>" hidden >
                        <button
                            class="bg-red-500 px-2 py-1 rounded transition-colors hover:bg-red-600 text-white font-bold text-md"
                            type="submit"
                        >
                            Eliminar
                        </button>
                    </form>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>