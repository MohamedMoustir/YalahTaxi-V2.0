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
<div class="fixed inset-y-0 left-0 z-30 w-64 bg-blue-800 text-white transform transition-transform duration-300 ease-in-out lg:translate-x-0"
            :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}">
            <div class="flex items-center justify-center h-16 border-b border-blue-700">
                <h1 class="text-xl font-bold">GrandTaxiGo Admin</h1>
            </div>
            <nav class="mt-5">
                <a href="{{ route('admin') }}"
                    class="flex items-center px-6 py-3 text-white hover:bg-blue-700 cursor-pointer"
                    :class="{'bg-blue-700': currentPage === 'dashboard'}">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Tableau de bord
                </a>
                <a href="{{ route('ditlestrajets') }}"
                    class="flex items-center px-6 py-3 text-white hover:bg-blue-700 cursor-pointer"
                   >
                    <i class="fas fa-route mr-3"></i>
                    Gestion des trajets
                </a>
                <a @click="currentPage = 'drivers'; sidebarOpen = false"
                    class="flex items-center px-6 py-3 text-white hover:bg-blue-700 cursor-pointer"
                    :class="{'bg-blue-700': currentPage === 'drivers'}">
                    <i class="fas fa-users mr-3"></i>
                    Chauffeurs
                </a>
                <a @click="currentPage = 'passengers'; sidebarOpen = false"
                    class="flex items-center px-6 py-3 text-white hover:bg-blue-700 cursor-pointer"
                    :class="{'bg-blue-700': currentPage === 'passengers'}">
                    <i class="fas fa-user-friends mr-3"></i>
                    Passagers
                </a>
                <a @click="currentPage = 'reservations'; sidebarOpen = false"
                    class="flex items-center px-6 py-3 text-white hover:bg-blue-700 cursor-pointer"
                    :class="{'bg-blue-700': currentPage === 'reservations'}">
                    <i class="fas fa-calendar-check mr-3"></i>
                    Réservations
                </a>
                <a @click="currentPage = 'settings'; sidebarOpen = false"
                    class="flex items-center px-6 py-3 text-white hover:bg-blue-700 cursor-pointer"
                    :class="{'bg-blue-700': currentPage === 'settings'}">
                    <i class="fas fa-cog mr-3"></i>
                    Paramètres
                </a>
            </nav>
        </div>

<section class="bg-gray-100 p-6 ml-92">
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Liste des Utilisateurs</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="py-2 px-4 border">Photo</th>
                        <th class="py-2 px-4 border">Nom</th>
                        <th class="py-2 px-4 border">Email</th>
                        <th class="py-2 px-4 border">Téléphone</th>
                        <th class="py-2 px-4 border">Rôle</th>
                        <th class="py-2 px-4 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
     
                        <tr class="border text-gray-700">
                            <td class="py-2 px-4 border">
                                <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile"
                                    class="w-10 h-10 rounded-full mx-auto">
                            </td>
                            <td class="py-2 px-4 border">{{ $user->name }}</td>
                            <td class="py-2 px-4 border">{{ $user->email }}</td>
                            <td class="py-2 px-4 border">{{ $user->phone }}</td>
                            <td class="py-2 px-4 border">{{ $user->role }}</td>
                            <td class="py-2 px-4 border text-center">
                            @if($user->toggle_suspend == true)
                            <a href="{{ route('admin.toggleSuspend', ['id' => $user->id]) }}" 
                                class="text-yellow-600 hover:text-yellow-800 px-2">
                                 <i class="fas fa-lock-open text-red-500"></i> 
                            </a>
                            @else
                            <a href="{{ route('admin.toggleSuspend', ['id' => $user->id]) }}" 
                                class="text-yellow-600 hover:text-yellow-800 px-2">
                                <i class="fas fa-lock text-green-500"></i> 
                            </a>
                            @endif   
                                <a href="{{ route('admin.delete', ['id'=>$user->id]) }}"
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 ml-2">Supprimer</a>
                            </td>
                         
    
   
        

</td>

                        </tr>
                    @endforeach

                    <!-- Ajoute d'autres lignes dynamiquement ici -->
                </tbody>
            </table>
        </div>
    </div>
</section>

</html>