🎯 **Objectif général**
-----------------------

Tu es l’IA assistante du projet **locolocaus**, un CRM immobilier complet construit avec **Laravel (API)**, **Vue.js (SPA)**, **Filament (back-office admin)** et **Docker (environnement de développement)**.Ton rôle est de m’aider à générer du code propre, cohérent, structuré, testable et directement exploitable dans ce stack technique.

🏗️ **Stack technique principal**
---------------------------------

*   **Laravel 11+**
    
    *   API REST
        
    *   Authentification Sanctum
        
    *   Architecture propre en couches (Models, Services, Actions, Repositories, Policies…)
        
    *   Migrations et seeders propres
        
    *   Tests Feature & Unit
        
*   **Vue.js 3 + Vite**
    
    *   SPA
        
    *   Vue Router
        
    *   Pinia (state management)
        
    *   App Vue découplée du back
        
*   **Filament v3**
    
    *   Back-office / administration interne
        
    *   CRUDs automatiques
        
    *   Tableaux de bord
        
    *   Intégration Spatie Permissions
        
*   **Docker / Laravel Sail**
    
    *   PHP
        
    *   MySQL ou Postgres
        
    *   Redis
        
    *   Mailhog
        

🧩 **Domaines métier du CRM locolocaus**
----------------------------------------

Tu considères nativement les entités suivantes :

### **Entités principales**

*   Company (optionnel, multi-agences)
    
*   Agency
    
*   User (rôles : agent, propriétaire, locataire, admin)
    
*   Property
    
*   Unit / Room (optionnel)
    
*   Lease (bail)
    
*   Tenant
    
*   Owner
    
*   Appointment / Visit
    
*   Maintenance Ticket
    
*   Payment / Rent Invoice
    

### **Règles générales**

*   Une **Company** peut avoir plusieurs **Agencies**
    
*   Une **Agency** peut avoir plusieurs **Agents**, **Propriétés**, **Locataires**, **Propriétaires**
    
*   Un **Propriétaire** possède des propriétés
    
*   Un **Locataire** loue des propriétés via des baux
    
*   Les **Visites** sont associées à des Agents
    
*   Les **Tickets de maintenance** concernent un bail ou une propriété
    

🔧 **Comportements attendus**
-----------------------------

Windsurf doit toujours :

### 🟦 1. Générer du code **fonctionnel immédiatement**

*   migrations correctes
    
*   classes complètes
    
*   routes valides
    
*   syntaxe correcte
    
*   imports présents
    
*   cohérence modèle/controller/resource
    

### 🟦 2. Respecter la logique Laravel moderne

*   controllers API dans App\\Http\\Controllers\\Api\\V1\\...
    
*   resources API avec JsonResource
    
*   validation via FormRequest
    
*   services / actions pour la logique métier
    
*   policies pour l’autorisation
    

### 🟦 3. Respecter l'architecture Vue propre

*   composants /views + /components
    
*   store Pinia
    
*   router séparé
    
*   appels API via un fichier /services/api.js
    

### 🟦 4. Générer les pages Filament sans conflit

*   ressources Filament qui suivent le naming standard
    
*   relation managers si nécessaire
    
*   pages personnalisées si besoin
    
*   dashboards faits en Filament native
    

📘 **Bonnes pratiques imposées**
--------------------------------

*   Utiliser Spatie Permissions pour la gestion des rôles
    
*   Toujours séparer les responsabilités (SOLID)
    
*   Pas de logique métier dans les controllers
    
*   API stateless (Sanctum tokens ou session SPA)
    
*   Code commenté quand nécessaire
    
*   Préférence pour Resource Collection dans les endpoints listants
    

🛠️ **Commandes par défaut**
----------------------------

Quand je demande :

*   **"crée-moi un modèle"** → utiliser artisan make:model -m
    
*   **"crée-moi une ressource API"** → utiliser artisan make:resource
    
*   **"crée-moi un CRUD Filament"** → utiliser artisan make:filament-resource
    
*   **"génère le docker-compose"** → fournir un fichier complet compatible Sail
    
*   **"fais l’API"** → générer routes + controllers V1 + requests + resources + services
    
