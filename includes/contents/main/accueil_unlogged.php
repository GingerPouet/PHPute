<div id="gauche">
	<p> Bienvenue sur <nom du site>, <br/>
	ici, nous vous proposons un ensemble de quizz cr�es par les utilisateurs. <br/>
	Pour participer et b�n�ficier des services de ce site, vous devez �tre enregistr�. <br/>
	Si c'est d�j� fait, vous n'avez qu'� vous connecter pour profiter plainement de nos services. 
	Si ce n'est pas encore le cas, n'attendez pas et rejoignez la communaut� de <nom du site>. <br/>
	Bon quizz ! </p>

	<h1>Connexion</h1>
			<form id="login-form" method="post" action="<!--A COMPLETER !!!!!!-->">
				<label>Email</label><input type="text" name="log_mail" value="" /><br/>
				<label>Password</label><input type="password" name="log_password" value="" /><br/>
				<input type="submit" value="Se connecter" />  <!--oublie de mdp voir site du z�ro-->
			</form>

			<h1>Inscription</h1>
			<form id="inscription-form" method="post" action="<!--A COMPLETER !!!!!!-->">
				<label>Nom </label><input type="text" name="firstname" id="firstName"/><br/>
				<label>Pr�nom </label><input type="text" name="name" id="name"/><br/>
				<label>Nom d'utilisateur (il vous serivra de login) </label><input type="text" name="login" id="login"/><br/>
				<label>Date de naissance </label><input type="text" name="birthday" value="YYYY-MM-DD" id="birthday"/><br/>
				<label>Sexe </label><input type= "radio" name="sex" value="homme" class="sex"> H
									<input type= "radio" name="sex" value="femme" class="sex"> F<br/>
				<label>Email </label><input type="text" name="adresse mail" id="mail" /><br/>			
				<label>Mot de passe </label><input type="password" name="password" id="password"/><br/>
				<label>Confirmer le mot de passe </label><input type="confirm_password" name="confirm_password" id="confirm_password"/><br/>
				<input type="submit" value="Inscription" />
			</form>
</div>

	
	