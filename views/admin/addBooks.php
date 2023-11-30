<div class="flex flex-col items-center overflow-y-auto" >
    <div class="w-full md:w-2/3" >
    <div class="text-center" >
        <h1 class="font-bold text-3xl text-green-600" >Administrador de Libros</h1>
        <p class="text-xl font-bold" >Agregar los datos que se piden en el formulario para agregar un libro</p>
    </div>
    <form class="flex flex-col items-center bg-slate-100 shadow-lg p-5 rounded-md mt-5 gap-3" action="/add-books" method="POST" >
        <div class="flex flex-col gap-2 w-full" >
            <label class="text-lg font-bold text-green-700" >Nombre del Libro</label>
            <input 
                type="text" 
                name="nombre" 
                placeholder="Nombre del libro" 
                class="px-2 py-1 border-b border"
            >
        </div>

        <div class="flex flex-col gap-2 w-full" >
            <label class="text-lg font-bold text-green-700" >Descripcion del libro</label>
            <textarea 
                name="descripcion" 
                class="px-2 py-1 border-b border h-32"
            ></textarea>
        </div>

        <div class="grid grid-cols-3 w-full gap-4" >
            <div class="flex flex-col gap-2 w-full" >
                <label class="text-lg font-bold text-green-700">Editorial</label>
                <select
                    name="editorialID" 
                    class="px-2 py-1 border-b border"
                >
                    <?php foreach($editoriales as $editorial): ?>
                        <option value="<?php echo $editorial->id; ?>" ><?php echo $editorial->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="flex flex-col gap-2 w-full" >
                <label class="text-lg font-bold text-green-700">Genero</label>
                <select
                    name="generoID" 
                    class="px-2 py-1 border-b border"
                >
                    <?php foreach($generos as $genero): ?>
                        <option value="<?php echo $genero->id; ?>" ><?php echo $genero->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="flex flex-col gap-2 w-full" >
                <label class="text-lg font-bold text-green-700">Clasificacion</label>
                <select
                    name="clasificacionID" 
                    class="px-2 py-1 border-b border"
                >
                    <?php foreach($clasificaciones as $clasificacion): ?>
                        <option value="<?php echo $clasificacion->id; ?>" ><?php echo $clasificacion->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="flex flex-col gap-2 w-full" >
                <label class="text-lg font-bold text-green-700">Limite (Dias)</label>
                <select
                    name="limiteID" 
                    class="px-2 py-1 border-b border"
                >
                    <?php foreach($limites as $limite): ?>
                        <option value="<?php echo $limite->id; ?>" ><?php echo $limite->diasLimite ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="flex flex-col gap-2 w-full" >
                <label class="text-lg font-bold text-green-700">Stock</label>
                <input
                    name="stock"
                    class="px-2 py-1 border-b border"
                >
            </div>

            <div class="flex items-end" >
                <button class="px-2 py-1 bg-green-500 hover:bg-green-600 text-white font-bold rounded-md w-full h-10 transition uppercase" >
                    Guardar
                </button>
            </div>
        </div>

        
    </form>
    </div>
</div>