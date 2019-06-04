<!DOCTYPE html>
<html>
<head>
	<title>Chat App</title>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<!-- development version, includes helpful console warnings -->
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>
<body>
	<h1 align="center">Vue Chat</h1><hr>
	<div class="container">
		<div class="col-md-3">
			<!--This div contain the inputs-->	
			<form method="POST" action="#" id="formdata">
			<label>FirstName</label>
			<input type="text" class="form-control" id="firstname" name="firstname" required>
			<label>LastName</label>
			<input type="text" class="form-control" id="lastname" name="lastname" required>
			<label>Email</label>
			<input type="email" class="form-control" id="email" name="email" required><br>
			<button type="button" id="postajax" name="postajax" class="btn form-control btn-primary">Submit</button>
			</form>		
		</div>
		<div class="col-md-9">
			<!--This div contain the table-->
			<div id="app">
				<customers></customers>
			</div>
			<template id="customer-table">
				<div>
				<p><b>Total users: </b>{{count}}</p>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>FirstName</th>
							<th>LastName</th>
							<th>Email</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="customer in customers">
							<td>{{ customer.firstname }}</td>
							<td>{{ customer.lastname }}</td>
							<td>{{ customer.email }}</td>
						</tr>
					</tbody>
				</table>
			</div>
			</template>
		</div>
	</div>
<script type="text/javascript">
	Vue.component('customers', {
		template: '#customer-table',

		data: function() {
			return{
				customers: []
			}
		},
		computed: {
	    count: function() {
	      return this.customers.length
	    }
  	},
		created: function(){
			this.getCustomers();
		},
		methods: {
			getCustomers(){
				$.getJSON('includes/json.php', function(customers){
					this.customers = customers;
				}.bind(this));

				setTimeout(this.getCustomers, 1000);
			}
		}
	});
	new Vue ({
		el: '#app'
	});

	$( document ).ready(function() {
		$('#postajax').on('click',function(){
			var formData = $('#formdata').serialize();
			$.ajax({
				type: 'POST',
				url: 'includes/post.php',
				data: formData
			})
			.done(function(data){
				console.log(data);
			})
			$("#formdata")[0].reset();
		})
	})
</script>
</body>
</html>