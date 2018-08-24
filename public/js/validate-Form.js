

//Validate personal data 
$("#formPerson").validate({
	event: "blur",
	rules: {
		'document': {
			required:true,
			digits: true, 
			minlength: 7,
			maxlength: 8
		},
		'firstName': {
			required:true, 
			letterswithbasicpunc:true,
			minlength: 5
		},
		'lastName': {
			required:true, 
			letterswithbasicpunc:true,
			minlength: 5
		},
		'birthdate': {
			required:true
		},
		'gender': {
			required:true
		},
		'phone': {
			required:true, 
			digits:true,
			minlength: 11
		},
		'telephone': {
			required:true, 
			digits:true,
			minlength: 11
		},
		'email': {
			required:true, 
			email:true,
			minlength: 5
		},
		'picture': {
			required:true, 
			extension: "jpg|jpeg|png",
			minlength: 5
		},
		'civilStatus': {
			required:true
		},
	},
	messages: {
		document: {
               required: "El campo es requerido",
               minlength: jQuery.validator.format("Debe ingresar almenos {0} digitos!"),
               maxlength: jQuery.validator.format("Debe ingresar un maximo de {0} digitos!"),
               digits: "Ingrese solo numeros"
        },
       	firstName: {
               required: "El campo es requerido",
               minlength: jQuery.validator.format("Debe ingresar almenos {0} caracteres!"),
               letterswithbasicpunc: "Ingrese solo letras",
               extension: "La extencion del archivo no es valida"
        },
        lastName: {
               required: "El campo es requerido",
               minlength: jQuery.validator.format("Debe ingresar almenos {0} caracteres!"),
               letterswithbasicpunc: "Ingrese solo letras",
        },
        phone: {
               required: "El campo es requerido",
               minlength: jQuery.validator.format("Debe ingresar almenos {0} caracteres!"),
               digits: "Ingrese solo numeros",
        },
        telephone: {
               required: "El campo es requerido",
               minlength: jQuery.validator.format("Debe ingresar almenos {0} caracteres!"),
               digits: "Ingrese solo numeros",
        },
       	picture: {
               required: "El campo es requerido",
               extension: "La extencion del archivo no es valida"
        }
    },
	debug: true,
	errorClass: "invalid",
	submitHandler: function(form){
		$('#formPerson').submit();
	}
});

//Validate address data 
$('#formAddress').validate({
	event: "blur",
	rules: {
		'country':{
		required:true
		},
		'city':{
			required:true
		},
		'estate':{
			required:true
		},
		'municipality':{
			required:true
		},
		'parish':{
			required:true
		},
		'sector':{
			required:true,
			minlength:5,
		},
		'street':{
			required:true,
			minlength:5,
		},
		'dwelling':{
			required:true,
			minlength:5,
		}
	},
	messages: {
		country: {
               required: "El campo es requerido"
        },
       	city: {
               required: "El campo es requerido"
               
        },
        estate: {
               required: "El campo es requerido"
        },
        municipality: {
               required: "El campo es requerido"
        },
        parish: {
               required: "El campo es requerido"
        },
       	sector: {
               required: "El campo es requerido",
               minlength: jQuery.validator.format("Debe ingresar almenos {0} caracteres!"),
        },
       	street: {
               required: "El campo es requerido",
               minlength: jQuery.validator.format("Debe ingresar almenos {0} caracteres!"),
        },
       	dwelling: {
               required: "El campo es requerido",
               minlength: jQuery.validator.format("Debe ingresar almenos {0} caracteres!"),
        }
    },
	debug: true,
	errorClass: "invalid",
	submitHandler: function(form){
		$('#formAddress').submit();
	}
});

//Validate study data 
$('#formStudy').validate({
	event: "blur",
	rules: {
		'instruction':{
			required:true
		},
		'grade':{
			required:true,
			minlength: 5,
            letterswithbasicpunc:true
		},
		'egressDate':{
			required:true
		},
		'picture':{
			required:true,
			extension: "jpg|jpeg|png"
		}
	},
	messages: {
		instruction: {
            required: "El campo es requerido"
        },
       	grade: {
            required: "El campo es requerido",
            minlength: jQuery.validator.format("Debe ingresar almenos {0} caracteres!"),
            letterswithbasicpunc: "Ingrese solo letras",
               
        },
        egressDate: {
            required: "El campo es requerido"
        },
        picture: {
            extension: "La extencion del archivo no es valida"
        }
    },
	debug: true,
	errorClass: "invalid",
	submitHandler: function(form){
		$('#formStudy').submit();
	}
});

//Validate formation data 
$('#formFormation').validate({
	event: "blur",
	rules: {
		'type':{
			required:true
		},
		'endingDate':{
			required:true,
			minlength: 5,
            letterswithbasicpunc:true
		},
		'description':{
			required:true,
			minlength: 5,
            letterswithbasicpunc:true
		},
		'hours':{
			required:true
		},
		'picture':{
			extension: "jpg|jpeg|png"
		}
	},
	messages: {
		instruction: {
            required: "El campo es requerido"
        },
       	grade: {
            required: "El campo es requerido",
            minlength: jQuery.validator.format("Debe ingresar almenos {0} caracteres!"),
            letterswithbasicpunc: "Ingrese solo letras"
        },
        description: {
            required: "El campo es requerido",
            minlength: jQuery.validator.format("Debe ingresar almenos {0} caracteres!"),
            letterswithbasicpunc: "Ingrese solo letras"
        },
        egressDate: {
            required: "El campo es requerido"
        },
        picture: {
            required: "El campo es requerido",
            extension: "La extencion del archivo no es valida"
        }
    },
	debug: true,
	errorClass: "invalid",
	submitHandler: function(form){
		$('#formFormation').submit();
	}
});


//Validate family data 
$('#formFamily').validate({
	event: "blur",
	rules: {
		'document':{
			required:true,
			document: true, 
			minlength: 7,
			maxlength: 10
		},
		'firstName':{
			required:true,
			minlength: 5,
            letterswithbasicpunc:true
		},
		'lastName':{
			required:true,
			minlength: 5,
            letterswithbasicpunc:true
		},
		'birthdate':{
			required:true
		},
		'gender':{
			required:true
		},
		'civilStatus':{
			required:true
		},
		'kin':{
			required:true
		}
	},
	messages: {
		document: {
            required: "El campo es requerido",
			minlength: jQuery.validator.format("Debe ingresar almenos {0} digitos!"),
			maxlength: jQuery.validator.format("Debe ingresar un maximo de {0} digitos!"),
			document: "Ingrese solo numeros"
        },
       	firstName: {
            required: "El campo es requerido",
            minlength: jQuery.validator.format("Debe ingresar almenos {0} caracteres!"),
            letterswithbasicpunc: "Ingrese solo letras"
        },
        lastName: {
            required: "El campo es requerido",
            minlength: jQuery.validator.format("Debe ingresar almenos {0} caracteres!"),
            letterswithbasicpunc: "Ingrese solo letras"
        },
        birthdate: {
            required: "El campo es requerido"
        },
        gender: {
            required: "El campo es requerido",
            extension: "La extencion del archivo no es valida"
        },
        civilStatus: {
            required: "El campo es requerido",
            extension: "La extencion del archivo no es valida"
        },
        kin: {
            required: "El campo es requerido",
            extension: "La extencion del archivo no es valida"
        }
    },
	debug: true,
	errorClass: "invalid",
	submitHandler: function(form){
		$('#formFamily').submit();
	}
});

