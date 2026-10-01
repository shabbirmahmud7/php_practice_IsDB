<?php
// প্রয়োজন অনুযায়ী সেশন বা ডাটাবেজ সংযোগ এখানে যোগ করতে পারেন
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary-color: #4f46e5;
            --primary-hover: #4338ca;
            --bg-color: #f3f4f6;
            --sidebar-bg: #1e293b;
            --card-bg: #ffffff;
            --text-color: #334155;
            --text-light: #64748b;
        }

        body {
            display: flex;
            background-color: var(--bg-color);
            min-height: 100vh;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            background-color: var(--sidebar-bg);
            color: #fff;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.3s ease;
        }

        .sidebar .brand {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #6366f1;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .sidebar ul li a {
            color: #94a3b8;
            text-decoration: none;
            padding: 12px 15px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-radius: 8px;
            font-size: 15px;
            transition: 0.3s;
        }

        .sidebar ul li a:hover,
        .sidebar ul li a.active {
            background-color: var(--primary-color);
            color: #fff;
        }

        /* Main Content Styling */
        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        /* Top Navigation Bar */
        .topbar {
            background-color: var(--card-bg);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .search-box {
            display: flex;
            align-items: center;
            background: var(--bg-color);
            padding: 8px 15px;
            border-radius: 20px;
        }

        .search-box input {
            border: none;
            background: transparent;
            outline: none;
            padding-left: 8px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        /* Dashboard Container */
        .dashboard-container {
            padding: 30px;
        }

        .welcome-text h2 {
            color: var(--text-color);
            font-size: 24px;
            margin-bottom: 5px;
        }

        .welcome-text p {
            color: var(--text-light);
            margin-bottom: 25px;
        }

        /* Cards Layout */
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background-color: var(--card-bg);
            padding: 20px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .card-info h3 {
            font-size: 24px;
            color: var(--text-color);
        }

        .card-info p {
            color: var(--text-light);
            font-size: 14px;
        }

        .card-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            background-color: #e0e7ff;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        /* Recent Activity / Table Section */
        .recent-section {
            background-color: var(--card-bg);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .recent-section h3 {
            color: var(--text-color);
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 14px;
        }

        th {
            background-color: #f8fafc;
            color: var(--text-light);
        }

        .status {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
        }

        .status.active {
            background-color: #d1fae5;
            color: #065f46;
        }

        .status.pending {
            background-color: #fef3c7;
            color: #92400e;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <div class="brand">
                <i class="fa-solid fa-cube"></i> AdminPanel
            </div>
            <ul>
                <li><a href="#" class="active"><i class="fa-solid fa-house"></i> Dashboard</a></li>
                <li><a href="#"><i class="fa-solid fa-users"></i> Users</a></li>
                <li><a href="#"><i class="fa-solid fa-chart-line"></i> Analytics</a></li>
                <li><a href="#"><i class="fa-solid fa-gear"></i> Settings</a></li>
            </ul>
        </div>
        <div>




            <ul>
                <li><a href="index.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
            </ul>
        </div>






        
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
        
        <!-- Top Navigation -->
        <div class="topbar">
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass" style="color: #94a3b8;"></i>
                <input type="text" placeholder="Search here...">
            </div>
            <div class="user-info">
                <i class="fa-regular fa-bell" style="font-size: 18px; cursor: pointer; color: #64748b;"></i>
                <img src="https://via.placeholder.com/40" alt="User Avatar">
                <span style="font-weight: 600; color: #334155;">Admin</span>
            </div>
        </div>

        <!-- Dashboard Body -->
        <div class="dashboard-container">
            <div class="welcome-text">
                <h2>Welcome Back, User!</h2>
                <p>Here is what's happening with your project today.</p>
            </div>

            <!-- Stat Cards -->
            <div class="cards">
                <div class="card">
                    <div class="card-info">
                        <h3>1,250</h3>
                        <p>Total Users</p>
                    </div>
                    <div class="card-icon">
                        <i class="fa-solid fa-users"></i>
                    </div>
                </div>

                <div class="card">
                    <div class="card-info">
                        <h3>$12,450</h3>
                        <p>Total Revenue</p>
                    </div>
                    <div class="card-icon" style="background-color: #d1fae5; color: #059669;">
                        <i class="fa-solid fa-dollar-sign"></i>
                    </div>
                </div>

                <div class="card">
                    <div class="card-info">
                        <h3>342</h3>
                        <p>New Orders</p>
                    </div>
                    <div class="card-icon" style="background-color: #fef3c7; color: #d97706;">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                </div>

                <div class="card">
                    <div class="card-info">
                        <h3>98.5%</h3>
                        <p>Satisfaction Rate</p>
                    </div>
                    <div class="card-icon" style="background-color: #e0f2fe; color: #0284c7;">
                        <i class="fa-solid fa-thumbs-up"></i>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Table -->
            <div class="recent-section">
                <h3>Recent Users</h3>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#001</td>
                            <td>John Doe</td>
                            <td>john@example.com</td>
                            <td>Admin</td>
                            <td><span class="status active">Active</span></td>
                        </tr>
                        <tr>
                            <td>#002</td>
                            <td>Jane Smith</td>
                            <td>jane@example.com</td>
                            <td>Editor</td>
                            <td><span class="status active">Active</span></td>
                        </tr>
                        <tr>
                            <td>#003</td>
                            <td>Alex Johnson</td>
                            <td>alex@example.com</td>
                            <td>User</td>
                            <td><span class="status pending">Pending</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </div>

</body>
</html>