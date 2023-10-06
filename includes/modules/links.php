<?php
    $link = $_POST['info'];
?>

<div class="flex gap-1 items-center text-white hover:text-green-500" >
    <a href="<?php echo $link['link'] ?>" class="text-xl" ><?php echo $link['nombre'] ?></a>

    <div>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
    </div>
</div>