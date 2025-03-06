<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }

        .sidebar.open {
            transform: translateX(0);
        }

        .overlay {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .menu-item {
            transform: translateX(-20px);
            opacity: 0;
            transition: transform 0.4s ease, opacity 0.4s ease;
        }

        .sidebar.open .menu-item {
            transform: translateX(0);
            opacity: 1;
        }

        .sidebar.open .menu-item:nth-child(1) {
            transition-delay: 0.1s;
        }

        .sidebar.open .menu-item:nth-child(2) {
            transition-delay: 0.2s;
        }

        .sidebar.open .menu-item:nth-child(3) {
            transition-delay: 0.3s;
        }

        .sidebar.open .menu-item:nth-child(4) {
            transition-delay: 0.4s;
        }

        .sidebar.open .menu-item:nth-child(5) {
            transition-delay: 0.5s;
        }

        .profile-pic-container {
            transition: transform 0.3s ease;
        }

        .profile-pic-container:hover {
            transform: scale(1.05);
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.7);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(59, 130, 246, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0);
            }
        }
    </style>
    <style>
        .notification-popup {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            width: 320px;
            margin-top: 0.5rem;
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            z-index: 50;
        }

        .notification-popup.show {
            display: block;
        }
    </style>
</head>
<section class="bg-gray-100 ">
    <!-- Overlay pour fermer le sidebar quand on clique ailleurs -->
    <div class="overlay fixed inset-0 bg-black bg-opacity-50 z-20" id="overlay"></div>

    <!-- Sidebar -->
    <div class="sidebar fixed left-0 top-0 h-full w-64 bg-white shadow-lg z-30 overflow-y-auto">
        <!-- En-tête du profil -->
        <div class="p-4 bg-gradient-to-r from-blue-500 to-indigo-600 text-white">
            <div class="flex justify-end mb-4">
                <button id="close-sidebar" class="text-white hover:text-gray-200">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="flex flex-col items-center">
                <div class="profile-pic-container mb-3 border-4 border-white rounded-full p-1">
                    <img src="{{ asset('storage/' . $users->profile_photo) }}" alt="Photo de profil"
                        class="h-24 w-24 rounded-full">
                </div>
                <h3 class="text-xl font-bold">{{ $users->name}}</h3>
                <p class="text-sm text-blue-100">{{ $users->email }}</p>
                <div class="mt-3 flex justify-center space-x-2">
                    <button onclick="openEditPopup()"
                        class="mt-3 px-4 py-1 bg-white text-blue-600 rounded-full text-sm font-medium hover:bg-blue-50">
                        <i class="fas fa-edit mr-1"></i> Modifier </button>

                </div>
            </div>
        </div>

        <!-- Détails utilisateur -->
        <div class="py-4">
            <div class="px-4 py-2 menu-item">
                <div class="flex items-center">
                    <i class="fas fa-user text-gray-500 w-8"></i>
                    <div>
                        <p class="text-xs text-gray-500">Nom complet</p>
                        <p class="text-sm font-medium">{{ $users->name }}</p>
                    </div>
                </div>
            </div>

            <div class="px-4 py-2 menu-item">
                <div class="flex items-center">
                    <i class="fas fa-envelope text-gray-500 w-8"></i>
                    <div>
                        <p class="text-xs text-gray-500">Email</p>
                        <p class="text-sm font-medium">{{ $users->email}}</p>
                    </div>
                </div>
            </div>

            <div class="px-4 py-2 menu-item">
                <div class="flex items-center">
                    <i class="fas fa-phone text-gray-500 w-8"></i>
                    <div>
                        <p class="text-xs text-gray-500">Téléphone</p>
                        <p class="text-sm font-medium">{{ $users->phone }}</p>
                    </div>
                </div>
            </div>


            <div class="px-4 py-2 menu-item">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-gray-500 w-8"></i>
                    <div>
                        @if ($users->email_verified_at)
                            <p class="text-xs text-gray-500">Statut Vérification</p>
                            <p class="text-sm font-medium bg-green-600 text-white px-2 rounded">Vérifié</p>
                        @else
                            <p class="text-xs text-gray-500">Statut Vérification</p>
                            <p class="text-sm font-medium bg-red-600 text-white px-2 rounded">No Vérifié</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation menu -->
        <div class="border-t border-gray-200 py-4">
            <div class="px-4 py-3 menu-item hover:bg-gray-100 cursor-pointer">
                <div class="flex items-center">
                    <i class="fas fa-tachometer-alt text-blue-500 w-8"></i>
                    <span class="text-gray-700"> <a href="{{ route('historique', ['id' => Auth::id()])}}">historique</a>
                    </span>
                </div>
            </div>

            <div class="px-4 py-3 menu-item hover:bg-gray-100 cursor-pointer">
                <div class="flex items-center">
                    <i class="fas fa-cog text-blue-500 w-8"></i>
                    <span class="text-gray-700">Paramètres</span>
                </div>
            </div>

            <div class="px-4 py-3 menu-item hover:bg-gray-100 cursor-pointer">
                <div class="flex items-center">
                    <i class="fas fa-bell text-blue-500 w-8"></i>
                    <span class="text-gray-700">Notifications</span>
                    <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full">5</span>
                </div>
            </div>
            <div class="px-4 py-3 menu-item hover:bg-gray-100 cursor-pointer">
                <div class="flex items-center">
                    <i class="fas fa-sign-out-alt text-blue-500 w-8"></i>
                </div>
            </div>

            <div class="px-4 py-3 menu-item hover:bg-gray-100 cursor-pointer">
                <div class="flex items-center">
                    <i class="fas fa-sign-out-alt text-blue-500 w-8"></i>
                    <span class="text-gray-700"> <a href="{{route('logout')  }}">Déconnexion</a> </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Contenu principal -->
    <div class=" flex flex-col">
        <!-- Navigation -->
        <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <button id="open-sidebar"
                            class="p-2 rounded-md text-gray-700 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-900 pulse">
                            <i class="fas fa-bars"></i>
                        </button>
                        <span class="ml-4 text-xl font-bold text-blue-600">YalahTaxi</span>
                    </div>
                    <div class="flex items-center">
                        <div class="relative">
                            <input type="text" placeholder="Rechercher..."
                                class="border border-gray-300 rounded-full px-4 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <i class="fas fa-search absolute right-3 top-2 text-gray-400"></i>
                        </div>


                        <div class=" p-8 flex justify-center">
                            <div class="max-w-4xl w-full p-4 rounded-lg shadow">
                                <div class="flex justify-end">
                                    <!-- Notification Bell -->
                                    <div class="relative">
                                        <button id="notification-button"
                                            class="p-2 text-gray-700 hover:text-gray-900 hover:bg-gray-100 rounded-full">
                                            <i class="fas fa-bell"></i>
                                            <span id="notification-indicator"
                                                class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500"></span>
                                        </button>

                                        <!-- Notification Popup -->
                                        <div id="notification-popup" class="notification-popup">
                                            <div class="border border-gray-200 rounded-lg overflow-hidden">
                                                <div class="flex items-center justify-between p-4 border-b">
                                                    <h3 class="text-base font-medium">Notifications</h3>
                                                    <button id="mark-all-read"
                                                        class="text-xs text-blue-600 hover:text-blue-800">Mark all as
                                                        read</button>
                                                </div>

                                                <div class="max-h-80 overflow-y-auto" id="notification-list">
                                                    <!-- Notifications will be inserted here -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>


                        <section
                            class="container mx-auto flex items-center space-x-4 p-5 bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 border border-gray-200 w-full max-w-6xl">

                            <div
                                class="flex items-center justify-center bg-blue-600 text-white rounded-xl w-16 h-16 shadow-md transition-all duration-300 hover:bg-blue-700 text-lg font-bold">
                                ⭐
                            </div>

                            <div class="flex flex-col">
                                <div class="text-2xl">
                                    <span id="points-display" class="text-blue-600 font-extrabold">100</span>
                                    <span class="text-gray-700"><span class="font-bold">p</span>oints</span>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</section>
