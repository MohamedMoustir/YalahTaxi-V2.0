
@extends('layouts.navigation')

@section('content')

<body class="bg-gray-50 font-sans">

    <!-- Hero Section -->
    

    <section class="relative h-[800px] flex items-center" style="background: url(https://images.pexels.com/photos/1521580/pexels-photo-1521580.jpeg?auto=compress&cs=tinysrgb&w=600) center/cover no-repeat;">
    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-black/30"></div>
        <div class="bg-[url('free-photo-of-yellow-taxi-navigating-tokyo-traffic-in-a-busy-cityscape.jpeg')] absolute inset-0 bg-cover bg-center -z-10"></div>
        
        <div class="container mx-auto px-4 text-center text-white relative">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Voyagez en Grand Taxi en toute confiance</h1>
            <p class="text-xl mb-8">Réservez votre trajet interurbain au Maroc en quelques clics</p>
            
            <!-- Booking Form -->
            <div class="max-w-4xl mx-auto bg-white rounded-lg p-6 shadow-lg">
                
    <form  action='' method="get"  class="grid grid-cols-1 md:grid-cols-3 gap-4">
     
        <div>
            <label class="block text-gray-700 text-left mb-2 font-medium">Localisation</label>
            <select name="serch" class="w-full p-3 border rounded-lg bg-white">
            <option></option>
            <option>safi</option>
            <option>Rabat</option>
                <option>Marrakech</option>
            </select>
        </div>
        <div>
            <label class="block text-gray-700 text-left mb-2 font-medium">Disponibilité</label>
            <select name="sear"  class="w-full p-3 border rounded-lg bg-white">
            <option value=""></option>
                <option value="true">En ligne</option>
                <option value="false"> No Disponible</option>
               
            </select>
        </div>
        <div>
            <label class="block text-gray-700 text-left mb-2 font-medium">Date et heure</label>
            <input type="datetime-local" class="w-full p-3 border rounded-lg">
        </div>
        <button type="submit" class="md:col-span-3 bg-amber-400 text-gray-900 p-3 rounded-lg font-bold hover:bg-amber-500 transition">
            Rechercher un chauffeur disponible
        </button>
    
      
    </form>
</div>

        </div>
    </section>


    <!-- <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Estimez votre tarif</h2>
            <div class="max-w-2xl mx-auto bg-gray-50 p-8 rounded-xl">
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 mb-2">Ville de départ</label>
                        <select class="w-full p-3 border rounded-lg">
                            <option>Casablanca</option>
                            <option>Marrakech</option>
                            <option>Rabat</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Ville d'arrivée</label>
                        <select class="w-full p-3 border rounded-lg">
                            <option>Fès</option>
                            <option>Tanger</option>
                            <option>Agadir</option>
                        </select>
                    </div>
                </div>
                <div class="mt-6 text-center">
                    <div class="text-4xl font-bold text-amber-400">250 MAD</div>
                    <p class="text-gray-600 mt-2">Tarif moyen pour ce trajet</p>
                </div>
            </div>
        </div>
    </section>   -->
    <!-- Popular Routes -->

    <section class="py-20 bg-gray-50">
    <form action="{{ Route('search.taxis') }}" method="get" class="container mx-auto px-4">
        <h2 class="text-4xl text-center font-bold mb-16 text-gray-800 relative after:content-[''] after:absolute after:w-20 after:h-1 after:bg-amber-400 after:bottom-[-10px] after:left-1/2 after:transform after:-translate-x-1/2">Trajets populaires</h2>
        <div class="flex flex-wrap items-center gap-3 mb-6">
    <!-- Search field (existing) -->
    <div class="relative flex-grow max-w-xs">
        <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>
        </div>
        <input name="search" type="text" placeholder="Rechercher..." class="pl-10 py-2 pr-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none">
    </div>
    
    <!-- Status dropdown (existing) -->
    <div class="relative">
        <select name="sear" class="py-2 px-4 pr-8 bg-white border border-gray-300 rounded-lg appearance-none cursor-pointer focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none">
            <option>Tous les statuts</option>
            <option>Disponible</option>
            <option>En course</option>
            <option>Indisponible</option>
        </select>
        <div class="absolute inset-y-0 right-2 flex items-center pointer-events-none">
            <svg class="h-4 w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </div>
    </div>
    
    <!-- Date filter (existing) -->
    <button class="py-2 px-4 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-lg transition-colors">
        Filtrer par date
    </button>
    
    <!-- NEW: Like filter -->
    <button class="py-2 px-4 bg-white border border-gray-300 hover:bg-gray-50 text-gray-800 rounded-lg transition-colors flex items-center gap-2">
        <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
        </svg>
        Les plus aimés
    </button>
