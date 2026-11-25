# Adesso

Un agenda pour les distrait-es.

*Adesso* : « maintenant », en italien.

Une appli toute simple pour les personnes que le temps surprend : elle dit **ce qui vient, et quand partir**.

## Principes

1. **Le prochain rendez-vous, en grand.** Le temps qui reste, dit comme une durée (« Pars dans 1 h 20 ») plutôt qu'une heure à calculer.
2. **L'heure de départ.** Avec un trajet, Adesso compte jusqu'au moment de partir, et affiche « C'est l'heure de partir », en vert forêt avec un petit marcheur, quand le moment est venu.
3. **Pas d'alarme imposée.** Adesso ne fait pas sonner le téléphone (sur iPhone, une appli web ne le peut pas sans serveur) : il rappelle l'heure à mettre en alerte dans le Calendrier.

## Comment ça marche

- **Rendez-vous** : quoi, jour, heure, durée et trajet (facultatif).
- **Prochain** : la carte du haut montre le prochain rendez-vous (ou celui en cours, « Encore 50 min »), et rappelle « Pense à l'alerte dans ton Calendrier : départ à 14 h 40 ». Les suivants sont listés par jour ; les toucher montre Modifier, Supprimer.
- **Circonstances** (« + Circonstance ») : une grève, une tempête… avec des dates et un temps en plus sur les trajets. Ces jours-là, l'heure de départ avance d'elle-même (la circonstance la plus longue compte, elles ne s'additionnent pas), et un bandeau le rappelle en haut.
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
