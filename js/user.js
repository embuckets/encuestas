function requestUser( ) {
   let xmlhttp = new XMLHttpRequest( );
   xmlhttp.onreadystatechange = function( ) {
      if (this.readyState == 4 && this.status == 200) {
         document.getElementById("userName").innerHTML = this.responseText;
      }
   };
   
   xmlhttp.open("POST", "src/user.php", true);
   xmlhttp.send( );
}