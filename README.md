# MVP Gearloop

## Application de création de kits de randonnée

### Vue d'ensemble

Gearloop est un MVP d'une **application communautaire** développée en [Symfony 7](https://symfony.com/) avec pour but de permettre aux randonneurs de créer, gérer et partager leurs compositions d'équipement. L'objectif était d'aider la communauté à optimiser et partager leur matériel en facilitant la planification et le calcul automatique du poids et du coût total de leurs kits.

---

### Fonctionnalités principales

#### Gestion des Kits
- **Calculs automatiques** : Agrégation intelligente des statistiques (poids, prix, répartition par catégorie)
- **Multi-kits** : Création et gestion de plusieurs compositions selon le type d'activité (randonnée journée, bivouac, trek) et la saison
- **Notes personnelles** : Possibilité d'ajout d'annotations sur chaque équipement 

#### Catalogue d'Équipements
- **Base collaborative** : Principe de catalogue d'équipements alimenté par la communauté avec système de validation administrateur
- **Variantes produits** : Gestion fine des déclinaisons (couleurs, tailles, versions) avec poids et prix spécifiques
- **Spécifications techniques** : Stockage flexible en JSONB (PostgreSQL) pour s'adapter aux différents types d'équipements

#### Espace Personnel
- **Profil utilisateur** : Gestion complète du profil avec niveau d'expérience, localisation et avatar
- **Dashboard** : Vue synthétique de ses kits avec statistiques et raccourcis rapides
- **Paramètres sécurisés** : Changement de mot de passe avec validation de l'ancien, suppression de compte

#### Découverte Communautaire
- **Page Explore** : Feed de découverte des kits publics de la communauté avec pagination infinie
- **Filtres intelligents** : Recherche par activité, saison, poids avec URLs bookmarkables

---

### Architecture technique

#### Stack Backend
- **Framework** : Symfony 7
- **Base de données** : PostgreSQL 15

#### Stack Frontend
- **Interactivité** : Hotwire (Turbo Frames + Stimulus) + Symfony UX Live Component
- **Design System** : Tailwind CSS + DaisyUI pour une interface moderne et cohérente

#### Infrastructure
- **Serveur** : FrankenPHP (PHP moderne avec Caddy intégré)
- **Conteneurisation** : Docker Compose pour environnement de développement reproductible
- **Architecture** : Monolithe

---

### Modèle de données

#### Entités principales
```
User
├── Compte (email, password, username, roles)
├── Profil (displayName, bio, location, experienceLevel)
└── Kits (collection)

Kit
├── Métadonnées (nom, type d'activité, saison)
├── Stats (JSONB : poids, prix, breakdown catégories)
└── KitItems (équipements)

Item (produit générique)
├── Informations (marque, modèle, catégorie)
├── Spécifications (JSONB flexible)
└── ItemVariants (déclinaisons)

ItemVariant (variante spécifique)
├── Caractéristiques (poids en grammes, prix)
├── Spécifications (JSONB)
└── Relation vers KitItems
```

---

### Conclusion

Ce projet m'a permis de **me replonger concrètement dans le développement** après une année de césure complète. Cette pause m’a offert du recul sur ma pratique, mais aussi le défi de **retrouver mes réflexes techniques** et de me réapproprier l'écosystème du développement web.

Gearloop a été un excellent terrain d’exercice pour cette reprise : j’y ai **redécouvert Symfony**, dans sa version 7 et ses nouveautés, tout en **revisitant les fondamentaux** du développement backend moderne.

Au-delà de l’aspect technique, ce projet m’a appris **à partir d’un besoin réel pour construire une solution cohérente**, un processus particulièrement motivant pour renouer avec le code.

Aujourd’hui, Gearloop m’a permis de **retrouver pleinement mon niveau** et d’aller plus loin, en explorant de nouvelles pratiques et outils. Ce MVP reste un **work in progress**, mais il constitue déjà une base solide témoignant de ma capacité à concevoir et développer une application web complète, avec rigueur et autonomie.

## License

Gearloop is available under the MIT License.
