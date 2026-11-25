# Adesso

Un agenda pour les distrait-es.

*Adesso* : « maintenant », en italien.

Une appli toute simple pour les personnes que le temps surprend : elle dit **ce qui vient, et quand partir**.

## Principes

1. **Le prochain rendez-vous, en grand.** Le temps qui reste, dit comme une durée (« Pars dans 1 h 20 ») plutôt qu'une heure à calculer.
2. **L'heure de départ.** Avec un trajet, Adesso compte jusqu'au moment de partir, et affiche « C'est l'heure de partir », en vert forêt avec un petit marcheur, quand le moment est venu.
3. **Le téléphone sonne.** Une appli qu'il faut penser à ouvrir ne suffit pas : chaque rendez-vous peut être ajouté à l'agenda du téléphone, avec une alerte au moment de partir.

## Comment ça marche

- **Rendez-vous** : quoi, jour, heure, durée, trajet (facultatif), quand l'alerte de départ doit sonner (au moment de partir, ou 10 min, 30 min, 1 h avant), et un rappel en plus facultatif (2 h avant, le matin même à 8 h, la veille à 20 h). Deux alertes au maximum par rendez-vous.
- **Prochain** : la carte du haut montre le prochain rendez-vous (ou celui en cours, « Encore 50 min »). Les suivants sont listés par jour ; les toucher montre Alerte, Modifier, Supprimer.
- **Alerte au téléphone** : Adesso fabrique sur le téléphone un événement de calendrier (.ics) avec ses alarmes, et le confie au téléphone : sur iPhone par la feuille de partage (choisir le Calendrier), ailleurs par un téléchargement. C'est le Calendrier qui sonne, même Adesso fermée. Rien ne passe par un serveur.
- **Circonstances** (« + Une circonstance ») : une grève, une tempête… avec des dates et un temps en plus sur les trajets. Ces jours-là, l'heure de départ avance d'elle-même (la circonstance la plus longue compte, elles ne s'additionnent pas), un bandeau le rappelle en haut, et une alerte déjà ajoutée au téléphone est signalée « à refaire ».
- **Trois boutons égaux** : « + Rendez-vous », « + À faire », « + Circonstance ».
- **À faire** : une simple liste, sans échéance. Une tâche cochée disparaît le lendemain.
- Les rendez-vous passés depuis plus de 30 jours s'effacent tout seuls.

## Données

Tout reste sur le téléphone (stockage local, préfixe `adesso.`). Pas de serveur, pas de compte, aucun appel extérieur (les polices sont hébergées avec l'appli). Sur iPhone, l'appli installée a son propre stockage : la **sauvegarde** (fichier JSON) sert à changer de téléphone ou à réinstaller.

## Fichiers

- `index.html` : l'appli, avec `VERSION` affichée en bas de l'écran.
- `sw.js` : mise en cache hors connexion — **augmenter `CACHE_NAME` à chaque mise à jour**.
- `manifest.webmanifest`, `icones/`, `polices/`.

## Crédits

- Polices : Fraunces et Atkinson Hyperlegible, licence SIL OFL 1.1 (voir `polices/`).
