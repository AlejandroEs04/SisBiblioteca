<div class="flex flex-col items-center overflow-x-hidden w-full" >
    <div class="w-full md:w-2/3" >
        <div class="text-center" >
            <h1 class="font-bold text-3xl text-green-600" >Clientes</h1>
            <p class="text-xl font-bold" >Administra o gestiona la informacion de los clientes</p>
        </div>

        <form class="flex flex-col items-center bg-slate-100 shadow-lg p-5 rounded-md mt-5 gap-3" action="/clientes" method="POST" >
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
                            value="<?php echo $cliente->nombre; ?>"
                        >
                    </div>

                    <div class="flex flex-col gap-1 w-full" >
                        <label class="text-lg font-bold text-green-700" >Apellido(s)</label>
                        <input 
                            type="text" 
                            name="apellidos" 
                            placeholder="Apellido(s) del empleado" 
                            class="px-2 py-1 border-b border"
                            value="<?php echo $cliente->apellidos; ?>"
                        >
                    </div>

                    <div class="flex flex-col gap-1 w-full" >
                        <label class="text-lg font-bold text-green-700" >Correo</label>
                        <input 
                            type="text" 
                            name="correo" 
                            placeholder="Correo del cliente" 
                            class="px-2 py-1 border-b border"
                            value="<?php echo $cliente->correo; ?>"
                        >
                    </div>

                    <div class="flex flex-col gap-1 w-full" >
                        <label class="text-lg font-bold text-green-700" >Numero</label>
                        <input 
                            type="numero" 
                            name="numero" 
                            placeholder="Numero del cliente" 
                            class="px-2 py-1 border-b border"
                            value="<?php echo $cliente->numero; ?>"
                        >
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
                            value="<?php echo $cliente->calleNumero; ?>"
                        >
                    </div>

                    <div class="flex flex-col gap-1 w-full" >
                        <label class="text-lg font-bold text-green-700" >Colonia</label>
                        <input 
                            type="text" 
                            name="colonia" 
                            placeholder="Ej. Privadas del rey" 
                            class="px-2 py-1 border-b border"
                            value="<?php echo $cliente->colonia; ?>"
                        >
                    </div>

                    <div class="flex flex-col gap-1 w-full" >
                        <label class="text-lg font-bold text-green-700" >Codigo Postal</label>
                        <input 
                            type="text" 
                            name="codigoPostal" 
                            placeholder="Ej. 66612" 
                            class="px-2 py-1 border-b border"
                            value="<?php echo $cliente->codigoPostal; ?>"
                        >
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-5 w-full mt-2" >
                    <div class="flex flex-col gap-1 w-full" >
                        <label class="text-lg font-bold text-green-700" >Estado</label>
                        <select name="estadoID" id="estados" value="<?php echo $cliente->estadoID; ?>" >
                            <option value="" >SELECCIONE EL ESTADO</option>
                            <?php foreach($estados as $estado): ?>
                                <option <?php echo $cliente->estadoID === $estado->id ? 'selected' : ''; ?> value="<?php echo $estado->id; ?>" ><?php echo $estado->estado; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="flex flex-col gap-1 w-full" >
                        <label class="text-lg font-bold text-green-700" >Municipio</label>
                        <?php if($cliente): ?>
                            <input type="number" name="municipioID" value="<?php echo $cliente->municipioID; ?>" hidden >
                        <?php endif; ?>
                        <select name="municipioID" id="municipios" value="<?php echo $cliente->municipioID; ?>" ></select>
                    </div>
                </div>
            </fieldset>
            
            <?php if($cliente): ?>
                <input type="number" name="id" value="<?php echo $cliente->id; ?>" hidden >
            <?php endif; ?>

            <button class="bg-green-600 py-1 px-2 hover:bg-green-700 rounded font-bold text-white" >
                <?php 
                    if($empleclienteado){ 
                        echo 'Editar'; 
                    } else { 
                        echo 'Guardar'; 
                    }
                ?>
            </button>
        </form>
    </div>

    <div class="mt-5 w-full md:w-2/3 p-5 overflow-x-auto" >
        <h2 class="text-3xl font-bold text-green-600 my-4 uppercase text-center" >Listado Clientes</h2>
        <table class="w-full" >
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Numero</th>
                <th>CalleNumero</th>
                <th>Colonia</th>
                <th>Estado</th>
                <th>Municipio</th>
                <th>Acciones</th>
            </tr>
            <?php foreach($clientes as $cliente): ?>
                <tr class="border-y" >
                    <td class="px-2 py-1" ><?php echo $cliente->id; ?></td>
                    <td class="px-2 py-1" ><?php echo $cliente->nombreCliente; ?></td>
                    <td class="px-2 py-1" ><?php echo $cliente->correo; ?></td>
                    <td class="px-2 py-1" ><?php echo $cliente->numero; ?></td>
                    <td class="px-2 py-1" ><?php echo $cliente->calleNumero; ?></td>
                    <td class="px-2 py-1" ><?php echo $cliente->colonia; ?></td>
                    <td class="px-2 py-1" ><?php echo $cliente->estado; ?></td>
                    <td class="px-2 py-1" ><?php echo $cliente->municipio; ?></td>
                    <td class="flex flex-col gap-2 justify-center px-2 py-1" >
                    
                    <form action="/clientes" class="w-full" >
                        <input type="number" name="id" value="<?php echo $cliente->id; ?>" hidden >
                        <button
                            type="submit"
                            class="bg-blue-500 font-bold text-base px-2 py-1 rounded-lg text-white w-full"
                        >
                            Editar
                        </button>   
                    </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>