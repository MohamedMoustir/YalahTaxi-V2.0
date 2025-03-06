<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat - GoTrajet</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#F59E0B', // amber-500
                            light: '#FCD34D',   // amber-300
                            dark: '#D97706',    // amber-600
                        },
                        secondary: {
                            DEFAULT: '#4B5563', // gray-600
                            light: '#9CA3AF',   // gray-400
                            dark: '#1F2937',    // gray-800
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.3s ease-in-out',
                        'slide-in': 'slideIn 0.3s ease-in-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideIn: {
                            '0%': { transform: 'translateY(10px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #ddd;
            border-radius: 10px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #ccc;
        }
        
        /* Message bubble animations */
        .message-in {
            animation: slideInLeft 0.3s ease-out;
        }
        
        .message-out {
            animation: slideInRight 0.3s ease-out;
        }
        
        @keyframes slideInLeft {
            from { transform: translateX(-20px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes slideInRight {
            from { transform: translateX(20px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        /* Typing indicator */
        .typing-indicator {
            display: flex;
            align-items: center;
        }
        
        .typing-indicator span {
            height: 8px;
            width: 8px;
            background-color: #9CA3AF;
            border-radius: 50%;
            display: inline-block;
            margin-right: 3px;
            animation: typing 1.3s infinite;
        }
        
        .typing-indicator span:nth-child(2) {
            animation-delay: 0.2s;
        }
        
        .typing-indicator span:nth-child(3) {
            animation-delay: 0.4s;
        }
        
        @keyframes typing {
            0%, 60%, 100% { transform: translateY(0); }
            30% { transform: translateY(-5px); }
        }
    </style>
</head>
<body class="bg-gray-100 font-sans antialiased text-gray-800">
    <div class="container mx-auto max-w-4xl h-screen flex flex-col shadow-lg">
        <!-- Header -->
        <header class="bg-white shadow-sm p-4 flex items-center justify-between border-b border-gray-200">
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <img src="/placeholder.svg?height=50&width=50" alt="Profile" class="rounded-full w-12 h-12 object-cover border-2 border-primary">
                    <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 rounded-full border-2 border-white"></span>
                </div>
                <div>
                    <h2 class="font-bold text-lg text-secondary-dark">Mohamed Khalil</h2>
                    <div class="flex items-center text-sm text-green-500">
                        <span class="inline-block w-2 h-2 bg-green-500 rounded-full mr-1"></span>
                        En ligne
                    </div>
                </div>
            </div>
            <div class="flex items-center space-x-5">
                <button class="text-secondary hover:text-primary transition-colors duration-200 p-2 rounded-full hover:bg-gray-100">
                    <i class="fas fa-phone"></i>
                </button>
                <button class="text-secondary hover:text-primary transition-colors duration-200 p-2 rounded-full hover:bg-gray-100">
                    <i class="fas fa-video"></i>
                </button>
                <button class="text-secondary hover:text-primary transition-colors duration-200 p-2 rounded-full hover:bg-gray-100">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
            </div>
        </header>

        <!-- Chat Messages -->
        <div class="flex-grow overflow-y-auto p-4 space-y-6 bg-gray-50 custom-scrollbar" id="chat-messages">
            <!-- Received Message -->
            <div class="flex items-start space-x-3 message-in">
                <div class="relative">
                    <img src="/placeholder.svg?height=40&width=40" alt="Profile" class="rounded-full w-10 h-10 object-cover border border-gray-200">
                </div>
                <div>
                    <div class="bg-white p-3 rounded-2xl rounded-tl-none shadow-sm max-w-md border border-gray-100">
                        <p class="text-gray-800">Bonjour, je serai à l'arrêt dans 5 minutes. Êtes-vous prêt ?</p>
                    </div>
                    <span class="text-xs text-gray-500 mt-1 block">11:45</span>
                </div>
            </div>

            <!-- Sent Message -->
            <div class="flex justify-end items-start space-x-3 message-out">
                <div>
                    @foreach ($messages as $message)
                    
               
                    <div class="bg-primary text-white p-3 rounded-2xl rounded-tr-none shadow-sm max-w-md">
                        <p>{{ $message->message }}</p>
                    </div>
                    <div class="flex items-center justify-end mt-1 space-x-1">
                        <span class="text-xs text-gray-500">11:46</span>
                        <i class="fas fa-check-double text-xs text-primary"></i>
                    </div>  
                       @endforeach
                </div>
                <div class="relative">
                    <img src="/placeholder.svg?height=40&width=40" alt="Profile" class="rounded-full w-10 h-10 object-cover border border-gray-200">
                </div>
            </div>

            <!-- System Message -->
            <div class="text-center animate-fade-in">
                <span class="bg-gray-200 text-gray-700 px-4 py-1.5 rounded-full text-sm inline-block shadow-sm">
                    Trajet commencé à 11:50
                </span>
            </div>
            
            <!-- Typing Indicator (Optional) -->
            <div class="flex items-start space-x-3 message-in opacity-70">
                <div class="relative">
                    <img src="/placeholder.svg?height=40&width=40" alt="Profile" class="rounded-full w-10 h-10 object-cover border border-gray-200">
                </div>
                <div>
                    <div class="bg-white p-3 rounded-2xl rounded-tl-none shadow-sm">
                        <div class="typing-indicator">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Message Input -->
        <div class="bg-white p-4 border-t border-gray-200">
            <form action="{{ route('send.Messageofsellertoadmin') }}" method="post" class="flex items-center space-x-3">
                @csrf
                <button class="text-secondary hover:text-primary transition-colors duration-200 p-2 rounded-full hover:bg-gray-100">
                    <i class="fas fa-plus-circle text-xl"></i>
                </button>
                <button class="text-secondary hover:text-primary transition-colors duration-200 p-2 rounded-full hover:bg-gray-100">
                    <i class="fas fa-image text-xl"></i>
                </button>
                <input type="text" name="receiver_id" id="" value="{{ $id }}">
                <div class="flex-grow relative">
                    <input 
                        type="text" 
                        name="message"
                        placeholder="Écrivez un message..." 
                        class="w-full p-3 pr-10 border border-gray-200 rounded-full focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                    >
                    <button class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-primary">
                        <i class="fas fa-smile"></i>
                    </button>
                </div>
                <button class="bg-primary text-white p-3 rounded-full hover:bg-primary-dark transition-colors duration-200 shadow-sm">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>

    <script>
        // Scroll to bottom of chat on load
        // document.addEventListener('DOMContentLoaded', function() {
        //     const chatMessages = document.getElementById('chat-messages');
        //     chatMessages.scrollTop = chatMessages.scrollHeight;
        // });
    </script>
</body>
</html>

