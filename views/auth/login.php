<div class="flex justify-center items-center" >
    <form
        class="flex flex-col bg-slate-50 gap-5 w-80 px-4 py-8 shadow-2xl"
        method="POST"
        action="/login"
    >
        <div class="text-center" >
            <h2 class="text-2xl text-green-700 font-bold" >Iniciar sesion</h2>
            <p class="text-md font-semibold" >Ingresa tus datos para ingresar el sistema</p>
        </div>
        <div class="flex flex-col gap-1" >
            <label for="userName" class="font-bold text-green-700" >Nombre de usuario</label>
            <input 
                type="text" 
                placeholder="Nombre de usuario" 
                name="userName" 
                id="userName" 
                class="border px-2 py-1"
            >
        </div>

        <div class="flex flex-col gap-1" >
            <label for="password" class="font-bold text-green-700" >Password</label>
            <input 
                type="password" 
                placeholder="Password" 
                name="userName" 
                id="password" 
                class="border px-2 py-1"
            >
        </div>

        <button
            type="submit"
            class="px-5 py-2 uppercase text-white bg-green-700 hover:bg-green-600 rounded-md transition-all"
        >
            Iniciar Sesion
        </button>

        <div>
            <p class="font-bold text-green-600 text-xs" >En caso de olvidar su contrasena, un administrador debera restaurar el password</p>
        </div>
    </form>
</div>