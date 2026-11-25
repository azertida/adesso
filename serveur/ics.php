<?php
/* Adesso — fabrique un événement de calendrier (.ics) avec ses alertes, et le renvoie aussitôt.
   Rien n'est enregistré. Les données arrivent en POST, pour qu'elles n'apparaissent pas
   dans les journaux d'accès du serveur (qui ne gardent que l'adresse appelée). */

header('X-Content-Type-Options: nosniff');
header('Cache-Control: no-store');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); exit('Méthode non permise'); }

$champ = function ($nom, $motif, $max = 200) {
  $v = isset($_POST[$nom]) ? (string)$_POST[$nom] : '';
  if (strlen($v) > $max || !preg_match($motif, $v)) { http_response_code(400); exit('Donnée invalide : ' . $nom); }
  return $v;
};
// Texte libre : une seule ligne, longueur limitée, échappé selon la norme iCalendar.
$texte = function ($nom, $max) {
  $v = isset($_POST[$nom]) ? (string)$_POST[$nom] : '';
  $v = preg_replace('/[\x00-\x1F\x7F]/u', ' ', $v);
  if (mb_strlen($v, 'UTF-8') > $max) $v = mb_substr($v, 0, $max, 'UTF-8');
  return str_replace(['\\', ';', ','], ['\\\\', '\;', '\\,'], $v);
};

$uid     = $champ('uid', '/^[a-z0-9]{4,30}$/', 30);
$debut   = $champ('debut', '/^\d{8}T\d{6}$/', 15);
$fin     = $champ('fin', '/^\d{8}T\d{6}$/', 15);
$alerte1 = $champ('alerte1', '/^\d{1,4}$/', 4);          // minutes avant le début
$alerte2 = $champ('alerte2', '/^(\d{1,4})?$/', 4);       // facultative
$titre   = $texte('titre', 80);
$desc    = $texte('desc', 200);
$msg1    = $texte('msg1', 160);
$msg2    = $texte('msg2', 160);
if ($titre === '') { http_response_code(400); exit('Titre manquant'); }

$stamp = gmdate('Ymd\THis\Z');
$lignes = ['BEGIN:VCALENDAR', 'VERSION:2.0', 'PRODID:-//Adesso//FR', 'CALSCALE:GREGORIAN', 'METHOD:PUBLISH',
  'BEGIN:VEVENT', "UID:$uid@adesso", "DTSTAMP:$stamp", "DTSTART:$debut", "DTEND:$fin", "SUMMARY:$titre"];
if ($desc !== '') $lignes[] = "DESCRIPTION:$desc";
array_push($lignes, 'BEGIN:VALARM', 'ACTION:DISPLAY', 'DESCRIPTION:' . ($msg1 !== '' ? $msg1 : $titre), "TRIGGER:-PT{$alerte1}M", 'END:VALARM');
if ($alerte2 !== '') array_push($lignes, 'BEGIN:VALARM', 'ACTION:DISPLAY', 'DESCRIPTION:' . ($msg2 !== '' ? $msg2 : $titre), "TRIGGER:-PT{$alerte2}M", 'END:VALARM');
array_push($lignes, 'END:VEVENT', 'END:VCALENDAR');

header('Content-Type: text/calendar; charset=utf-8');
header('Content-Disposition: inline; filename="rendez-vous.ics"');
echo implode("\r\n", $lignes) . "\r\n";
