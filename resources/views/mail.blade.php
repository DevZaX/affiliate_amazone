
<h1>Bonjour</h1>

<p>vous avez un nouvelle email: voir les detailles: </p>

<style>
	.grey{
		background-color: #CCC;
		padding:5px;
	}
</style>
<div class="container  grey" >
  <table class="table">
      <tr><td>Nom:</td><td>{{ $names}}</td></tr>
      <tr><td>Email:</td><td>{{ $emails}}</td></tr>
      <tr><td>Subject:</td><td>{{ $subjects}}</td></tr>
       <tr><td>Message:</td><td>{{ $messages}}</td></tr>
  </table>
</div>

<p>Cordialement.</p>
