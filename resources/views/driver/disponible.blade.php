
@extends('layouts.guest')

@section('content')
           
<div class="bg-white rounded-xl shadow-md p-6">   
    <h3 class="text-xl font-bold text-gray-800 mb-4">Mes disponibilités</h3>

    <form method="post" action="{{ route('disponible') }}" class="space-y-4">
    @csrf
    <div class="flex items-center gap-4 mb-6">
      <span class="text-sm font-medium">Statut actuel :</span>
      <label class="relative inline-flex items-center cursor-pointer">
        <input name="stauts" type="checkbox" class="sr-only peer">
        <div class="w-11 h-6 bg-gray-200 rounded-full peer-checked:bg-amber-400 peer-checked:after:translate-x-full after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border after:rounded-full after:h-5 after:w-5 after:transition-all"></div>
        <span class="ml-3 text-sm">Disponible</span>
      </label>
    </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Jour</label>
          <select name="jour" class="w-full p-2 border rounded-lg">
            <option>Lundi</option>
            <option>Mardi</option>
          </select>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">De</label>
          <input name="time" type="datetime-local" class="w-full p-2 border rounded-lg">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">À</label>
          <input type="time" class="w-full p-2 border rounded-lg">
        </div>
      </div>
      <button class="bg-amber-400 text-gray-900 px-4 py-2 rounded-lg hover:bg-amber-500">Enregistrer</button>
    </form>
  </div>
  @endsection
