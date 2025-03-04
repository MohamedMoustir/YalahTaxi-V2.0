
                
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
                <!-- Routes Page -->
                <div x-show="currentPage === 'routes'">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-semibold text-gray-800">Gestion des trajets</h2>
                        <button @click="showRouteForm = true; currentStep = 1"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fas fa-plus mr-2"></i> Ajouter un trajet
                        </button>
                    </div>

                    <!-- Routes Table -->
                    <div class="bg-white rounded-lg shadow overflow-hidden mb-6 ">
                        <div class="px-6 py-4 border-b flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-800">Trajets disponibles</h3>
                            <div class="flex">
                                <div class="relative">
                                    <input type="text" placeholder="Rechercher..."
                                        class="border rounded-lg py-2 px-4 pl-10 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                                </div>
                                <select
                                    class="ml-3 border rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option>Tous les statuts</option>
                                    <option>Actif</option>
                                    <option>Inactif</option>
                                </select>
                            </div>
                        </div>
                        <div class="overflow-x-auto " style="margin-left :270px">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            ID</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Origine</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Destination</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Distance</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Durée</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Prix</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Statut</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">#1001</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Casablanca</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Rabat</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">87 km</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">1h 15min</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">150 MAD</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Actif
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <button class="text-blue-600 hover:text-blue-900 mr-3">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">#1002</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Marrakech</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Agadir</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">252 km</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">3h 30min</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">250 MAD</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Actif
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <button class="text-blue-600 hover:text-blue-900 mr-3">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">#1003</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Tanger</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Tétouan</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">60 km</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">50min</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">80 MAD</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                Inactif
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <button class="text-blue-600 hover:text-blue-900 mr-3">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
            

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