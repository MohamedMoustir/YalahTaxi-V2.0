<script src="https://cdn.tailwindcss.com"></script>
<style>
  input[type="radio"]:checked + label {
    border-color: #fbbf24;
    background-color: #fef3c7;
    font-weight: bold;
    transition: all 0.3s ease-in-out;
  }
</style>

<div class="min-h-screen bg-gradient-to-br from-amber-100 to-amber-300 flex items-center justify-center p-4">
  <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
    <h2 class="text-3xl font-extrabold text-gray-800 mb-6 text-center">Créer un compte</h2>

    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data" class="space-y-4"
      id="registration-form">
      @csrf

      <!-- Choix du rôle -->
      <div class="grid grid-cols-2 gap-4 mb-4">
        <label for="passenger" id="passenger-btn"
          class="p-3 border-2 rounded-lg border-gray-300 hover:border-amber-500 cursor-pointer block text-center transition">
          🧑 Passager
          <input type="radio" id="passenger" name="role" value="passenger" class="hidden">
        </label>

        <label for="driver" id="driver-btn"
          class="p-3 border-2 rounded-lg border-gray-300 hover:border-amber-500 cursor-pointer block text-center transition">
          🚗 Chauffeur
          <input type="radio" id="driver" name="role" value="driver" class="hidden">
        </label>
      </div>

      <!-- Image -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Photo de profil</label>
        <input type="file"
          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 transition shadow-sm"
          name="profile_photo">
      </div>

      <!-- Nom complet -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Nom complet</label>
        <input type="text"
          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 transition shadow-sm"
          name="name" :value="old('name')">
      </div>

      <!-- Email -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
        <input type="email"
          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 transition shadow-sm"
          name="email" :value="old('email')">
      </div>

      <!-- Téléphone -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Téléphone</label>
        <input type="text"
          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 transition shadow-sm"
          name="phone" required>
      </div>

      <!-- Mot de passe -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Mot de passe</label>
        <input type="password"
          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 transition shadow-sm"
          name="password" required autocomplete="new-password">
      </div>

      <!-- Champs spécifiques au chauffeur -->
      <div id="driver-fields" class="hidden space-y-4">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Ligne de transport</label>
          <select id="line" name="line"
            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 transition shadow-sm">
            <option value="">Sélectionner une ligne</option>
            @foreach ($nomLine as $nom)
            <option value="{{ $nom->id }}">{{ $nom->nom }}</option>
            @endforeach
          </select>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Localisation actuelle</label>
          <input type="text"
            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 transition shadow-sm"
            name="current_location" :value="old('location')">
        </div>
      </div>

      <!-- Bouton d'inscription -->
      <button
        class="w-full bg-amber-500 text-white py-3 rounded-lg font-semibold hover:bg-amber-600 transition shadow-md">
        S'inscrire
      </button>
    </form>
  </div>
</div>

<script>
  document.getElementById("passenger").addEventListener("change", function () {
    document.getElementById("driver-fields").classList.add("hidden");
  });

  document.getElementById("driver").addEventListener("change", function () {
    document.getElementById("driver-fields").classList.remove("hidden");
  });
</script>
