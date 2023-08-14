function cargarMsj(){
	alertify
	.alert("Usuario o contraseña incorrectos", function(){
	alertify.error('Error Usuario o Contraseña');
	});
}
function errorllenado(){
	alertify
	.alert("Llene los espacios solicitados", function(){
	alertify.error('Llenar espacios');
	});
}
function borrar(id){
    alertify.confirm("¿Seguro que quiere eliminar el registro?",
    function(){
    //alertify.success('Ok'); 
    window.location.href="elim_reg_comid.php?del="+id;        
    },
    function(){
      alertify.error('Cancel');
    });
 }
 function deshabilitar(id){
    alertify.confirm("¿Seguro que quiere deshabilitar el registro?",
    function(){
    //alertify.success('Ok'); 
    window.location.href="deshab_reg_comid.php?del="+id;        
    },
    function(){
      alertify.error('Cancel');
    });
 }
 function habilitar(id){
    alertify.confirm("¿Seguro que quiere Habilitar el registro?",
    function(){
    //alertify.success('Ok'); 
    window.location.href="hab_reg_comid.php?del="+id;        
    },
    function(){
      alertify.error('Cancel');
    });
 }
 function deshabilitarBeb(id){
    alertify.confirm("¿Seguro que quiere deshabilitar el registro?",
    function(){
    //alertify.success('Ok'); 
    window.location.href="deshab_reg_bebida.php?del="+id;        
    },
    function(){
      alertify.error('Cancel');
    });
 }
 function habilitarBeb(id){
    alertify.confirm("¿Seguro que quiere Habilitar el registro?",
    function(){
    //alertify.success('Ok'); 
    window.location.href="hab_reg_bebida.php?del="+id;        
    },
    function(){
      alertify.error('Cancel');
    });
 }
 function deshabilitarPer(id){
    alertify.confirm("¿Seguro que quiere deshabilitar el registro?",
    function(){
    //alertify.success('Ok'); 
    window.location.href="deshab_reg_personal.php?del="+id;        
    },
    function(){
      alertify.error('Cancel');
    });
 }
 function habilitarPer(id){
    alertify.confirm("¿Seguro que quiere Habilitar el registro?",
    function(){
    //alertify.success('Ok'); 
    window.location.href="hab_reg_personal.php?del="+id;        
    },
    function(){
      alertify.error('Cancel');
    });
 }
