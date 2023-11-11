<form id="formPrestamo">
    <?php incluirTemplate('modalAddBook', null); ?>
    <table class="w-full bg-slate-100 mt-5 text-center" >
        <thead class="border" >
            <tr>
                <td>ID</td>
                <td>Nombre de Libro</td>
                <td>Tiempo limite</td>
            </tr>
            
        </thead>

        <tbody>
            <tr class="border" >
                <?php foreach($librosTabla as $libro): ?>
                    <td><?php echo $libro['id'] ?></td>
                    <td><?php echo $libro['nombre'] ?></td>
                    <td><?php echo $libro['limite'] ?></td>
                <?php endforeach; ?>
            </tr>
        </tbody>
    </table> 

    <div class="grid grid-cols-2 gap-5" >
        <div class="mt-5" >
            <label class="font-bold text-lg text-green-700" >Seleccione el cliente:</label>
            <select class="w-full border px-2 py-1" >
                <option>
                    Cliente 1
                </option>
            </select>
        </div>

        <div class="mt-5" >
            <label class="font-bold text-lg text-green-700" >Atendido por:</label>
            <select class="w-full border px-2 py-1" >
                <option>
                    Empleado 1
                </option>
            </select>
        </div>
    </div>

    <div class="flex justify-center mt-5" >
        <button class="px-2 py-1 bg-green-500 hover:bg-green-600 text-white font-bold rounded-md" >
            Generar Prestamo
        </button>
    </div>
    
</form>