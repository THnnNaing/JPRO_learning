<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Checklist</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex">
    <?php include 'sidebar.php'; ?>
    
    <div class="flex-1 p-8">
        <div class="max-w-8xl mx-auto">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Event Planning Checklist</h1>
            
            <!-- Add New Item Form -->
            <form action="" method="POST" class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <input type="text" name="task" placeholder="Add new task" required
                        class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <input type="text" name="assigned" placeholder="Assigned to" required
                        class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <input type="date" name="due_date" required
                        class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <select name="status" required
                        class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Select Status</option>
                        <option value="Pending">Pending</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Completed">Completed</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="submit" 
                        class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 transition duration-300">
                        Add Task
                    </button>
                </div>
            </form>

            <!-- Checklist Table -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-xl font-semibold mb-4">Tasks Overview</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left py-3 px-4">Task</th>
                                <th class="text-left py-3 px-4">Assigned To</th>
                                <th class="text-left py-3 px-4">Due Date</th>
                                <th class="text-left py-3 px-4">Status</th>
                                <th class="text-left py-3 px-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Sample data - replace with database data in production
                            $tasks = [
                                [
                                    'task' => 'Book Venue',
                                    'assigned' => 'John Doe',
                                    'due_date' => '2024-04-15',
                                    'status' => 'Completed'
                                ],
                                [
                                    'task' => 'Send Invitations',
                                    'assigned' => 'Jane Smith',
                                    'due_date' => '2024-04-20',
                                    'status' => 'Pending'
                                ],
                                [
                                    'task' => 'Arrange Catering',
                                    'assigned' => 'Mike Johnson',
                                    'due_date' => '2024-04-25',
                                    'status' => 'In Progress'
                                ]
                            ];

                            foreach ($tasks as $task) {
                                $statusClass = match($task['status']) {
                                    'Completed' => 'bg-green-100 text-green-800',
                                    'Pending' => 'bg-yellow-100 text-yellow-800',
                                    'In Progress' => 'bg-blue-100 text-blue-800',
                                    default => 'bg-gray-100 text-gray-800'
                                };
                                ?>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4"><?php echo htmlspecialchars($task['task']); ?></td>
                                    <td class="py-3 px-4"><?php echo htmlspecialchars($task['assigned']); ?></td>
                                    <td class="py-3 px-4"><?php echo htmlspecialchars($task['due_date']); ?></td>
                                    <td class="py-3 px-4">
                                        <span class="<?php echo $statusClass; ?> px-2 py-1 rounded-full text-sm">
                                            <?php echo htmlspecialchars($task['status']); ?>
                                        </span>
                                    </td>
                                    <td class="py-3 px-4">
                                        <button class="text-blue-500 hover:text-blue-700 mr-2">Edit</button>
                                        <button class="text-red-500 hover:text-red-700">Delete</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>