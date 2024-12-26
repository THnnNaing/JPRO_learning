<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</head>

<body class="bg-gray-100 p-4">

<?php include 'Unavbar.php'; ?>

<?php include 'Ubody.php'; ?>

<div class="bg-slate-100 border rounded-lg m-4 p-6 shadow-md hover:shadow-xl transition-all duration-500 hover:bg-white hover:border-red-500 hover:scale-[1.02] ease-in-out">
    <h1 class="text-3xl font-bold text-red-500 mb-3">Announcements</h1>
    <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p><br>
    <hr class="border-slate-400">  <br>
    <?php include 'Uannounement.php'; ?> <br>
</div>
<br>
<div class="bg-slate-100 border rounded-lg m-4 p-6 shadow-md hover:shadow-xl transition-all duration-500 hover:bg-white hover:border-red-500 hover:scale-[1.02] ease-in-out">
    <h1 class="text-3xl font-bold text-red-500 mb-3">Events</h1>
    <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p> <br> 
    <hr class="border-slate-400">  <br>
    <?php include 'Uevent.php'; ?> <br>
</div>
<br>
<div class="bg-slate-100 border rounded-lg m-4 p-6 shadow-md hover:shadow-xl transition-all duration-500 hover:bg-white hover:border-red-500 hover:scale-[1.02] ease-in-out">
    <h1 class="text-3xl font-bold text-red-500 mb-3">Announcements</h1>
    <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.</p> <br>
    <hr class="border-slate-400">  <br>
    <?php include 'Umember.php'; ?> <br> <br>
    <a href="memberregister.php" class="text-blue-500 hover:underline hover:text-blue-900 hover:font-bold transform hover:scale-105 hover:translate-x-2 transition-all duration-500 ease-in-out inline-block">Do you want to register? <span class="font-bold">Register Here!</span></a>
</div>



<?php include 'Ufooter.php'; ?>
</body>

</html>