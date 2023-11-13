<form class="flex flex-col" action="">
    <div class="flex flex-col" >
        <label class="font-bold text-lg" >Elija el libro a agregar</label>
        <select class="border p-2" id="libros" >
            <option>-- SELECCIONE EL NOMBRE --</option>
            <option>
                <div>
                    <p><span>ID</span>: 1</p>
                </div>
                <div>
                    <p><span>Nombre</span>: El principito</p>
                </div>
            </option>

            <option>
                <div>
                    <p><span>ID</span>: 2</p>
                </div>

                <div>
                    <p><span>Nombre</span>: Los juegos del hambre</p>
                </div>
            </option>
        </select>
    </div>

    <button 
        type="button"
        class="bg-green-600 text-white font-bold px-2 py-1 rounded hover:bg-green-500 transition-colors mt-5" 
    >Agregar Libro</button>
</form>