@yield('content')











<!-- Footer -->
<footer class="bg-gray-900 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-4 gap-8">
            <div>
                <h4 class="text-amber-400 font-bold text-xl mb-4">YalahTaxi</h4>
                <p class="text-gray-400">Votre solution de transport interurbain au Maroc</p>
                <div class="flex space-x-4 mt-4">
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div>
                <h5 class="font-bold mb-4">Entreprise</h5>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="#" class="hover:text-amber-400 transition">À propos</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition">Carrières</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition">Presse</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition">Blog</a></li>
                </ul>
            </div>
            <div>
                <h5 class="font-bold mb-4">Légal</h5>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="#" class="hover:text-amber-400 transition">Conditions d'utilisation</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition">Politique de confidentialité</a></li>
                    <li><a href="#" class="hover:text-amber-400 transition">Cookies</a></li>
                </ul>
            </div>
            <div>
                <h5 class="font-bold mb-4">Contact</h5>
                <p class="text-gray-400 mb-2"><i class="fas fa-envelope mr-2"></i> contact@YalahTaxi.ma</p>
                <p class="text-gray-400 mb-2"><i class="fas fa-phone mr-2"></i> +212 600 000 000</p>
                <p class="text-gray-400"><i class="fas fa-map-marker-alt mr-2"></i> 123 Avenue Hassan II, Casablanca</p>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-500">
            <p>© 2025 YalahTaxi. Tous droits réservés.</p>
        </div>
    </div>
