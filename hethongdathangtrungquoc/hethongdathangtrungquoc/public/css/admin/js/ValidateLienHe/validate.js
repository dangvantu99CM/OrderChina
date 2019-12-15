const min_length = 1;
const max_length = 255;
let arrayValidation = [];
// tao ra doi tuong validation
// voi ham tao init, ham kich hoat generate
const validation = {
	init:function(arrFields){
		arrayValidation = arrFields;
		this.generate();
	},
	
	generate:function(){
		const that = this;
		for(const field of arrayValidation){
			const fieldElement = this.getElement(field.selector);
			console.log(field.selector);
			if(fieldElement != null){
				fieldElement.onfocus = function(){
					this.classList.remove('error');
				};
				fieldElement.onblur = function(){
					that.checkFieldError(field);
				};
				const messageAdd = document.createElement('p');
				messageAdd.className = 'input-message';
				const message = this.getMessage(field);
				const messageNode = document.createTextNode(message);
				messageAdd.appendChild(messageNode);
				fieldElement.parentElement.appendChild(messageAdd);
			}
			
			
		}
		//console.log(this.noError());
	},
	getMessage:function(field){
		let message = 'Enter ' + field.name + ' of ' + 'your '; 
		if(field.type === 'number'){
			message += ', number only';
		}
		if(field.min){
			message += ', mimximum ' + field.min + ' character';
		}
		if(field.max){
			message += ', maximum ' + field.max + ' character';
		}
		return message;
	},
	getElement:function(selector){
		const element = document.querySelector(selector);
		return element;
	},
	checkAllError:function(arrayValidation){
		for(const field of arrayValidation){
			if(!this.checkFieldError(field)){
				return false;
			}
		}
		return true;
	},
	noError:function(){
		return !this.checkAllError(arrayValidation);
	},
	checkFieldError:function(field){
		const element = this.getElement(field.selector);
		const valid = this[field.type](element.value,field.min,field.max);
		if(!valid){
			element.classList.add('error');
			return true;
		}else{
			element.classList.remove('error');
		}
		return false;
	},
	
	number:function(value,min=min_length,max=max_length){
		const isNumber = !!value && !isNaN(value);
		const length = value.length;
		return isNumber && length >= min && length <= max;
	},
	text:function(value,min=min_length,max=max_length){
		return value.length >= min && value.length <= max;
	},
	email:function(value,min=min_length,max=max_length){
		const emailFormat = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/ ;
		return emailFormat.test(value);
	}
	
	
	
}


