<script>
$(document).ready(function(){  
        $('#tableshow').DataTable({
        "searching": false,
        "language": {
            "lengthMenu": "ข้อมูลเเสดง _MENU_ ต่อหน้า",
            "info": " _PAGE_ หน้าจาก _PAGES_",
            "sSearch": "ค้นหา"

        },
  
      retrieve: true,

      
});  
 }); 
</script>