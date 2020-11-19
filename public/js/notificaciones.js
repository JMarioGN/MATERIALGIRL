function notificacionesAjax(){ 
$.ajax({ 
url : urlNotificaciones, 
type : 'GET', 
dataType : 'html', 
success : function(respuestaHtml) { $("#divNotificaciones").html(respuestaHtml); }, 
error : function(xhr, status) { console.error('Ocurrió un error: ' + xhr.status+xhr.statusText); } 
}); 
} 
setInterval('notificacionesAjax()',2000); 
