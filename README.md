Contexte du projet
Après une première version fonctionnelle de la plateforme GrandTaxiGo, le client souhaite intégrer de nouvelles fonctionnalités pour améliorer l'expérience utilisateur et la gestion du service. Cette nouvelle phase de développement vise à introduire des outils de gestion avancés pour les administrateurs, un système d'avis et d’évaluation, une meilleure flexibilité dans l’authentification et un module de paiement sécurisé.

​

Authentification améliorée

Connexion via Google et Facebook grâce à Laravel Socialite.
​

Gestion administrative

Un tableau de bord pour les administrateurs permettant de gérer les utilisateurs (chauffeurs et passagers).
Gestion et suivi des trajets avec des statistiques détaillées (nombre de trajets effectués, trajets annulés, revenus générés, etc.).
Outil de supervision des réservations et des disponibilités des chauffeurs.
​

Avis et évaluations

Les passagers peuvent laisser une note et un commentaire après un trajet pour évaluer leur expérience avec le chauffeur.
Les chauffeurs peuvent également noter et commenter les passagers en fonction de leur comportement.
Affichage des avis sur les profils des utilisateurs pour une meilleure transparence.
​

Paiement sécurisé

Intégration du paiement en ligne via Stripe pour permettre aux passagers de régler leurs trajets directement sur la plateforme.
​

Automatisation des disponibilités des chauffeurs

Mise en place d'un système intelligent pour mettre à jour les disponibilités des chauffeurs en fonction de leurs trajets en cours et à venir.
​

Notifications et gestion des réservations

Envoi d’un email au passager lors de l’acceptation de sa réservation, contenant un QR Code avec les informations de la demande.
Amélioration des notifications pour informer en temps réel les utilisateurs des mises à jour concernant leurs réservations.
​

Sécurité et Performance:

Utilisation de PostgreSQL comme base de données principale pour une robustesse et une évolutivité optimales.
Implémentation de la mise en cache pour améliorer les performances et réduire les temps de chargement.
Création de Requests pour valider les données des utilisateurs au niveau des requêtes entrantes.
Assurer la sécurité et l'intégrité des données en appliquant des règles de validation strictes.
Génération de slug pour des URLs conviviales et optimisées pour le référencement.
Intégration de messages flash pour des interactions utilisateur plus conviviales.
