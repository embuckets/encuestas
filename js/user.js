function requestUser( ) {
   let xmlhttp = new XMLHttpRequest( );
   xmlhttp.onreadystatechange = function( ) {
      if (this.readyState == 4 && this.status == 200) {
         document.getElementById("userName").innerHTML = this.responseText;
      }
   };
   alert("Antes!");
   //xmlhttp.open("POST", "../src/user.php", true);
   xmlhttp.open("POST", "test.txt", true);
   xmlhttp.send( );
}