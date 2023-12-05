<?php
    $libros = $_POST['info'][0];
    $librosTabla = $_POST['info'][1];
    $empleados = $_POST['info'][2];
    $clientes = $_POST['info'][3];
?>

<form class="flex flex-col" action="/" method="post" >
    <?php foreach($librosTabla as $libro): ?>
        <input value="<?php echo $libro->id ?>" name="libros[]" hidden >
    <?php endforeach; ?>
    
    <div class="flex flex-col" >
        <label class="font-bold text-lg" >Elija el libro a agregar</label>
        <select class="border p-2" id="libros" name="libro" >
            <option>-- SELECCIONE EL LIBRO --</option>
            <?php foreach($libros as $libro): ?>
                <option value="<?php echo $libro->id; ?>" ><?php echo $libro->nombre; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <button 
        type="submit"
        class="bg-green-600 text-white font-bold px-2 py-1 rounded hover:bg-green-500 transition-colors mt-5 w-48" 
    >Agregar Libro</button>
</form>

<form id="formPrestamo" action="/" method="post" >
    <?php foreach($librosTabla as $libro): ?>
        <input value="<?php echo $libro->id ?>" name="libros[]" hidden >
    <?php endforeach; ?>
    <table class="w-full mt-5 text-center" >
        <thead class="border text-white bg-slate-600" >
            <tr>
                <td>ID</td>
                <td>Nombre de Libro</td>
                <td>Tiempo limite</td>
            </tr>
        </thead>

        <tbody class="bg-slate-100" >
            <?php foreach($librosTabla as $libro): ?>
                <tr class="border" >
                    <td><?php echo $libro->id; ?></td>
                    <td><?php echo $libro->nombre; ?></td>
                    <td><?php echo $libro->diaslimite; ?></td>
                </tr>
            <?php endforeach; ?>
            
        </tbody>
    </table> 

    <div class="grid grid-cols-2 gap-5" >
        <div class="mt-5" >
            <label class="font-bold text-lg text-green-700" >Seleccione el cliente:</label>
            <select class="w-full border px-2 py-1" name="clienteID" >
                <?php foreach($clientes as $cliente): ?>
                    <option value="<?php echo $cliente->id; ?>" ><?php echo $cliente->nombre; ?></option>
                <?php endforeach; ?>
            </select>
            <p class="font-bold mt-2" >Si el cliente es nuevo, agreguelo antes <a href="/clientes" class="text-base text-green-600 hover:text-green-800 font-bold uppercase" >Haz Click Aqui</a></p>
        </div>

        <div class="mt-5" >
            <label class="font-bold text-lg text-green-700" >Atendido por:</label>
            <select class="w-full border px-2 py-1" name="empleadoID" >
                
                <?php foreach($empleados as $empleado): ?>
                    <option value="<?php echo $empleado->id; ?>" ><?php echo $empleado->nombre; ?></option>
                <?php endforeach; ?>
                
            </select>
        </div>
    </div>

    <div class="flex justify-center mt-5 gap-4" >
        <button class="px-2 py-1 bg-green-500 hover:bg-green-600 text-white font-bold rounded-md" >
            Generar Prestamo
        </button>

        <a href="/" class="px-2 py-1 bg-yellow-500 hover:bg-yellow-600 text-white font-bold rounded-md" >
            Reiniciar
        </a>
    </div>
</form>