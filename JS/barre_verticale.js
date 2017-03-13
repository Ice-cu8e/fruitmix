var ouvert = false;
function closeOpenNav() {
  if (ouvert == false) {
    /* Set the width of the side navigation to 0 */
        document.getElementById("mySidenav").style.width = "250px";
        ouvert = true;
      }
  else {
    /* Set the width of the side navigation to 250px */
        document.getElementById("mySidenav").style.width = "0px";
        ouvert = false;
      }
}
/* Set the width of the side navigation to 250px /
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 /
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
*/
