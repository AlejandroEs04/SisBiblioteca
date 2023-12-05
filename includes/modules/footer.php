<?php 
    use Model\Negocio;

    $negocio = Negocio::all();
?>

<div class="bg-green-600 flex flex-col gap-8 w-full px-72 py-10" >
    <div>
        <a href="/" class="flex items-center gap-5" >
            <img src="/build/img/logo.png" alt="Logo de bookstacker" class=" h-10 w-10" >
            <h1 class="text-2xl font-bold text-white" ><?php echo $negocio[0]->nombre ?></h1>
        </a>
    </div>

    <div class="grid grid-cols-2 gap-5" >
        <div>
            <h2 class="text-2xl font-bold uppercase text-white" >Mision</h2>
            <p class="text-lg text-white" ><?php echo $negocio[0]->mision; ?></p>
        </div>

        <div>
            <h2 class="text-2xl font-bold uppercase text-white" >Vision</h2>
            <p class="text-lg text-white" ><?php echo $negocio[0]->vision; ?></p>
        </div>
    </div>

    <div class="flex flex-col gap-1 mt-5" >
        <p class="text-white font-bold text-base" ><?php echo $negocio[0]->calleNumero . ', ' . $negocio[0]->colonia . ', C.P.' . $negocio[0]->codigoPostal . ', Apodaca, Nuevo Leon '  ?></p>
        <p class="text-white text-base" >Correo de contacto: <?php echo $negocio[0]->correo ?></p>
        <p class="text-white text-base" >Numero de contacto: <?php echo $negocio[0]->numero ?></p>
    </div>
</div>