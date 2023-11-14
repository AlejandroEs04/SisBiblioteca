<div class="flex flex-col items-center overflow-y-auto" >
    <div class="w-full md:w-2/3" >
    <div class="text-center" >
        <h1 class="font-bold text-3xl text-green-600" >Administrador de Libros</h1>
        <p class="text-xl font-bold" >Agregar los datos que se piden en el formulario para agregar eun libro</p>
    </div>
    <form class="flex flex-col items-center bg-slate-100 shadow-lg p-5 rounded-md mt-5 gap-3"  >
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

        <div class="flex justify-center" >
            <button class="px-2 py-1 bg-green-500 hover:bg-green-600 text-white font-bold rounded-md w-40 transition uppercase" >
                Guardar
            </button>
        </div>
    </form>
    </div>
</div>