<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
    </head>
    <style>
        *{margin: 0; padding: 0;}
        body{background: #ecf1f4; font-family: sans-serif;}

        .form-wrap{ width: 320px; background: #3e3d3d; padding: 40px 20px; box-sizing: border-box; position: fixed; left: 50%; top: 50%; transform: translate(-50%, -50%);}
        h1{text-align: center; color: #fff; font-weight: normal; margin-bottom: 20px;}

        input{width: 100%; background: none; border: 1px solid #fff; border-radius: 3px; padding: 6px 15px; box-sizing: border-box; margin-bottom: 20px; font-size: 16px; color: #fff;}
        select{width: 100%; background: none; border: 1px solid #fff; border-radius: 3px; padding: 6px 15px; box-sizing: border-box; margin-bottom: 20px; font-size: 16px; color: #fff;}
        option{background: none; color: #000000;}
        input[type="submit"]{ background: #bac675; border: 0; cursor: pointer; color: #3e3d3d;}
        input[type="submit"]:hover{ background: #a4b15c; transition: .6s;}
        ::placeholder{color: #fff;}
    </style>
    <body >
        <div class="form-wrap">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <h1>Book Your Accomodation</h1>
                <input type="text" placeholder="Name" name='name' required>
                <input type="text" placeholder="College" name='college' required>
                <input type="email" placeholder="Email" name='email' required>
                <input type="number" placeholder="Contact No." name='contact' required>
                <input type="number" placeholder="Team Size" name='people' required>
                <select name="event" required>
                  <option value="">Event</option>
                  <option value="Table-Tennis (Boys)">Table-Tennis (Boys)</option>
                  <option value="Table-Tennis (Girls)">Table-Tennis (Girls)</option>
                  <option value="Badminton (Boys)">Badminton (Boys)</option>
                  <option value="Badminton (Girls)">Badminton (Girls)</option>
                  <option value="Basketball (Boys)">Basketball (Boys)</option>
                  <option value="Basketball (Girls)">Basketball (Girls)</option>
                  <option value="Football (Boys)">Football (Boys)</option>
                  <option value="Cricket (Boys)">Cricket (Boys)</option>
                  <option value="Hockey (Boys)">Hockey (Boys)</option>
                  <option value="Athletics (Boys)">Athletics (Boys)</option>
                  <option value="Athletics (Girls)">Athletics (Girls)</option>
                  <option value="Volleyball (Boys)">Volleyball (Boys)</option>
                  <option value="Volleyball (Girls)">Volleyball (Girls)</option>
                  <option value="Chess">Chess</option>
                  <option value="Lawn-Tennis">Lawn-Tennis</option>
                </select>
                <input type="submit" value="Book now" class="submit" name="submit" />
            </form>
        </div>
    </body>
</html>
<?php
include 'server.php';
?>
</body>
</html>
