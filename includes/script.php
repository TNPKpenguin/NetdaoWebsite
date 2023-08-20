<script type="text/javascript">
  $(document).ready(function(){
    var birth = $('date2');
    var provinceObject = $('#province');
    var amphureObject = $('#amphure');
    var districtObject = $('#district');
    var zip_code = $('zip_code');
    var sytem_disease = $('#sytem_disease');
    var name_disease = $('#name_disease');
    var drug_type = $('#drug_type');
    var drug_name = $('#drug_name');

    // on change province
    provinceObject.on('change', function(){
        var provinceId = $(this).val();

        amphureObject.html('<option value="">เลือกอำเภอ</option>');
        districtObject.html('<option value="">เลือกตำบล</option>');

        $.get('includes/get_amphure.php?province_id=' + provinceId, function(data){

          const result = JSON.parse(data);
            $.each(result, function(index, item){
                amphureObject.append(
                    $('<option></option>').val(item.code).html(item.name_th)
                );
            });
        });
    });

    // on change amphure
    amphureObject.on('change', function(){
        var amphureId = $(this).val();

        districtObject.html('<option value="">เลือกตำบล</option>');
        
        $.get('includes/get_district.php?district_code=' + amphureId, function(data){
            var result = JSON.parse(data);
            $.each(result, function(index, item){
                districtObject.append(
                    $('<option></option>').val(item.code).html(item.name_th)
                );
            });
        });
    });

     // on change amphure
     districtObject.on('change', function(){
        var postId = $(this).val();
        
        $.get('includes/get_postcode.php?district_code=' + postId, function(data){
            var result = JSON.parse(data);
            document.getElementById('zip_code').value= result[0].zip_code;
        });
    });

    //on change disease
    sytem_disease.on('change',function(){

        name_disease.html('<option value="">-</option>');

        var id = $(this).val();

        $.get('includes/get_namedisease.php?sym_pos=' + id, function(data){

            const result = JSON.parse(data);

            $.each(result, function(index, item){
                name_disease.append(
                    $('<option></option>').val(item.sym_id).html(item.sym_name)
                );
            });
        });
    })

    //on change disease
    drug_type.on('change',function(){
        var type = $(this).val();

        drug_name.html('<option value="">-</option>');

        $.get('includes/get_namedrug.php?drug_type=' + type, function(data){

        const result = JSON.parse(data);

        $.each(result, function(index, item){
            drug_name.append(
                $('<option></option>').val(item.drug_id).html(item.drug_name)
            );
            });
        });
    })

});
</script>