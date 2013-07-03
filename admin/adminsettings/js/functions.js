
	function isDigit(num) {
		if (num.length>1){return false;}
		var string="1234567890";
		if (string.indexOf(num)!=-1){return true;}
		return false;
		}
		
	function isBlank(val){
		if(val==null){return true;}
		for(var i=0;i<val.length;i++) {
			if ((val.charAt(i)!=' ')&&(val.charAt(i)!="\t")&&(val.charAt(i)!="\n")&&(val.charAt(i)!="\r")){return false;}
			}
		return true;
		}
		
	function isInteger(val){
		if (isBlank(val)){return false;}
		for(var i=0;i<val.length;i++){
			if(!isDigit(val.charAt(i))){return false;}
		}
		return true;
		}
