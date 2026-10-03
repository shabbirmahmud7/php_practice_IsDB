<?php 
session_start();
if($_SESSION['email']!=true){
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Google Fonts & Font Awesome Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: #f1f5f9;
            color: #1e293b;
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 260px;
            background-color: #0f172a;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 24px 16px;
            position: fixed;
            height: 100vh;
        }

        .brand {
            font-size: 20px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 12px 24px;
            border-bottom: 1px solid #1e293b;
            color: #38bdf8;
        }

        .nav-links {
            list-style: none;
            margin-top: 24px;
        }

        .nav-links li {
            margin-bottom: 8px;
        }

        .nav-links a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: #94a3b8;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .nav-links a:hover, .nav-links a.active {
            background-color: #1e293b;
            color: #ffffff;
        }

        /* Logout Button Style */
        .logout-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background-color: #ef4444;
            color: #ffffff;
            text-decoration: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            transition: background 0.2s ease;
        }

        .logout-btn:hover {
            background-color: #dc2626;
        }

        /* Main Content Styles */
        .main-content {
            margin-left: 260px;
            flex: 1;
            padding: 32px;
        }

        /* Top Bar */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #ffffff;
            padding: 16px 24px;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            margin-bottom: 32px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar {
            width: 40px;
            height: 40px;
            background-color: #e2e8f0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #475569;
            font-weight: 600;
        }

        /* Welcome Card */
        .welcome-card {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: #ffffff;
            padding: 32px;
            border-radius: 16px;
            box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.3);
            margin-bottom: 32px;
        }

        .welcome-card h1 {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 8px;
            text-transform: capitalize;
        }

        .welcome-card p {
            color: #bfdbfe;
            font-size: 14px;
        }

        /* Stats Cards Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .stat-card {
            background: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .bg-blue { background: #dbeafe; color: #2563eb; }
        .bg-green { background: #dcfce7; color: #16a34a; }
        .bg-purple { background: #f3e8ff; color: #9333ea; }

        .stat-info h3 {
            font-size: 20px;
            font-weight: 700;
            color: #0f172a;
        }

        .stat-info p {
            font-size: 13px;
            color: #64748b;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                padding: 16px 8px;
            }
            .brand span, .nav-links span, .logout-btn span {
                display: none;
            }
            .main-content {
                margin-left: 70px;
                padding: 16px;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <div>
            <div class="brand">
                <i class="fa-solid fa-cube"></i>
                <span>AdminPanel</span>
            </div>
            <ul class="nav-links">
                <li><a href="#" class="active"><i class="fa-solid fa-house"></i> <span>Dashboard</span></a></li>
                <li><a href="#"><i class="fa-solid fa-users"></i> <span>Users</span></a></li>
                <li><a href="#"><i class="fa-solid fa-chart-line"></i> <span>Analytics</span></a></li>
                <li><a href="#"><i class="fa-solid fa-gear"></i> <span>Settings</span></a></li>
            </ul>
        </div>
        
        <!-- Original Logout Link intact -->
        <a href="logout.php" class="logout-btn">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>LOGOUT</span>
        </a>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
        
        <!-- Top Bar Header -->
        <div class="top-bar">
            <h2>Dashboard</h2>
            <div class="user-profile">
                <div class="avatar">
                    <i class="fa-regular fa-user"></i>
                </div>
                <div>
                    <small style="color: #64748b; display: block;">Logged in as</small>
                    <strong style="font-size: 14px;"><?php echo $_SESSION['email']; ?></strong>
                </div>
            </div>
        </div>

        <!-- Main Banner/Welcome Banner -->
        <div class="welcome-card">
            <h1>hello welcome to dashboard</h1>
            <p>Here is what is happening with your account today.</p>
        </div>

        <!-- Sample Analytics Stats -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon bg-blue">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="stat-info">
                    <h3>Active</h3>
                    <p>Session Status</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon bg-green">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <div class="stat-info">
                    <h3>Secured</h3>
                    <p>Authentication</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon bg-purple">
                    <i class="fa-solid fa-user-check"></i>
                </div>
                <div class="stat-info">
                    <h3>Verified</h3>
                    <p>User Access</p>
                </div>
            </div>
        </div>

        <?php 
        // print_r($_SESSION);
        ?>

    </div>

</body>
</html>