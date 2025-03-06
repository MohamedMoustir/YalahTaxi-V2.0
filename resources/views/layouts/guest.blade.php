<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>

    <title>GrandTaxiGo - Espace Chauffeur</title>
    <style>
        /* Updated Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }
    
        :root {
            --primary: #FFB300; /* Warmer gold */
            --secondary: #2A2D34; /* Dark blue-gray */
            --dark: #212121;
            --light: #F9F9F9;
            --success: #00C853;
            --danger: #D50000;
            --warning: #FFAB00;
            --info: #2962FF;
        }
    
        body {
            background: var(--light);
            color: var(--dark);
        }
    
        .dashboard {
            display: grid;
            grid-template-columns: 280px 1fr;
            min-height: 100vh;
        }
    
        .sidebar {
            background: linear-gradient(195deg, var(--secondary), var(--dark));
            color: white;
            padding: 2rem 1.5rem;
            box-shadow: 4px 0 15px rgba(0,0,0,0.1);
        }
    
        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 3rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }
    
        .logo::before {
            content: "🚖";
            font-size: 2rem;
        }
    
        .nav-menu {
            list-style: none;
        }
    
        .nav-menu li {
            margin-bottom: 0.8rem;
        }
    
        .nav-menu a {
            color: rgba(255,255,255,0.9);
            text-decoration: none;
            padding: 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 1rem;
            font-weight: 500;
        }
    
        .nav-menu a:hover {
            background: rgba(255,255,255,0.1);
            transform: translateX(5px);
        }
    
        .nav-menu a::before {
            content: "•";
            color: var(--primary);
            font-weight: bold;
            font-size: 1.4rem;
            line-height: 1;
        }
    
        .main-content {
            padding: 2.5rem;
            background: var(--light);
        }
    
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3rem;
            padding-bottom: 2rem;
            border-bottom: 2px solid rgba(0,0,0,0.05);
        }
    
        .profile {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
    
        .profile-img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: #ddd;
            border: 2px solid var(--primary);
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
    
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }
    
        .stat-card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
            position: relative;
            overflow: hidden;
        }
    
        .stat-card:hover {
            transform: translateY(-5px);
        }
    
        .stat-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--primary);
        }
    
        .stat-card h3 {
            color: var(--secondary);
            margin-bottom: 1rem;
            font-size: 1.1rem;
            opacity: 0.9;
        }
    
        .stat-value {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }
    
        .stat-value::before {
            content: "";
            width: 40px;
            height: 40px;
            background: var(--primary);
            mask: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.31-8.86c-1.77-.45-2.34-.94-2.34-1.67 0-.77.79-1.3 2.04-1.3 1.43 0 1.91.66 1.95 1.59h1.7c-.05-1.64-.87-2.97-2.48-3.27V5h-1.64v1.68c-1.75.29-2.95 1.35-2.95 2.84 0 1.76 1.39 2.66 3.55 3.19 2.17.53 2.24 1.46 2.24 1.97 0 .55-.45 1.11-1.84 1.11-1.51 0-2.19-.65-2.32-1.61h-1.76c.12 1.93 1.53 2.84 3.89 3.04V19h1.64v-1.67c1.8-.29 3.07-1.45 3.07-3.03 0-2.02-1.66-2.91-3.62-3.44z"/></svg>');
            opacity: 0.2;
        }
    
        .reservations {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
    
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1.5rem;
        }
    
        .table th,
        .table td {
            padding: 1.2rem;
            text-align: left;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }
    
        .table th {
            background: var(--light);
            font-weight: 600;
            color: var(--secondary);
        }
    
        .table tr:hover td {
            background: rgba(255,179,0,0.03);
        }
    
        .status {
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
            display: inline-block;
        }
    
        .status-pending {
            background: rgba(255,171,0,0.15);
            color: var(--warning);
        }
    
        .status-confirmed {
            background: rgba(0,200,83,0.15);
            color: var(--success);
        }
    
        .status-cancelled {
            background: rgba(213,0,0,0.15);
            color: var(--danger);
        }
    
        .action-btn {
            padding: 0.6rem 1.2rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
    
        .btn-accept {
            background: var(--success);
            color: white;
        }
    
        .btn-accept:hover {
            background: #009245;
            transform: translateY(-1px);
        }
    
        .btn-reject {
            background: var(--danger);
            color: white;
        }
    
        .btn-reject:hover {
            background: #B20000;
            transform: translateY(-1px);
        }
    
        .availability-toggle {
            position: relative;
            background: var(--success);
            color: white;
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }
    
        .availability-toggle::after {
            content: "";
            width: 12px;
            height: 12px;
            background: white;
            border-radius: 50%;
            transition: all 0.3s ease;
        }
    
        .availability-toggle.offline {
            background: var(--danger);
            padding-left: 1.2rem;
        }
    
        @media (max-width: 768px) {
            .dashboard {
                grid-template-columns: 1fr;
            }
    
            .main-content {
                padding: 1.5rem;
            }
    
            .stats-grid {
                grid-template-columns: 1fr;
            }
    
            .table {
                display: block;
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <aside class="sidebar">
            <div class="logo">GrandTaxiGo</div>
            <ul class="nav-menu">
                <li><a href="#tableau-bord">Tableau de bord</a></li>
                <li><a href="#reservations">Réservations</a></li>
                <li><a href="{{ route('disponibilites') }}">Disponibilités</a></li>
                <li><a href="#historique">Historique</a></li>
                <li><a href="{{route('user.chats',21)}}">Mon profil</a></li>
                <li><a href="#parametres">Paramètres</a></li>
            </ul>
        </aside>

        <main class="main-content">
            <header class="header">
                <h1>Tableau de bord</h1>
                <div class="profile">
                    <form action="{{ Route('disponible') }}" method="post">
                        @csrf
                      
                    

                    </form>
                   
                    <div class="profile-img"></div>
                    <span>Mohammed Alami</span>
                </div>
            </header>

            <section class="stats-grid">
                <div class="stat-card">
                    <h3>Courses aujourd'hui</h3>
                    <div class="stat-value">8</div>
                </div>
                <div class="stat-card">
                    <h3>Revenus du jour</h3>
                    <div class="stat-value">1250 DH</div>
                </div>
                <div class="stat-card">
                    <h3>Note moyenne</h3>
                    <div class="stat-value">4.8 ⭐</div>
                </div>
                <div class="stat-card">
                    <h3>Réservations en attente</h3>
                    <div class="stat-value">3</div>
                </div>
            </section>


@yield('content')
