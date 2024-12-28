<header class="bg-white shadow-sm">
    <div class="flex items-center justify-between px-6 py-4">
        <h2 class="text-xl font-semibold">Dashboard Overview</h2>
        <div class="flex items-center">
            <span class="mr-4">
                <?php echo $_SESSION['admin_user']; ?>
            </span>
            <button class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-700">
                Logout
            </button>
        </div>
    </div>
</header>