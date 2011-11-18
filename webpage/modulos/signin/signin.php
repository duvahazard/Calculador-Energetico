<div class="signin">
	<h2>Registrarse</h2>
  <p>Favor de llenar los siguientes campos, todos son obligatorios.</p>
  <div id="signin_table">
  	<form action="sql.php?mod=2&act=1" method="post" target="_parent" class="AdvancedForm">
    <table cellpadding="0" cellspacing="0" border="0" width="80%">
    	<tr>
      	<td width="31%">Nombre completo:</td>
        <td width="69%"><input type="text" name="name" class="general" id="name"/></td>
      </tr>
      <tr>
      	<td>Usuario:</td>
        <td><input type="text" name="user" class="general" id="user"/></td>
      </tr>
      <tr>
      	<td>Contrase&ntilde;a:</td>
        <td><input type="password" name="pass" id="pass" class="general"/></td>
      </tr>
      <tr>
      	<td>Repetir contrase&ntilde;a:</td>
        <td><input type="password" name="confirmpass" id="confirmpass" class="general"/></td>
      </tr>
    </table>    
  </div><!-- tabla login -->
  <div>
  	<input type="image" src="images/signin.png" class="signin_btn" border="0" />
  </div><!-- login_boton -->
  </form>
</div>