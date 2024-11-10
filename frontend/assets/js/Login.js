document
.getElementById("loginForm")
.addEventListener("submit", function (e) {
  e.preventDefault();

  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  
  fetch("../../api/routes/signin.php", {
    method: "POST",
    body: new URLSearchParams({
      email: email,
      password: password,
    }),
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
  })
    .then((response) => response.json())
    .then((data) => {      
      if (data.success) {
        window.location.href = "../../api/views/dashboard.php";
      } else {
        
      }

    })
    .catch((error) => {
      console.error("Error al hacer la petición:", error);
    });
});