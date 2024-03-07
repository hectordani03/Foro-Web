<?php

namespace app\controllers;

use app\models\mainModel;

class loginController extends mainModel
{
		public function loginController() {

			$username=$this->sanitizeString($_POST['username']);
		    $password=$this->sanitizeString($_POST['password']);

		    # Verificando campos obligatorios #
		    if($username=="" || $password=="") {
		        echo "<script>
			        Swal.fire({
					  icon: 'error',
					  title: 'An unexpected error occurred',
					  text: 'You have not completed all required fields'
					});
				</script>";
		    } else {

			    # Verificando integridad de los datos #
			    if($this->verifyData("[a-zA-Z0-9]{4,20}",$username)) {
			        echo "<script>
				        Swal.fire({
						  icon: 'error',
                          title: 'An unexpected error occurred',
						  text: 'The USER does not match the requested format'
						});
					</script>";
			    } else {

			    	# Verificando integridad de los datos #
				    if($this->verifyData("[a-zA-Z0-9$@.-]{7,100}",$password)) {
				        echo "<script>
					        Swal.fire({
							  icon: 'error',
                              title: 'An unexpected error occurred',
							  text: 'Password does not match the requested format'
							});
						</script>";
				    } else {

					    $row_user=$this->run_query("SELECT * FROM user WHERE username = '$username'");

					    if($row_user->rowCount() > 0 ) {

					    	$row_user=$row_user->fetch();

					    	if($row_user['username'] == $username && password_verify($password, $row_user['password'])) {
								session_start();
					    		$_SESSION['id'] = $row_user['id_user'];
					            $_SESSION['username'] = $row_user['username'];
					            $_SESSION['email'] = $row_user['email'];
					            $_SESSION['role'] = $row_user['id_role'];
					            $_SESSION['photo'] = $row_user['profile_picture'];

                                if ($row_user['id_role'] == 1 || $row_user['id_role'] == 2) {
                                    $redirect_url = APP_URL . "dashboard";
                                } else {
                                    $redirect_url = "http://localhost/For-Us/src/forum/";
                                }
                                
                                if (headers_sent()) {
                                    echo "<script> window.location.href='" . $redirect_url . "'; </script>";
                                } else {
                                    header("Location: " . $redirect_url);
                                }

					    	} else {
					    		echo "<script>
							        Swal.fire({
									  icon: 'error',
                                      title: 'An unexpected error occurred',
									  text: 'Incorrect username or password'
									});
								</script>";
					    	}

					    } else {
					        echo "<script>
						        Swal.fire({
								  icon: 'error',
                                  title: 'An unexpected error occurred',
								  text: 'Username does not exists'
								});
							</script>";
					    }
				    }
			    }
		    }
		}

		public function logoutController() {

			session_start();

			// Obtener los parámetros de la cookie de sesión
			$params = session_get_cookie_params();
			
			// Borrar la cookie de sesión configurándola para que expire en el pasado
			setcookie(session_name(), '', time() - 1, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
			
			// Destruir la sesión
			session_destroy();
			
		    if(headers_sent()) {
                echo "<script> window.location.href='http://localhost/For-Us/src/forum/login.php'; </script>";
            } else {
                header("Location: http://localhost/For-Us/src/forum/login.php");
            }
			
		}
	}