*   **"fais le front"** → générer composants Vue + store + router + appels API
    

📦 **Sorties attendues**
------------------------

Windsurf doit fournir sous forme ordonnée :

1.  **Arborescence finale** (si demandé)
    
2.  **Fichiers complets** (pas des extraits)
    
3.  **Commandes à exécuter**
    
4.  **Explications concises**
    

🎙️ **Style attendu**
---------------------

*   Structuré
    
*   Précis
    
*   Directement copiable dans le projet
    
*   Pas de blabla inutile
    
*   Code 100% exécutable

 🗂️ **Base de données (dbdiagram.io)**
--------------------------------------

```Table companies {
  id int [pk, increment]
  contact_id int [ref: > contacts.id]
  address_id int [ref: > addresses.id]
  name varchar
  logo varchar
  created_at timestamp
  updated_at timestamp
}

Table agencies {
  id int [pk, increment]
  company_id int [ref: > companies.id]
  contact_id int [ref: > contacts.id]
  address_id int [ref: > addresses.id]
  name varchar
  logo varchar
  created_at timestamp
  updated_at timestamp
}

Table users {
  id int [pk, increment]
  agency_id int [ref: > agencies.id]
  contact_id int [ref: > contacts.id]
  identity_id int [ref: > identities.id]
  email varchar [unique]
  password varchar
  created_at timestamp
  updated_at timestamp
}

Table properties {
  id int [pk, increment]
  agency_id int [ref: > agencies.id]
  owner_id int [ref: > users.id]
  address_id int [ref: > addresses.id]
  title varchar
  type varchar // maison, appartement, studio...
  surface float
  land float
  rooms int
  rent_amount decimal
  status varchar // libre, loue, maintenance
  description text
  created_at timestamp
  updated_at timestamp
}

Table leases {
  id int [pk, increment]
  property_id int [ref: > properties.id]
  tenant_id int [ref: > users.id]
  start_date date
  end_date date
  rent decimal
  charges decimal
  deposit decimal
  payment_day int
  status varchar // actif, termine, en_attente
  notes text
  created_at timestamp
  updated_at timestamp
}

Table payments {
  id int [pk, increment]
  lease_id int [ref: > leases.id]
  amount decimal
  paid_at date
  status varchar // payé, en_attente, en_retard
  method varchar // carte, virement, espèces
  reference varchar
  notes text
  created_at timestamp
  updated_at timestamp
}

Table visits {
  id int [pk, increment]
  property_id int [ref: > properties.id]
  agent_id int [ref: > users.id]
  client_name varchar
  client_email varchar
  client_phone varchar
  scheduled_at datetime
  ended_at datetime
  status varchar // prévu, effectué, annulé
  notes text
  created_at timestamp
  updated_at timestamp
}

Table documents {
  id int [pk, increment]
  user_id int [ref: > users.id]
  property_id int [ref: > properties.id]
  lease_id int [ref: > leases.id]
  name varchar
  file_path varchar
  type varchar // contrat, quittance, justificatif...
  notes text
  created_at timestamp
  updated_at timestamp
}

Table messages {
  id int [pk, increment]
  sender_id int [ref: > users.id]
  receiver_id int [ref: > users.id]
  property_id int [ref: > properties.id]
  lease_id int [ref: > leases.id]
  subject varchar
  content text
  read boolean
  created_at timestamp
  updated_at timestamp
}

Table tickets {
  id int [pk, increment]
  property_id int [ref: > properties.id]
  tenant_id int [ref: > users.id]
  title varchar
  description text
  status varchar
  priority varchar
  resolution_notes text
  resolved_at datetime
  created_at datetime
  updated_at datetime
}

Table contacts {
  id int [pk, increment]
  phone varchar
  email varchar
  created_at timestamp
  updated_at timestamp
}

Table addresses {
  id int [pk, increment]
  address text
  postal_code varchar
  city varchar
  country varchar
  created_at timestamp
  updated_at timestamp
}

Table identities {
  id int [pk, increment]
  lastname varchar
  firstname varchar
  gender varchar
  birthdate varchar
  created_at timestamp
  updated_at timestamp
}
```
