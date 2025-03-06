import axios from 'axios';
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

import Echo from 'laravel-echo';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Pusher = require('pusher-js');

const echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY, // From .env file
    cluster: process.env.MIX_PUSHER_APP_CLUSTER, // From .env file
    forceTLS: true
});

// Listen for the 'sendDriveerMassege' event on the private channel
echo.private('YalahTaxi.' + userId) // Make sure `userId` is defined based on logged-in user
    .listen('sendDriveerMassege', (event) => {
        console.log('Message received:', event.message);
        console.log('Receiver ID:', event.receiver_id);
        // You can handle the received message here (e.g., display in the UI)
    });

