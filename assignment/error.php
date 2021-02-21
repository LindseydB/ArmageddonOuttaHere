<?php
use armageddon\Member;

if (! empty($_POST["login-btn"])) {
    require_once __DIR__ . '/Model/Member.php';
    $member = new Member();
    $loginResult = $member->loginMember();
}
?>
<?php include 'includes/header.php';?>

<main role="main" id ="register">
		<div class="sign-up-container">
      <h2 class="register">Error! Get it together.</h2>
		</div>
  </main>
