

@extends('layouts.navigation')

@section('content')
  <script src="https://cdn.tailwindcss.com"></script>
  <!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>YalahTaxi</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
</head>
<body class="bg-gray-100 font-sans min-h-screen">


  <!-- Main Content -->
  <main class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
      <h2 class="text-xl font-semibold mb-4">
        Mes réservations
      </h2>
      
      <!-- Filter controls -->
      <div class="flex flex-wrap items-center gap-4 mb-6">
        <div class="relative">
          <input type="text" placeholder="Rechercher..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-3 top-2.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </div>
        
        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
          <option value="">Tous les statuts</option>
          <!-- <option value="completed">Terminé</option> -->
          <option value="cancelled">Annulé</option>
          <option value="ongoing">En cours</option>
        </select>
        
        <div>
          <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg focus:outline-none transition-colors duration-200">
            <span>Filtrer par date</span>
          </button>
        </div>
      </div>
      
      <!-- Rides history table -->
      <div class="overflow-x-auto">

        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trajet</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix</th>
              <!-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th> -->
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Chauffeur</th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
        
            <!-- Ride 1 -->
@foreach ($trajets as $trajet)

 <tr class="hover:bg-gray-50">
              <td class="px-6 py-4 whitespace-nowrap">
               
                <div class="text-sm text-gray-900">{{ $trajet->departure_time }}</div>
                <div class="text-sm text-gray-500">14:30</div>
              </td>
              <td class="px-6 py-4">
                <div class="flex flex-col">
                  <span class="text-sm text-gray-900 font-medium">
                    <span class="inline-block w-2 h-2 bg-green-500 rounded-full mr-1"></span>
                    {{ $trajet->depart }}
                  </span>
                  <span class="mt-1 text-sm text-gray-900 font-medium">
                    <span class="inline-block w-2 h-2 bg-red-500 rounded-full mr-1"></span>
                    {{ $trajet->arriver }}
                  </span>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm font-medium text-gray-900">   {{ $trajet->price }} MAD</div>
                <div class="text-xs text-gray-500">Carte bancaire</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap"> 
                @if ($trajet->status == 'pending')
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">pending</span>
               @elseif ($trajet->status == 'refuser')
               <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">refuse</span>
               @else
               <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Terminé</span>
                @endif
           </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-8 w-8">
                    <img class="h-8 w-8 rounded-full" src="/api/placeholder/32/32" alt="">
                  </div>
                  <div class="ml-3">
                    <div class="text-sm font-medium text-gray-900">Ahmed M.</div>
                    <div class="flex items-center text-xs text-gray-500">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118l-2.799-2.034c-.784-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                      </svg>
                      <span>4.8</span>
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <button class="text-yellow-600 hover:text-yellow-900 mr-3 focus:outline-none">Détails</button>
                @if ($trajet->status == 'pending')
                <a href="{{ Route('refuser' ,['id'=>$trajet->id]) }}" class="text-yellow-600 hover:text-yellow-900 focus:outline-none">refuser</a>
                @endif
                @if ($trajet->status == 'approved')
                <button class="text-green-600 hover:text-green-900 focus:outline-none">accepte</button>
                @endif
              </td>
            </tr>
@endforeach
           
          
          </tbody>
        </table>
      </div>
      
      <!-- Pagination -->
      <div class="flex items-center justify-between mt-6">
        <div class="flex items-center">
          <span class="text-sm text-gray-700">
            Affichage de <span class="font-medium">1</span> à <span class="font-medium">3</span> sur <span class="font-medium">3</span> trajets
          </span>
        </div>
        <div class="flex items-center space-x-2">
          <button class="px-3 py-1 rounded-md bg-gray-200 text-gray-700 disabled:opacity-50" disabled>Précédent</button>
          <button class="px-3 py-1 rounded-md bg-yellow-500 text-white">1</button>
          <button class="px-3 py-1 rounded-md bg-gray-200 text-gray-700 disabled:opacity-50" disabled>Suivant</button>
        </div>
      </div>
    </div>
  </main>
  @endsection
</body>
</html>