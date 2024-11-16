document
  .getElementById("loginForm")
  .addEventListener("submit", async function (e) {
    e.preventDefault();

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    try {
      const response = await fetch("../../api/routes/signin.php", {
        method: "POST",
        body: new URLSearchParams({
          email: email,
          password: password,
        }),
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
      });

      const data = await response.json();

      if (data.success) {
        window.location.href = "../../api/views/dashboard.php";
      } else {
        console.error("Error de autenticación:", data.message);
      }
    } catch (error) {
      console.error("Error al hacer la petición:", error);
    }
  });
