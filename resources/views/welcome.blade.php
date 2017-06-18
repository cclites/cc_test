<!DOCTYPE html>
<html>
    <head>
        <title>CC_TEST</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            
            <div class="panel">
            	
            	<form action="post" method="post">
            		
        		  <div class="form-group">
			        <label for="name">Product Name:</label>
			        <input type="name" class="form-control" id="name">
			      </div>
            		
            		
            	  <div class="form-group">
			        <label for="quantity">Quantity:</label>
			        <input type="quantity" class="form-control" id="quantity">
			      </div>
			      
			      <div class="form-group">
			        <label for="price">Price:</label>
			        <input type="price" class="form-control" id="price">
			      </div>
            		
            	</form>
            	
            </div>
            
            <div class="panel">
            	
            	<?php
            	
            	   $path = '/cc_test/public/data.json';
			       $file = file_get_contents($path);
            	
            	?>
            	
            	<table>
            		<thead>
            			<tr>
            				<th>Product Name:</th>
            				<th>Quantity in Stock:</th>
            				<th>Price Per Item</th>
            				<th>Submitted:</th>
            				<th>Total:</th>
            			</tr>
            		</thead>
            		<tbody>
            			
        				@foreach($file as $f)
        	            <tr>
        	  			<?php $f = json_decode($f); ?>
        	  
        	            {{-- 
        	              will probably need to cast quantity and price to doubles	
        	            --}}
        	  
        	            <td>{{ $f->name }}</td>
        	            <td>{{ $f->quantity}}</td>
        	            <td>{{ $f->price }}</td>
        	            <td>{{ $f->submitted}}</td>
        	            <td>{{ ($f->submitted * $f->price) }}</td>
        	            </tr>
        				@endforeach
            				
            			
            		</tbody>
            		
            		
            	</table>
            	
            	
            	
            </div>
            
        </div>
        
        
        
        <!-- JavaScripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		
		<script src="/cc_test/public/js/js.js"></script>

        
    </body>
</html>
