<div class="flex flex-col items-center overflow-y-auto w-full" >
    <div class="w-full md:w-2/3" >
        <div class="flex flex-col justify-center gap-1 text-center" >
            <h1 class="font-bold text-2xl text-green-600" >Ver las multas</h1>
            <p class="text-lg" >Gestiona las multas activas</p>
        </div>

        <div class="flex flex-col gap-5" >
            <?php foreach($multas as $multa): ?>
                <div class="flex gap-5" >
                    <div class="px-2 border-r" >
                        <p><?php echo $multa->id; ?></p>
                    </div>
                    <div>
                        <p><?php echo $multa->nombre; ?></p>
                        <p><?php echo $multa->prestamoID; ?></p>
                    </div>

                    <div>
                        <button>
                            
                        </button>
                        <p><?php echo $multa->prestamoID; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>