</div>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach ($trajets as $trajet)
            {{ $trajets }}
                <div class="border rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300 bg-white transform hover:-translate-y-1">
                    <div class="relative">
                        <img src="{{ asset('storage/' . $trajet->driveer->user->profile_photo) }}" alt="Photo de trajet" class="w-full h-56 object-cover">
                        <div class="absolute top-4 right-4">
                            @if ($trajet->driveer->is_available == true)
                                <span class="bg-green-100 text-green-800 px-4 py-1 rounded-full text-sm font-medium">
                                    Disponible
                                </span>
                            @else
                                <span class="bg-red-100 text-red-800 px-4 py-1 rounded-full text-sm font-medium">
                                    Non disponible
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-6 border-b pb-4">
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">{{ $trajet->driveer->user->name }}</h3>
                                <div class="text-amber-400 mt-1">★★★★☆ <span class="text-gray-500 text-sm">()</span></div>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">{{ $trajet->trajet->nom }}</h3>
                            </div>
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <div class="text-gray-600">
                                <p class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-amber-500" viewBox="0 0 20 20" fill="currentColor"><path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" /><path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H11a1 1 0 001-1v-5h2.05a2.5 2.5 0 014.9 0H19a1 1 0 001-1V5a1 1 0 00-1-1H3z" /></svg>Grand Taxi</p>
                                <p class="flex items-center mt-1"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-amber-500" viewBox="0 0 20 20" fill="currentColor"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18a2.5 2.5 0 100-5 2.5 2.5 0 000 5zM4 18a2.5 2.5 0 100-5 2.5 2.5 0 000 5zM10 18a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" /></svg>6 places</p>
                            </div>
                            
                            <div class="text-right">
                                <p class="text-3xl font-bold text-amber-500">{{ $trajet->trajet->prix }} <span class="text-lg">MAD</span></p>
                                @if ($trajet->driveer->is_available == true)
                                    <a href="{{ route('detiles',['id'=>$trajet->driveer->user_id]) }}" class="inline-block mt-3 bg-amber-400 text-gray-900 px-6 py-2 rounded-full hover:bg-amber-500 transition font-medium">
                                        Voir détails
                                    </a>
                                @else
                                    <button class="inline-block mt-3 bg-gray-300 text-gray-600 px-6 py-2 rounded-full cursor-not-allowed font-medium opacity-70">
                                        Voir détails
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-12">
            @if ($trajets->hasPages())
                <nav role="navigation" aria-label="Pagination Navigation">
                    <ul class="inline-flex items-center space-x-2">
                        @if ($trajets->onFirstPage())
                            <li>
                                <span class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">&laquo; Précédent</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $trajets->previousPageUrl() }}" class="px-4 py-2 text-amber-500 hover:text-amber-700 hover:bg-amber-50 rounded-lg transition">&laquo; Précédent</a>
                            </li>
                        @endif

                        @foreach ($trajets->links()->elements as $element)
                            @if (is_string($element))
                                <li><span class="px-4 py-2 text-gray-400">{{ $element }}</span></li>
                            @elseif (is_array($element))
                                @foreach ($element as $page => $url)
                                    <li>
                                        @if ($page == $trajets->currentPage())
                                            <span class="px-4 py-2 bg-amber-400 text-gray-900 rounded-lg font-medium">{{ $page }}</span>
                                        @else
                                            <a href="{{ $url }}" class="px-4 py-2 text-gray-700 hover:bg-amber-50 rounded-lg transition">{{ $page }}</a>
                                        @endif
                                    </li>
                                @endforeach
                            @endif
                        @endforeach

                        @if ($trajets->hasMorePages())
                            <li>
                                <a href="{{ $trajets->nextPageUrl() }}" class="px-4 py-2 text-amber-500 hover:text-amber-700 hover:bg-amber-50 rounded-lg transition">Suivant &raquo;</a>
                            </li>
                        @else
                            <li>
                                <span class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">Suivant &raquo;</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            @endif
        </div>
    </form>
