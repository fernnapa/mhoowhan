<script>

$(document).ready(function(){  
      $('#tableshow').DataTable({
  "searching": true,
  "language": {
            "lengthMenu": "ข้อมูลเเสดง _MENU_ ต่อหน้า",
            "info": " _PAGE_ หน้าจาก _PAGES_",
            "sSearch": "ค้นหาจาก ชื่อคนผู้ยืม/หมายเลขเครื่อง"

        },
        retrieve: true,
  
        
  
});  
 }); 
</script>