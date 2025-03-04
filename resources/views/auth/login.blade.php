<script src="https://cdn.tailwindcss.com"></script>
<div class="min-h-screen bg-gradient-to-br from-amber-100 to-amber-300 flex items-center justify-center p-4">
  <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
    <h2 class="text-3xl font-extrabold text-gray-800 mb-6 text-center">Connexion</h2>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
      @csrf

      <!-- Email Input -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition shadow-sm">
      </div>

      <!-- Password Input -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
        <input type="password" name="password"
          class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition shadow-sm">
      </div>

      <!-- Remember Me Checkbox -->
      <div class="flex items-center justify-between">
        <label for="remember_me" class="inline-flex items-center">
          <input id="remember_me" type="checkbox"
            class="rounded border-gray-300 text-amber-600 shadow-sm focus:ring-amber-500">
          <span class="ml-2 text-sm text-gray-600">Se souvenir de moi</span>
        </label>
        @if (Route::has('password.request'))
          <a class="text-sm text-amber-600 hover:text-amber-800 font-medium" href="{{ route('password.request') }}">
            Mot de passe oublié ?
          </a>
        @endif
      </div>

      <!-- Submit Button -->
      <button type="submit"
        class="w-full bg-amber-500 text-white py-3 rounded-lg font-semibold hover:bg-amber-600 transition shadow-md">
        Se connecter
      </button>

      <!-- Social Login -->
      <div class="mt-6 text-center text-gray-500">Ou connectez-vous avec</div>
      <div class="mt-4 flex flex-col space-y-3">
        <a href="{{ route('auth.google') }}"
          class="w-full flex items-center justify-center bg-blue-500 text-white py-3 rounded-lg font-semibold hover:bg-blue-600 transition shadow-md">
          <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
            <path
              d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12c0-5.14 3.86-9.4 8.84-9.96v6.99H8.36v3.03h2.48v8.48c-.49.08-.99.12-1.5.12-5.52 0-10-4.48-10-10S6.48 2 12 2z">
            </path>
          </svg>
          Connexion avec Google
        </a>

        <a href="{{ url('login/facebook') }}"
          class="w-full flex items-center justify-center bg-blue-700 text-white py-3 rounded-lg font-semibold hover:bg-blue-800 transition shadow-md">
          <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
            <path
              d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 5.21 3.99 9.48 9.09 9.95v-7.04H8.58v-2.91h2.51V9.74c0-2.49 1.49-3.86 3.77-3.86 1.09 0 2.22.2 2.22.2v2.44h-1.25c-1.23 0-1.6.77-1.6 1.56v1.87h2.72l-.44 2.91h-2.28v7.04C18.01 21.48 22 17.21 22 12z">
            </path>
          </svg>
          Connexion avec Facebook
        </a>
      </div>
    </form>
  </div>
</div>
