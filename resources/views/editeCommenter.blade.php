







    <script src="https://cdn.tailwindcss.com"></script>
        
        <div class="bg-white p-8 rounded-xl shadow-lg mt-8">
            <h3 class="text-2xl font-bold mb-6 text-gray-800 text-center">Ajouter un avis</h3>
            <form action="{{ route('comment.update',$commentsedite->id) }}" method="post" class="space-y-6">
                @csrf
                
                <!-- Star Rating -->
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Votre note</label>
                    <div id="starRating" class="flex justify-center space-x-2">
                        @for ($i = 1; $i <= 5; $i++)
                            <span data-rating="{{ $i }}" 
                                  class="star text-5xl cursor-pointer text-gray-300 hover:text-amber-400 transition-colors">
                                ★
                            </span>
                        @endfor
                    </div>
                    <input type="hidden" id="rating" name="rating" value="" required>
                </div>

                <!-- Review Textarea -->
                <div>
                    <label for="content" class="block text-gray-700 mb-2">Votre avis</label>
                    <textarea 
                        name="content" 
                        id="content"
                        rows="4" 
                 
                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-amber-400 transition"
                        placeholder="Partagez votre expérience..."
                        required
                    >{{  $commentsedite->content  }}</textarea>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full bg-amber-500 text-white py-3 rounded-lg font-bold hover:bg-amber-600 transition-colors focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-opacity-50"
                >
                   Update mon avis
                </button>
            </form>
        </div> 
    

        <script>
document.addEventListener('DOMContentLoaded', () => {
    const starRating = document.getElementById('starRating');
    const ratingInput = document.getElementById('rating');
    const stars = starRating.querySelectorAll('.star');

    stars.forEach(star => {
        star.addEventListener('click', () => {
            const rating = star.getAttribute('data-rating');
            ratingInput.value = rating;
            
            stars.forEach((s, index) => {
                if (index < rating) {
                    s.classList.remove('text-gray-300');
                    s.classList.add('text-amber-400');
                } else {
                    s.classList.remove('text-amber-400');
                    s.classList.add('text-gray-300');
                }
            });
        });
    });
});
</script>
<script>
        // Dynamic star rating display
        const ratingInput = document.getElementById('rating');
        const ratingDisplay = document.getElementById('ratingDisplay');

        ratingInput.addEventListener('input', function() {
            const stars = ['★', '★★', '★★★', '★★★★', '★★★★★'];
            ratingDisplay.textContent = stars[this.value - 1];
        });

       

   
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
        
        

    document.addEventListener('DOMContentLoaded', () => {
        const starRating = document.getElementById('starRating');
        const ratingInput = document.getElementById('rating');
        const stars = starRating.querySelectorAll('.star');

        stars.forEach(star => {
            star.addEventListener('mouseover', () => {
                const rating = star.getAttribute('data-rating');
                stars.forEach((s, index) => {
                    if (index < rating) {
                        s.classList.remove('text-gray-300');
                        s.classList.add('text-amber-400');
                    } else {
                        s.classList.remove('text-amber-400');
                        s.classList.add('text-gray-300');
                    }
                });
            });

            star.addEventListener('click', () => {
                const rating = star.getAttribute('data-rating');
                ratingInput.value = rating;
                stars.forEach((s, index) => {
                    if (index < rating) {
                        s.classList.remove('text-gray-300');
                        s.classList.add('text-amber-400');
                    } else {
                        s.classList.remove('text-amber-400');
                        s.classList.add('text-gray-300');
                    }
                });
            });
        });

        starRating.addEventListener('mouseleave', () => {
            const currentRating = ratingInput.value;
            stars.forEach((s, index) => {
                if (index < currentRating) {
                    s.classList.remove('text-gray-300');
                    s.classList.add('text-amber-400');
                } else {
                    s.classList.remove('text-amber-400');
                    s.classList.add('text-gray-300');
                }
            });
        });
    });

    </script>