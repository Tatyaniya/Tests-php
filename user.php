<?php

class User {
  private $name;
  private $email;
  private $password;

  public function __construct($name, $email, $password) {
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
  }

  public function login($email, $password) {
    return ($email === $this->email && $password === $this->password);
  }

  public function change_password($old_password, $new_password) {
    if ($old_password === $this->password) {
      $this->password = $new_password;
      return true;
    } else {
      return false;
    }
  }
}

$user = new User("John Doe", "johndoe@example.com", "qwerty123");

if ($user->login("johndoe@example.com", "qwerty123")) {
    echo "Login successful</br>";
} else {
    echo "The email or password is incorrect</br>";
}

if ($user->login("john@example.com", "qwerty345")) {
  echo "Login successful</br>";
} else {
  echo "The email or password is incorrect</br>";
}

if ($user->change_password("qwerty123", "zxcvbn456")) {
  echo "Password changed successfully</br>";
} else {
  echo "Password change error</br>";
}

if ($user->change_password("qwerty345", "qwerty345678")) {
    echo "Password changed successfully</br>";
} else {
    echo "Password change error</br>";
}

?>
