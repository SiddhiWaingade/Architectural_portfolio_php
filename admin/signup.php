
 
 <?php
 
 session_start();
 
 require_once('db.php');
 
 
 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
     $username = trim($_POST['username']);
 
     $email = trim($_POST['email']);
 
     $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
 
 
 
     // Check if email or username already exists
 
     $check = $conn->prepare("SELECT id FROM admin WHERE email = ? OR username = ?");
 
     $check->bind_param("ss", $email, $username);
 
     $check->execute();
 
     if ($check->get_result()->num_rows > 0) {
 
         $error = "Email or username already registered";
 
     } else {
 
         $stmt = $conn->prepare("INSERT INTO admin (username, email, password) VALUES (?, ?, ?)");
 
         $stmt->bind_param("sss", $username, $email, $password);
 
         
 
         if ($stmt->execute()) {
 
             $_SESSION['success'] = "Registration successful! Please login.";
 
             header("Location:login.php");
 
             exit();
 
         } else {
 
             $error = "Registration failed: " . $conn->error;
 
         }
 
     }
 
 }
 
 ?>
 
 
 
 <!DOCTYPE html>
 
 <html lang="en">
 
 <head>
 
     <meta charset="UTF-8">
 
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
     <title>Admin Signup - FashionFiesta</title>
 
     <link href=" `https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css` " rel="stylesheet">
 
     <style>
 
         body { background-color: #f8f9fa; }
 
         .signup-container {
 
             max-width: 500px;
 
             margin: 50px auto;
 
             padding: 20px;
 
             background-color: rgb(250, 207, 178);
 
             border-radius: 10px;
 
             box-shadow: 0 0 10px rgba(0,0,0,0.1);
 
         }
 
         .signup-header {
 
             text-align: center;
 
             color: rgb(247, 156, 65);
 
             margin-bottom: 30px;
 
         }
 
         .password-field {
 
             position: relative;
 
         }
 
         .password-toggle {
 
             position: absolute;
 
             right: 10px;
 
             top: 50%;
 
             transform: translateY(-50%);
 
             cursor: pointer;
 
             color: #666;
 
         }
 
     </style>
 
     <link rel="stylesheet" href=" `https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css` ">
 
 </head>
 
 <body>
 
     <div class="container">
 
         <div class="signup-container">
 
             <div class="signup-header">
 
                 <h2>Admin Registration</h2>
 
             </div>
 
             <?php if (isset($error)): ?>
 
                 <div class="alert alert-danger"><?php echo $error; ?></div>
 
             <?php endif; ?>
 
             <form method="POST" action="">
 
                 <div class="mb-3">
 
                     <label for="username" class="form-label">Username</label>
 
                     <input type="text" class="form-control" id="username" name="username" required>
 
                 </div>
 
                 <div class="mb-3">
 
                     <label for="email" class="form-label">Email</label>
 
                     <input type="email" class="form-control" id="email" name="email" required>
 
                 </div>
 
                 <div class="mb-3">
 
                     <label for="password" class="form-label">Password</label>
 
                     <div class="password-field">
 
                         <input type="password" class="form-control" id="password" name="password" required>
 
                         <i class="password-toggle bi bi-eye-slash" onclick="togglePassword()"></i>
 
                     </div>
 
                 </div>
 
                 <button type="submit" class="btn btn-primary w-100 mb-3">Register</button>
 
                 <div class="text-center">
 
                     <a href="login.php" class="text-decoration-none">Already have an account? Login</a>
 
                 </div>
 
             </form>
 
         </div>
 
     </div>
 
 
 
     <script src=" `https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js` "></script>
 
     <script>
 
         function togglePassword() {
 
             const passwordInput = document.getElementById('password');
 
             const toggleIcon = document.querySelector('.password-toggle');
 
             
 
             if (passwordInput.type === 'password') {
 
                 passwordInput.type = 'text';
 
                 toggleIcon.classList.replace('bi-eye-slash', 'bi-eye');
 
             } else {
 
                 passwordInput.type = 'password';
 
                 toggleIcon.classList.replace('bi-eye', 'bi-eye-slash');
 
             }
 
         }
 
     </script>
 
 </body>
 
 </html> 