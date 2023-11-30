<div class="flex flex-col items-center overflow-x-hidden" >
    <div class="w-full md:w-2/3" >
        <div class="text-center" >
            <h1 class="font-bold text-3xl text-green-600" >Empleados</h1>
            <p class="text-xl font-bold" >Administra o gestiona la informacion de los empleados</p>
        </div>

        <form class="flex flex-col items-center bg-slate-100 shadow-lg p-5 rounded-md mt-5 gap-3" action="/admin/empleados" method="POST" >
            <fieldset class="w-full border mt-2 p-2" >
                <label class="text-xl font-bold text-green-700 uppercase" >Informacion del empleado</label>
                <div class="grid grid-cols-2 gap-5 w-full mt-2" >
                    <div class="flex flex-col gap-1 w-full" >
                        <label class="text-lg font-bold text-green-700" >Nombre(s)</label>
                        <input 
                            type="text" 
                            name="nombre" 
                            placeholder="Nombre(s) del empleado" 
                            class="px-2 py-1 border-b border"
                        >
                    </div>

                    <div class="flex flex-col gap-1 w-full" >
                        <label class="text-lg font-bold text-green-700" >Apellido(s)</label>
                        <input 
                            type="text" 
                            name="apellidos" 
                            placeholder="Apellido(s) del empleado" 
                            class="px-2 py-1 border-b border"
                        >
                    </div>

                    <div class="flex flex-col gap-1 w-full" >
                        <label class="text-lg font-bold text-green-700" >Nombre de usuario</label>
                        <input 
                            type="text" 
                            name="userName" 
                            placeholder="Nombre del usuario" 
                            class="px-2 py-1 border-b border"
                        >
                    </div>

                    <div class="flex flex-col gap-1 w-full" >
                        <label class="text-lg font-bold text-green-700" >Password del usuario</label>
                        <input 
                            type="password" 
                            name="password" 
                            placeholder="Password del usuario" 
                            class="px-2 py-1 border-b border"
                        >
                    </div>
                </div>
            </fieldset>

            <fieldset class="w-full border mt-2 p-2" >
                <label class="text-xl font-bold text-green-700 uppercase" >Informacion del puesto</label>
                <div class="grid grid-cols-2 gap-5 w-full mt-2" >
                    <div class="flex flex-col gap-1 w-full" >
                        <label class="text-lg font-bold text-green-700" >Turno</label>
                        <select name="turnoID" >
                            <option value="" >SELECCIONE EL TURNO</option>
                            <?php foreach($turnos as $turno): ?>
                                <option value="<?php echo $turno->id; ?>" ><?php echo $turno->nombre; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="flex flex-col gap-1 w-full" >
                        <label class="text-lg font-bold text-green-700" >Rango</label>
                        <select name="rangoID" >
                            <option value="" >SELECCIONE EL RANGO</option>
                            <?php foreach($rangos as $rango): ?>
                                <option value="<?php echo $rango->id; ?>" ><?php echo $rango->nombre; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </fieldset>

            <fieldset class="w-full border mt-2 p-2" >
                <label class="text-xl font-bold text-green-700 uppercase" >Informacion de contacto</label>
                <div class="grid grid-cols-2 gap-5 w-full mt-2" >
                    <div class="flex flex-col gap-1 w-full" >
                        <label class="text-lg font-bold text-green-700" >Calle y numero</label>
                        <input 
                            type="text" 
                            name="calleNumero" 
                            placeholder="Ej. Aragon 118" 
                            class="px-2 py-1 border-b border"
                        >
                    </div>

                    <div class="flex flex-col gap-1 w-full" >
                        <label class="text-lg font-bold text-green-700" >Colonia</label>
                        <input 
                            type="text" 
                            name="colonia" 
                            placeholder="Ej. Privadas del rey" 
                            class="px-2 py-1 border-b border"
                        >
                    </div>

                    <div class="flex flex-col gap-1 w-full" >
                        <label class="text-lg font-bold text-green-700" >Codigo Postal</label>
                        <input 
                            type="text" 
                            name="codigoPostal" 
                            placeholder="Ej. 66612" 
                            class="px-2 py-1 border-b border"
                        >
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-5 w-full mt-2" >
                    <div class="flex flex-col gap-1 w-full" >
                        <label class="text-lg font-bold text-green-700" >Estado</label>
                        <select name="estadoID" id="estados" >
                            <option value="" >SELECCIONE EL ESTADO</option>
                            <?php foreach($estados as $estado): ?>
                                <option value="<?php echo $estado->id; ?>" ><?php echo $estado->estado; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="flex flex-col gap-1 w-full" >
                        <label class="text-lg font-bold text-green-700" >Municipio</label>
                        <select name="municipioID" id="municipios" ></select>
                    </div>
                </div>
            </fieldset>

            <button class="bg-green-600 py-1 px-2 hover:bg-green-700 rounded font-bold text-white" >
                Guardar
            </button>
        </form>
    </div>

    <div class="mt-5 w-full md:w-2/3 p-5 overflow-x-auto" >
        <h2 class="text-3xl font-bold text-green-600 my-4 uppercase text-center" >Listado Empleados</h2>
        <table class="w-full" >
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>rango</th>
                <th>turno</th>
                <th>Calle Numero</th>
                <th>Colonia</th>
                <th>Estado</th>
                <th>Municipio</th>
                <th>Acciones</th>
            </tr>
            <?php foreach($empleados as $empleado): ?>
                <tr class="border-y" >
                    <td class="px-2 py-1" ><?php echo $empleado->id; ?></td>
                    <td class="px-2 py-1" ><?php echo $empleado->nombre; ?></td>
                    <td class="px-2 py-1" ><?php echo $empleado->turno; ?></td>
                    <td class="px-2 py-1" ><?php echo $empleado->rango; ?></td>
                    <td class="px-2 py-1" ><?php echo $empleado->calleNumero; ?></td>
                    <td class="px-2 py-1" ><?php echo $empleado->colonia; ?></td>
                    <td class="px-2 py-1" ><?php echo $empleado->estado; ?></td>
                    <td class="px-2 py-1" ><?php echo $empleado->municipio; ?></td>
                    <td class="flex flex-col gap-2 justify-center px-2 py-1" >
                        <button
                            class="bg-blue-500 font-bold text-base px-2 py-1 rounded-lg text-white"
                        >
                            Editar
                        </button>   
                        
                        <button
                            class="bg-red-700 font-bold text-base px-2 py-1 rounded-lg text-white"
                        >
                            Eliminar
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>