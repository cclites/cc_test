const cc = {
	
	getUpdatedList: function(){
		
		var record = new utils.requestObject('fetch', 'GET', cc.success, cc.failure, null);
		
		su.asynch(record);
		
	},
	
	success: function(data){
		
		if(!data) return;
		
		$("tbody").empty();
		
		for(var i=0; i< data.length; i += 1){
			
			var str = "<tr>" +
			          "<td>" + data[i].name + "</td>" +
			          "<td>" + data[i].quantity + "</td>" +
			          "<td>" + data[i].price + "</td>" +
			          "<td>" + data[i].submitted + "</td>" +
			          "<td>" + (data[i].quantity * data[i].price) + "</td>" +
			          "</tr>";
			          
			$("tbody").append(str);
			
		}
		
	},
	
	failure: function( a, b, c){
		//swallow for now
	}
	
};

const utils = {
    
    asynch: function(request) {
	
            var typeFlag = request.type;

            $.ajax({
                    type : typeFlag,
                    url : request.url,
                    success : request.success,
                    error : request.failure,
                    data : request.data,
                    dataType : "json",
                    statusCode : {
                            404 : function(xhr, type, exception) {
                                console.log("404 error");
                            },
                            400 : function(xhr, type, exception) {
                                console.log("400 error");
                            },
                            410 : function(xhr, type, exception) {
                                console.log("410 error");
                            },
                            500 : function(xhr, type, exception) {
                            	console.log(JSON.stringify(xhr));
                            	console.log(JSON.stringify(type));
                            	console.log(JSON.stringify(exception));
                                console.log("500 error");
                            }
                    }
            }).always(function() {
            	
            });
    },
	
    requestObject: function(url, type, success, failure, data) {
            this.url = url;
            this.type = type;
            this.success = success;
            this.failure = failure;
            this.data = data;
            
            return this;
    },
    
};

$(function(){
	
	setTimeout("cc.getUpdatedList", 2000);
	
});
