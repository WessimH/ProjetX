# ProjetX

## Description
Ceci est un projet qui a pour but de faire une app web pour faire un reseau social qui repertorie les meilleurs motifs de retards de france.

## Installation
Pour installer le projet, il faut d'abord cloner le projet sur votre machine avec la commande suivante:
```bash
git clone https://github.com/WessimH/ProjetX.git
```
Le projet utulise du machine learning pour faire des recommendations de publications pertinentes pour l'utilisateur. Pour cela, il faut installer les librairies suivantes:
```bash
composer require rubix/ml
```
```bash
composer require rubix/tensor
```
```bash
composer require rubix/knn
```
```bash
composer require rubix/nearest-neighbors
```
```bash
composer require rubix/nearest-neighbors
```
```bash
composer require rubix/nearest-neighbors
```
```bash
composer require rubix/nearest-neighbors
```
pour créer mon sample de machine learning j'ai utulisé l'api  reddit pour récupérer des données. Pour cela, il faut installer le package suivant:
```bash
pip install praw
```

## Documentation

Le systeme de recommendation est basé sur une methode de machine learning qui s'appelle le KNN. Pour plus d'information sur cette methode, cliquez [ici](https://fr.wikipedia.org/wiki/M%C3%A9thode_des_k_plus_proches_voisins).  
Je genere mon sample de machine learning avec l'api reddit.  
Pour plus d'information sur cette api, cliquez [ici](https://praw.readthedocs.io/en/latest/).

La fonction qui permet de faire la recommendation est la suivante:
```php
function recommendation($data, $k, $n, $user)
```
- $data: c'est le sample de machine learning
- $k: c'est le nombre de voisins les plus proches
- $n: c'est le nombre de recommendations
- $user: c'est l'utilisateur pour lequel on veut faire la recommendation
- return: un tableau de recommendations

## Usage
Pour utiliser le projet, il faut d'abord lancer le serveur avec la commande suivante:
```bash
php -S localhost:8000
```
Ensuite, il faut ouvrir le fichier index.php dans votre navigateur.