</footer>





<!-- Popup d'édition de profil -->
<div id="edit-popup" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4 overflow-hidden transform transition-all">
        <!-- Entête du popup -->
        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 px-6 py-4 text-white">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-medium">Modifier votre profil</h3>
                <button id="close-popup" class="text-white hover:text-gray-200">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <!-- Formulaire -->
        <form action="{{ route('profile.update') }}" class="p-6" method="post" enctype="multipart/form-data">
            @csrf
            <div class="space-y-4">
                <!-- Photo de profil -->
                <div class="flex flex-col items-center mb-6">
                    <div class="relative w-24 h-24">
                        <img src="{{ asset('storage/' . $users->profile_photo) }}" alt="Photo de profil"
                            class="w-24 h-24 rounded-full border-4 border-gray-200 object-cover">

                        <!-- Bouton pour changer la photo -->
                        <label for="profile-photo"
                            class="absolute bottom-0 right-0 bg-blue-600 text-white rounded-full p-2 shadow-md hover:bg-blue-700 transition duration-200 cursor-pointer flex items-center justify-center w-8 h-8">
                            <i class="fas fa-camera text-sm"></i>
                        </label>

                        <input type="file" name="profile_photo" id="profile-photo" class="hidden">
                    </div>

                    <p class="text-sm text-gray-500 mt-2">Cliquez pour changer votre photo</p>
                </div>



                <!-- Nom d'utilisateur -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Nom d'utilisateur</label>
                    <div class="flex">
                        <span
                            class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500">@</span>
                        <input type="text" id="username" name="username" value="{{ $users->name }}"
                            class="flex-1 px-3 py-2 border border-gray-300 rounded-r-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" name="email" value="{{ $users->email }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Téléphone -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                    <input type="tel" id="phone" name="phone" value="{{ $users->phone }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>



            </div>

            <!-- Boutons -->
            <div class="mt-6 flex justify-end space-x-3">
                <button type="button" id="cancel-edit"
                    class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Annuler
                </button>
                <button type="submit"
                    class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>
<script>

    const editPopup = document.getElementById('edit-popup');
    const closePopupBtn = document.getElementById('close-popup');
    const cancelEditBtn = document.getElementById('cancel-edit');

    function openEditPopup() {
        editPopup.classList.remove('hidden');
    }

    function closeEditPopup() {
        editPopup.classList.add('hidden');
    }

    closePopupBtn.addEventListener('click', closeEditPopup);
    cancelEditBtn.addEventListener('click', closeEditPopup);

    editPopup.querySelector('.bg-white').addEventListener('click', function (e) {
        e.stopPropagation();
    });

    editPopup.addEventListener('click', closeEditPopup);

    document.querySelector('form').addEventListener('submit', function (e) {
        e.preventDefault();
        closeEditPopup();
        showToast('Profil mis à jour avec succès!');
    });

    const sidebar = document.querySelector('.sidebar');
    const overlay = document.getElementById('overlay');
    const openBtn = document.getElementById('open-sidebar');
    const closeBtn = document.getElementById('close-sidebar');

    function openSidebar() {
        sidebar.classList.add('open');
        overlay.classList.add('active');
    }

    function closeSidebar() {
        sidebar.classList.remove('open');
        overlay.classList.remove('active');
    }

    openBtn.addEventListener('click', openSidebar);
    closeBtn.addEventListener('click', closeSidebar);
    overlay.addEventListener('click', closeSidebar);



    @if(session('status'))
        Swal.fire({
            icon: 'success',
            title: 'Opération réussie!',
            text: '{{ session('status') }}'
        });
    @endif


    function showToast(message) {
        const toast = document.getElementById('toast');
        const toastMessage = document.getElementById('toastMessage');
        toastMessage.textContent = message;
        toast.classList.remove('hidden');
        setTimeout(() => {
            toast.classList.add('hidden');
        }, 3000);
    }

</script>