<htm>
    <head>
        <title>Play Rock Paper Scissors</title>
        <script>
            window.onload = function(){
                
                document.getElementById('friend').onchange = function(ev){
                    
                    if (this.checked === true){
                        document.getElementById('friends_name').style.display = "block";
                    }
                    
                }
                document.getElementById('computer').onchange = function(ev){
                    
                    if (this.checked === true){
                        document.getElementById('friends_name').style.display = "none";
                    }
                    
                }
            }
            
        </script>
    </head>
    <body>
        <h1>Play Rock Paper Scissors</h1>
        <form method="post" >
            <table>
                <tr>
                    <td><label for="player1Name">Your name:</label></td>
                    <td><input  name="player1" id="player1"></td>
                </tr>
                <tr>
                    <td><strong>Choose your weapon</strong></td>
                </tr>
                <tr>
                    <td><label for="rock">Rock</label></td>
                    <td><input type="radio" name="choice" value="rock" id="rock"></td>
                </tr>
                <tr>
                    <td><label for="paper">Paper</label></td>
                    <td><input type="radio" name="choice" value="paper" id="paper"></td>
                </tr>
                <tr>
                    <td><label for="scissors">Scissors</label></td>
                    <td><input type="radio" name="choice" value="scissors" id="scissors"></td>
                </tr>
                <tr>
                    <td><strong>Choose your opponent</strong></td>
                </tr>
                <tr>
                    <td><label for="computer">Computer</label></td>
                    <td><input type="radio" name="opponent" value="computer" id="computer"></td>
                </tr>
                <tr>
                    <td><label for="friend">Friend</label></td>
                    <td><input type="radio" name="opponent" value="friend" id="friend" ></td>
                </tr>
                <tbody style="display:none;" id="friends_name">
                <tr>
                    <td><label for="player2">Your friend's name:</label></td>
                    <td><input  name="player2" id="player2"></td>
                </tr>
                </tbody>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" value="play"/></td>
                </tr>
            </table>
            
        </form>
    </body>
</htm>