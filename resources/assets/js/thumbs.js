<!-- Simple script to restrict past dates from being selected-->
// <script>
var today = new Date().toISOString().split('T')[0];
document.getElementsByName("date")[0].setAttribute('min', today);
// </script>