<div class="flex flex-col items-center" >
    <div class="w-full md:w-1/2" >
        <div class="flex flex-col justify-center gap-1 text-center" >
            <h1 class="font-bold text-2xl text-green-600" >Administra las Categorias</h1>
            <p class="text-lg" >Agrega, edita o elimina las categorias</p>
        </div>
        <form action="/add-categories" method="POST" class="flex flex-col items-center bg-slate-100 shadow-lg p-5 rounded-md mt-5" >
            <div class="flex flex-col gap-1 w-full" >
                <label class="font-bold text-green-600 text-lg">Nombre</label>
                <input type="text" name="nombre" placeholder="Nombre del genero" class="px-2 py-1 rounded w-full" >
            </div>

            <button
                type="submit"
                class="bg-green-600 text-white font-bold px-2 py-1 rounded-lg mt-5 hover:bg-green-700 transition-colors"
            >
                Guardar Genero
            </button>
        </form>
    </div>

    <div>
        <div>

        </div>
    </div>
</div>