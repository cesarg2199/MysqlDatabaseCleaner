<div class="main">
	<div class="container">
		<div class="row">
		  <div class="col-sm-3"></div>
		  <div class="col-sm-8"><h1>Mysql Database Cleaner</h1></div>
		  <div class="col-sm-1"></div>
		</div>
		
			<fieldset class="form-horizontal">

			<!-- Form Name -->
			<legend align="center">Enter Database Information</legend>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="host">Hostname</label>  
			  <div class="col-md-5">
			  <input id="host" name="host" type="text" placeholder="Host" class="form-control input-md">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="username">Username</label>  
			  <div class="col-md-5">
			  <input id="username" name="username" type="text" placeholder="Username" class="form-control input-md">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="password">Password</label>  
			  <div class="col-md-5">
			  <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="database">Database</label>  
			  <div class="col-md-5">
			  <input id="database" name="database" type="text" placeholder="Database" class="form-control input-md">
			    
			  </div>
			</div>

			<!-- Button -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="saveToFile"></label>
			  <div class="col-md-4">
			    <button id="saveToFile" name="saveToFile" onclick="saveTempDatabaseDetails()" class="btn btn-primary">Set Database</button>
			  </div>
			</div>

			</fieldset>
		
			<fieldset class="form-horizontal">

			<!-- Form Name -->
			<legend align="center">Table</legend>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="table">Table</label>  
			  <div class="col-md-5">
			  <input id="table" name="table" type="text" placeholder="Table" class="form-control input-md">
			  <span class="help-block">The table that will be cleaned</span>  
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="uid">Unique Identifier</label>  
			  <div class="col-md-5">
			  <input id="uid" name="uid" type="text" placeholder="UID" class="form-control input-md">
			  <span class="help-block">This will be the unique key</span>  
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="column">Column to Clean</label>  
			  <div class="col-md-5">
			  <input id="col" name="col" type="text" placeholder="Clean" class="form-control input-md">
			  <span class="help-block">This will be the column to clean</span>  
			  </div>
			</div>

			<!-- Button -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="clean"></label>
			  <div class="col-md-4">
			    <button id="clean" name="clean" onclick="cleanText()" class="btn btn-success">Clean</button>
			  </div>
			</div>
			</fieldset>
	</div>
</div>