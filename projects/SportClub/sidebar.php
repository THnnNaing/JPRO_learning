<?php
?>
<div class="bg-gray-800 text-white w-64 py-4 flex flex-col">
<div class="px-4 py-4">
    <h1 class="text-2xl font-bold">Admin Panel</h1>
</div>
<nav class="mt-4">
    <a href="admindashboard.php" class="block px-4 py-2 hover:bg-gray-700 active:bg-gray-600">
        <i class="fas fa-home mr-2"></i>Dashboard
    </a>
    <div class="relative">
        <a href="#" class="block px-4 py-2 hover:bg-gray-700" onclick="toggleClubMenu(event)">
            <i class="fas fa-users mr-2"></i>Announcements
            <i class="fas fa-chevron-down ml-2 text-sm"></i>
        </a>
        <div id="clubSubmenu" class="pl-4 hidden">
            <a href="checkAnnouncement.php" class="block px-4 py-2 hover:bg-gray-700 text-gray-300">
                <i class="fas fa-plus mr-2"></i>Check Announcements
            </a>
            <a href="manageAnnouncement.php" class="block px-4 py-2 hover:bg-gray-700 text-gray-300">
                <i class="fas fa-cog mr-2"></i>Manage Announcements
            </a>
        </div>
    </div>
    <div class="relative">
        <a href="#" class="block px-4 py-2 hover:bg-gray-700" onclick="toggleEventMenu(event)">
            <i class="fas fa-users mr-2"></i>Events
            <i class="fas fa-chevron-down ml-2 text-sm"></i>
        </a>
        <div id="eventSubmenu" class="pl-4 hidden">
            <a href="checkEvent.php" class="block px-4 py-2 hover:bg-gray-700 text-gray-300">
                <i class="fas fa-plus mr-2"></i>Check Events
            </a>
            <a href="manageEvent.php" class="block px-4 py-2 hover:bg-gray-700 text-gray-300">
                <i class="fas fa-cog mr-2"></i>Manage Events
            </a>
        </div>
    </div>
    <a href="checkRegistrations.php" class="block px-4 py-2 hover:bg-gray-700" onclick="toggleChecklistMenu(event)">
            <i class="fas fa-users mr-2"></i>Check Registrations
            <i class="fas fa-chevron-down ml-2 text-sm"></i>
        </a>
        <a href="checkMembers.php" class="block px-4 py-2 hover:bg-gray-700">
            <i class="fas fa-users mr-2"></i>Check Members
            <i class="fas fa-chevron-down ml-2 text-sm"></i>
        </a>
    <a href="#" class="block px-4 py-2 hover:bg-gray-700">
        <i class="fas fa-cog mr-2"></i>Analytics
    </a>
</nav>
</div>

<script src="https://kit.fontawesome.com/your-code-here.js" crossorigin="anonymous"></script>
    <script>
        function toggleClubMenu(event) {
            event.preventDefault();
            const submenu = document.getElementById('clubSubmenu');
            submenu.classList.toggle('hidden');
        }
        
        function toggleEventMenu(event) {
            event.preventDefault();
            const submenu = document.getElementById('eventSubmenu');
            submenu.classList.toggle('hidden');
        }
        // function toggleChecklistMenu(event) {
        //     event.preventDefault();
        //     const submenu = document.getElementById('checklistSubmenu');
        //     submenu.classList.toggle('hidden');
        // }
    </script>

