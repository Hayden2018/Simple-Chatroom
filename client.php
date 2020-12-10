<?php
if (!isset($_COOKIE["name"])) {
    header("Location: error.html");
    return;
}

// get the name from cookie
$name = $_COOKIE["name"];

print "<?xml version=\"1.0\" encoding=\"utf-8\"?>";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Add Message Page</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <style>
            .div-color {
                position: absolute;
                width: 50px;
                height: 50px;
            }
        </style>
        <script type="text/javascript">
        function load() {
            var name = "<?php print $name; ?>";

            setTimeout(document.getElementById('msg').focus(), 100);
        }

        function select(color) {
            if (confirm('Are you sure to change your message color to ' + color + '?')) {
                document.getElementById("color").value = color;
            }
        }

        function showUserList() {
            window.open("userList.html","_blank",
            "toolbar,scrollbars,resizable,top=500,left=500,width=500,height=700");
        }
        </script>
    </head>

    <body style="text-align: left" onload="load()">
        <form action="add_message.php" method="post">
            <table border="0" cellspacing="5" cellpadding="0">
                <tr>
                    <td>What is your message?</td>
                </tr>
                <tr>
                    <td><input class="text" type="text" name="message" id="msg" style= "width: 780px" /></td>
                </tr>
                <tr>
                    <td>
                        <input class="button" type="submit" value="Send Your Message" style="width: 180px" />
                        
                        <div style="position:relative">
                            Choose your color:
                            <div class="div-color" style="background-color:black;left:0px" onclick="select('black')"></div>
                            <div class="div-color" style="background-color:yellow;left:50px" onclick="select('yellow')"></div>
                            <div class="div-color" style="background-color:green;left:100px" onclick="select('green')"></div>
                            <div class="div-color" style="background-color:red;left:150px" onclick="select('red')"></div>
                            <div class="div-color" style="background-color:blue;left:200px" onclick="select('blue')"></div>
                            <div class="div-color" style="background-color:cyan;left:250px" onclick="select('cyan')"></div>
                        </div>
                        <input type="hidden" name="color" id="color" value="black" />
                    </td>
                </tr>
            </table>
        </form>
    <hr style="position:absolute; top:150px; width:1000px">
    <div style="position:absolute; top:170px; left:8px">
        <form action="logout.php" method="post">
            <input style="width:180px; text-align:center;" class="button" value="Show Online User List" onclick="showUserList()"/> 
            <input style="width:180px;" class="button" type="submit" value="Logout" />
        </form>
    </div>
    </body>
</html>
