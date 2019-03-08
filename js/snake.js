window.onload = function()       // se charge au mometn de l'ouverture de la fenetre //
 {
   var canvasWidth = 900;
   var canvasHeight = 600;
   var blockSize = 30;
   var ctx;
   var delay = 100;
   var snakee;
   var applee;
   var widthInBlocks = canvasWidth/blockSize;
   var heightInBlocks = canvasHeight/blockSize;
   var score;


    init();


        function init()
                  {
                    var canvas = document.createElement('canvas');     // créer l'élément canvas //
                    canvas.width = canvasWidth;          //largeur du canvas //
                    canvas.height = canvasHeight;         //hauteur du canva //
                    canvas.style.border = " 20px solid black";           // bordure du cavnas, pour délimiter et voir //
                    document.body.appendChild(canvas);     // lier le canvas a la page\body html //
                    ctx = canvas.getContext('2d'); // canvas est dessiné en 2d //
                    snakee = new snake([[6,4], [5,4], [4,4]], "right");
                    applee = new apple([10,10]);
                    score = 0;
                    refreshCanvas();
                  }







          function refreshCanvas()
                  {
                    snakee.advance();
                    if (snakee.checkCollision())
                      {
                          gameOver();
                      }
                      else
                      {
                          if(snakee.iseatingapple(applee))
                              {
                                score ++;
                                snakee.AteApple = true;
                                do
                                  {
                                  applee.setNewPosition();
                                } while (applee.IsOnSnake(snakee))

                              }
                          ctx.clearRect(0,0,canvasWidth, canvasHeight);
                          snakee.draw();
                          applee.draw();
                          setTimeout(refreshCanvas,delay);
                      }
                      ctx.fillText(score,5,590);
                  }

            function gameOver()
            {
              ctx.save();
              ctx.fillText("Game Over", 5, 15);
              ctx.fillText("appuyer sur la touche espace pour rejouer",5,30);
              ctx.restore();
            }

            function restart()
            {
              snakee = new snake([[6,4], [5,4], [4,4]], "right");
              applee = new apple([10,10]);
              score = 0;
              refreshCanvas();
            }









          function drawBlock(ctx, position)
                  {
                    var x = position[0] * blockSize;
                    var y = position[1] * blockSize;
                    ctx.fillRect(x, y ,blockSize ,blockSize );
                  }










          function snake(body, direction)
            {
                  this.body = body;
                  this.direction = direction;
                  this.AteApple = false;
                  this.draw = function()
                  {
                    ctx.save();
                    ctx.fillStyle = "green";
                    for(var i = 0; i < this.body.length; i++)
                        {
                            drawBlock(ctx, this.body[i]);
                        }
                    ctx.restore();
                  };


                  this.advance = function()
                    {
                      var nextPosition = this.body[0].slice();
                      switch(this.direction)
                        {
                          case "left":
                          nextPosition[0] -= 1;
                            break;

                            case "right":
                            nextPosition[0] += 1;
                            break;

                            case "down":
                            nextPosition[1] += 1;
                            break;

                            case "up":
                            nextPosition[1] -= 1;
                            break;

                        default:
                        throw("invalid direction");
                      }
                      this.body.unshift(nextPosition);
                      if(!this.AteApple)
                          this.body.pop();
                      else
                          this.AteApple = false;
                    };


                  this.setDirection = function(newDirection)
                        {
                              var allowedDirections;
                              switch(this.direction)
                                      {
                                        case "left":
                                        case "right":
                                          allowedDirections = ["up", "down"];
                                          break;
                                        case "down":
                                        case "up":
                                          allowedDirections = ["right", "left"];
                                          break;
                                        default:
                                          throw("invalid direction");
                                      }
                              if(allowedDirections.indexOf(newDirection) > -1)
                                      {
                                          this.direction = newDirection;
                                      }
                        };

                    this.checkCollision = function()
                        {
                          var wallCollision = false;
                          var snakeCollision = false;
                          var head = this.body[0];
                          var rest = this.body.slice(1);
                          var snakex = head[0];
                          var snakey = head[1];
                          var minx = 0;
                          var miny = 0;
                          var maxx = widthInBlocks - 1;
                          var maxy = heightInBlocks - 1;
                          var nothorizontal = snakex < minx || snakex > maxx;
                          var notvertical = snakey < miny || snakey > maxy;

                          if (nothorizontal || notvertical)
                           {
                              wallCollision = true;
                           }

                           for (var i = 0; i < rest.length; i++)
                           {
                             if(snakex === rest[i][0] && snakey === rest[i][1])
                              {
                                snakeCollision = true;
                              }
                           }

                           return wallCollision || snakeCollision;
                        };

                        this.iseatingapple = function(appletoeat)
                          {
                            var head = this.body[0];
                            if(head[0] === appletoeat.position[0] && head[1] === appletoeat.position[1])
                                {
                                  return true;
                                }
                              else
                               {
                                 return false;
                               }

                          };








              }
              function apple(position)
              {
                this.position = position;
                this.draw = function()
                {
                  ctx.save();
                  ctx.fillStyle = "red";
                  ctx.beginPath();
                  var radius = blockSize/2;
                  var x = this.position[0]*blockSize + radius;
                  var y = this.position[1]*blockSize + radius;
                  ctx.arc(x,y, radius, 0, Math.PI*2, true);
                  ctx.fill();
                  ctx.restore();
                };

                this.setNewPosition = function()
                {
                  var newx = Math.round(Math.random() * (widthInBlocks - 1));
                  var newy = Math.round(Math.random() * (heightInBlocks - 1));
                  this.position = [newx, newy];
                };

                this.IsOnSnake = function(snakeToCheck)
                {
                  var IsOnSnake = false;
                  for (var i = 0; i < snakeToCheck.body.length; i++)
                    {
                      if(this.position[0] === snakeToCheck.body[i][0] && this.position[1] === snakeToCheck.body[i][1])
                        {
                          IsOnSnake = true;
                        }
                    }
                  return IsOnSnake;
                };
              }



               document.onkeydown = function handleKeyDown(e)
               {
                  var key = e.keyCode;
                  var newDirection;
                  switch(key)
                  {
                      case 37:
                          newDirection = "left";
                        break;
                      case 38:
                          newDirection = "up";
                        break;
                      case 39:
                          newDirection = "right";
                        break;
                      case 40:
                          newDirection = "down";
                        break;
                      case 32:
                          restart();
                          return;
                        default:
                        return;
                  }
                  snakee.setDirection(newDirection);
               }
}
