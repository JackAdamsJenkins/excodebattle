Vous allez créer le MVC de Code Battle :
	- Possibilité de s'inscrire avec un mail unique et un mot de passe
      - users(id_user, mail_user, pass_user)
	- Possibilité de se connecter
		- Lors de la connexion, vous devez ajouter une case à cocher "se souvenir de moi"
			- Si l'utilisateur ne coche pas la case, le login doit être pour la session en cours
			- Si l'utilisateur coche la case, l'utilisateur doit rester connecté (au moins pour un mois)
	- Possibilité de se déconnecter
	- Possibilité d'avoir un compte administrateur qui peut :
		- Lister les utilisateurs
		- Ajouter un exercice :
			- Titre
			- Consigne
			- Langage
			- Solution
	- Possibilité pour un utilisateur :
		- De choisir un langage
		- De commencer les exercices