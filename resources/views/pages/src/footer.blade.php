<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    $(document).ready(function(){


        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();
        
        // Select/Deselect checkboxes
        var checkbox = $('table tbody input[type="checkbox"]');
        $("#selectAll").click(function(){
            if(this.checked){
                checkbox.each(function(){
                    this.checked = true;                        
                });
            } else{
                checkbox.each(function(){
                    this.checked = false;                        
                });
            } 
        });
        checkbox.click(function(){
            if(!this.checked){
                $("#selectAll").prop("checked", false);
            }
        });
    });
    </script>


<script>



    function add(){
        
        $.ajax({
            type: 'post',
            dataType: 'json',
            data: {
                name: $('#name').val(),
                email: $('#email').val(),
                address: $('#address').val(),
                phone: $('#phone').val(),
            },
            url: `{{url('employe/add')}}`,
            success: function(data){
                // console.log(data.success);
                $('#addEmployeeModal').modal('hide');
                $('#name').val(' ');
                $('#email').val(' ');
                $('#address').val(' ');
                $('#phone').val(' ');

                const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 icon: 'success', 
                 showConfirmButton: false,
                 timer: 3000 
           })
           if ($.isEmptyObject(data.error)) {
                   
                   Toast.fire({
                   type: 'success',
                   title: data.success, 
                   })
           }else{
              
          Toast.fire({
                   type: 'error',
                   icon: 'error',
                   title: data.error, 
                   })
               }

            }, error: function(jqXHR, textStatus, errorThrown) {
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        })
   
   }


   function allemployer(){
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: `{{url('/all/employer')}}`,
        success: function(data){
            
            var rows = '';
            $.each(data.success,function(key,value){

                rows += `
                <tr>
						<td>${value.name}</td>
						<td>${value.email}</td>
						<td>${value.address}</td>
						<td>${value.phone}</td>
						<td>
							<a href="#editEmployeeModal" onclick="edit(${value.id})" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" onclick="employedelete(${value.id})" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
                `



            })

            $('#show_data').html(rows);
        }
    })
   }
   allemployer();


   function edit(id){

    $.ajax({
        type: 'get',
        dataType: 'json',
        url:`{{url('get/employer/${id}')}}`,
        success:function(data){

            $('#id').val(data.success.id);
            $('#edit_name').val(data.success.name);
            $('#edit_email').val(data.success.email);
            $('#edit_address').val(data.success.address);
            $('#edit_phone').val(data.success.phone);
        }
    })
   }

   function update(){

    $.ajax({
            type: 'post',
            dataType: 'json',
            data: {
                id : $('#id').val(),
                name: $('#edit_name').val(),
                email: $('#edit_email').val(),
                address: $('#edit_address').val(),
                phone: $('#edit_phone').val(),
            },
            url: `{{url('employe/update')}}`,
            success: function(data){
                // console.log(data.success);
                $('#editEmployeeModal').modal('hide');
                allemployer();


                const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 icon: 'success', 
                 showConfirmButton: false,
                 timer: 3000 
           })
           if ($.isEmptyObject(data.error)) {
                   
                   Toast.fire({
                   type: 'success',
                   title: data.success, 
                   })
           }else{
              
          Toast.fire({
                   type: 'error',
                   icon: 'error',
                   title: data.error, 
                   })
               }

            }, error: function(jqXHR, textStatus, errorThrown) {
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        })

   }


   function employedelete(id){
        // alert(id);
        $('#deleteid').val(id);
   }

   function destroy(){
    $.ajax({
        type: 'post',
        dataType: 'json',
        data: {
            id: $('#deleteid').val(),
        },            
        url: `{{url('employe/delete')}}`,
        success: function(data){
                // console.log(data.success);
                allemployer();
                $('#deleteEmployeeModal').modal('hide');


                const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 icon: 'success', 
                 showConfirmButton: false,
                 timer: 3000 
           })
           if ($.isEmptyObject(data.error)) {
                   
                   Toast.fire({
                   type: 'success',
                   title: data.success, 
                   })
           }else{
              
          Toast.fire({
                   type: 'error',
                   icon: 'error',
                   title: data.error, 
                   })
               }

            }, error: function(jqXHR, textStatus, errorThrown) {
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
    })
   }

</script>










</body>
</html>