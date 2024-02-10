const express = require('express');
const http = require('http');
const WebSocket = require('ws');

const app = express();
const server = http.createServer(app);
const wss = new WebSocket.Server({ server });

// Configurer les routes, middleware, etc. pour votre application Express

// Lancer le serveur WebSocket
server.listen(37209, '0.0.0.0', () => {
    console.log('Server running on http://docketu.iutnc.iut-lorraine.fr:37209');
});

// Gérer les connexions WebSocket
wss.on('connection', (ws) => {
    // Logique de gestion des connexions WebSocket
});
