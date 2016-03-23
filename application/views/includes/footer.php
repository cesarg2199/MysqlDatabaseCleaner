	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript">
		$( document ).ready(function() {
		    $('#loading').hide();
		});
		function saveTempDatabaseDetails()
		{
			var host = document.getElementById('host').value;
			var user = document.getElementById('username').value;
			var password = document.getElementById('password').value;
			var database = document.getElementById('database').value;

			if(host != '' || user != '' || password != '' || database != '')
			{
				$.ajax({
					type:"POST",
					url:'<?=base_url();?>index.php/lists/saveTempDatabaseDetails',
					data:{host:host, username:user, password:password, database:database},
					success: function(response) {
						if(response == 0)
						{
							alert("Database Connection Established");
						}
						else
						{
							alert("Connection Error");
						}
					}
				});
			}
			else
			{
				alert("Please fill out all the information.");
			}
		}

		function cleanText()
		{
			var uid = document.getElementById('uid').value;
			var col = document.getElementById('col').value;
			var table = document.getElementById('table').value;

			if(uid != '' || col != '' || table != '')
			{
				$.ajax({
					type:"POST",
					url:'<?=base_url();?>index.php/lists/cleanText',
					data:{uid:uid, col:col, table:table},
					beforeSend: function()
					{
						$('#loading').show();
					},
					error: function()
					{
						$('#loading').hide();
						alert("ERROR");
					},
					success: function() 
					{
						$('#loading').hide();
					}
				});
			}
			else
			{
				alert("Please fill out all the information.");
			}
		}
	</script>
</html>