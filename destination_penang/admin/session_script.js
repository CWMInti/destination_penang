function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
  
  function checkCookie1() {
    var session = getCookie("adminlogin");
    if (session != "") {
        alert ("Already signed in");
        window.location.href = "admin_page.php";
    }
  }

  function checkCookie2() {
    var session = getCookie("adminlogin");
    if (session == "") {
        alert ("Please sign in first");
        window.location.href = "admin_login.php";
    }
  }
  
  function deleteCookie() {
      document.cookie = "adminlogin=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
      alert ("Log out successfull");
      window.location.href = "admin_login.php";
  }
  
  function validate() {
      var admin_username = document.getElementById("admin_username").value;
      var admin_password = document.getElementById("admin_password").value;
      
      if (admin_username == "" && admin_password == "") {
          alert ("Please enter username and password");
          window.location.href = "admin_login.php";
      }
      
      else if (admin_username == "") {
          alert ("Please enter username");
          window.location.href = "admin_login.php";
      }
      
      else if (admin_password == "") {
          alert ("Please enter password");
          window.location.href = "admin_login.php";
      }
  }