</section>
    

    <!-- Drivers Section -->
     
    <section id="drivers" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl text-center font-bold mb-12">Nos chauffeurs professionnels</h2>
            <div class="grid md:grid-cols-4 gap-6">
                <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                    <img src="0P9A1587.JPG" alt="Chauffeur Hassan" class="w-24 h-24 rounded-full mx-auto mb-4 object-cover">
                    <h3 class="font-bold text-xl mb-1">Hassan</h3>
                    <div class="text-amber-400 mb-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span class="text-gray-600 ml-1">4.5/5</span>
                    </div>
                    <p class="text-gray-600 mb-3">5 ans d'expérience</p>
                    <p class="text-gray-600 text-sm">Casablanca → Rabat</p>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                    <img src="0P9A1587.JPG" alt="Chauffeur Mohammed" class="w-24 h-24 rounded-full mx-auto mb-4 object-cover">
                    <h3 class="font-bold text-xl mb-1">Mohammed</h3>
                    <div class="text-amber-400 mb-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span class="text-gray-600 ml-1">5.0/5</span>
                    </div>
                    <p class="text-gray-600 mb-3">8 ans d'expérience</p>
                    <p class="text-gray-600 text-sm">Marrakech → Essaouira</p>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                    <img src="0P9A1587.JPG" alt="Chauffeur Fatima" class="w-24 h-24 rounded-full mx-auto mb-4 object-cover">
                    <h3 class="font-bold text-xl mb-1">Fatima</h3>
                    <div class="text-amber-400 mb-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <span class="text-gray-600 ml-1">4.0/5</span>
                    </div>
                    <p class="text-gray-600 mb-3">3 ans d'expérience</p>
                    <p class="text-gray-600 text-sm">Tanger → Tétouan</p>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                    <img src="0P9A1587.JPG" alt="Chauffeur Karim" class="w-24 h-24 rounded-full mx-auto mb-4 object-cover">
                    <h3 class="font-bold text-xl mb-1">Karim</h3>
                    <div class="text-amber-400 mb-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span class="text-gray-600 ml-1">4.7/5</span>
                    </div>
                    <p class="text-gray-600 mb-3">6 ans d'expérience</p>
                    <p class="text-gray-600 text-sm">Fès → Meknès</p>
                </div>
            </div>
            <div class="text-center mt-10">
                <a href="#" class="text-amber-500 hover:text-amber-600 font-bold">Voir tous nos chauffeurs →</a>
            </div>
        </div>
    </section>

    <!-- Reviews Section -->
    <section id="reviews" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl text-center font-bold mb-12">Ce que disent nos clients</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-6 rounded-lg shadow-md testimonial-card">
                    <div class="text-amber-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-600 mb-6">"Service impeccable ! J'ai réservé facilement et le chauffeur était ponctuel et professionnel. Je recommande vivement YalahTaxi pour les voyages entre villes."</p>
                    <div class="flex items-center">
                        <img src="/api/placeholder/50/50" alt="Avis client" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold">Samira B.</h4>
                            <p class="text-gray-500 text-sm">Casablanca → Rabat</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow-md testimonial-card">
                    <div class="text-amber-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="text-gray-600 mb-6">"Très pratique pour éviter les tracas de la gare routière. Prix raisonnable et chauffeur courtois. Application facile à utiliser. Je l'utiliserai pour tous mes déplacements."</p>
                    <div class="flex items-center">
                        <img src="/api/placeholder/50/50" alt="Avis client" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold">Ahmed M.</h4>
                            <p class="text-gray-500 text-sm">Marrakech → Essaouira</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow-md testimonial-card">
                    <div class="text-amber-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <p class="text-gray-600 mb-6">"Excellente alternative aux transports en commun. J'apprécie particulièrement la possibilité de réserver à l'avance pour être sûr d'avoir une place. Véhicule propre et confortable."</p>
                    <div class="flex items-center">
                        <img src="/api/placeholder/50/50" alt="Avis client" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold">Rachid K.</h4>
                            <p class="text-gray-500 text-sm">Fès → Meknès</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="font-sans bg-gray-50">
        <div class="container mx-auto py-16 px-4 relative">
            <h2 class="text-3xl text-center font-bold mb-16">Comment ça marche</h2>
            <!-- Right column with taxi image -->
            <div class="flex items-center justify-center">
                <img src="https://www.taxidaba.com/images/fr/tofCom%C3%A7.jpg" alt="Taxi Daba Maroc"
                    class="w-[9000px] h-auto">
            </div>
            <div class="text-center mt-16">
                <a href="#"
                    class="bg-amber-400 hover:bg-amber-500 text-white font-bold py-3 px-8 rounded-full text-xl transition duration-300 shadow-md">
                    Réserver maintenant
                </a>
            </div>
        </div>
    </section>
    <!-- Download App -->
    <section class="py-16 bg-gray-800 text-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <h2 class="text-3xl font-bold mb-4">Téléchargez notre application</h2>
                    <p class="text-gray-300 mb-6">Réservez, payez et suivez votre taxi en temps réel depuis notre application mobile.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="bg-gray-900 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fab fa-apple text-2xl mr-2"></i>
                            <div>
                                <div class="text-xs">Télécharger sur</div>
                                <div class="font-bold">App Store</div>
                            </div>
                        </a>
                        <a href="#" class="bg-gray-900 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fab fa-google-play text-2xl mr-2"></i>
                            <div>
                                <div class="text-xs">Télécharger sur</div>
                                <div class="font-bold">Google Play</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2 flex justify-center">
                    <img src="/api/placeholder/300/600" alt="Application mobile YalahTaxi" class="h-80 w-auto">
                </div>
            </div>
        </div>
    </section>

 

    @endsection
</body>
</html>


   <script>
    

   </script>