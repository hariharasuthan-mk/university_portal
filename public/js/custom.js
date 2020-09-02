$(document).ready(function() {
    /**/
    optionText = 'Select University'; 
    optionValue = ''; 
    $('select[name="university"]').append(new Option(optionText, optionValue));
    $('select[name="university"]').val('');
    

    $('select[name="university"]').on('change', function(){
        var universityId = $(this).val();
        //alert('hello');alert(universityId);alert('hello');

        if(universityId) {
            $.ajax({
                url: '/department/get/'+universityId,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="depo_id"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="depo_id"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="depo_id"]').empty();
        }   

        
    });

    $('select[name="depo_id"]').on('change', function(){
        var selected = $(this).val();//alert(selected);
        $('input[name="department"]').val(selected);
    }); 

    

    $('select[name="university"]').on('change', function(){
        var universityId = $(this).val();
        //alert('hello');alert(universityId);alert('hello');

        if(universityId) {
            $.ajax({
                url: '/sno/get/'+universityId,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="sno_select"]').empty();

                    $.each(data, function(key, value){

                        //alert('Key'+key);alert('Value'+value);


                        $('select[name="sno_select"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="sno_select"]').empty();
        }   

        
    });  
   
    $('select[name="sno_select"]').on('change', function(){
        var selected = $(this).val();//alert(selected);
        $('input[name="responded"]').val(selected);
    }); 

    
      

    $('select[name="depo_id"]').on('change', function(){
        var selected_depo = $(this).val();
        var selected_univ = $('select[name="university"]').val();        
        //$('input[name="department"]').val(selected);        
        if(selected_depo && selected_univ) {
            //alert(selected_univ);alert(selected_depo);   
            //var all = selected_univ+','+selected_depo;
            //alert(all);           
            $.ajax({
                url: '/getcourse/'+selected_univ+'/'+selected_depo,
                type:"GET",
                dataType:"json",                
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");

                },

                success:function(data) {                    

                    $('select[name="course_box"]').empty();

                    $.each(data, function(key, value){
                        //alert('Key'+key);alert('Value'+value);
                        $('select[name="course_box"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="course_box"]').empty();
        }   

    }); 

    
    $('select[name="depo_id"]').on('change', function(){

        var selected_univ = $('select[name="university"]').val();
        var selected_depo = $('select[name="depo_id"]').val();

        if(selected_depo && selected_univ) {            
            //alert(selected_univ);alert(selected_depo);

            $.ajax({
                url: '/getstudent/'+selected_univ+'/'+selected_depo,
                type:"GET",
                dataType:"json",                
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");

                },

                success:function(data) {                    

                    $('select[name="student_list[]"]').empty();

                    $.each(data, function(key, value){
                        //alert('Key'+key);alert('Value'+value);
                        $('select[name="student_list[]"]').append('<option value="'+ key +'">' + value + '</option>');
                        //$('select[name="student_list[]"] option').prop('selected', true);
                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        }
        else{
             $('select[name="student_list[]"]').empty();
        }
    
    });    
});





