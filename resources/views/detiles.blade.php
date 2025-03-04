


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mohamed K. - YalahTaxi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styles pour compléter Tailwind */
        .driver-photo-lg {
            height: 400px;
            object-fit: cover;
        }
        
        .gallery-item {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body class="bg-gray-50">

    <div class="relative w-full flex items-center my-10">
        <!-- Ville de départ -->
        <div class="text-center w-1/5">
            <p class="text-gray-700 font-bold text-lg"></p>
        </div>
    
        <!-- Ligne de trajet avec étapes -->
        <div class="relative w-3/5 flex items-center">
            <div class="w-full h-2 bg-gray-300 rounded-full relative">
            @foreach ($details_trajet as $key => $trajet)
    @php
        $leftPosition = ($key / (count($details_trajet) - 1)) * 100;
    @endphp
    <div class="absolute top-1/2 -translate-y-1/2 text-gray-600 text-xl"
         style="left: {{ $leftPosition }}%;">
        👤{{ $trajet->point_de_pause }}
    </div>
@endforeach

                
                <!-- Voiture animée -->
                <div id="car" class="absolute left-0 top-1/2 -translate-y-1/2 transition-all duration-1000 text-2xl">
                    🚖
                </div>
            </div>
        </div>
    
        <!-- Ville d'arrivée -->
        <div class="text-center w-1/5">
            <p class="text-gray-700 font-bold text-lg"></p>
        </div>
    </div>
    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const car = document.getElementById("car");
            const stops = ["25%", "50%", "75%", "100%"];
            let index = 0;
    
            function moveCar() {
                if (index < stops.length) {
                    car.style.left = stops[index]; 
                    index++;
                    setTimeout(moveCar, 3000); 
                }
            }
    
            setTimeout(moveCar, 4000);
        });
    </script>
    
    
    <!-- Page Content -->
    <div class="container mx-auto px-4 py-8">
        <a href="index.html" class="mb-6 inline-block bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700">
            ← Retour aux résultats
        </a>

        <!-- Driver Header -->
        <div class="grid md:grid-cols-3 gap-8 mb-12">
            <img src="{{ asset('storage/' . $trajets->driveer->user->profile_photo) }}" class="driver-photo-lg rounded-lg shadow-lg" alt="Mohamed K.">
            
            <div class="md:col-span-2 bg-white p-6 rounded-lg shadow-lg">
                <h1 class="text-3xl font-bold mb-2">{{ $trajets->driveer->user->name }}</h1>
                <div class="flex items-center mb-4 text-amber-400">
                    ★★★★☆
                    <span class="ml-2 text-gray-600 text-sm">(4.2/5 - 45 avis)</span>
                </div>

                <div class="grid grid-cols-3 gap-4 mb-6">
                    <div class="bg-gray-50 p-4 text-center rounded">
                        <div class="text-gray-500">🎖️ Expérience</div>
                        <div class="font-bold">5 ans</div>
                    </div>
                    <div class="bg-gray-50 p-4 text-center rounded">
                        <div class="text-gray-500">🚗 Véhicule</div>
                        <div class="font-bold">Mercedes Vito</div>
                    </div>
                    <div class="bg-gray-50 p-4 text-center rounded">
                        <div class="text-gray-500">👥 Places</div>
                        <div class="font-bold">{{ $places }}passagers</div>
                    </div>
                </div>

                <h3 class="text-xl font-bold mb-2">À propos</h3>
                <p class="text-gray-600">Conducteur professionnel avec véhicule haut de gamme. Parfaitement à l'heure et connais parfaitement le réseau routier marocain.</p>
            </div>
        </div>

        <!-- Gallery -->
        <h2 class="text-2xl font-bold mb-4">Galerie du véhicule</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-12">
            <img src="data:image/jpeg;base64,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" class="gallery-item rounded-lg" alt="Intérieur">
            <img src="data:image/jpeg;base64,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" class="gallery-item rounded-lg" alt="Sièges">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScQY7ht57rpg1lxSllXRr07kjRkzJXBomr4A&s" class="gallery-item rounded-lg" alt="Coffre">
        </div>

        <!-- Booking Widget -->
     <!-- Booking Widget -->
     @if ($disponibilites->statuts == 'disponible' && $places < 6 )
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-6">Réserver ce conducteur</h2>
        <form id="bookingForm" action="{{ route('reservations') }}" method="post">
            @csrf
            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-gray-700 mb-2">Date de prise en charge</label>
                    <input name="departure_time" type="text" 
                           class="w-full p-2 border rounded focus:ring-2 focus:ring-amber-400" value="">
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">- ville depart</label>
                    <select name="depart" id="passengerSelect" class="w-full p-2 border rounded focus:ring-2 focus:ring-amber-400" onchange="values(this.value)">
                    @foreach ($details_trajet as $key => $trajet)
                        <option value="{{ $trajet->point_de_pause }}">{{ $trajet->point_de_pause }}</option>
                    @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 mb-2">- ville arriver</label>
                    <select name="arriver" id="passengerSelect" class="w-full p-2 border rounded focus:ring-2 focus:ring-amber-400" onchange="values(this.value)">
                    @foreach ($details_trajet as $key => $trajet)
                        <option value="{{ $trajet->point_de_pause }}">{{ $trajet->point_de_pause }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <input type="hidden" name="course_id" value="{{ $course->id }}">
            <!-- Price Breakdown -->
            <div class="border p-4 rounded-lg mb-6">
                <h4 class="font-bold mb-3">Détail du prix</h4>
                <div class="flex justify-between mb-2">
                    <span>Tarif de base:</span>
                    <span id="basePrice">200 MAD</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span>Frais de service:</span>
                    <span id="serviceFee">50 MAD</span>
                </div>
                <hr class="my-3">
                <div class="flex justify-between font-bold">
                    <span>Total:</span>
                    <span id="total">250 MAD</span>
                </div>
            </div>
            <div class="">
                 <input name="driveer_id" type="text" value="{{ $trajets->driveer->id }}">
            </div>
            <button type="submit" 
                    class="w-full bg-amber-400 text-gray-900 py-3 px-6 rounded font-bold hover:bg-amber-500 transition">
                Confirmer la réservation
            </button>
        </form>
    </div>
    <form action="{{ route('payment') }}" method="POST">
    @csrf
    <div>
        <label for="amount">Montant :</label>
        <input type="text" id="amount" name="amount" value="200">
    </div>

    <div>
        <label for="currency">Devise :</label>
        <select id="currency" name="currency" >
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
            <option value="GBP">GBP</option>
            <!-- Ajoute d'autres devises ici -->
        </select>
    </div>

    <div>
        <button type="submit">Payer</button>
    </div>
</form>

@elseif($places == 6)

<div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-red-600">Conducteur non disponible</h2>
        <p class="text-gray-700 mb-4">Ce conducteur n'est pas disponible pour le moment.</p>
        
      
        
       

        <div class="p-4 bg-gray-100 rounded-lg mb-6">
            <p class="font-medium">Suggestions:</p>
            <ul class="list-disc ml-5 mt-2">
                <li>Vérifiez d'autres dates</li>
                <li>Consultez nos autres conducteurs disponibles</li>
                <li>Recevez une notification quand ce conducteur sera disponible</li>
            </ul>
        </div>
        
        <!-- Boutons d'action -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <a href="{{ route('home') }}" 
               class="block text-center w-full bg-amber-400 text-gray-900 py-3 px-6 rounded font-bold hover:bg-amber-500 transition">
                Rechercher d'autres conducteurs
            </a>
            <button type="button" onclick="notifyMe({{ $course->driver_id }})" 
                    class="w-full bg-white border border-amber-400 text-gray-900 py-3 px-6 rounded font-bold hover:bg-amber-50 transition">
                Me notifier quand disponible
            </button>
        </div>
    </div>

@else
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-red-600">Conducteur non disponible</h2>
        <p class="text-gray-700 mb-4">Ce conducteur n'est pas disponible pour le moment.</p>
        
        <!-- Détails d'indisponibilité -->
        <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
            <h3 class="font-semibold text-red-800 mb-2">Détails d'indisponibilité:</h3>
            <ul class="space-y-2">
                <li class="flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                    <span>Jour: <strong>{{ $disponibilites->jour }}</strong></span>
                </li>
                <li class="flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                    <span>Heure: <strong>{{ date('H:i', strtotime($disponibilites->heure_depart)) }}</strong></span>
                </li>
                <li class="flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 mr-2 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    <span>Le conducteur est généralement indisponible à cette période.</span>
                </li>
            </ul>
        </div>
        
       

        <div class="p-4 bg-gray-100 rounded-lg mb-6">
            <p class="font-medium">Suggestions:</p>
            <ul class="list-disc ml-5 mt-2">
                <li>Vérifiez d'autres dates</li>
                <li>Consultez nos autres conducteurs disponibles</li>
                <li>Recevez une notification quand ce conducteur sera disponible</li>
            </ul>
        </div>
        
        <!-- Boutons d'action -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <a href="{{ route('home') }}" 
               class="block text-center w-full bg-amber-400 text-gray-900 py-3 px-6 rounded font-bold hover:bg-amber-500 transition">
                Rechercher d'autres conducteurs
            </a>
            <button type="button" onclick="notifyMe({{ $course->driver_id }})" 
                    class="w-full bg-white border border-amber-400 text-gray-900 py-3 px-6 rounded font-bold hover:bg-amber-50 transition">
                Me notifier quand disponible
            </button>
        </div>
    </div>
    @endif
   
    
        <!-- Reviews -->
        <h2 class="text-2xl font-bold my-8">Avis clients (45)</h2>
        
        <div class="bg-white p-6 rounded-lg shadow-lg mb-4">
            <div class="flex justify-between items-center mb-2">
                <div class="text-amber-400">★★★★☆ Ahmed S.</div>
                <small class="text-gray-500">15 mars 2024</small>
            </div>
            <p class="text-gray-600">"Trajet très confortable et conducteur très professionnel. Je recommande !"</p>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center items-center gap-4 my-8">
            <button class="px-4 py-2 border rounded hover:bg-gray-100">← Précédent</button>
            <span class="text-gray-600">Page 1 sur 3</span>
            <button class="px-4 py-2 border rounded hover:bg-gray-100">Suivant →</button>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div id="confirmationModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center">
        <div class="bg-white p-8 rounded-lg max-w-md w-full mx-4">
            <h2 class="text-2xl font-bold mb-4 text-center">🎉 Réservation confirmée !</h2>
            <p class="text-center mb-4">Votre réservation avec Mohamed K. est confirmée pour le <span id="bookingDate"></span></p>
            
            <div class="bg-gray-50 p-4 rounded-lg mb-6">
                <p class="text-center">Référence: GTG-458796</p>
                <p class="text-center font-bold">Montant total: 250 MAD</p>
            </div>

            <button onclick="closeConfirmation()" 
                    class="w-full bg-amber-400 text-gray-900 py-2 px-4 rounded font-bold hover:bg-amber-500">
                Fermer
            </button>
        </div>
    </div>

    <script>
        // Mêmes fonctions JavaScript que précédemment
        function showConfirmation(event) {
            event.preventDefault();
            const date = document.querySelector('input[type="datetime-local"]').value;
            // document.getElementById('bookingDate').textContent = new Date(date).toLocaleString();
            document.getElementById('confirmationModal').classList.remove('hidden');
            document.getElementById('confirmationModal').classList.add('flex');
        }

        function closeConfirmation() {
            document.getElementById('confirmationModal').classList.add('hidden');
        }

        window.onclick = function(event) {
            const modal = document.getElementById('confirmationModal');
            if (event.target === modal) {
                closeConfirmation();
            }
        }

        function values(prix) {
        const basePrice = 200;
        const serviceFee = 50;

        const numPassengers = parseInt(prix);
        
        const totalPrice = basePrice + serviceFee + (numPassengers - 1) * 50;  
        
        document.getElementById('total').innerHTML = totalPrice + ' MAD';
        }
        
    </script>
     <script>
        function notifyMe(driverId) {
            alert('Vous serez notifié dès que ce conducteur sera disponible!');
        }
    </script>

</body>
</html>