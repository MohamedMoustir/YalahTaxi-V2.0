<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GrandTaxiGo - Admin Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.12.0/cdn.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-50">
    <div x-data="{ sidebarOpen: false, currentPage: 'dashboard' }">
        <!-- Sidebar -->
        <div class="fixed inset-y-0 left-0 z-30 w-64 bg-indigo-700 text-white transform transition-transform duration-300 ease-in-out lg:translate-x-0"
            :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}">
            <div class="flex items-center justify-center h-16 border-b border-indigo-600">
                <h1 class="text-xl font-bold">GrandTaxiGo Admin</h1>
            </div>
            <nav class="mt-5">
                <a @click="currentPage = 'dashboard'; sidebarOpen = false"
                    class="flex items-center px-6 py-3 text-white hover:bg-indigo-600 cursor-pointer transition-colors duration-200"
                    :class="{'bg-indigo-800': currentPage === 'dashboard'}">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Tableau de bord
                </a>
                <a href="{{ route('ditlestrajets') }}"
                    class="flex items-center px-6 py-3 text-white hover:bg-indigo-600 cursor-pointer transition-colors duration-200">
                    <i class="fas fa-route mr-3"></i>
                    Gestion des trajets
                </a>
                <a @click="currentPage = 'drivers'; sidebarOpen = false"
                    class="flex items-center px-6 py-3 text-white hover:bg-indigo-600 cursor-pointer transition-colors duration-200"
                    :class="{'bg-indigo-800': currentPage === 'drivers'}">
                    <i class="fas fa-users mr-3"></i>
                    Chauffeurs
                </a>
                <a href="{{ route('admin.users') }}"
                    class="flex items-center px-6 py-3 text-white hover:bg-indigo-600 cursor-pointer transition-colors duration-200">
                    <i class="fas fa-user-friends mr-3"></i>
                    Users
                </a>
                <a @click="currentPage = 'reservations'; sidebarOpen = false"
                    class="flex items-center px-6 py-3 text-white hover:bg-indigo-600 cursor-pointer transition-colors duration-200"
                    :class="{'bg-indigo-800': currentPage === 'reservations'}">
                    <i class="fas fa-calendar-check mr-3"></i>
                    Réservations
                </a>
                <a @click="currentPage = 'settings'; sidebarOpen = false"
                    class="flex items-center px-6 py-3 text-white hover:bg-indigo-600 cursor-pointer transition-colors duration-200"
                    :class="{'bg-indigo-800': currentPage === 'settings'}">
                    <i class="fas fa-cog mr-3"></i>
                    Paramètres
                </a>
            </nav>
        </div>

        <!-- Content -->
        <div class="lg:ml-64 transition-all duration-300 ease-in-out"
            :class="{'ml-0': !sidebarOpen, 'ml-64': sidebarOpen}">
            <!-- Top bar -->
            <div class="bg-white h-16 flex items-center justify-between shadow-sm px-6">
                <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden text-gray-700">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <div class="flex-1 px-4 lg:px-0"></div>
                <div class="flex items-center">
                    <div class="relative" x-data="{ notificationsOpen: false }">
                        <button @click="notificationsOpen = !notificationsOpen"
                            class="p-2 rounded-full text-gray-600 hover:bg-gray-100 focus:outline-none transition-colors duration-200">
                            <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-red-500"></span>
                            <i class="fas fa-bell"></i>
                        </button>
                        <div x-show="notificationsOpen" @click.away="notificationsOpen = false"
                            class="absolute right-0 mt-2 w-80 bg-white rounded-md shadow-lg overflow-hidden z-20"
                            style="display: none;">
                            <div class="p-3 border-b">
                                <h3 class="text-sm font-medium text-gray-700">Notifications</h3>
                            </div>
                            <div class="divide-y divide-gray-100 max-h-64 overflow-y-auto">
                                <a href="#" class="block p-4 hover:bg-gray-50 transition-colors duration-200">
                                    <div class="flex">
                                        <div class="ml-3 w-full">
                                            <p class="text-sm text-gray-700">Nouvelle réservation de Mohamed pour
                                                Casablanca → Rabat</p>
                                            <p class="text-xs text-gray-500 mt-1">Il y a 10 minutes</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="block p-4 hover:bg-gray-50 transition-colors duration-200">
                                    <div class="flex">
                                        <div class="ml-3 w-full">
                                            <p class="text-sm text-gray-700">Annulation de réservation par Fatima</p>
                                            <p class="text-xs text-gray-500 mt-1">Il y a 30 minutes</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="relative ml-4" x-data="{ profileOpen: false }">
                        <div>
                            <button @click="profileOpen = !profileOpen"
                                class="flex text-sm rounded-full focus:outline-none" id="user-menu"
                                aria-expanded="false">
                                <img class="h-8 w-8 rounded-full object-cover" src="/api/placeholder/40/40"
                                    alt="Admin profile">
                            </button>
                        </div>
                        <div x-show="profileOpen" @click.away="profileOpen = false"
                            class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 z-20"
                            style="display: none;">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors duration-200">Votre profil</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors duration-200">Paramètres</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors duration-200">Se
                                déconnecter</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <div class="p-6">
                <!-- Dashboard -->
                <div x-show="currentPage === 'dashboard'">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Tableau de bord</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">
                                    <i class="fas fa-route text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm text-gray-500 font-medium">Trajets actifs</p>
                                    <p class="text-lg font-semibold text-gray-800">{{ $trajets }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-green-100 text-green-600">
                                    <i class="fas fa-users text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm text-gray-500 font-medium">Chauffeurs</p>
                                    <p class="text-lg font-semibold text-gray-800">{{ $driver }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                                    <i class="fas fa-user-friends text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm text-gray-500 font-medium">Passagers</p>
                                    <p class="text-lg font-semibold text-gray-800">{{ $users }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-red-100 text-red-600">
                                    <i class="fas fa-calendar-check text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm text-gray-500 font-medium">Réservations aujourd'hui</p>
                                    <p class="text-lg font-semibold text-gray-800">42</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Réservations cette semaine</h3>
                            <canvas id="reservationsChart" class="w-full h-64"></canvas>
                        </div>
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Trajets les plus populaires</h3>
                            <canvas id="popularRoutesChart" class="w-full h-64"></canvas>
                        </div>
                    </div>

                    <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200 mb-8">
                        <div class="bg-indigo-600 px-6 py-4">
                            <h3 class="text-white font-bold text-lg">Réservations</h3>
                        </div>
                        
                        <div class="overflow-x-auto">
                            <table class="w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Départ</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Arrivée</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Créé le</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($payments as $reservation)
                                    <tr class="hover:bg-indigo-50 transition-colors duration-200">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $reservation->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $reservation->course_passenger->depart ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $reservation->course_passenger->arriver ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $reservation->created_at->format('d/m/Y H:i') ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-indigo-700">
                                            {{ $reservation->course_passenger->price ?? 'Non défini' }} €
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Confirmé
                                            </span>

                                        
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="bg-gray-50 px-6 py-3 border-t border-gray-200">
                            <div class="flex justify-between items-center">
                                <div class="text-sm text-gray-500">Affichage des réservations</div>
                                <div>
                                    <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-md transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                        Exporter
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Réservations Chart
            const reservationsCtx = document.getElementById('reservationsChart').getContext('2d');
            new Chart(reservationsCtx, {
                type: 'line',
                data: {
                    labels: ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'],
                    datasets: [{
                        label: 'Réservations',
                        data: [12, 19, 15, 17, 22, 30, 25],
                        backgroundColor: 'rgba(99, 102, 241, 0.2)',
                        borderColor: 'rgba(99, 102, 241, 1)',
                        borderWidth: 2,
                        tension: 0.3,
                        pointBackgroundColor: '#ffffff',
                        pointBorderColor: 'rgba(99, 102, 241, 1)',
                        pointBorderWidth: 2
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            // Popular Routes Chart
            const routesCtx = document.getElementById('popularRoutesChart').getContext('2d');
            new Chart(routesCtx, {
                type: 'bar',
                data: {
                    labels: ['Casa-Rabat', 'Casa-Marrakech', 'Rabat-Tanger', 'Marrakech-Agadir', 'Fès-Meknès'],
                    datasets: [{
                        label: 'Nombre de réservations',
                        data: [65, 59, 40, 35, 28],
                        backgroundColor: [
                            'rgba(99, 102, 241, 0.7)',
                            'rgba(79, 70, 229, 0.7)',
                            'rgba(67, 56, 202, 0.7)',
                            'rgba(55, 48, 163, 0.7)',
                            'rgba(49, 46, 129, 0.7)'
                        ],
                        borderWidth: 0,
                        borderRadius: 4
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>