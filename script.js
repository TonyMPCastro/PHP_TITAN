
  $(document).ready(function(){

    //change
//  $("#sclStatus").change(function(){
//      var table = $("#tbPedidos");
//      var status = $("#sclStatus").val(); 
//      var grid = $("#sclStatusGrid").val();
//      if(status != "selecione")
//      {
//          table.find('tbody tr > td > select').filter(function(){
//      $(status).toggle($(grid).indexOf(grid) > -1)
//          });
//      }
//  });

});
function Produto() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("tbProdutos");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function myFunction() {
  var input, filter, table, tbody, tr, td, i;
  input = document.getElementById("sclCor").value;
  filter = input;
  table = document.getElementById("tbProdutos");
  tbody = table.getElementsByTagName("tbody")[0];
  tr = tbody.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
       //alert(td.innerHTML);
      if (td.innerHTML == filter || filter == "") {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }     
}
