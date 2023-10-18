{
  "openapi": "3.0.0",
  "info": {
    "title": "Gestion des utilisateurs API",
    "version": "1.0.0",
    "description": "Cette API permet de gérer les utilisateurs."
  },
  "paths": {
    "/users": {
      "get": {
        "summary": "Obtenir tous les utilisateurs",
        "responses": {
          "200": {
            "description": "Récupérer la liste de tous les utilisateurs"
          }
        }
      },
      "post": {
        "summary": "Créer un nouvel utilisateur",
        "requestBody": {
          "description": "Données pour créer un nouvel utilisateur",
          "content": {
            "application/json": {
              "schema": {
                "type": "object",
                "properties": {
                  "name": {
                    "type": "string"
                  },
                  "email": {
                    "type": "string"
                  }
                }
              }
            }
          }
        },
        "responses": {
          "201": {
            "description": "Nouvel utilisateur créé avec succès"
          },
          "400": {
            "description": "Requête incorrecte (mauvaises données)"
          }
        }
      }
    },
    "/user.php": {
      "get": {
        "summary": "Obtenir les informations d'un utilisateur par ID",
        "parameters": [
          {
            "name": "id",
            "in": "query",
            "required": true,
            "schema": {
              "type": "integer"
            }
          }
        ],
        "responses": {
          "200": {
            "description": "Récupérer les informations de l'utilisateur"
          },
          "400": {
            "description": "Requête incorrecte (ID invalide)"
          },
          "404": {
            "description": "Utilisateur non trouvé"
          }
        }
      }
    },
    "/users/{id}": {
      "delete": {
        "summary": "Supprimer un utilisateur par ID",
        "parameters": [
          {
            "name": "id",
            "in": "path",
            "required": true,
            "schema": {
              "type": "integer"
            }
          }
        ],
        "responses": {
          "200": {
            "description": "Utilisateur supprimé avec succès"
          },
          "400": {
            "description": "Requête incorrecte (ID invalide)"
          }
        }
      },
      "put": {
        "summary": "Mettre à jour un utilisateur par ID",
        "parameters": [
          {
            "name": "id",
            "in": "path",
            "required": true,
            "schema": {
              "type": "integer"
            }
          }
        ],
        "requestBody": {
          "description": "Nouvelles données pour mettre à jour un utilisateur",
          "content": {
            "application/json": {
              "schema": {
                "type": "object",
                "properties": {
                  "name": {
                    "type": "string"
                  },
                  "email": {
                    "type": "string"
                  }
                }
              }
            }
          }
        },
        "responses": {
          "200": {
            "description": "Utilisateur mis à jour avec succès"
          },
          "400": {
            "description": "Requête incorrecte (ID invalide ou mauvaises données)"
          }
        }
      }
    }
  }
}
