<div class="flex flex-col items-center overflow-x-hidden w-full" >
    <div class="w-full md:w-2/3" >
        <div class="text-center" >
            <h1 class="font-bold text-3xl text-green-600" >Horarios y Rangos</h1>
            <p class="text-xl font-bold" >Administra o gestiona la informacion de los horarios y rangos</p>
        </div>
    </div>

    <div class="flex gap-5" >
        <div>
            <h2 class="text-2xl font-bold text-green-600 text-center mt-5" >Turnos</h2>
            <?php foreach($turnos as $turno): ?>
                <form action="/admin/schedule" method="POST" class="flex flex-col gap-4 justify-start mt-1 p-4 bg-gray-50 rounded-lg" >
                    <div class="flex gap-2" >
                        <div class="flex flex-col justify-center" >
                            <label class="font-bold text-md text-green-600" >Nombre del turno</label>
                            <input type="text" placeholder="Nombre del turno" name="nombre" value="<?php echo $turno->nombre ?>" >
                        </div>

                        <div class="flex gap-4" >
                            <div class="flex flex-col" >
                                <label class="font-bold text-md text-green-600" >Hora de inicio</label>
                                <input type="time" placeholder="Hora de inicio" name="horaInicio" value="<?php echo $turno->horaInicio ?>" >
                            </div>

                            <div class="flex flex-col" >
                                <label class="font-bold text-md text-green-600" >Hora de fin</label>
                                <input type="time" placeholder="Hora de fin" name="horaFin" value="<?php echo $turno->horaFin ?>" >
                            </div>
                        </div>
                    </div>

                    <input type="text" name="turno" value="1" hidden>
                    <input type="text" name="id" value="<?php echo $turno->id ?>" hidden>

                    <button class="bg-green-500 text-white font-bold px-2 py-1 rounded hover:bg-green-600 transition-colors" >
                        Actualizar
                    </button>
                </form>
            <?php endforeach; ?>
        </div>

        <div>
            <h2 class="text-2xl font-bold text-green-600 text-center mt-5" >Rangos</h2>
            <?php foreach($rangos as $rango): ?>
                <form action="/admin/schedule" method="POST" class="flex flex-col gap-4 justify-start mt-1 p-4 bg-gray-50 rounded-lg" >
                    <div class="flex gap-2" >
                        <div class="flex flex-col justify-center" >
                            <label class="font-bold text-md text-green-600" >Nombre del turno</label>
                            <input type="text" placeholder="Nombre del turno" name="nombre" value="<?php echo $rango->nombre ?>" >
                        </div>
                    </div>

                    <input type="text" name="rango" value="1" hidden>
                    <input type="text" name="id" value="<?php echo $rango->id ?>" hidden>

                    <button class="bg-green-500 text-white font-bold px-2 py-1 rounded hover:bg-green-600 transition-colors" >
                        Actualizar
                    </button>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>
