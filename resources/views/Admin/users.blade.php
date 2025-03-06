<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table des Utilisateurs</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">
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
                                <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700">Modifier</button>
                                <a href="{{ route('admin.delete', ['id'=>$user->id]) }}"
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700 ml-2">Supprimer</a>
                            </td>
                        </tr>
                    @endforeach

                    <!-- Ajoute d'autres lignes dynamiquement ici -->
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>