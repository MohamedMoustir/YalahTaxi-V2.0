
                
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
<div class="fixed inset-y-0 left-0 z-30 w-64 bg-blue-800 text-white transform transition-transform duration-300 ease-in-out lg:translate-x-0"
            :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}">
            <div class="flex items-center justify-center h-16 border-b border-blue-700">
                <h1 class="text-xl font-bold">GrandTaxiGo Admin</h1>
            </div>
            <nav class="mt-5">
                <a @click="currentPage = 'dashboard'; sidebarOpen = false"
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

        <section class="bg-gradient-to-br ml-[400px]  from-yellow-50 to-yellow-100 font-sans" style="margin-left:260px;">
           <div class="container mx-auto px-4 py-8">
                 <header class="flex justify-between items-center mb-10">
            <div class="flex items-center">
                <div class="w-16 h-16 bg-yellow-500 rounded-full flex items-center justify-center mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-800"><span class="text-yellow-600"></span></h1>
            </div>
            <div class="flex items-center space-x-4">
                <div class="bg-white shadow-md rounded-full px-4 py-2">
                    <span class="text-gray-700 font-semibold">Administrateur</span>
                </div>
                <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 ml-[4000px]">
        <div class="bg-white shadow-lg rounded-lg p-6 border-l-4 border-yellow-500">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-700">Trajets Totaux</h2>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                    </svg>
                </div>
                <div class="text-3xl font-bold text-yellow-600">{{ $trajetsTouts }}</div>
                <div class="text-sm text-green-600 mt-2">+12% depuis le mois dernier</div>
            </div>

            <div class="bg-white shadow-lg rounded-lg p-6 border-l-4 border-green-500">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-700">Revenus</h2>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="text-3xl font-bold text-green-600">254,600 MAD</div>
                <div class="text-sm text-yellow-600 mt-2">Revenu moyen: 205 MAD/trajet</div>
            </div>

            <div class="bg-white shadow-lg rounded-lg p-6 border-l-4 border-red-500">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-700">Trajets Annulés</h2>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <div class="text-3xl font-bold text-red-600"></div>
                <div class="text-sm text-yellow-600 mt-2">Taux d'annulation: 11.5%</div>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6">
    <h2 class="text-2xl font-semibold text-gray-700 mb-6">Trajets Récents</h2>
    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200 rounded-lg">
            <thead class="bg-yellow-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">ID Trajet</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Date</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Origine</th>
                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Destination</th>
                    <th class="px-4 py-3 text-right text-xs font-medium uppercase tracking-wider">Revenu</th>
                    <th class="px-4 py-3 text-right text-xs font-medium uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @foreach ($trajets as $trajet)
                    <tr class="hover:bg-gray-50 transition duration-200">
                        <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">TR-{{ $trajet->id }}</td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">{{ $trajet->created_at->format('d/m/Y') }}</td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">{{ $trajet->nom }}</td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">{{ $trajet->details_trajet->point_de_pause ?? 'N/A' }}</td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-right text-green-600 font-semibold">{{ number_format($trajet->prix, 2) }} MAD</td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-right">
                            <a href="{{ route('admin.editetrajet', ['id' => $trajet->id]) }}" 
                               class="inline-flex items-center px-3 py-1 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600 transition">
                                <i class="fas fa-edit mr-1"></i> Modifier
                            </a>
                            <a href="{{ route('admin.deletetrajet', ['id' => $trajet->id]) }}" 
                               class="inline-flex items-center px-3 py-1 text-sm font-medium text-white bg-red-500 rounded-lg hover:bg-red-600 transition ml-2">
                                <i class="fas fa-trash mr-1"></i> Supprimer
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

    </div>
</section>









                        <section class="bg-gray-100 flex items-center justify-center min-h-screen">

                            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
                                <h2 class="text-3xl font-bold text-gray-700 mb-6 text-center">Ajouter un Détail de
                                    Trajet</h2>

                                <div class="bg-green-500 text-white p-2 mb-4 rounded text-center hidden">
                                    Succès ! Détail de trajet ajouté.
                                </div>

                                <form action="{{ route('admin.store') }}" method="POST">
                                    @csrf  
                                    <label class="block text-gray-700 font-semibold mb-2">Trajet :</label>
                                    <input type="text" name="nom"
                                        class="w-full p-3 border border-gray-300 rounded-lg mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        required>

                                    <!-- Zone dynamique pour ajouter plusieurs orders -->
                                    <div id="orders-container">
                                        <div class="order-group mb-4 flex gap-2">
                                            <input type="text" name="point_de_pause[]"
                                                class="w-full p-3 border border-gray-300 rounded-lg mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                required>
                                            <input type="number" name="order[]" placeholder="ID Order"
                                                class="w-1/2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                required>
                                                <input type="number" name="Distance[]" placeholder="Distance"
                                                class="w-1/2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                required>
                                                <input type="number" name="prix[]" placeholder="prix"
                                                class="w-1/2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                required>
                                            <button type="button"
                                                class="remove-order hidden text-red-500 text-lg font-bold px-2"
                                                onclick="removeOrder(this)">×</button>
                                        </div>
                                    </div>

                                    <!-- Bouton pour ajouter un autre Order -->
                                    <button type="button" onclick="addOrder()"
                                        class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 rounded-lg shadow-md transition duration-300 mb-4">
                                        + Ajouter un autre Order
                                    </button>

                                    <button type="submit"
                                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 rounded-lg shadow-md transition duration-300">
                                        Ajouter
                                    </button>
                                </form>
                            </div>

                            <script>
                                function addOrder() {
                                    const container = document.getElementById('orders-container');
                                    const div = document.createElement('div');
                                    div.classList.add('order-group', 'mb-4', 'flex', 'gap-2');

                                    div.innerHTML = `
                                            <input type="text" name="point_de_pause[]" class="w-full p-3 border border-gray-300 rounded-lg mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                        <input type="number" name="order[]" placeholder="ID Order" class="w-1/2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                        <input type="number" name="Distance[]" placeholder="Distance"
                                                class="w-1/2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                required>
                                                 <input type="number" name="prix[]" placeholder="prix"
                                                class="w-1/2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                required>
                                        <button type="button" class="remove-order text-red-500 text-lg font-bold px-2" onclick="removeOrder(this)">×</button>
                                    `;

                                    container.appendChild(div);
                                    updateRemoveButtons();
                                }

                                function removeOrder(button) {
                                    button.parentElement.remove();
                                    updateRemoveButtons();
                                }

                                function updateRemoveButtons() {
                                    const removeButtons = document.querySelectorAll('.remove-order');
                                    removeButtons.forEach(button => {
                                        button.classList.toggle('hidden', removeButtons.length === 1);
                                    });
                                }

                                updateRemoveButtons();
                            </script>

                        </section>

                        </html>