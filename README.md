Device Plan MAS-ICT SVG 1014
============================

Device Plan Mini Project

But du projet : 
1)	Transformer un plan d’étage d’une entreprise en un document SVG comportant des zones (pièces) distinctes.
2)	Lors du survol d’une zone, la zone est mise en évidence.
3)	Permettre l’introduction d’appareils qui pourront être de différent type : « imprimante », « rack », des caractéristiques les concernant seront introduites dans une table.
4)	Ces appareils pourront être localisé sur le plan (x, y) et donc placée sur le plan d’étage (visuellement par une icône).
5)	Lors du survol des icônes des informations seront montrées dans un pop-up, issue d’une base de données.
6)	Lors du survol des zones, les appareils seront mis en évidence.
7)	Les informations concernant les appareils pourront être mis à jour dans l’application, notamment les statuts, qui seront ensuite répercuté sur le plan.


Prérequis:

1)	Un ou plusieurs plans d’étage
2)	Images des appareils (imprimante, rack, ..)
3)	Une base de données contenant des informations sur 
a.	Les plans (plan), titre, géolocalisation, description, plan_img_url, plan_svg_url, largeur, hauteur.
b.	Les zones (area), nom, description, plan (ref)
c.	Les devices, code, description, status (OK, KO), type (printer, rack, other), icone, positionX, positionY, imgOK, imgKO
4)	Fonctions php permettant d’exploiter les données en bases.
