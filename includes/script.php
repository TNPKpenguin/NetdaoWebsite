<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
  $(function(){
    var provinceObject = $('#province');
    var amphureObject = $('#amphure');
    var districtObject = $('#district');
    var zip_code = $('zip_code');

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
                    $('<option></option>').val(item.district_code).html(item.name_th)
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
});
</script>