$(document).ready ( function ()
{
   // Tipo de usuario
   if (tokens.includes ("a=al"))
   {
      // Añadimos la clase del usuario
      $("#vista_lista_nuevo").addClass ("green");
      $("#vista_lista_editar").addClass ("green");
      $("#vista_lista_borrar_seleccionados").addClass ("green");
      
      // Cambiamos el color del buscador
      $("#vista_lista_buscador").css ("backgroundColor", "#6AC46E");
      $("#vista_lista_submit").css ("backgroundColor", "#6AC46E");
   }
   else if (tokens.includes ("a=pr"))
   {
      // Añadimos la clase del usuario
      $("#vista_lista_nuevo").addClass ("blue");
      $("#vista_lista_editar").addClass ("blue");
      $("#vista_lista_borrar_seleccionados").addClass ("blue");
      
      // Cambiamos el color del buscador
      $("#vista_lista_buscador").css ("backgroundColor", "#4F81BD");
      $("#vista_lista_submit").css ("backgroundColor", "#4F81BD");
   }
   else
   {
      // Añadimos la clase del usuario
      $("#vista_lista_nuevo").addClass ("purple");
      $("#vista_lista_editar").addClass ("purple");
      $("#vista_lista_borrar_seleccionados").addClass ("purple");
      
      // Cambiamos el color del buscador
      $("#vista_lista_buscador").css ("backgroundColor", "#BA68C8");
      $("#vista_lista_submit").css ("backgroundColor", "#BA68C8");
   }
   
   
});