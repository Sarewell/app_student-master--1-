<?php
    session_start();

require_once('models/Model.php')

?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.4/dist/full.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script>
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
			integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		/>
    <title>happy school</title>
</head>
<body class="bg-gray-300">
    <?php

    include_once('helpers/_function.php');

    $navItems = 
    [
        [
            "name"=>"Nos formateur",
            "url"=>"formateur.php",
        ],
        [
            "name"=>"Nos ordinateur",
            "url"=>"ordinateur.php"
        ]
    ];
    ?>
    <!-- header -->
		<header class="px-[10%] max-w-full bg-white px-5 py-20 flex place-content-between items-center shadow-xl">
			<!-- div logo -->
			<div class="">
				<a href="index.php" class="rounded-full bg-gray-100 text-2xl font-bold uppercase p-10 hover:bg-gray-200 shadow-lg hover:shadow-inner hover:text-red-700">happy school</a>
			</div>
			<!-- end div logo -->
			<!-- navigation -->
            
			<nav class= "text-gray-400 text-2xl space-x-5 uppercase">
            <?php
            foreach($navItems as $navItem){?>
                <a href="<?=$navItem['url']?>" class= "bg-gray-100 hover:text-red-700 p-5 rounded-xl shadow-lg bg-gray-100 hover:shadow-inner"><?=$navItem['name']?></a>

            <?php } ?>
                
			</nav>
			<!-- end navigation -->
		</header>
        <div>
            <h1  class="rounded-b-xl mx-96 bg-gray-100 text-4xl text-center py-16 text-bold uppercase text-gray-500 shadow-lg border-t-2 borde-gray-500"><?= $title_page ?></h1>
        </div>
        
		<!-- end header -->
        <main class="px-24 py-20">

<?= $content ?>

        </main>
<footer class="bg-gray-200 p-20 text-gray-600 shadow-lg border-t-2 borde-gray-500">
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias amet vel nisi earum recusandae mollitia quo omnis dolores tenetur ut excepturi voluptas non, ipsa cumque iure quos itaque eius vitae.</p>
    <div class="pt-8 space-x-20 text-4xl text-center">
				<a href="https://www.facebook.com/" target="_blank">
					<i class="fa-brands fa-facebook px-1.5 text-red-700 hover:text-red-800 shadow-lg rounded-full"></i>
				</a>
				<a href="https://www.instagram.com/" target="_blank">
					<i class="fa-brands fa-instagram px-1.5 text-red-700 hover:text-red-800 shadow-lg rounded-full"></i>
				</a>
				<a href="https://www.youtube.com/" target="_blank">
					<i class="fa-brands fa-youtube px-1.5 text-red-700 hover:text-red-800 shadow-lg rounded-full"></i>
				</a>
			</div>
</footer>
</body>
</html>


