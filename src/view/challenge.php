<htm>
    <head>
        <title>Play Rock Paper Scissors <?php echo $params['player1']; ?> vs <?php $params['player2']?></title>
        
    </head>
    <body>
        <h1>It's <?php echo $params['player2'] ?>'s turn.</h1>
        <form method="post" >
            <table>
                
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
                    <td>&nbsp;</td>
                    <td><input type="submit" value="play"/></td>
                </tr>
            </table>
            
        </form>
    </body>
</htm>