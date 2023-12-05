<div class="flex flex-col items-center overflow-x-hidden w-full" >
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
                            value="<?php echo $empleado->nombre; ?>"
                        >
                    </div>

                    <div class="flex flex-col gap-1 w-full" >
                        <label class="text-lg font-bold text-green-700" >Apellido(s)</label>
                        <input 
                            type="text" 
                            name="apellidos" 
                            placeholder="Apellido(s) del empleado" 
                            class="px-2 py-1 border-b border"
                            value="<?php echo $empleado->apellidos; ?>"
                        >
                    </div>

                    <div class="flex flex-col gap-1 w-full" >
                        <label class="text-lg font-bold text-green-700" >Nombre de usuario</label>
                        <input 
                            type="text" 
                            name="userName" 
                            placeholder="Nombre del usuario" 
                            class="px-2 py-1 border-b border"
                            value="<?php echo $empleado->userName; ?>"
                        >
                    </div>

                    <div class="flex flex-col gap-1 w-full" >
                        <label class="text-lg font-bold text-green-700" >Password del usuario</label>
                        <input 
                            type="password" 
                            name="password" 
                            placeholder="Password del usuario" 
                            class="px-2 py-1 border-b border"
                            autocomplete="off"
                        >
                    </div>
                </div>
            </fieldset>

            <fieldset class="w-full border mt-2 p-2" >
                <label class="text-xl font-bold text-green-700 uppercase" >Informacion del puesto</label>
                <div class="grid grid-cols-2 gap-5 w-full mt-2" >
                    <div class="flex flex-col gap-1 w-full" >
                        <label class="text-lg font-bold text-green-700" >Turno</label>
                        <select name="turnoID" value="<?php echo $empleado->turnoID; ?>" >
                            <option value="" >SELECCIONE EL TURNO</option>
                            <?php foreach($turnos as $turno): ?>
                                <option <?php echo $empleado->turnoID === $turno->id ? 'selected' : ''; ?> value="<?php echo $turno->id; ?>" ><?php echo $turno->nombre; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="flex flex-col gap-1 w-full" >
                        <label class="text-lg font-bold text-green-700" >Rango</label>
                        <select name="rangoID" value="<?php echo $empleado->rangoID; ?>" >
                            <option value="" >SELECCIONE EL RANGO</option>
                            <?php foreach($rangos as $rango): ?>
                                <option <?php echo $empleado->rangoID === $rango->id ? 'selected' : ''; ?> value="<?php echo $rango->id; ?>" ><?php echo $rango->nombre; ?></option>
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
                            value="<?php echo $empleado->calleNumero; ?>"
                        >
                    </div>

                    <div class="flex flex-col gap-1 w-full" >
                        <label class="text-lg font-bold text-green-700" >Colonia</label>
                        <input 
                            type="text" 
                            name="colonia" 
                            placeholder="Ej. Privadas del rey" 
                            class="px-2 py-1 border-b border"
                            value="<?php echo $empleado->colonia; ?>"
                        >
                    </div>

                    <div class="flex flex-col gap-1 w-full" >
                        <label class="text-lg font-bold text-green-700" >Codigo Postal</label>
                        <input 
                            type="text" 
                            name="codigoPostal" 
                            placeholder="Ej. 66612" 
                            class="px-2 py-1 border-b border"
                            value="<?php echo $empleado->codigoPostal; ?>"
                        >
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-5 w-full mt-2" >
                    <div class="flex flex-col gap-1 w-full" >
                        <label class="text-lg font-bold text-green-700" >Estado</label>
                        <select name="estadoID" id="estados" value="<?php echo $empleado->estadoID; ?>" >
                            <option value="" >SELECCIONE EL ESTADO</option>
                            <?php foreach($estados as $estado): ?>
                                <option <?php echo $empleado->estadoID === $estado->id ? 'selected' : ''; ?> value="<?php echo $estado->id; ?>" ><?php echo $estado->estado; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="flex flex-col gap-1 w-full" >
                        <label class="text-lg font-bold text-green-700" >Municipio</label>
                        <?php if($empleado): ?>
                            <input type="number" name="municipioID" value="<?php echo $empleado->municipioID; ?>" hidden >
                        <?php endif; ?>
                        <select name="municipioID" id="municipios" value="<?php echo $empleado->municipioID; ?>" ></select>
                    </div>
                </div>
            </fieldset>

            <input type="number" name="id" value="<?php echo $empleado->id; ?>" hidden >
            <input type="number" name="activo" value="<?php echo $empleado->activo; ?>" hidden >

            <button class="bg-green-600 py-1 px-2 hover:bg-green-700 rounded font-bold text-white" >
                <?php 
                    if($empleado){ 
                        echo 'Editar'; 
                    } else { 
                        echo 'Guardar'; 
                    }
                ?>
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
                <th>activo</th>
                <th>Acciones</th>
            </tr>
            <?php foreach($empleados as $empleado): ?>
                <tr class="border-y" >
                    <td class="px-2 py-1 <?php if($empleado->activo !== '1'): echo 'text-red-500'; endif; ?>" ><?php echo $empleado->id; ?></td>
                    <td class="px-2 py-1 <?php if($empleado->activo !== '1'): echo 'text-red-500'; endif; ?>" ><?php echo $empleado->nombre; ?></td>
                    <td class="px-2 py-1 <?php if($empleado->activo !== '1'): echo 'text-red-500'; endif; ?>" ><?php echo $empleado->turno; ?></td>
                    <td class="px-2 py-1 <?php if($empleado->activo !== '1'): echo 'text-red-500'; endif; ?>" ><?php echo $empleado->rango; ?></td>
                    <td class="px-2 py-1 <?php if($empleado->activo !== '1'): echo 'text-red-500'; endif; ?>" ><?php echo $empleado->calleNumero; ?></td>
                    <td class="px-2 py-1 <?php if($empleado->activo !== '1'): echo 'text-red-500'; endif; ?>" ><?php echo $empleado->colonia; ?></td>
                    <td class="px-2 py-1 <?php if($empleado->activo !== '1'): echo 'text-red-500'; endif; ?>" ><?php echo $empleado->estado; ?></td>
                    <td class="px-2 py-1 <?php if($empleado->activo !== '1'): echo 'text-red-500'; endif; ?>" ><?php echo $empleado->municipio; ?></td>
                    <td class="px-2 py-1 <?php if($empleado->activo !== '1'): echo 'text-red-500'; endif; ?>" ><?php if($empleado->activo === '1'): echo 'activo'; else: echo 'no activo'; endif; ?></td>
                    <td class="flex flex-col gap-2 justify-center px-2 py-1" >
                    
                    <form action="/admin/empleados" class="w-full" >
                        <input type="number" name="id" value="<?php echo $empleado->id; ?>" hidden >
                        <button
                            type="submit"
                            class="bg-blue-500 font-bold text-base px-2 py-1 rounded-lg text-white w-full"
                        >
                            Editar
                        </button>   
                    </form>
                        
                    <form action="/admin/empleados" class="w-full" >
                        <input type="number" name="<?php if($empleado->activo === '1'): echo 'eliminar'; else: echo 'activar'; endif; ?>" value="1" hidden >
                        <input type="number" name="id" value="<?php echo $empleado->id; ?>" hidden >
                        <button
                            type="submit"
                            class="<?php if($empleado->activo === '1'): echo 'bg-red-700'; else: echo 'bg-green-600'; endif; ?>  font-bold text-base px-2 py-1 rounded-lg text-white w-full"
                        >
                            <?php if($empleado->activo === '1'): echo 'Eliminar'; else: echo 'Activar'; endif; ?>
                        </button>
                    </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>