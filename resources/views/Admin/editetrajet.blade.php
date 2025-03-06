






<script src="https://cdn.tailwindcss.com"></script>


<section class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
    <h2 class="text-3xl font-bold text-gray-700 mb-6 text-center">Ajouter un Détail de
        Trajet</h2>

    <div class="bg-green-500 text-white p-2 mb-4 rounded text-center hidden">
        Succès ! Détail de trajet ajouté.
    </div>

    <form action="{{ route('admin.update') }}" method="POST">
        @csrf  
        <label class="block text-gray-700 font-semibold mb-2">Trajet :</label>
        <input type="text" name="nom"  value="{{  $trajets->nom }}"
            class="w-full p-3 border border-gray-300 rounded-lg mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
            required>
  <input type="hidden" value="{{ $trajets->id }}" name="id">
        <!-- Zone dynamique pour ajouter plusieurs orders -->
        <div id="orders-container">
            <div class="order-group mb-4 flex gap-2">
                <input type="text" name="point_de_pause[]" value="{{  $trajets->details_trajet->point_de_pause }}"
                    class="w-full p-3 border border-gray-300 rounded-lg mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                <input type="number" name="order[]" placeholder="ID Order"value="{{ $trajets->details_trajet->order_id }}"
                    class="w-1/2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <input type="number" name="Distance[]" placeholder="Distance" value="{{ $trajets->details_trajet->distance }}"
                    class="w-1/2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <input type="number" name="prix[]" placeholder="prix" value="{{ $trajets->details_trajet->price }}"
                    class="w-1/2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                <button type="button"
                    class="remove-order hidden text-red-500 text-lg font-bold px-2"
                    onclick="removeOrder(this)">×</button>
            </div>
        </div>

        <!-- Bouton pour ajouter un autre Order
        <button type="button" onclick="addOrder()"
            class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 rounded-lg shadow-md transition duration-300 mb-4">
            + Ajouter un autre Order
        </button> -->

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