# Robert Challe

Édition XML/TEI des œeuvre de Robert Challe, dirigée par Geneviève Artigas-Menant, Université Paris-Sorbonne, publiée par l’OBVIL.

# Administration

http://obvil.paris-sorbonne.fr/corpus/challe/pull.php<br/>
Avec le mot de passe fixé ci-dessous, appuyez sur le bouton mettre à jour.

Le programme délivrera deux séquences d’informations

* les messages de la mise à jour distante : un git pull.
* la liste des fichiers qui seront transformés, avec si nécessaires les messages d’erreurs (souvent, fichier XML mal formé). La transformation kindle est très exigeante, elle refuse le moindre lien mort.


# Installation web avec accès SSH

La procédure suivante a été testée sur les serveurs OBVIL. Un administrateur averti saura transposer à son architecture.

A l’issue de l’installation décrite plus bas, l’arbre de fichiers aboutira à ceci :

* Livrable/ (pour epub, lecture seule, git clone https://github.com/oeuvres/Livrable.git)
* Teinte/ (publication web, lecture seule, git clone https://github.com/obvil/Teinte)
* challe/ (le corpus, accessible en écriture au serveur apache)
   * _conf.php (source du fichier de configuration)
   * .htaccess (redirections Apache pour URL propres)
   * conf.php (fichier de configuration modifié, avec le mot de passe)
   * index.php (page de publication)
   * pull.php (page d’administration)
   * article/ (dossier généré, les textes)
   * toc/ (dossier généré, les tables des matères)
   * epub/ (dossier généré, livres électroniques format ouvert)
   * kindle/ (dossier généré, livres électroniques format mobi)
   * xml/ (sources XML/TEI des textes)
   * notes/ (spécifique au projet Challe, des notes multimédia)
   
```
# Dans le dossier web de votre serveur hhtp.
# Créer à l’avance le dossier de destination avec les bons droits
mkdir challe
# assurez-vous que le dossier appartient à un groupe où vous êtes
# donnez-vous les droits d’y écrire
# l’option +s permet de propager le nom du groupe dans le dossier
# plus facile à faire maintenant qu’après
chmod g+sw challe
# Aller chercher les sources de cet entrepôt
git clone https://github.com/obvil/challe
# rentrer dans le dossier
cd challe
# donner des droits d’écriture à votre serveur sur ce dossier, ici, l’utilisateur apache
# . permet de toucher les fichiers cachés, et notamment, ce qui est dans .git
sudo chown -R apache .
# copier la conf par défaut 
cp _conf.php conf.php
# modifier le mot de passe 
vi conf.php
```

Dans la ligne<br/>
"pass" => ""<br/>
remplacer null par une chaîne entre guillemets<br/>
"pass" => "MonMotDePasseQueJeNeRetiensJamais"

Aller voir votre site dans un navigateur, ex:
<br/>http://obvil.paris-sorbonne.fr/corpus/challe
<br/>Si aucun texte apparaît, c’est normal, vous êtes invité à visiter la page d’administration
<br/>https://obvil.sorbonne-universite.fr/corpus/challe/pull.php


## Erreurs rencontrées

Dans l’interface web de mise à jour
<br/>error: cannot open .git/FETCH_HEAD: Permission denied
<br/>Problème de droits, Apache ne peut pas écrire dans le dossier git, solution, dans le dossier :
<br/>sudo chown -R apache .

