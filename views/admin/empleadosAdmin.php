<div class="flex flex-col items-center overflow-y-auto" >
    <div class="w-full md:w-2/3" >
        <div class="text-center" >
            <h1 class="font-bold text-3xl text-green-600" >Empleados</h1>
            <p class="text-xl font-bold" >Administra o gestiona la informacion de los empleados</p>
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
        </form>
    </div>
</div>