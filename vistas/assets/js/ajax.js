$(document).ready(function(){
	 $(document).on('click', '#getEmployee', function(e){
     e.preventDefault();
     var empid = $(this).data('id');
	  $('#employee-detail').hide();
     $('#employee_data-loader').show();
     $.ajax({
          url: 'data.php',
          type: 'POST',
          data: 'empid='+empid,
          dataType: 'json',
		  cache: false
     })
     .done(function(data){
          console.log(data.nombre);
          $('#employee-detail').hide();
		  $('#employee-detail').show();
		  $('#empid').html(data.id);
		  $('#emp_name').html(data.nombre);
		  $('#emp_age').html(data.descripcion);
		  $('#emp_salary').html(data.cuerpo);
		  $('#employee_data-loader').hide();
     })
     .fail(function(){
          $('#employee-detail').html('Error, Please try again...');
          $('#employee_data-loader').hide();
     });
    });
});
