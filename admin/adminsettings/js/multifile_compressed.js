// Multiple file selector by Stickman -- http://www.the-stickman.com 
// with thanks to: [for Safari fixes] Luis Torrefranca -- http://www.law.pitt.edu and Shawn Parker & John Pennypacker -- http://www.fuzzycoconut.com [for duplicate name bug] 'neal'
function MultiSelector( list_target, max )
{
	this.list_target = list_target;
	this.count = 0;
	this.id = 0;
	if( max )
	{
		this.max = max;
	} 
	else 
	{
		this.max = -1;
	};
	
	this.addElement = function( element ){
		if( element.tagName == 'INPUT' && element.type == 'file' )
		{
			var file_num_upload = this.id++;
			element.name = 'file_' + file_num_upload;
			var last_file_number = file_num_upload;
	
			element.multi_selector = this;
			element.onchange = function(){
				var new_element = document.createElement( 'input' );

				new_element.type = 'file';
				new_element.size = '35';
				this.parentNode.insertBefore( new_element, this );
				this.multi_selector.addElement( new_element );
				this.multi_selector.addListRow( this );
				this.style.position = 'absolute';
				this.style.left = '-1000px';
				//alert(document.getElementById("last_file_number"));
				document.getElementById("last_file_number").value = last_file_number;
				//alert(document.getElementById("last_file_number").value);
			};
			//if( this.max != -1 && this.count >= this.max )
			if( this.max == -1 || this.count >= this.max )
			{
				element.disabled = true;
			};
			this.count++;
			this.current_element = element;
		} 
		else 
		{
			alert( 'Error: not a file input element' );
		};
	};
	this.addListRow = function( element ){
		var new_row = document.createElement( 'div' );
		var new_row_button = document.createElement( 'input' );
		new_row_button.type = 'button';
		new_row_button.value = 'Delete';
			
		new_row.element = element;
		document.getElementById('files_number').value = this.count;
		number_files = this.count;
		new_row_button.onclick= function(){
		//alert(this.parentNode.element.multi_selector.count--);
		this.parentNode.element.parentNode.removeChild( this.parentNode.element );
			this.parentNode.parentNode.removeChild( this.parentNode );
			this.parentNode.element.multi_selector.count--;
			this.parentNode.element.multi_selector.current_element.disabled = false;
			
			number_files = number_files-1;
			document.getElementById('files_number').value = number_files;
			return false;
			};
		/*Edit Start*/
			var str=element.value;
			istart=1+str.lastIndexOf('\\');
			iend=str.length;
			var disp=str.substring(istart,iend);
		/*Edit End*/
		//new_row.innerHTML = element.value;
		new_row.innerHTML = '&bull; ' + disp + ' ';
		new_row.appendChild( new_row_button );
		this.list_target.appendChild( new_row );
	};
};