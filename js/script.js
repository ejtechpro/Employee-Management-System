var togglerbtn = document.getElementById('toggler-btn');
var sidebar = document.querySelector('.sidebar');
var mainviewpanel = document.querySelector('.main-view-panel');

togglerbtn.onclick = function(){
  sidebar.classList.toggle('active');
  mainviewpanel.classList.toggle('active');
}

// Displaying img before editing
function displayIMG(file){
document.querySelector(".profile-preview").src = URL.createObjectURL(file);
}


/* filter emplyee */
function searchEmployee(){
  var input, filter, table, tr, td, i, txtValue;
  
  input = document.getElementById("searchInput");
  filter =input.value.toUpperCase();
  table = document.getElementById("empTable");
  tr = table.getElementsByTagName("tr");
  
  for(i = 1; i < tr.length; i++){
  var rowVisible = false;
  
  for(n = 0; n < tr[i].getElementsByTagName("td").length; n++){
    td = tr[i].getElementsByTagName("td")[n];
    
    if(td){
      txtValue = td.textContent || td.innerText;
  
      if(txtValue.toUpperCase().indexOf(filter) > -1){
        rowVisible = true;
        break;
  
      }
     }
    }
  
    if(rowVisible){
  
      tr[i].style.display = "";
  
    }else{
  
      tr[i].style.display = "none";
  
    }
   }
  }