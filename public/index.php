<?php
session_start();
?>
    <!doctype html>
    <html>
    <head>
        <title>Make Contact</title>
        <link href="favicon.ico" rel="shortcut icon">
        <link  type="text/css" rel="stylesheet" href="css/animate.css">
        <link  type="text/css" rel="stylesheet" href="css/bulma.min.css">
        <link  type="text/css" rel="stylesheet" href="css/master.css">
    </head>
    <body>
    <div class="flex-container">
        <div class="logo">
            <img class="rocket animated zoomInLeft" src="img/logo-sm.svg" alt="rocket">
            <img class="rf" src="img/logo.svg" alt="Rocket Fuel logo">
        </div>
        <h1>MAKE CONTACT</h1>
        <form action="submit.php" method="POST">
            <div class="field">
                <label class="label">Name</label>
                <div class="control">
                    <input class="input" type="text" name="name" placeholder="Major Tom" required>
                </div>
            </div>
            <div class="field">
                <label class="label">Email</label>
                <div class="control">
                    <input class="input" type="email" name="email" placeholder="GroundControl@makecontact.rf" required>
                </div>
            </div>
            <div class="field">
                <label class="label">Message</label>
                <div class="control">
                    <textarea class="textarea" name="message" placeholder="I'm stepping through the door." required></textarea>
                </div>
            </div>
            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link">Make Contact</button>
                </div>
            </div>
        </form>
        <?php if(isset($_SESSION['sent'])): ?>
            <?php if($_SESSION['sent'] === TRUE): ?>
                <h1>CONTACT MADE</h1>
            <?php else: ?>
                <h1 style="color:#ff4d4d">PLEASE TRY AGAIN</h1>
            <?php endif; ?>
            <div class="logo">
                <img class="rocket animated zoomInLeft" src="img/logo-sm.svg" alt="rocket">
            </div>
        <?php endif; ?>
    </div>
    </body>
    </html>
<?php $_SESSION = [];
