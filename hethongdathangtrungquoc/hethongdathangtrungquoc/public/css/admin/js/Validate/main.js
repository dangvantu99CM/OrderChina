/* global validation */
var loaded = document.addEventListener('DOMContentLoaded',function(){
	
	validation.init([
		{
			selector:'#name',
			name:'name',
			type:'text',
			min:1,
			max:255,
		},
		{
			selector:'#phone',
			name:'Phone-Number',
			type:'number',
			min:1,
			max:12,
		},
		{
			selector:'#address',
			name:'address',
			type:'text',
			min:1,
			max:255,
		},
		{
			selector:'#birthyear',
			name:'birthyear',
			type:'number',
			min:4,
			max:4,
		},
		{
			selector:'#email',
			name:'email',
			type:'email',
			min:1,
			max:255,
		},
		{
			selector:'#title',
			name:'title',
			type:'text',
			min:1,
			max:255,
		},
		{
			selector:'#content',
			name:'content',
			type:'text',
			min:1,
			max:255,
		},
		{
			selector:'#more_content',
			name:'more_content',
			type:'text',
			min:1,
			max:255,
		},
		
	]);
	
	
});
function save_function(){
		if(!validation.noError()){
			return;
		}
};
	